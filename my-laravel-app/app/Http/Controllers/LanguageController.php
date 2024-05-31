<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    //
    public function switchLanguage(Request $request, $lang)
    {
        // Устанавливаем язык приложения
        App::setLocale($lang);

        // Сохраняем выбранный язык в сессии
        $request->session()->put('locale', $lang);

        // Вернуть пользователя на предыдущую страницу или другую нужную страницу
        return redirect()->back();
    }
}
