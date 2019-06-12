<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Authenticate routes

// UPDATE 2018/02/18: Due to standardize_input not being a global middleware anymore, we have to add it this way.
Route::middleware(['standardize_input', ])->group(function() {
    Route::get('/jupiter/download_installer', 'API\TabletController@downloadInstaller')->name('download_installer');
    Route::middleware('auth_jupiter')->prefix('jupiter')->group(function () {
        Route::post('/', 'API\TabletController@connection')->name('connection');
        Route::post('/login', 'API\TabletController@login')->name('login');
        Route::post('/register_work_location', 'API\TabletController@registerWorkLocation')->name('register_work_location');
        Route::post('/choose_work_address', 'API\TabletController@chooseWorkAddress')->name('choose_work_address');
        Route::post('/check', 'API\TabletController@check')->name('check');
        Route::post('/time_stamping', 'API\TabletController@timeStamping')->name('time_stamping');
        Route::post('/time_table', 'API\TabletController@timeTable')->name('time_table');
        Route::post('/offline_data', 'API\TabletController@offlineData')->name('offline_data');
        Route::post('/check_card', 'API\TabletController@checkCard')->name('check_card');
        Route::post('/get_employee_name', 'API\TabletController@getEmployeeName')->name('get_employee_name');
        Route::post('/register_card', 'API\TabletController@registerCard')->name('register_card');
    });
    Route::get('/new_jupiter/download_installer', 'API\TabletController@downloadInstallerForNewTablet')->name('download_installer_for_new_tablet');
    Route::middleware('auth_jupiter')->prefix('new_jupiter')->group(function () {
        Route::post('/', 'API\TabletController@connection')->name('connection');
        Route::post('/login', 'API\TabletController@login')->name('login');
        Route::post('/register_work_location', 'API\TabletController@registerWorkLocation')->name('register_work_location');
        Route::post('/choose_work_address', 'API\TabletController@chooseWorkAddress')->name('choose_work_address');
        Route::post('/check', 'API\TabletController@checkForNewTablet')->name('check_for_new_tablet');
        Route::post('/time_stamping', 'API\TabletController@timeStamping')->name('time_stamping');
        Route::post('/time_table', 'API\TabletController@timeTable')->name('time_table');
        Route::post('/offline_data', 'API\TabletController@offlineData')->name('offline_data');
        Route::post('/check_card', 'API\TabletController@checkCard')->name('check_card');
        Route::post('/get_employee_name', 'API\TabletController@getEmployeeName')->name('get_employee_name');
        Route::post('/register_card', 'API\TabletController@registerCard')->name('register_card');
    });
    Route::middleware('auth_spshift')->prefix('api_spshift')->group(function () {
        Route::post('/add_face', 'API\SpshiftController@addFace')->name('add_face');
        Route::post('/delete_face', 'API\SpshiftController@deleteFace')->name('delete_face');
        Route::post('/edit_face', 'API\SpshiftController@editFace')->name('edit_face');
    });
});
Route::post('/employee_phone_api/check_version', 'API\EmployeePhoneAPIController@checkVersion')->name('employee_phone_check_version');
Route::get('/employee_phone_api/download_installer_android', 'API\EmployeePhoneAPIController@downloadInstallerAndroid')->name('employee_phone_download_installer_android');
Route::middleware('auth_employee_phone_api')->prefix('employee_phone_api')->group(function () {
    Route::post('/check_company', 'API\EmployeePhoneAPIController@checkCompany')->name('employee_phone_check_company');
    Route::post('/login', 'API\EmployeePhoneAPIController@login')->name('employee_phone_login');
    Route::post('/check', 'API\EmployeePhoneAPIController@check')->name('employee_phone_check');
    Route::post('/request_work_address', 'API\EmployeePhoneAPIController@requestWorkAddress')->name('employee_phone_request_work_address');
    Route::post('/choose_work_address', 'API\EmployeePhoneAPIController@chooseWorkAddress')->name('employee_phone_choose_work_address');
    Route::post('/work', 'API\EmployeePhoneAPIController@work')->name('employee_phone_work');
    Route::post('/work_table', 'API\EmployeePhoneAPIController@workTable')->name('employee_phone_work_table');
    Route::post('/logout', 'API\EmployeePhoneAPIController@logout')->name('employee_phone_logout');
});
