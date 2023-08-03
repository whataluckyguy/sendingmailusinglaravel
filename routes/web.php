<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactcontroller;

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

Route::view('/contact','contactForm')->name('contactForm');
Route::post('/contact',[contactcontroller::class,'send'])->name('send.email');