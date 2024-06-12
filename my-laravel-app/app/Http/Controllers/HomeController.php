<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class HomeController extends Controller
{

    private $webhookUrl = 'https://crmconsulting.bitrix24.kz/rest/53/ikbndhsi52hg6e22';
    public function index(Request $request)
    {
        $search = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $specialist = $request->input('specialist');
        $freeOnly = $request->input('free_only');
        $myLessons = $request->input('my_lessons');

        $query = Lesson::with('students');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($startDate) {
            $query->where('date', '>=', $startDate);
        }

        if ($endDate) {
            $query->where('date', '<=', $endDate);
        }

        if ($specialist) {
            $query->whereHas('specialist', function ($q) use ($specialist) {
                $q->where('name', 'like', "%{$specialist}%");
            });
        }

        if ($freeOnly) {
            $query->whereRaw('capacity > (SELECT COUNT(*) FROM lesson_users WHERE lesson_id = lessons.id)');
        }

        if ($myLessons && Auth::check()) {
            $query->whereHas('students', function ($q) {
                $q->where('user_id', Auth::id());
            });
        }

        $lessons = $query->paginate(10);

        return view('home', compact('lessons', 'search', 'startDate', 'endDate', 'specialist', 'freeOnly', 'myLessons'));
    }


//    public function register($lessonId)
//    {
//        // Получаем текущего аутентифицированного пользователя
//        $user = Auth::user();
//
//        // Находим урок по его ID
//        $lesson = Lesson::findOrFail($lessonId);
//
//        // Проверяем, зарегистрирован ли пользователь уже на этот урок
//        $alreadyRegistered = DB::table('lesson_users')
//            ->where('lesson_id', $lesson->id)
//            ->where('user_id', $user->id)
//            ->exists();
//
//        if ($alreadyRegistered) {
//            return redirect()->back()->with('error', 'Вы уже зарегистрированы на этот урок.');
//        }
//
////        // Проверяем, есть ли еще свободные места на уроке
//        if ($lesson->students->count() < $lesson->capacity) {
//            // Привязываем пользователя к уроку
//              DB::table('lesson_users')->insert([
//                'lesson_id' => $lesson->id,
//                'user_id' => $user->id,
//                'created_at' => now(),
//                'updated_at' => now(),
//            ]);
//            return redirect()->back()->with('success', 'Вы успешно зарегистрировались на урок.');
//        } else {
//            return redirect()->back()->with('error', 'Мест нет.');
////            return 'no';
//        }
//    }

    public function register($lessonId)
    {
        // Получаем текущего аутентифицированного пользователя
        $user = Auth::user();

        // Находим урок по его ID
        $lesson = Lesson::findOrFail($lessonId);

        // Проверяем, зарегистрирован ли пользователь уже на этот урок
        $alreadyRegistered = DB::table('lesson_users')
            ->where('lesson_id', $lesson->id)
            ->where('user_id', $user->id)
            ->exists();

        if ($alreadyRegistered) {
            return redirect()->back()->with('error', 'Вы уже зарегистрированы на этот урок.');
        }

        // Проверяем, есть ли еще свободные места на уроке
        if ($lesson->students->count() < $lesson->capacity) {
            // Привязываем пользователя к уроку
            DB::table('lesson_users')->insert([
                'lesson_id' => $lesson->id,
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Вызов входящего веб-хука для Bitrix24
            $this->callBitrix24Webhook($user, $lesson);

            return redirect()->back()->with('success', 'Вы успешно зарегистрировались на урок.');
        } else {
            return redirect()->back()->with('error', 'Мест нет.');
        }
    }

    private function callBitrix24Webhook($user, $lesson)
    {
        $client = new Client();

        // Шаг 1: Проверка наличия контакта
        $contactId = $this->findOrCreateContact($client, $user);

        if ($contactId) {
            // Шаг 3: Создание элемента смарт-процесса и привязка контакта
            $webhookUrl = $this->webhookUrl . '/crm.item.add';

            $response = $client->post($webhookUrl, [
                'json' => [
                    'entityTypeId' => '1032', // ID вашего смарт-процесса
                    'fields' => [
                        'TITLE' => 'Регистрация на урок', // Название элемента смарт-процесса
                        'ufCrm9_1718181620' => $user->id, // Код поля для ID пользователя
                        'ufCrm9_1718181703' => $lesson->id, // Код поля для ID урока
                        'ufCrm9_1718190432' => $lesson->date, // Дата урока
                        'ufCrm9_1718181728' => 'your-api-key', // Пример API ключа
                        'CONTACT_ID' => $contactId // ID контакта
                    ]
                ]
            ]);

            // Обработка ответа веб-хука (если необходимо)
            $responseBody = json_decode($response->getBody(), true);
            if (isset($responseBody['error'])) {
                // Логирование ошибки или выполнение других действий
                \Log::error('Ошибка при вызове веб-хука Bitrix24: ' . $responseBody['error']);
            }
        } else {
            \Log::error('Контакт не найден и не создан.');
        }
    }

    private function findOrCreateContact($client, $user)
    {
        // Шаг 1: Проверка наличия контакта
        $webhookUrl = $this->webhookUrl . '/crm.contact.list';

        $response = $client->post($webhookUrl, [
            'json' => [
                'filter' => [
                    'PHONE' => '%' . $user->phone . '%' // Используем номер телефона для проверки
                ],
                'select' => ['ID', 'NAME', 'LAST_NAME', 'PHONE']
            ]
        ]);

        $responseBody = json_decode($response->getBody(), true);

        if (!empty($responseBody['result'])) {
            // Контакт найден, возвращаем его ID
            return $responseBody['result'][0]['ID'];
        }

        // Шаг 2: Создание контакта, если его нет
        $webhookUrl = $this->webhookUrl . '/crm.contact.add';

        $response = $client->post($webhookUrl, [
            'json' => [
                'fields' => [
                    'NAME' => $user->name,
                    'LAST_NAME' => $user->last_name,
                    'EMAIL' => [
                        [
                            'VALUE' => $user->email,
                            'VALUE_TYPE' => 'WORK'
                        ]
                    ],
                    'PHONE' => [
                        [
                            'VALUE' => $user->phone,
                            'VALUE_TYPE' => 'WORK'
                        ]
                    ]
                ]
            ]
        ]);

        $responseBody = json_decode($response->getBody(), true);

        if (isset($responseBody['result'])) {
            // Контакт успешно создан, возвращаем его ID
            return $responseBody['result'];
        }

        // Если контакт не найден и не создан, возвращаем null или обрабатываем ошибку
        \Log::error('Ошибка при создании контакта в Bitrix24: ' . json_encode($responseBody));
        return null;
    }


    public function unregister($lessonId)
    {
        // Получаем текущего аутентифицированного пользователя
        $user = Auth::user();

        // Находим урок по его ID
        $lesson = Lesson::findOrFail($lessonId);

        // Проверяем, зарегистрирован ли пользователь на этот урок
        $alreadyRegistered = DB::table('lesson_users')
            ->where('lesson_id', $lesson->id)
            ->where('user_id', $user->id)
            ->exists();

        if (!$alreadyRegistered) {
            return redirect()->back()->with('error', 'Вы не зарегистрированы на этот урок.');
        }

        // Удаляем запись из таблицы lesson_users
        DB::table('lesson_users')
            ->where('lesson_id', $lesson->id)
            ->where('user_id', $user->id)
            ->delete();

        return redirect()->back()->with('success', 'Вы успешно отменили регистрацию на урок.');
    }


}
