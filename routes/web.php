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

// Route::get('/{company_code}/', function () {
//     return view('welcome');
// });

Route::middleware(['standardize_input', ])->group(function() {

	Route::get('/{company_code}/testdb', 'CompanyController@testDB');
	Route::get('/{company_code}/test', 'ManagerController@test');
	// Authenticate routes
	Route::get('/{company_code}/login', 'Auth\LoginController@showLoginForm')->name('to_login');
	Route::post('/{company_code}/login', 'Auth\LoginController@login')->name('login');
	Route::get('/{company_code}/logout', 'Auth\LoginController@logout')->name('logout');

	// Company routes
	Route::get('/{company_code}/', 'CompanyController@dashboard')->name('dashboard');
	Route::get('/{company_code}/company', 'CompanyController@edit')->name('edit_company');
	Route::post('/{company_code}/company', 'CompanyController@update')->name('update_company');

	// Manager routes
	Route::get('/{company_code}/managers', 'ManagerController@index')->name('managers_list');
	Route::get('/{company_code}/manager', 'ManagerController@create')->name('create_manager');
	Route::post('/{company_code}/manager', 'ManagerController@store')->name('store_manager');
	Route::get('/{company_code}/manager/{manager}/{page?}', 'ManagerController@edit')->name('edit_manager');
	Route::patch('/{company_code}/manager/{manager}/{page?}', 'ManagerController@update')->name('update_manager');

	// Work Location routes
	Route::get('/{company_code}/work_locations', 'WorkLocationController@index')->name('work_locations_list');
	Route::get('/{company_code}/work_location', 'WorkLocationController@create')->name('create_work_location');
	Route::post('/{company_code}/work_location', 'WorkLocationController@store')->name('store_work_location');
	Route::get('/{company_code}/work_location/{work_location}/{page?}', 'WorkLocationController@edit')->name('edit_work_location');
	Route::patch('/{company_code}/work_location/{work_location}/{page?}', 'WorkLocationController@update')->name('update_work_location');

	// Employee routes
	Route::get('/{company_code}/employees', 'EmployeeController@index')->name('employees_list');
	Route::get('/{company_code}/employee', 'EmployeeController@create')->name('create_employee');
	Route::post('/{company_code}/employee', 'EmployeeController@store')->name('store_employee');
	Route::get('/{company_code}/employee/{employee}/{page?}', 'EmployeeController@edit')->name('edit_employee');
	Route::patch('/{company_code}/employee/{employee}/{page?}', 'EmployeeController@update')->name('update_employee');
	Route::get('/{company_code}/employee/work/{employee}/{page?}', 'EmployeeController@editWork')->name('edit_employee_work');
	Route::patch('/{company_code}/employee/work/{employee}/{page?}', 'EmployeeController@updateWork')->name('update_employee_work');
	Route::post('/{company_code}/employee/csv/download', 'EmployeeController@download')->name('download_employee');
	Route::post('/{company_code}/employee/list/csv/download', 'EmployeeController@download_list')->name('download_employee_list');
	Route::post('/{company_code}/employee/csv/upload', 'EmployeeController@upload')->name('upload_employee');
	Route::post('/{company_code}/employee/search', 'SearchController@searchEmployee')->name('search_employee');
	Route::get('/{company_code}/employee_approval/{employee}/{page?}/{return?}', 'ApprovalController@list')->name('employee_approval_list');
	Route::get('/{company_code}/employee_approval_reload/{employee}', 'ApprovalController@load')->name('employee_approval_load');
	Route::post('/{company_code}/employee_approval_search', 'ApprovalController@search')->name('employee_approval_search');
	Route::post('/{company_code}/employee_approval_update', 'ApprovalController@update')->name('employee_approval_update');
	Route::post('/{company_code}/employee_approval_move', 'ApprovalController@move')->name('employee_approval_move');
	// checklist route
	Route::get('/{company_code}/checklists/{refresh_hitory?}','CheckListController@index')->name('checklists_list');
	Route::post('/{company_code}/checklist/search','CheckListSearchController@searchCheckList')->name('search_check_list');

	//totalization - rejected
	Route::get('/{company_code}/totalization','TotalizationController@index')->name('totalization_list');

	Route::post('/{company_code}/totalization','TotalizationController@search')->name('totalization_search');

	// Paid holiday routes
	// Route::get('/{company_code}/paid_holiday', 'PaidHolidayInformationController@index')->name('paid_holiday_list');
	// Route::post('/{company_code}/paid_holiday/koushin/{employeeid}', 'PaidHolidayInformationController@store')->name('paid_holiday_koushin');
	// Route::post('/{company_code}/paid_holiday/apartkoushin', 'PaidHolidayInformationController@apartStore')->name('paid_holiday_apart_koushin');
	// Route::post('/{company_code}/paid_holiday/allkoushin', 'PaidHolidayInformationController@allStore')->name('paid_holiday_all_koushin');
	// Route::post('/{company_code}/paid_holiday', 'PaidHolidayInformationController@search')->name('search_paid_holiday');
	Route::get('/{company_code}/paid_holiday/{refresh_hitory?}/{page?}', 'PaidHolidayInformationController@list')->name('list_paid_holiday');
	Route::post('/{company_code}/paid_holiday/{page?}', 'PaidHolidayInformationController@search')->name('search_paid_holiday');
	Route::get('/{company_code}/update_paid_holiday/{employee}', 'PaidHolidayInformationController@updatePaidHoliday')->name('update_paid_holiday');
	Route::post('/{company_code}/update_paid_holiday', 'PaidHolidayInformationController@updatePaidHolidayForCheckedEmployees')->name('update_paid_holiday_for_checked');
	Route::get('/{company_code}/update_paid_holiday_all', 'PaidHolidayInformationController@updatePaidHolidayForAllEmployeesInSearchResult')->name('update_paid_holiday_for_all_in_result');
	Route::get('/{company_code}/edit_paid_holiday/{employee}', 'PaidHolidayInformationController@showPaidHolidayInformation')->name('edit_paid_holiday');
	Route::post('/{company_code}/edit_paid_holiday/{employee}', 'PaidHolidayInformationController@updatePaidHolidayInformation')->name('update_paid_holiday');


	// Top page routes
	Route::get('/{company_code}/index','HomeController@index')->name('home_page');
	// Planned Schedule routes
	Route::delete('/{company_code}/schedule/{schedule}', 'PlannedScheduleController@destroy')->name('delete_schedule');

	// Work address routes
	Route::get('/{company_code}/work_addresses', 'WorkAddressController@index')->name('work_address_list');
	Route::get('/{company_code}/work_address', 'WorkAddressController@create')->name('create_work_address');
	Route::post('/{company_code}/work_address', 'WorkAddressController@store')->name('store_work_address');
	Route::get('/{company_code}/work_address/{work_address}/{page?}', 'WorkAddressController@edit')->name('edit_work_address');
	Route::patch('/{company_code}/work_address/{work_address}/{page?}', 'WorkAddressController@update')->name('update_work_address');
	Route::get('/{company_code}/work_address/detail/{work_address}/{page?}', 'WorkAddressController@editDetail')->name('edit_work_address_detail');
	Route::post('/{company_code}/work_address/search', 'SearchController@searchWorkAddress')->name('search_work_address');

	// Calendar routes
	Route::get('/{company_code}/calendar', 'CalendarController@edit')->name('edit_calendar');
	Route::post('/{company_code}/calendar', 'CalendarController@update')->name('update_calendar');
	Route::get('/{company_code}/calendar/{year}', 'CalendarController@load')->name('load_calendar');


	// Setting routes
	Route::get('/{company_code}/setting', 'SettingController@edit')->name('edit_setting');
	Route::post('/{company_code}/setting', 'SettingController@update')->name('update_setting');

	// Option routes
	Route::get('/{company_code}/option_work_rest', 'OptionController@redirectWorkAndRest')->name('edit_option_work_rest');
	Route::get('/{company_code}/option_department', 'OptionController@redirectDepartment')->name('edit_option_department');
	Route::get('/{company_code}/option_work_time', 'OptionController@redirectWorkAndTime')->name('edit_option_work_time');
	// UPDATE 2019/02/18: these two route will allow input with full-width characters(bypass the standardize input middleware)
	// Route::post('/{company_code}/updateWorkAndRest', 'OptionController@updateWorkAndRest')->name('update_work_rest');
	// Route::post('/{company_code}/updateDepartments', 'OptionController@updateDepartments')->name('update_department');

	// Upload file routes
	Route::post('/{company_code}/upload/employee', 'UploadController@employee')->name('upload_employee');

	// Change View order route
	Route::post('/{company_code}/change_view_order', 'ChangeViewOrderController@changeOrder');

	// Chose Work Location route
	Route::get('/{company_code}/choose_work_location', 'ChoseWorkLocationController@list')->name('choosing');
	Route::get('/{company_code}/choose_work_location/{chosen}/{target?}', 'ChoseWorkLocationController@choose')->name('choose');

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////// Attendance (WorkingInformation) Page Routes ///////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/// Detail Working Information Page (display an Employee Working Day) ///
	Route::get('/{company_code}/employee_working_day/{employee_id}/{date}', 'Attendance\EmployeeWorkingDayController@detail')->name('employee_working_day_detail');
	Route::get('/{company_code}/employee_working_day_by_id/{employee_working_day}', 'Attendance\EmployeeWorkingDayController@retrieve')->name('refresh_working_info_list');
	// Route::post('/{company_code}/employee_working_information', 'Attendance\EmployeeWorkingInformationController@store')->name('create_employee_working_information');
	// Route::post('/{company_code}/employee_working_information/{employee_working_info}', 'Attendance\EmployeeWorkingInformationController@update')->name('update_employee_working_information');
	Route::delete('/{company_code}/employee_working_information/{employee_working_info}', 'Attendance\EmployeeWorkingInformationController@destroy')->name('delete_employee_working_information');
	Route::post('/{company_code}/schedule_transfer', 'Attendance\EmployeeWorkingDayController@scheduleTransfer')->name('transfer_schedule');
	Route::get('/{company_code}/conclude_level_one/{employee_working_day}', 'Attendance\EmployeeWorkingDayController@concludeLevelOne')->name('conclude_level_one');
	Route::get('/{company_code}/unconcluded_level_one/{employee_working_day}', 'Attendance\EmployeeWorkingDayController@unconcludedLevelOne')->name('unconcluded_level_one');

	Route::post('/{company_code}/working_timestamp/{working_day}', 'Attendance\WorkingTimestampController@store')->name('new_timestamp');
	Route::patch('/{company_code}/working_timestamp/{working_timestamp}', 'Attendance\WorkingTimestampController@toggleStatus')->name('toggle_status_timestamp');
	/// End of Detail Working Information Page ///

	/// Employee Working Month Page (display list of working days of an employee through a business month) ///
	Route::get('/{company_code}/employee_working_month/{employee}/{business_month?}', 'Attendance\EmployeeWorkingMonthController@list')->name('employee_working_month');
	Route::get('/{company_code}/employee_working_month/conclude_level_one/{employee_working_day}/{business_month}', 'Attendance\EmployeeWorkingMonthController@concludeLevelOne')->name('conclude_level_one');
	Route::get('/{company_code}/employee_working_month/conclude_non_exist_working_day/{employee_id}/{date}/{business_month}', 'Attendance\EmployeeWorkingMonthController@concludeNonExistWorkingDay')->name('conclude_non_exist_working_day');
	Route::get('/{company_code}/employee_working_month/unconcluded_level_one/{employee_working_day}/{business_month}', 'Attendance\EmployeeWorkingMonthController@unconcludedLevelOne')->name('unconcluded_level_one');
	Route::get('/{company_code}/employee_working_month/concluded_level_one_all_days/{employee}/{business_month}', 'Attendance\EmployeeWorkingMonthController@concludeLevelOneOnAllDays')->name('conclude_level_one_all_days');
	Route::get('/{company_code}/employee_working_month/unconcluded_level_one_all_days/{employee}/{business_month}', 'Attendance\EmployeeWorkingMonthController@unConcludedLevelOneOnAllDays')->name('unconcluded_level_one_all_days');
	Route::get('/{company_code}/conclude_level_two/{employee}/{business_month}', 'Attendance\EmployeeWorkingMonthController@concludeLevelTwo')->name('conclude_level_two');
	Route::get('/{company_code}/unconcluded_level_two/{employee}/{business_month}', 'Attendance\EmployeeWorkingMonthController@unconcludedLevelTwo')->name('unconcluded_level_two');

	/// Employees Working Information (table) Page (display many employee working days of many employees)
	Route::get('/{company_code}/employee_attendance/{reset_search_conditions?}', 'Attendance\EmployeeAttendanceController@list')->name('employee_attendance');
	Route::post('/{company_code}/employee_attendance_by_date', 'Attendance\EmployeeAttendanceController@retrieveDataByDate')->name('employee_attendance_by_date');
	Route::post('/{company_code}/employee_attendance_search', 'Attendance\EmployeeAttendanceController@search')->name('employee_attendance_search');
	Route::get('/{company_code}/employee_attendance_scroll/{page?}', 'Attendance\EmployeeAttendanceController@scroll')->name('employee_attendance_scroll');

	// Employee Working Information Advance Search page
	Route::get('/{company_code}/employee_attendance_advance_search/{reset_search_conditions?}/{page?}', 'Attendance\AdvanceSearchController@show')->name('show_advance_search');
	Route::post('/{company_code}/employee_attendance_advance_search', 'Attendance\AdvanceSearchController@search')->name('advance_search');
	Route::get('/{company_code}/employee_attendance_advance_search_change_page/{page?}', 'Attendance\AdvanceSearchController@changePage')->name('advance_search_change_page');
	Route::post('/{company_code}/employee_attendance_advance_download', 'Attendance\AdvanceSearchController@download')->name('advance_download');
	Route::post('/{company_code}/employee_attendance_advance_search_download', 'Attendance\AdvanceSearchController@searchDownload')->name('advance_search_download');
	Route::post('/{company_code}/employee_attendance_advance_search_upload', 'Attendance\AdvanceSearchController@upload')->name('advance_search_upload');

	// Total Summary pages
	Route::get('/{company_code}/month_summary/{reset_search_conditions?}/{page?}', 'Attendance\MonthSummaryController@show')->name('show_month_summary');
	Route::get('/{company_code}/month_summary_all_concluded/{business_month}', 'Attendance\MonthSummaryController@concludeAll')->name('month_summary_conclude_all');
	Route::get('/{company_code}/month_summary_all_unconcluded/{business_month}', 'Attendance\MonthSummaryController@unconcludeAll')->name('month_summary_unconclude_all');
	Route::post('/{company_code}/month_summary/{page?}', 'Attendance\MonthSummaryController@search')->name('search_month_summary');

	/// WorkAddress Detail Working Information Page (display an Work Address Working Day) ///
	Route::get('/{company_code}/work_address_working_day/{work_address_id}/{date}', 'Attendance\WorkAddressWorkingDayController@detail')->name('work_address_working_day_detail');
	Route::post('/{company_code}/work_address_working_information', 'Attendance\WorkAddressWorkingInformationController@store')->name('store_work_address_working_information');
	Route::post('/{company_code}/work_address_working_information/{work_address_working_info}', 'Attendance\WorkAddressWorkingInformationController@update')->name('update_work_address_working_information');
	Route::delete('/{company_code}/work_address_working_information/{work_address_working_info}', 'Attendance\WorkAddressWorkingInformationController@destroy')->name('delete_work_address_working_information');
	Route::post('/{company_code}/work_address_working_employee', 'Attendance\WorkAddressWorkingEmployeeController@store')->name('store_work_address_working_employee');
	Route::post('/{company_code}/work_address_working_employee/{work_address_working_employee}', 'Attendance\WorkAddressWorkingEmployeeController@update')->name('store_work_address_working_employee');
	Route::patch('/{company_code}/work_address_working_employee/{work_address_working_employee}', 'Attendance\WorkAddressWorkingEmployeeController@toggle')->name('toggle_working_confirm_of_work_address_working_employee');

	/// WorkAddress Working Month page
	Route::get('/{company_code}/work_address_working_month/{work_address}/{business_month?}/{day?}', 'Attendance\WorkAddressWorkingMonthController@list')->name('work_address_working_month_list');
	Route::patch('/{company_code}/work_address_working_month/{working_day_id}/{work_address_working_employee}', 'Attendance\WorkAddressWorkingMonthController@toggleAWorkingEmployee')->name('toggle_working_employee_in_working_month_page');

	// WorkAddress Working Information (table) Page (display many work address working days of many work addresses)
	Route::get('/{company_code}/work_address_attendance/{reset_search_conditions?}', 'Attendance\WorkAddressAttendanceController@list')->name('work_address_attendance');
	Route::post('/{company_code}/work_address_attendance_by_date', 'Attendance\WorkAddressAttendanceController@retrieveDataByDate')->name('work_address_attendance_by_date');
	Route::post('/{company_code}/work_address_attendance_search', 'Attendance\WorkAddressAttendanceController@search')->name('work_address_attendance_search');
	Route::get('/{company_code}/work_address_attendance_scroll/{page?}', 'Attendance\WorkAddressAttendanceController@scroll')->name('work_address_attendance_scroll');

	// Breadcrumbs Route
	Route::get('/{company_code}/breadcrumb/go_back_one_level', 'BreadCrumbController@goBack')->name('breadcrumb_go_back');
	Route::get('/{company_code}/breadcrumb/go_next/{pivot_value}', 'BreadCrumbController@goNext')->name('breadcrumb_go_next');
	Route::get('/{company_code}/breadcrumb/go_previous/{pivot_value}', 'BreadCrumbController@goPrevious')->name('breadcrumb_go_previous');
	Route::get('/{company_code}/breadcrumb/go_to/{level}', 'BreadCrumbController@goTo')->name('breadcrumb_go_to_level');

	// Sinsei manager routes
	Route::group(['prefix' => '/{company_code}/sinsei'], function () {
		//-- Login
		Route::get('/', 'Sinsei\Login\LoginSinseiController@showLoginPage')->name('ss_show_login');
		Route::get('/login', 'Sinsei\Login\LoginSinseiController@showLoginPage')->name('ss_show_login');
		Route::post('/login', 'Sinsei\Login\LoginSinseiController@login')->name('ss_login');
		Route::get('/logout', 'Sinsei\Login\LoginSinseiController@logout')->name('ss_logout');

		//Requester working month routes
		Route::get('/employee/{business_month?}', 'Sinsei\Requester\WorkingMonthController@show')->name('ss_requester_working_month');

		//Account setting routes
		Route::get('/account_setting', 'Sinsei\Requester\AccountSettingController@showAccountSettingForm')->name('ss_show_account_setting');
		Route::post('/account_password_change', 'Sinsei\Requester\AccountSettingController@updatePassword')->name('ss_account_password_change');
		Route::post('/account_email_change', 'Sinsei\Requester\AccountSettingController@updateEmail')->name('ss_account_email_change');


		//Sinsei request form routes
		Route::get('/request_form/{list_date}', 'Sinsei\Requester\RequestFormController@showRequestForm')->name('ss_show_request_form');
		Route::post('/request_form', 'Sinsei\Requester\RequestFormController@store')->name('ss_store_request_form');
		Route::post('/request_form/{id}', 'Sinsei\Requester\RequestFormController@update')->name('ss_update_request_form');
		Route::post('/request_forms', 'Sinsei\Requester\RequestFormController@storeFuriKae')->name('ss_store_furikae');
		Route::post('/request_day_off', 'Sinsei\Requester\RequestFormController@storeDayOff')->name('ss_store_day_off');
		Route::post('/request_absorb', 'Sinsei\Requester\RequestFormController@storeAbsorb')->name('ss_store_absorb');

		// Syounin manager routes
		//Manager Approve List routes
		Route::get('/approve/{business_month?}', 'Sinsei\Approver\ManagerApproveController@show')->name('sn_approve_manager_approve');

		//Manager Approve Detail routes
		Route::get('/approve/employee/list/{employee_id}/{business_month}', 'Sinsei\Approver\ManagerApproveController@showDetail')->name('sn_approve_manager_approve_detail');

		//Approver form routes
		Route::get('/approve/{employee}/{list_date}', 'Sinsei\Approver\ApprovalFormController@showApprovalForm')->name('ss_show_approval_form');
		Route::get('/approve/month/{employee}/{business_month}', 'Sinsei\Approver\ApprovalFormController@showApprovalFormMonth')->name('ss_show_approval_form_with_month');
		Route::post('/approve/accept/{snapshot}', 'Sinsei\Approver\ApprovalFormController@acceptApprovalForm')->name('ss_accept_approval_form');
		Route::post('/approve/decline/{snapshot}', 'Sinsei\Approver\ApprovalFormController@declineApprovalForm')->name('ss_decline_approval_form');
	});

	// Add tablet working timestamp through web
	Route::get('/{company_code}/tablet/{employee_id}/{date}', 'Attendance\TabletWorkingTimestampController@list')->name('tablet_list_timestamp');
	Route::get('/{company_code}/tablet_new/{working_day?}', 'Attendance\TabletWorkingTimestampController@create')->name('tablet_create_timestamp');
	Route::post('/{company_code}/tablet_new', 'Attendance\TabletWorkingTimestampController@store')->name('tablet_store_timestamp');
	Route::get('/{company_code}/tablet_delete_timestamp/{working_timestamp}', 'Attendance\TabletWorkingTimestampController@delete')->name('tablet_delete_timestamp');

	// Download AttendanceData
	Route::post('/{company_code}/download_attendance', 'Attendance\AttendanceDataDownloadController@downloadAttendanceData')->name('download_attendance_data');
	Route::post('/{company_code}/download_summary', 'Attendance\AttendanceDataDownloadController@downloadSummaryData')->name('download_summary_data');

});

