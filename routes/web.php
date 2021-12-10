<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/get-token', [App\Http\Controllers\HomeController::class, 'getToken']);
Route::post('/api/email/send', [App\Http\Controllers\API\EmailController::class, 'send'])->name('send');
