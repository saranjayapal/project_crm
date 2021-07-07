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

//Auth::routes();
//disable register 
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Companies
Route::get('/companies_index', 'App\Http\Controllers\CompaniesController@index')->name('companies_index');
Route::get('/companies_create', 'App\Http\Controllers\CompaniesController@create')->name('companies_create');
Route::post('/companies_store', 'App\Http\Controllers\CompaniesController@store')->name('companies_store');
Route::get('/companies_edit/{id}', 'App\Http\Controllers\CompaniesController@edit')->name('companies_edit');
Route::post('/companies_update/{id}', 'App\Http\Controllers\CompaniesController@update')->name('companies_update');
Route::post('/companies_delete/{id}', 'App\Http\Controllers\CompaniesController@destroy')->name('companies_delete');

//Employees
Route::get('/employees_index', 'App\Http\Controllers\EmployeesController@index')->name('employees_index');
Route::get('/employees_create', 'App\Http\Controllers\EmployeesController@create')->name('employees_create');
Route::post('/employees_store', 'App\Http\Controllers\EmployeesController@store')->name('employees_store');
Route::get('/employees_edit/{id}', 'App\Http\Controllers\EmployeesController@edit')->name('employees_edit');
Route::post('/employees_update/{id}', 'App\Http\Controllers\EmployeesController@update')->name('employees_update');
Route::post('/employees_delete/{id}', 'App\Http\Controllers\EmployeesController@destroy')->name('employees_delete');