// These routes below will not go through the standardize input middleware, thus, allow zenkaku input values
Route::post('/{company_code}/updateWorkAndRest', 'OptionController@updateWorkAndRest')->name('update_work_rest');
Route::post('/{company_code}/updateDepartments', 'OptionController@updateDepartments')->name('update_department');
Route::post('/{company_code}/updateWorkAndTime', 'OptionController@updateWorkAndTime')->name('update_work_time');
Route::post('/{company_code}/visibleWorkAndTime', 'OptionController@visibleWorkAndTime')->name('visible_work_time');
Route::delete('/{company_code}/workAndTime/{workTime}', 'OptionController@destroyWorkAndTime')->name('delete_work_time');

// Update 2019/03/14: Move these routes outside to not use the Standardize Middleware.
// We have to allow zenkaku alphabet/number and hankaku katakana for the field work time.
Route::post('/{company_code}/employee_working_information', 'Attendance\EmployeeWorkingInformationController@store')->name('create_employee_working_information');
Route::post('/{company_code}/employee_working_information/{employee_working_info}', 'Attendance\EmployeeWorkingInformationController@update')->name('update_employee_working_information');

// Update 2019/04/25: Move these routes as well
Route::post('/{company_code}/schedule', 'PlannedScheduleController@store')->name('store_schedule');
Route::post('/{company_code}/schedule/{schedule}', 'PlannedScheduleController@update')->name('update_schedule');
