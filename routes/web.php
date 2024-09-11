<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\CountdownController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\LecturerPagesController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\UpdatePermissionController;
use App\Http\Controllers\AdminForgotPasswordController;
use App\Http\Controllers\LecturerForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'guest'], function() {
    // Student
Route::get('/', [PagesController::class, 'index'])->name('login.get');
Route::post('/', [UserController::class, 'login'])->name('login.post');

Route::get('/forgot_password', [ForgotPasswordController::class, 'forgot_password'])->name('forgot_password.get');
Route::post('/forgot_password', [ForgotPasswordController::class, 'forgot_passwordd'])->name('forgot_password.post');
Route::get('/reset_password', [ForgotPasswordController::class, 'reset_password'])->name('reset_password.get');
Route::post('/reset_password', [ForgotPasswordController::class, 'reset_passwordd'])->name('reset_password.post');


// Lecturer
Route::group(['middleware' => 'auth:lecturer'], function() {
Route::get('/lecturer/verify', [LecturerPagesController::class, 'email_notice'])->name('verification.notice');
});
Route::group(['middleware' => 'auth:lecturer', 'signed'], function() {
Route::get('/lecturer/verify/{id}/{hash}', [LecturerPagesController::class, 'email_verify'])->name('verification.verify');
});
Route::group(['middleware' => 'auth:lecturer', 'trottle:6,1'], function() {
Route::post('/lecturer/verify', [LecturerPagesController::class, 'email_verifyy'])->name('verification.verify');
});

Route::get('/lecturer', [LecturerPagesController::class, 'lecturer_login'])->name('lecturer.get');
Route::post('/lecturer', [LecturerController::class, 'lecturer_login'])->name('lecturer.post');

Route::get('/lecturer/forgot_password', [LecturerForgotPasswordController::class, 'forgot_password'])->name('lecturer.forgot_password.get');
Route::post('/lecturer/forgot_password', [LecturerForgotPasswordController::class, 'forgot_passwordd'])->name('lecturer.forgot_password.post');
Route::get('/lecturer/reset_password', [LecturerForgotPasswordController::class, 'reset_password'])->name('lecturer.reset_password.get');
Route::post('/lecturer/reset_password', [LecturerForgotPasswordController::class, 'reset_passwordd'])->name('lecturer.reset_password.post');


// Admin
Route::get('/lecturer/admin', [AdminPagesController::class, 'admin_login'])->name('lecturer.admin.get');
Route::post('/lecturer/admin', [AdminController::class, 'admin_login'])->name('lecturer.admin.post');

Route::get('/lecturer/admin/forgot_password', [AdminForgotPasswordController::class, 'forgot_password'])->name('lecturer.admin.forgot_password.get');
Route::post('/lecturer/admin/forgot_password', [AdminForgotPasswordController::class, 'forgot_passwordd'])->name('lecturer.admin.forgot_password.post');
Route::get('/lecturer/admin/reset_password', [AdminForgotPasswordController::class, 'reset_password'])->name('lecturer.admin.reset_password.get');
Route::post('/lecturer/admin/reset_password', [AdminForgotPasswordController::class, 'reset_passwordd'])->name('lecturer.admin.reset_password.post');

});



