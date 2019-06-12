<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| These are admin routes.
|
*/

// UPDATE 2018/02/18: Due to standardize_input not being a global middleware anymore, we have to add it this way.
Route::prefix('admin')->middleware(['standardize_input', ])->group(function () {
    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin_login_page');
    Route::post('/login', 'Admin\LoginController@login')->name('admin_login');
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin_logout');

    Route::get('/change_process_file_form', 'Admin\ChangeProcessFileController@showChangeForm')->name('admin_change_process_file_page');
    Route::post('/change_attendance_file', 'Admin\ChangeProcessFileController@changeAttendanceFile')->name('admin_change_attendance_file');
    Route::post('/change_summary_file', 'Admin\ChangeProcessFileController@changeSummaryFile')->name('admin_change_summary_file');

    Route::get('/download_attendance_file/{company_code?}', 'Admin\ChangeProcessFileController@downloadAttendanceFile')->name('admin_download_attendance_file');
    Route::get('/download_summary_file/{company_code?}', 'Admin\ChangeProcessFileController@downloadSummaryFile')->name('admin_download_summary_file');
});
