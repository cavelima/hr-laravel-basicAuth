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
Auth::routes();

Route::get('/', 'App\Http\Controllers\EmployeeController@index')->middleware('auth');
Route::post('departments/find', 'App\Http\Controllers\DepartmentController@find')->name('departments.find')->middleware('auth');

Route::resource('employees', 'App\Http\Controllers\EmployeeController')->middleware('auth');
Route::resource('employeesJSON', 'App\Http\Controllers\EmployeeJSONController')->middleware('auth');
Route::resource('departments', 'App\Http\Controllers\DepartmentController')->middleware('auth');
