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

use App\Http\Controllers\FormController;

Route::get('/form',[FormController::class,'index']);
Route::post('/insert',[FormController::class,'insert']);
Route::get('/users',[FormController::class,'allUsers']);
Route::get('/edit/{id}/',[FormController::class,'edit']);
Route::post('/update',[FormController::class,'update']);
Route::get('/delete/{id}/',[FormController::class,'delete']);

//authorisation
Route::get('/signin',[FormController::class,'signin']);
Route::post('/login',[FormController::class,'login']);
Route::get('/logout',[FormController::class,'logout']);

