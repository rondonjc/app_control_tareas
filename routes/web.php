<?php

use App\Http\Controllers\TareasController;
use App\Mail\MensagemTesteMail;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::resource('/tarea',TareasController::class)->middleware('verified')->middleware('auth');

Route::get('mensaje-teste', function () {
    /*
    Mail::to('rondonjuan87@gmail.com')->send(new MensagemTesteMail());
    return 'Mensaje enviado';
    */
    return new MensagemTesteMail();
});
