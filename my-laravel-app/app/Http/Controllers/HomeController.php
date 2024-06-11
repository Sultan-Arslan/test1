<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
//    public function index() {
//            $lessons = Lesson::all();
//            return view('home', compact('lessons'));
//        }
    public function index(Request $request)
    {
        // Получаем поисковый запрос
        $search = $request->input('search');

        // Выполняем запрос к базе данных с учетом поиска и пагинации
        $lessons = Lesson::query()
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->paginate(4);

        // Возвращаем представление с уроками и поисковым запросом
        return view('home', compact('lessons', 'search'));
    }
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

//        // Проверяем, есть ли еще свободные места на уроке
        if ($lesson->students->count() < $lesson->capacity) {
            // Привязываем пользователя к уроку
              DB::table('lesson_users')->insert([
                'lesson_id' => $lesson->id,
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->back()->with('success', 'Вы успешно зарегистрировались на урок.');
        } else {
            return redirect()->back()->with('error', 'Мест нет.');
//            return 'no';
        }
    }

    public function admin_register($lessonId)
    {
        // Получаем текущего аутентифицированного пользователя
        $user = Auth::user();

        // Находим урок по его ID
        $lesson = Lesson::findOrFail($lessonId);


//        // Проверяем, есть ли еще свободные места на уроке
        if ($lesson->students->count() < $lesson->capacity) {
            // Привязываем пользователя к уроку
            DB::table('lesson_users')->insert([
                'lesson_id' => $lesson->id,
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->back()->with('success', 'Вы успешно зарегистрировались на урок.');
        } else {
            return redirect()->back()->with('error', 'Мест нет.');
//            return 'no';
        }
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

    public function search(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = Lesson::query();

        if ($startDate) {
            $query->where('date', '>=', $startDate);
        }

        if ($endDate) {
            $query->where('date', '<=', $endDate);
        }

        $lessons = $query->paginate(10);

        return view('home', compact('lessons'));
    }
}
