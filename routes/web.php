<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/' , [UserController::class,'view']) -> name('welcome');
Route::get('/first' , [UserController::class,'firstview']) -> name('first');
Route::get('/second' , [UserController::class,'secondview']) -> name('second');
Route::post('/dataCreate', [UserController::class, 'dataCreate']) -> name('dataCreate');
Route::get('/dataSearch', [UserController::class, 'dataSearch'])->name('dataSearch');
Route::get('/dataDelete/{id}', [UserController::class, 'dataDelete']) -> name('dataDelete');
Route::get('/dataEdit/{id}', [UserController::class, 'dataedit'])->name('dataEdit');


?>