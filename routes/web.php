<?php

use App\Http\Controllers\BusinessTrip\BusinessTripController;
use App\Http\Controllers\Curriculum\EducationYearController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\RegisterController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\ProfilController;
use App\Http\Controllers\Dashboard\SystemAdminController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\QrCode\QrCodeController;
use App\Http\Controllers\Statistical\StatisticalController;
use App\Http\Controllers\Structure\FacultyController;
use App\Http\Controllers\Structure\DepartmentSectionController;
use App\Http\Controllers\Structure\SectionController;
use App\Http\Controllers\System\PositionController;
use App\Http\Controllers\System\SystemConfigurationController;
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
Route::post('/login/check', [RegisterController::class, 'login_check']);
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register/save', [RegisterController::class, 'register_save']);


Route::group(['middleware'=>['AuthCheck']], function(){

Route::get('/dashboard/login', [RegisterController::class, 'login']);
Route::get('/', [AdminController::class, 'dashboard']);
Route::get('/dashboard/logout', [AdminController::class, 'logout']);

Route::get('/profil/profil-edit/{id}', [ProfilController::class, 'profil']);
Route::post('/profil-update/{id}', [ProfilController::class, 'profil_update']);
Route::post('/profil-email-update/{id}', [ProfilController::class, 'profil__email_update']);
Route::post('/profil-avatar-update/{id}', [ProfilController::class, 'profil__avatar_update']);


// SYSTEM

Route::get('/system/admin', [SystemAdminController::class, 'system_admin']);
Route::get('/system/admin-add', [SystemAdminController::class, 'admin_add']);
Route::get('/system/admin-pdf', [SystemAdminController::class, 'admin_pdf']);
Route::post('/system/admin/save', [SystemAdminController::class, 'admin_save']);
Route::get('/system/admin-edit/{id}', [SystemAdminController::class, 'admin_edit']);
Route::get('/system/account-edit/{id}', [SystemAdminController::class, 'account_edit']);
Route::post('/account-update/{id}', [SystemAdminController::class, 'account_update']);
Route::get('/system/admin/unpublished/{id}', [SystemAdminController::class, 'admin_unpublished']);
Route::get('/system/admin/published/{id}', [SystemAdminController::class, 'admin_published']);

Route::controller(SystemConfigurationController::class)->group(function () {

Route::get('/system/configuration',  'system_configuration');
Route::post('/system/configuration/logo',  'system_logo');
Route::post('/system/configuration/logo/update/{id}',  'system_logo_update');
Route::post('/system/configuration/section',  'system_section');
Route::get('/system/configuration/section/edit/{id}',  'system_configuration_edit');
Route::post('/system/configuration/section/update/{id}',  'system_section_update');
Route::get('/system/configuration/section/delete/{id}',  'system_section_delete');

Route::controller(PositionController::class)->group(function () {

Route::get('/system/position',  'system_position');
Route::post('/system/position/save',  'system_position_save');
Route::get('/system/position/edit/{id}',  'system_position_edit');
Route::post('/system/position/update/{id}',  'system_position_update');
Route::get('/system/position/unpublished/{id}', 'position_unpublished');
Route::get('/system/position/published/{id}', 'position_published');
Route::get('/system/position/delete/{id}',  'position_delete');
});

});

// Structure Route
Route::controller(FacultyController::class)->group(function () {
Route::get('/structure/faculty',  'faculty');
Route::post('/structure/faculty/save', 'faculty_save');
Route::get('/structure/faculty/delete/{id}', 'faculty_delete');
Route::get('/structure/faculty/edit/{id}', 'faculty_edit');
Route::post('/structure/faculty/update/{id}',  'faculty_update');
Route::get('/structure/faculty/unpublished/{id}', 'faculty_unpublished');
Route::get('/structure/faculty/published/{id}', 'faculty_published');
});

Route::controller(DepartmentSectionController::class)->group(function () {

Route::get('/structure/department',  'department_section');
Route::post('/structure/department/save',  'department_section_save');
Route::get('/structure/department/edit/{id}',  'department_edit');
Route::post('/structure/department/update/{id}',  'department_update');
Route::get('/structure/department/delete/{id}',  'department_delete');

});

Route::controller(SectionController::class)->group(function () {

Route::get('/structure/section',  'section');
Route::post('/structure/section/save',  'section_save');
Route::get('/structure/section/edit/{id}',  'section_edit');
Route::post('/structure/section/update/{id}',  'section_update');
Route::get('/structure/section/delete/{id}',  'section_delete');
Route::get('/structure/section/unpublished/{id}', 'section_unpublished');
Route::get('/structure/section/published/{id}', 'section_published');
});
// Structure Route END

// EMPLOYEE ROUTE

Route::controller(EmployeeController::class)->group(function () {

Route::get('/employee/employee',  'employee');
Route::get('/employee/employee/add',  'employee_add');
Route::post('/employee/employee/save',  'employee_save');
Route::get('/employee/employee/edit/{id}',  'employee_edit');
Route::get('/employee/update/{id}',  'employee_update');
Route::get('/employee/position/{id}',  'employee_position');
Route::post('/employee/position/save',  'employee_position_save');
Route::post('/employee/employee/update/{id}',  'employee_update_save');
Route::get('/employee/employee/unpublished/{id}', 'faculty_unpublished');
Route::get('/employee/employee/published/{id}', 'faculty_published');
Route::get('/employee/employee-search', 'employee');
// Route::get('/employee/employee/export', 'employee_export');
});

// EMPLOYEE ROUTE END

// Business Trip ROUTE

Route::controller(BusinessTripController::class)->group(function () {

Route::get('/bussiness-trip/date',  'business_trip');
Route::get('/bussiness-trip/add',  'business_trip_add');
Route::get('/bussiness-trip/add/{id}',  'business_trip_add_save');
Route::post('/bussiness-trip/save',  'business_trip_save');
Route::get('/bussiness-trip/pdf/{id}',  'business_trip_pdf');
Route::get('/bussiness-trip/pdf-creat/{id}',  'business_trip_qr_code');
Route::get('/bussiness-trip/edit/{id}',  'business_trip_edit');
Route::post('/bussiness-trip/update/{id}',  'business_trip_update');
Route::get('/bussiness/unpublished/{id}', 'faculty_unpublished');
Route::get('/bussiness/published/{id}', 'faculty_published');
Route::get('/bussiness-trip/date-search', 'business_trip');
Route::post('/bussiness-trip/date/{id}',  'business_trip_date_save');
Route::get('/bussiness-trip/date/edit/{id}', 'business_trip_edit_save');
});
    
// Business Trip END

// Education-Year

Route::controller(EducationYearController::class)->group(function () {

Route::get('/curriculum/education-year',  'education_year');
Route::post('/curriculum/education-year/save',  'education_year_save');
Route::get('/curriculum/education-year/edit/{id}',  'education_year_edit');
Route::post('/curriculum/education-year/update/{id}',  'education_year_update');

});
// END Education-Year


// Business Trip ROUTE

Route::controller(StatisticalController::class)->group(function () {

Route::get('/statistical/statistical',  'statistical');
});
        
    // Business Trip END

});
// QR CODE ROUTE

Route::controller(QrCodeController::class)->group(function () {

Route::get('/bussiness-trip/qr-code/{id}',  'qr_code');
Route::get('/bussiness-trip/pdf/download/{id}',  'business_trip_pdf');
Route::get('/bussiness-trip/qr-code/photo',  'qr_code_photo');
});
// END QR CODE ROUTE

// EMPLOYEE ROUTE

Route::controller(EmployeeController::class)->group(function () {
Route::get('/employee/employee/export', 'employee_export');
});
// EMPLOYEE ROUTE END
Route::controller(BusinessTripController::class)->group(function () {

    Route::get('/bussiness-trip/date/export',  'business_trip_export');
});