Route::group(['middleware' => 'auth:web'], function() {


    // Student
Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');

Route::get('/payment_section', [PagesController::class, 'payment_section'])->name('payment_section.get');
Route::get('/clearance_form', [PagesController::class, 'clearance_form'])->name('clearance_form.get');
Route::post('/clearance_form', [UserController::class, 'clearance_form'])->name('clearance_form.post');
Route::get('/edit_clearance_form', [PagesController::class, 'edit_clearance_form'])->name('edit_clearance_form.get');
Route::put('/edit_clearance_form', [UserController::class, 'edit_clearance_form'])->name('edit_clearance_form.put');
Route::get('/print_clearance_letter/{token}/{name}', [PagesController::class, 'print_clearance_letter'])->name('print_clearance_letter/{token}/{name}');

// Route::get('/settings', [PagesController::class, 'settings'])->name('settings.get');

Route::get('/logout', [PagesController::class, 'logout'])->name('logout.get');
Route::post('/logout', [UserController::class, 'logout'])->name('logout.post');


Route::get('/change_picture', [PagesController::class, 'change_picture'])->name('change_picture.get');
Route::put('/change_picture', [UserController::class, 'change_picture'])->name('change_picture.put');

Route::get('/settings', [PagesController::class, 'change_email'])->name('settings.get');
Route::put('/settings', [UserController::class, 'change_email'])->name('settings.put');

Route::get('/change_password', [PagesController::class, 'change_password'])->name('change_password.get');
Route::put('/change_password', [UserController::class, 'change_password'])->name('change_password.put');


Route::get('/add_course_reg', [PagesController::class, 'add_course_reg'])->name('add_course_reg.get');
Route::post('/add_course_reg', [UserController::class, 'add_course_reg'])->name('add_course_reg.post');

Route::get('/check_course_reg', [PagesController::class, 'check_course_reg'])->name('check_course_reg.get');

Route::get('/change_course_reg_details/{coursess}', [PagesController::class, 'change_course_reg_details'])->name('/change_course_reg_details/{coursess}');
Route::put('/change_course_reg_details/{coursess}', [UserController::class, 'change_course_reg_details'])->name('/change_course_reg_details/{coursess}');
Route::get('/manage_course_reg', [PagesController::class, 'manage_course_reg'])->name('manage_course_reg');
Route::delete('/delete_course_reg/{courses}', [UserController::class, 'delete_course_reg'])->name('delete_course_reg/{courses}');

Route::get('/payment_section', [PaymentController::class, 'payment_section'])->name('payment_section.get');
Route::post('/payment_section', [PaymentController::class, 'payments_section'])->name('payment_section.post');
Route::get('/payment_preview', [PaymentController::class, 'payment_preview'])->name('payment_preview.get');
Route::post('/payment_preview', [PaymentController::class, 'payments_preview'])->name('payment_preview.post');
Route::get('/payment/{payments}', [PaymentController::class, 'payment'])->name('payment/{payments}');
Route::post('/payment/{payments}', [PaymentController::class, 'payments'])->name('payment/{payments}');

Route::get('/check_result', [PagesController::class, 'check_result'])->name('check_result.get');
Route::get('/calender', [PagesController::class, 'calender'])->name('calender.get');


});



