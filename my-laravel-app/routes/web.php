<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::get('/home' ,[LessonController::class, 'test'])->name('home');


Route::get('/adminpanel', [LessonController::class, 'index'])->name('dashboard');

Route::post('lessons/{lesson}/register', [LessonController::class, 'register'])->name('lessons.register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('add-lesson' ,[LessonController::class, 'create'])->name('add-lesson');
Route::post('store-lesson' ,[LessonController::class, 'store'])->name('store-lesson');

Route::get('switch-language/{lang}', [LanguageController::class, 'switchLanguage'])->name('switch.language');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
