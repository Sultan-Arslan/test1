<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class Bitrix24Controller extends Controller
{
    private $webhookUrl;

    public function __construct()
    {
        $this->webhookUrl = 'https://crmconsulting.bitrix24.kz/rest/53/ikbndhsi52hg6e22';
    }

    public function findOrCreateContact(Request $request)
    {
        $phoneNumber = $request->input('phone'); // Получаем номер телефона из запроса
        $client = new Client();

        // Поиск контакта по номеру телефона
        $response = $client->post($this->webhookUrl . '/crm.contact.list', [
            'json' => [
                'filter' => [
                    'PHONE' => '%' . $phoneNumber . '%' // Используем номер телефона для проверки
                ],
                'select' => ['ID', 'NAME', 'LAST_NAME', 'PHONE']
            ]
        ]);

        $responseBody = json_decode($response->getBody(), true);

        if (!empty($responseBody['result'])) {
            // Контакт найден, выводим его ID и другую информацию
            $contact = $responseBody['result'][0];
            return response()->json([
                'message' => 'Контакт найден',
                'contact' => [
                    'ID' => $contact['ID'],
                    'NAME' => $contact['NAME'],
                    'LAST_NAME' => $contact['LAST_NAME'],
                    'PHONE' => $contact['PHONE'][0]['VALUE']
                ]
            ]);
        } else {
            // Контакт не найден, создаем новый контакт
            $newContactResponse = $client->post($this->webhookUrl . '/crm.contact.add', [
                'json' => [
                    'fields' => [
                        'NAME' => $request->input('name', 'Неизвестный'),
                        'LAST_NAME' => $request->input('last_name', 'Контакт'),
                        'PHONE' => [
                            [
                                'VALUE' => $phoneNumber,
                                'VALUE_TYPE' => 'WORK'
                            ]
                        ]
                    ]
                ]
            ]);

            $newContactBody = json_decode($newContactResponse->getBody(), true);

            if (isset($newContactBody['result'])) {
                // Новый контакт успешно создан
                return response()->json([
                    'message' => 'Новый контакт создан',
                    'contact_id' => $newContactBody['result']
                ]);
            } else {
                // Ошибка при создании нового контакта
                return response()->json([
                    'message' => 'Ошибка при создании нового контакта',
                    'error' => $newContactBody
                ], 500);
            }
        }
    }
}
