<?php

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
    return redirect()->route('login');
});
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['register' => false]);

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/set_language/{idioma}', 'Controller@set_language')->name('set_language');

Route::get('/companies', 'CompanyController@index')->name('companies.index');
Route::get('/companies/create', 'CompanyController@create')->name('companies.create');
Route::post('/companies/store', 'CompanyController@store')->name('companies.store');
Route::get('/companies/edit/{id}', 'CompanyController@edit')->name('companies.edit');
Route::get('/companies/show/{id}', 'CompanyController@show')->name('companies.show');
Route::post('/companies/update', 'CompanyController@update')->name('companies.update');
Route::post('/companies/destroy', 'CompanyController@destroy')->name('companies.destroy');

//employees
Route::get('/employees', 'EmployeeController@index')->name('employees.index');
Route::get('/employees/create', 'EmployeeController@create')->name('employees.create');
Route::post('/employees/store', 'EmployeeController@store')->name('employees.store');
Route::get('/employees/edit/{id}', 'EmployeeController@edit')->name('employees.edit');
Route::get('/employees/show/{id}', 'EmployeeController@show')->name('employees.show');
Route::post('/employees/update', 'EmployeeController@update')->name('employees.update');
Route::post('/employees/destroy', 'EmployeeController@destroy')->name('employees.destroy');
