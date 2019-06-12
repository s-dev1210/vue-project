const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/bootstrap.js', 'public/js')
   .js('resources/assets/js/mics.js', 'public/js')
   .js('resources/assets/js/caerujs/multiple-select.js', 'public/js')
   .js('resources/assets/js/pages/employee_edit_work_page.js', 'public/js/pages')
   .js('resources/assets/js/pages/work_address_edit_detail.js', 'public/js/pages')
   .js('resources/assets/js/pages/manager_page.js', 'public/js/pages')
   .js('resources/assets/js/pages/option_page_work_rest.js', 'public/js/pages')
   .js('resources/assets/js/pages/option_page_work_time.js', 'public/js/pages')
   .js('resources/assets/js/pages/option_page_department.js', 'public/js/pages')
   .js('resources/assets/js/pages/employee_basic_info_form.js', 'public/js/pages')
   .js('resources/assets/js/pages/employees_approval.js', 'public/js/pages')
   .js('resources/assets/js/pages/calendar_page.js', 'public/js/pages')
   .js('resources/assets/js/pages/employee_working_day.js', 'public/js/pages')
   .js('resources/assets/js/pages/employee_working_month.js', 'public/js/pages')
   .js('resources/assets/js/pages/approve_employee_working_day.js', 'public/js/pages')
   .js('resources/assets/js/pages/sinsei/requester/request_form.js', 'public/js/pages/sinsei/requester/')
   .js('resources/assets/js/pages/sinsei/requester/working_month.js', 'public/js/pages/sinsei/requester/')
   .js('resources/assets/js/pages/sinsei/approver/approval_form.js', 'public/js/pages/sinsei/approver/')
   .js('resources/assets/js/pages/sinsei/approver/find_employee_working_month.js', 'public/js/pages/sinsei/approver/')
   .js('resources/assets/js/pages/employees_attendance.js', 'public/js/pages/')
   .js('resources/assets/js/pages/work_addresses_attendance.js', 'public/js/pages/')
   .js('resources/assets/js/pages/attendance_advance_search.js', 'public/js/pages/')
   .js('resources/assets/js/pages/month_summary_page.js', 'public/js/pages/')
   .js('resources/assets/js/pages/paid_holiday_list.js', 'public/js/pages/')
   .js('resources/assets/js/pages/admin_change_process_file.js', 'public/js/pages/')
   .js('resources/assets/js/pages/work_address_working_day.js', 'public/js/pages/')
   .js('resources/assets/js/pages/work_address_working_month.js', 'public/js/pages/')
   .js('resources/assets/js/pages/caeru_import.js', 'public/js/pages/')
   .js('resources/assets/js/components/place_picker', 'public/js/components')
   .js('resources/assets/js/components/place_picker_container.js', 'public/js/components')
   .js('resources/assets/js/components/change_view_order.js', 'public/js/components')
   .js('resources/assets/js/components/work_schedule.js', 'public/js/components')
   .js('resources/assets/js/components/alert_module.js', 'public/js/components')
   .js('resources/assets/js/components/caeru_autocomplete', 'public/js/components')
   .js('resources/assets/js/components/work_time_autocomplete', 'public/js/components')
   .js('resources/assets/js/components/caeru_paginator', 'public/js/components')
   .js('resources/assets/js/components/work_location_picker.js', 'public/js/components')
   .js('resources/assets/js/components/work_address_picker.js', 'public/js/components')
   .js('resources/assets/js/components/employee_searcher.js', 'public/js/components')
   .js('resources/assets/js/components/work_address_searcher.js', 'public/js/components')
   .js('resources/assets/js/components/caeru_calendar', 'public/js/components')
   .js('resources/assets/js/components/employee_working_info_component', 'public/js/components')
   .js('resources/assets/js/components/caeru_error_display', 'public/js/components')
   .js('resources/assets/js/components/dropzone.js', 'public/js/components')
   .js('resources/assets/js/components/attendance_shift.js', 'public/js/components')
   .js('resources/assets/js/components/attendance_shift', 'public/js/components')
   .js('resources/assets/js/components/attendance_employee', 'public/js/components')
   .js('resources/assets/js/components/attendance_autocomplete', 'public/js/components')
   .js('resources/assets/js/components/attendance_place.js', 'public/js/components')
   .js('resources/assets/js/components/attendance_place', 'public/js/components')
   .js('resources/assets/js/components/attendance_place_working_employee', 'public/js/components')
   .js('resources/assets/js/components/checklist_searcher.js', 'public/js/components')
   .js('resources/assets/js/components/totalization_searcher.js', 'public/js/components')
   .js('resources/assets/js/components/sinsei/snapshot_component', 'public/js/components/sinsei')
   .js('resources/assets/js/components/sinsei/snapshot_day_component', 'public/js/components/sinsei')
   .js('resources/assets/js/components/working_day_tools.js', 'public/js/components')
   .js('resources/assets/js/components/working_info_tools.js', 'public/js/components')
   .js('resources/assets/js/components/work_address_working_info_component', 'public/js/components')
   .js('resources/assets/js/components/work_address_working_employee_component', 'public/js/components')
   .js('resources/assets/js/components/fixed_header_and_pagination_tools', 'public/js/components')

    .copy(
        'resources/assets/js/caerujs/fixed_midashi.js', 'public/js'
    )

   .combine([
        'resources/assets/css/common.css',
        'resources/assets/css/style.css',
        'resources/assets/css/font-awesome.min.css',
    ], 'public/css/all.css')

    .combine([
        'resources/assets/css/sinsei/common.css',
        'resources/assets/css/sinsei/style.css',
        'resources/assets/css/font-awesome.min.css',
    ], 'public/css/sinsei/all.css')

   ;