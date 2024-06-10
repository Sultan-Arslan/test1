<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckAdminRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRoleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect(url('/home'));
});
Route::get('/home' ,[HomeController::class, 'index'])->name('home');

Route::get('switch-language/{lang}', [LanguageController::class, 'switchLanguage'])->name('switch.language');
Route::middleware(['auth', 'verified'])->group(function () {
    //Запись на урок пользователя
    Route::post('lessons/{lesson}/register', [HomeController::class, 'register'])->name('lessons.register');

    Route::group(['middleware'=>CheckAdminRole::class], function (){
//Админ панель и уроки
    Route::get('lessons', [LessonController::class, 'index'])->name('lessons.index');
    Route::get('lessons/create', [LessonController::class, 'create'])->name('lessons.create');
    Route::post('lessons', [LessonController::class, 'store'])->name('lessons.store');
    Route::get('lessons/{lesson}', [LessonController::class, 'show'])->name('lessons.show');
    Route::get('lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
    Route::put('lessons/{lesson}', [LessonController::class, 'update'])->name('lessons.update');
    Route::delete('lessons/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy');
//специалист
    Route::get('user_roles', [UserRoleController::class, 'index'])->name('user_roles.index');
    Route::put('user_roles/{user}', [UserRoleController::class, 'update'])->name('user_roles.update');
    });
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
