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

Route::get('/', 'LoginController@index');
Route::post('/checklogin', 'LoginController@checkLogin');
Route::get('/Employee', 'LoginController@successLogin');
Route::get('/logout' , 'LoginController@logout');
Route::get('Employee/home', 'EmployeeController@index');
Route::get('/forgot-password', 'forgot_password@fp');

Route::group(['prefix' => '/Employee/modules/'],function(){
    Route::get('dashboard','Dashboard@index');
    Route::get('info','EmployeeController@info');
    Route::get('pds','EmployeeController@pds');
    Route::get('schedule','EmployeeSchedule@index');
    Route::get('dtr','EmployeeDTR@index');
    Route::get('payslip','payslip@emp_payslip');
    //for request
    Route::get('leave' , 'RequestLeave@index');
});
//Employee Dashboard
//Route::get('/Employee/modules/dashboard', 'Dashboard@index');
//Employee Profile
//Route::get('/Employee/modules/info','EmployeeController@info');
//Route::get('/Employee/modules/pds', 'EmployeeController@pds');
//Employee Payslip
//Route::get('Employee/modules/payslip', 'payslip@emp_payslip');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
