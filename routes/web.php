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
if (env('APP_ENV') === 'production') {
    \URL::forceSchema('https');
}

Route::get('/', 'LoginController@index')->name('empLog');
Route::get('/test', 'Test@sample');
Route::post('/checklogin', 'LoginController@checkLogin');
//Route::get('/Employee', 'LoginController@successLogin');
Route::get('/logout' , 'LoginController@logout');
Route::get('/Employee/AccountSettings' , 'AccountSettingsController@account_settings');
//Route::get('Employee/home', 'EmployeeController@index');
Route::get('/forgot-password', 'forgot_password@fp');

Route::group(['prefix' => '/Employee/modules/'],function(){
    Route::get('dashboard','Dashboard@index');
   // Route::get('pds','EmployeeController@pds');
    //Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf');
    Route::group(['prefix' => 'welcome'],function(){
        Route::resource('/','WelcomeController');
    });

    Route::group(['prefix' => 'admin-dashboard'],function(){
        Route::resource('/','AdminDashboardController');
        Route::post('/dropa/{aid}','AdminDashboardController@DropAnnouncement');
        Route::post('/composeMessage','AdminDashboardController@composeMessage');
        Route::post('/replyMessage','AdminDashboardController@replyMessage');
    });

    Route::get('payslip','payslip@emp_payslip');
    Route::post('viewPayslip', 'payslip@getPayslip');

   /* Route::group(['prefix' => 'pds'],function(){
        Route::get('/','EmployeeController@pds');
        Route::get('generate_pds', 'EmployeeController@generatePDS');
    });*/
    Route::group(['prefix' => 'pds'],function(){
        Route::resource('/','EmployeeController');
      //  Route::get('generate_pds', 'EmployeeController@generatePDS');
    });
    Route::group(['prefix' => 'schedule'], function(){
        Route::resource('/' , 'EmployeeSchedule');
       // Route::get('/update' , 'EmployeeSchedule@reloadTable');
       Route::get('/reload' , 'EmployeeSchedule@reloadTable');
    }); 
    //for request
    Route::group(['prefix' => 'leave'], function(){
        Route::resource('/' , 'RequestLeave');
        Route::get('/filterLeaveHistory' , 'RequestLeave@filterLeaveHistory');
    }); 
   /* Route::group(['prefix' => 'shift'],function(){
        Route::resource('/' , 'RequestSchedule@index');
    });*/  
    Route::group(['prefix' => 'overtime'], function(){
        Route::resource('/' , 'OvertimeController');
        Route::get('/filterOvertimeData' , 'OvertimeController@filterOvertimeData');
    });
    Route::group(['prefix' => 'reimbursement'], function(){
        Route::resource('/' , 'Reimbursement');
        Route::get('/filterReimburseHData' , 'Reimbursement@filterReimburseHData');
    });
    
    Route::group(['prefix' => 'employees'], function(){
        Route::resource('/' , 'TotalEmployees');
        Route::post('/update/{emp}', 'TotalEmployees@updateEmp');
        Route::get('/filterEmployeeByDept', 'TotalEmployees@filterEmployeeByDept');
    });
    Route::group(['prefix' => 'inbox'], function(){
        Route::resource('/' , 'InboxController');
        Route::post('/update/{reqid}', 'InboxController@updateStatus');
    });
    Route::group(['prefix' => 'company'], function(){
        Route::resource('/' , 'DepartmentController');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/notifications', 'notificationController@callNotifs');

Route::get('/notificationsChange', 'notificationController@callChangeNotifs');
