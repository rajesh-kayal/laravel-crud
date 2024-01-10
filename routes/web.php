<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/',[FormController::class,'index']);
Route::post('/insert', [FormController::class, 'insert']);
Route::get('/users', [FormController::class, 'getAll']);
Route::get('/edit/{id}', [FormController::class, 'editId']);
Route::post('/update', [FormController::class, 'update']);
Route::get('/delete/{id}', [FormController::class, 'delete']);

Route::get('/signin', [FormController::class, 'signin']);
Route::post('/login', [FormController::class, 'login']);
Route::get('/logout', [FormController::class, 'logout']);



///new code

use App\Http\Controllers\HomeContoller;
//insert
Route::get('/home',[HomeContoller::class, 'home']);
Route::post('/submit', [HomeContoller::class, 'submit']);
//view
Route::get('/display', [HomeContoller::class, 'alluser']);
//edit
Route::get('/editUser/{id}',[HomeContoller::class, 'neweditId']);
Route::post('/update', [HomeContoller::class, 'update']);
//delete
Route::get('/deleteUser/{id}', [HomeContoller::class, 'delete']);
// login
// Route::get('new_signin',[HomeContoller::class, 'signin'])->name('login'); //name route
Route::get('/new_signin',[HomeContoller::class, 'signin']);
Route::post('/login', [HomeContoller::class, 'login']);

