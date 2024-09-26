<?php

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

Route::post('/',[AppointmentConroller::class,'save'])-> name('save.Appointment');
Route::get('/doctor/login',function(){
    return view('Doctor.Auth.Login');
});

Route::get('/doctor/registration',function(){
    return view('Doctor.Auth.signup');
})->name('doctor.registration');


Route::post('/doctor/registartion',[AuthController::class,'savedoc'])->name('doctor.rigistration.save');