Route::group(['middleware' => 'auth.lecturer', 'verified'], function() {
// Lecturer
Route::get('/lecturer/dashboard', [LecturerPagesController::class, 'dashboard'])->name('/lecturer.dashboard');
Route::get('/lecturer/all_lecturers', [LecturerPagesController::class, 'all_lecturers'])->name('/lecturer.all_lecturers');
Route::get('/lecturer/all_students', [LecturerPagesController::class, 'all_students'])->name('/lecturer.all_students');

Route::get('/lecturer/clearance_form/{students}', [LecturerPagesController::class, 'clearance_form'])->name('/lecturer.clearance_form.{students}');
Route::post('/lecturer/clearance_form/{students}', [LecturerController::class, 'clearance_form'])->name('/lecturer.clearance_form.{students}');
Route::delete('/lecturer/delete_clearance_form/{students}', [LecturerController::class, 'delete_clearance_form'])->name('/lecturer/delete_clearance_form/{students}');
Route::get('/lecturer/clearance', [LecturerPagesController::class, 'clearance'])->name('lecturer.clearance');
Route::get('/lecturer/settings_l', [LecturerPagesController::class, 'settings_l'])->name('/lecturer.settings_l');

// Route::post('/lecturer', [LecturerController::class, 'lecturer_login'])->name('/lecturer');
Route::get('/lecturer/logout', [LecturerPagesController::class, 'logout'])->name('/lecturer.logout');
Route::post('/lecturer/logout', [LecturerController::class, 'logout'])->name('/lecturer.logout');


Route::get('/lecturer/change_picture', [LecturerPagesController::class, 'change_picture'])->name('/lecturer.change_picture');
Route::put('/lecturer/change_picture', [LecturerController::class, 'change_picture'])->name('/lecturer.change_picture');

Route::get('/lecturer/settings_l', [LecturerPagesController::class, 'change_email'])->name('/lecturer.settings_l');
Route::put('/lecturer/settings_l', [LecturerController::class, 'change_email'])->name('/lecturer.settings_l');

Route::get('/lecturer/change_password', [LecturerPagesController::class, 'change_password'])->name('/lecturer.change_password');
Route::put('/lecturer/change_password', [LecturerController::class, 'change_password'])->name('/lecturer.change_password');

Route::get('/lecturer/search_lecturer', [SearchController::class, 'search_lecturer_l'])->name('/lecturer.search_lecturer');
Route::get('/lecturer/search_student', [SearchController::class, 'search_student_l'])->name('/lecturer.search_student');
Route::get('/lecturer/search_course', [SearchController::class, 'search_course_l'])->name('/lecturer.search_course');

Route::get('/lecturer/get_students', [LecturerPagesController::class, 'get_students'])->name('lecturer.get_students.get');
Route::get('/lecturer/get_students_result', [LecturerPagesController::class, 'get_students_result'])->name('lecturer.get_students_result.get');

Route::get('/lecturer/check_result/{id}&{name}', [LecturerPagesController::class, 'check_result'])->name('/check_result/{id}&{name}');

Route::get('/lecturer/calender', [LecturerPagesController::class, 'calender'])->name('lecturer.calender.get');


});



Route::group(['middleware' => 'auth.admin'], function() {
    // Admin
Route::get('/lecturer/admin/dashboard', [AdminPagesController::class, 'dashboard'])->name('/lecturer.admin.dashboard');
Route::get('/lecturer/admin/add_admin', [AdminPagesController::class, 'add_admin'])->name('/lecturer.admin.add_admin');
Route::get('/lecturer/admin/edit_admin/{admin}', [AdminPagesController::class, 'edit_admin'])->name('/lecturer.admin.edit_admin');
Route::put('/lecturer/admin/edit_admin/{admin}', [AdminController::class, 'edit_admin'])->name('/lecturer.admin.put_admin');
Route::delete('/lecturer/admin/delete_admin/{admin}', [AdminController::class, 'delete_admin'])->name('lecturer.admin.delete_admin');

Route::get('/lecturer/admin/admin_role_permission', [AdminPagesController::class, 'admin_role_permission'])->name('lecturer.admin.admin_role_permission');
Route::post('/lecturer/admin/admin_role_permission', [AdminController::class, 'admin_role_permission'])->name('lecturer.admin.post_admin_role_permission');
Route::get('/lecturer/admin/edit_admin_role_permission/{permissions}&{name}', [AdminPagesController::class, 'edit_admin_role_permission'])->name('/lecturer.admin.edit_admin_role_permission');
Route::put('/lecturer/admin/edit_admin_role_permission/{permissions}&{name}', [AdminController::class, 'edit_admin_role_permission'])->name('/lecturer.admin.put_admin_role_permission');
Route::delete('/lecturer/admin/delete_admin_role_permission/{permissions}', [AdminController::class, 'delete_admin_role_permission'])->name('lecturer.admin.delete_admin_role_permission');

Route::get('/lecturer/admin/add_role', [AdminPagesController::class, 'add_role'])->name('lecturer.admin.add_role');
Route::post('/lecturer/admin/add_role', [AdminController::class, 'add_role'])->name('lecturer.admin.post_role');
Route::get('/lecturer/admin/edit_role/{roles}', [AdminPagesController::class, 'edit_role'])->name('lecturer.admin.edit_role.{roles}');
Route::put('/lecturer/admin/edit_role/{roles}', [AdminController::class, 'edit_role'])->name('lecturer.admin.put_role.{roles}');
Route::delete('/lecturer/admin/delete_role/{roles}', [AdminController::class, 'delete_role'])->name('lecturer.admin.delete_role');

Route::get('/lecturer/admin/add_permission', [AdminPagesController::class, 'add_permission'])->name('lecturer.admin.add_permission');
Route::post('/lecturer/admin/add_permission', [AdminController::class, 'add_permission'])->name('lecturer.admin.post_permission');
Route::get('/lecturer/admin/edit_permission/{permissions}', [AdminPagesController::class, 'edit_permission'])->name('lecturer.admin.edit_permission');
Route::put('/lecturer/admin/edit_permission/{permissions}', [AdminController::class, 'edit_permission'])->name('lecturer.admin.put_permission');
Route::delete('/lecturer/admin/delete_permission/{permissions}', [AdminController::class, 'delete_permission'])->name('lecturer.admin.delete_permission');

Route::get('/lecturer/admin/logout', [AdminPagesController::class, 'logout'])->name('/lecturer.admin.logout');
Route::post('/lecturer/admin/logout', [AdminController::class, 'logout'])->name('/lecturer.admin.logout');

Route::get('/lecturer/admin/add_lecturer', [AdminPagesController::class, 'add_lecturer'])->name('/lecturer.admin.add_lecturer');
Route::get('/lecturer/admin/add_student', [AdminPagesController::class, 'add_student'])->name('/lecturer.admin.add_student');
Route::get('/lecturer/admin/add_faculty', [AdminPagesController::class, 'add_faculty'])->name('/lecturer.admin.add_faculty');
Route::get('/lecturer/admin/add_department', [AdminPagesController::class, 'add_department'])->name('/lecturer.admin.add_department');
Route::get('/lecturer/admin/add_section', [AdminPagesController::class, 'add_section'])->name('/lecturer.admin.add_section');
Route::get('/lecturer/admin/add_level', [AdminPagesController::class, 'add_level'])->name('/lecturer.admin.add_level');
Route::get('/lecturer/admin/clearance_form/{students}', [AdminPagesController::class, 'clearance_form'])->name('/lecturer.admin.clearance_form.{students}');
Route::put('/lecturer/admin/clearance_form/{students}', [AdminController::class, 'change_clearance_status'])->name('/lecturer.admin.clearance_form.{students}');
Route::delete('/lecturer/admin/delete_clearance_form/{students}', [AdminController::class, 'delete_clearance_form'])->name('/lecturer/admin/delete_clearance_form/{students}');
Route::get('/lecturer/admin/clearance', [AdminPagesController::class, 'clearance'])->name('lecturer.admin.clearance');
Route::get('/lecturer/admin/settings_a', [AdminPagesController::class, 'settings_a'])->name('/lecturer.admin.settings_a');
Route::post('/lecturer/admin/settings_a', [AdminController::class, 'admin_up'])->name('/lecturer.admin.settings_a');

Route::post('/lecturer/admin/add_lecturer', [AdminController::class, 'lecturer_up'])->name('/lecturer.admin.add_lecturer');
Route::post('/lecturer/admin/add_student', [AdminController::class, 'add_student'])->name('/lecturer.admin.add_student');
Route::post('/lecturer/admin/add_admin', [AdminController::class, 'admin_up'])->name('/lecturer.admin.add_admin');

Route::post('/lecturer/admin/add_faculty', [AdminController::class, 'add_faculty'])->name('/lecturer.admin.add_faculty');
Route::post('/lecturer/admin/add_department', [AdminController::class, 'add_department'])->name('/lecturer.admin.add_department');
Route::post('/lecturer/admin/add_section', [AdminController::class, 'add_section'])->name('/lecturer.admin.add_section');
Route::post('/lecturer/admin/add_level', [AdminController::class, 'add_level'])->name('/lecturer.admin.add_level');
Route::post('/lecturer/admin/clearance', [AdminController::class, 'clearance'])->name('/lecturer.admin.clearance');

Route::get('/lecturer/admin/change_picture', [AdminPagesController::class, 'change_picture'])->name('/lecturer.admin.change_picture');
Route::put('/lecturer/admin/change_picture', [AdminController::class, 'change_picture'])->name('/lecturer.admin.change_picture');

Route::get('/lecturer/admin/settings_a', [AdminPagesController::class, 'change_email'])->name('/lecturer.admin.settings_a');
Route::put('/lecturer/admin/settings_a', [AdminController::class, 'change_email'])->name('/lecturer.admin.settings_a');

Route::get('/lecturer/admin/change_password', [AdminPagesController::class, 'change_password'])->name('/lecturer.admin.change_password');
Route::put('/lecturer/admin/change_password', [AdminController::class, 'change_password'])->name('/lecturer.admin.change_password');

Route::get('/lecturer/admin/change_lecturer_details/{lecturers}', [AdminPagesController::class, 'change_lecturer_details'])->name('/lecturer.admin.change_lecturer_details.{lecturers}');
Route::put('/lecturer/admin/change_lecturer_details/{lecturers}', [AdminController::class, 'change_lecturer_details'])->name('/lecturer.admin.change_lecturer_details.{lecturers}');
Route::delete('/lecturer/admin/delete_lecturer/{lecturers}', [AdminController::class, 'delete_lecturer'])->name('/lecturer.admin.delete_lecturer/{lecturers}');

Route::get('/lecturer/admin/change_student_details/{user}', [AdminPagesController::class, 'change_student_details'])->name('/lecturer.admin.change_student_details.{user}');
Route::put('/lecturer/admin/change_student_details/{user}', [AdminController::class, 'change_student_details'])->name('/lecturer.admin.change_student_details.{user}');
Route::delete('/lecturer/admin/delete_student/{students}', [AdminController::class, 'delete_student'])->name('/lecturer.admin.delete_student/{students}');

Route::get('/lecturer/admin/change_faculty_details/{faculties}', [AdminPagesController::class, 'change_faculty_details'])->name('/lecturer.admin.change_faculty_details.{faculties}');
Route::put('/lecturer/admin/change_faculty_details/{faculties}', [AdminController::class, 'change_faculty_details'])->name('/lecturer.admin.change_faculty_details.{faculties}');
Route::delete('/lecturer/admin/delete_faculty/{faculties}', [AdminController::class, 'delete_faculty'])->name('/lecturer.admin.delete_faculty/{faculties}');

Route::get('/lecturer/admin/change_department_details/{departments}', [AdminPagesController::class, 'change_department_details'])->name('/lecturer.admin.change_department_details.{departments}');
Route::put('/lecturer/admin/change_department_details/{departments}', [AdminController::class, 'change_department_details'])->name('/lecturer.admin.change_department_details.{departments}');
Route::delete('/lecturer/admin/delete_department/{departments}', [AdminController::class, 'delete_department'])->name('/lecturer.admin.delete_department/{departments}');

Route::get('/lecturer/admin/change_level_details/{levels}', [AdminPagesController::class, 'change_level_details'])->name('/lecturer.admin.change_level_details.{levels}');
Route::put('/lecturer/admin/change_level_details/{levels}', [AdminController::class, 'change_level_details'])->name('/lecturer.admin.change_level_details.{levels}');

Route::get('/lecturer/admin/change_section_details/{sections}', [AdminPagesController::class, 'change_section_details'])->name('/lecturer.admin.change_section_details.{sections}');
Route::put('/lecturer/admin/change_section_details/{sections}', [AdminController::class, 'change_section_details'])->name('/lecturer.admin.change_section_details.{sections}');

Route::get('/lecturer/admin/add_semester', [AdminPagesController::class, 'add_semester'])->name('/lecturer.admin.add_semester');
Route::post('/lecturer/admin/add_semester', [AdminController::class, 'add_semester'])->name('/lecturer.admin.add_semester');
Route::get('/lecturer/admin/change_semester_details/{semesters}', [AdminPagesController::class, 'change_semester_details'])->name('/lecturer.admin.change_semester_details/{semesters}');
Route::put('/lecturer/admin/change_semester_details/{semesters}', [AdminController::class, 'change_semester_details'])->name('/lecturer.admin.change_semester_details/{semesters}');

Route::get('/lecturer/admin/add_course', [AdminPagesController::class, 'add_course'])->name('/lecturer.admin.add_course');
Route::post('/lecturer/admin/add_course', [AdminController::class, 'add_course'])->name('/lecturer.admin.add_course');
Route::get('/lecturer/admin/change_course_details/{coursess}', [AdminPagesController::class, 'change_course_details'])->name('/lecturer.admin.change_course_details/{coursess}');
Route::put('/lecturer/admin/change_course_details/{coursess}', [AdminController::class, 'change_course_details'])->name('/lecturer.admin.change_course_details/{coursess}');
Route::delete('/lecturer/admin/delete_course/{courses}', [AdminController::class, 'delete_course'])->name('/lecturer.admin.delete_course/{courses}');

Route::get('/lecturer/admin/add_payment', [AdminPagesController::class, 'add_payment'])->name('/lecturer.admin.add_payment');
Route::post('/lecturer/admin/add_payment', [AdminController::class, 'add_payment'])->name('/lecturer.admin.add_payment');
Route::get('/lecturer/admin/change_payment_details/{payments}', [AdminPagesController::class, 'change_payment_details'])->name('/lecturer.admin.change_payment_details/{payments}');
Route::put('/lecturer/admin/change_payment_details/{payments}', [AdminController::class, 'change_payment_details'])->name('/lecturer.admin.change_payment_details/{payments}');

Route::get('/lecturer/admin/search_lecturer', [SearchController::class, 'search_lecturer'])->name('/lecturer.admin.search_lecturer');
Route::get('/lecturer/admin/search_student', [SearchController::class, 'search_student'])->name('/lecturer.admin.search_student');
Route::get('/lecturer/admin/search_course', [SearchController::class, 'search_course'])->name('/lecturer.admin.search_course');

Route::get('/lecturer/admin/search_lecturer_p', [SearchController::class, 'search_lecturer_p'])->name('/lecturer.admin.search_lecturer_p');
Route::get('/lecturer/admin/search_student_p', [SearchController::class, 'search_student_p'])->name('/lecturer.admin.search_student_p');


Route::get('/lecturer/admin/get_students', [ResultController::class, 'get_students'])->name('/lecturer.admin.get_students');
Route::get('/lecturer/admin/get_students_for_result', [ResultController::class, 'get_students_for_result'])->name('lecturer.admin.get_students_for_result.get');
Route::get('/lecturer/admin/search_student_result', [ResultController::class, 'search_student_result'])->name('/lecturer.admin.search_student_result');

Route::get('/lecturer/admin/edit_student_result', [ResultController::class, 'edit_student_result'])->name('/lecturer.admin.edit_student_result');
Route::get('/lecturer/admin/edit_student_for_result', [ResultController::class, 'edit_student_for_result'])->name('lecturer.admin.edit_student_for_result.get');

Route::get('/lecturer/admin/search_students_result', [ResultController::class, 'search_students_result'])->name('/lecturer.admin.search_students_result');

Route::get('/lecturer/admin/upload_result/{id}&{name}', [ResultController::class, 'upload_result'])->name('/lecturer.admin.upload_result.{id}&{name}');
Route::post('/lecturer/admin/upload_result/{id}&{name}', [AdminController::class, 'upload_result'])->name('/lecturer.admin.upload_result.{id}&{name}');

Route::get('/lecturer/admin/edit_result/{id}&{name}', [ResultController::class, 'edit_result'])->name('/lecturer.admin.edit_result/{id}&{name}');
// Route::put('/lecturer/admin/edit_result/{id}&{name}', [AdminController::class, 'edit_result'])->name('/lecturer.admin.edit_result/{id}&{name}');

Route::get('/lecturer/admin/edit_results/{results}', [ResultController::class, 'edit_results'])->name('/lecturer.admin.edit_results/{results}');
Route::put('/lecturer/admin/edit_results/{results}', [AdminController::class, 'edit_results'])->name('/lecturer.admin.edit_results/{results}');

Route::get('/lecturer/admin/upload_countdown', [CountdownController::class, 'upload_countdown'])->name('/lecturer.admin.upload_countdown');
Route::post('/lecturer/admin/upload_countdown', [CountdownController::class, 'upload_countdownn'])->name('/lecturer.admin.upload_countdown');

Route::get('/lecturer/admin/edit_countdown/{countdown}', [CountdownController::class, 'edit_countdown'])->name('/lecturer.admin.edit_countdown/{countdown}');
Route::put('/lecturer/admin/edit_countdown/{countdown}', [CountdownController::class, 'edit_countdownn'])->name('/lecturer.admin.edit_countdown/{countdown}');

Route::get('/lecturer/admin/calender', [AdminPagesController::class, 'calender'])->name('lecturer.admin.calender.get');

Route::get('/lecturer/admin/get_admin_permission', [UpdatePermissionController::class, 'get_admin_permission'])->name('lecturer.admin.get_admin_permission');
Route::get('/lecturer/admin/edit_admin_permission/{admin}', [UpdatePermissionController::class, 'edit_admin_permission'])->name('lecturer.admin.edit_admin_permission');
Route::put('/lecturer/admin/update_admin_permission/{admin}', [UpdatePermissionController::class, 'update_admin_permission'])->name('lecturer.admin.update_admin_permission');
Route::get('/lecturer/admin/remove_admin_permission/{admin}', [UpdatePermissionController::class, 'remove_admin_permission'])->name('lecturer.admin.remove_admin_permission');
Route::put('/lecturer/admin/remove_admin_permission/{admin}', [UpdatePermissionController::class, 'revoke_admin_permission'])->name('lecturer.admin.remove_admin_permission');

Route::get('/lecturer/admin/edit_lecturer_permission/{lecturer}', [UpdatePermissionController::class, 'edit_lecturer_permission'])->name('lecturer.admin.edit_lecturer_permission');
Route::put('/lecturer/admin/update_lecturer_permission/{lecturer}', [UpdatePermissionController::class, 'update_lecturer_permission'])->name('lecturer.admin.update_lecturer_permission');
Route::get('/lecturer/admin/remove_lecturer_permission/{lecturer}', [UpdatePermissionController::class, 'remove_lecturer_permission'])->name('lecturer.admin.remove_lecturer_permission');
Route::put('/lecturer/admin/remove_lecturer_permission/{lecturer}', [UpdatePermissionController::class, 'revoke_lecturer_permission'])->name('lecturer.admin.remove_lecturer_permission');

Route::get('/lecturer/admin/edit_student_permission/{student}', [UpdatePermissionController::class, 'edit_student_permission'])->name('lecturer.admin.edit_student_permission');
Route::put('/lecturer/admin/update_student_permission/{student}', [UpdatePermissionController::class, 'update_student_permission'])->name('lecturer.admin.update_student_permission');
Route::get('/lecturer/admin/remove_student_permission/{student}', [UpdatePermissionController::class, 'remove_student_permission'])->name('lecturer.admin.remove_student_permission');
Route::put('/lecturer/admin/remove_student_permission/{student}', [UpdatePermissionController::class, 'revoke_student_permission'])->name('lecturer.admin.remove_student_permission');


});
