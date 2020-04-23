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


Route::get('','Frontend\Page@home__Page')->name('home__Page');

    //Login student
Route::get('loginStudent','Frontend\Page@loginStudent')->name('loginStudent');
Route::post('loginStudent','Frontend\Page@postloginStudent')->name('postloginStudent');
Route::get('dang_xuat','Frontend\Page@logout')->name('logout');
    //registration student

Route::group(['prefix' => 'student','middleware'=>'LoginStudent'], function () {
    Route::get('','Frontend\Page@dashboard')->name('dashboard');
    Route::group(['prefix' => 'contronller'], function () {
        //xem danh sach mon
        Route::get('registration','Frontend\Page@registrationStudent')->name('registrationStudent');
        //xem danh sach lop va nhom
        Route::get('registration/course_registration/{id_courser}','Frontend\Page@course_registration')->name('course_registration');
        //dang ky
        Route::get('registration_group/{id_group}/{id_monhoc}','Frontend\Page@registration_group')->name('registration_group');
        //xem danh sách nhóm đã đăng ký
        Route::get('view_registrationGroup','Frontend\Page@view_registrationGroup')->name('view_registrationGroup');
        //Yêu Câu tạo Nhóm
        Route::get('create_group','Frontend\Page@create_group')->name('create_group');

    });

});

//Backend đăng nhập
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::get('/logout', 'AdminController@logout');
Route::post('/admin-dashboard', 'AdminController@dashboard');



//backend quản lý sinh viên
Route::get('/add-student', 'StudentManagementController@add_student');
Route::get('/edit-student/{student_id}', 'StudentManagementController@edit_student');
Route::get('/delete-student/{student_id}', 'StudentManagementController@delete_student');
Route::get('/all-student', 'StudentManagementController@all_student');

Route::post('/save-student', 'StudentManagementController@save_student');
Route::post('/update-student/{student_id}', 'StudentManagementController@update_student');
//Backend quản lý môn học
Route::get('/add-subject', 'SubjectManagementController@add_subject');
Route::get('/edit-subject/{subject_id}', 'SubjectManagementController@edit_subject');
Route::get('/delete-subject/{subject_id}', 'SubjectManagementController@delete_subject');
Route::get('/all-subject', 'SubjectManagementController@all_subject');

Route::post('/save-subject', 'SubjectManagementController@save_subject');
Route::post('/update-subject/{subject_id}', 'SubjectManagementController@update_subject');

//backend quản lý lớp học
Route::get('/add-classroom', 'ClassroomManagement@add_classroom');
Route::get('/edit-classroom/{classroom_id}', 'ClassroomManagement@edit_classroom');
Route::get('/delete-classroom/{classroom_id}', 'ClassroomManagement@delete_classroom');
Route::get('/all-classroom', 'ClassroomManagement@all_classroom');

Route::post('/save-classroom', 'ClassroomManagement@save_classroom');
Route::post('/update-classroom/{classroom_id}', 'ClassroomManagement@update_classroom');

//backend quản lý lớp môn học
Route::get('/add-classsub', 'ClasssubjectManagement@add_classsub');
Route::get('/edit-classsub/{classsub_id}', 'ClasssubjectManagement@edit_classsub');
Route::get('/delete-classsub/{classsub_id}', 'ClasssubjectManagement@delete_classsub');
Route::get('/all-classsub', 'ClasssubjectManagement@all_classsub');

Route::post('/save-classsub', 'ClasssubjectManagement@save_classsub');
Route::post('/update-classsub/{classsub_id}', 'ClasssubjectManagement@update_classsub');

//backend quản lý lịch giảng dạy
Route::get('/add-teaching', 'TeachingManagement@add_teaching');
Route::get('/edit-teaching/{teaching_id}', 'TeachingManagement@edit_teaching');
Route::get('/delete-teaching/{teaching_id}', 'TeachingManagement@delete_teaching');
Route::get('/all-teaching', 'TeachingManagement@all_teaching');

Route::post('/save-teaching', 'TeachingManagement@save_teaching');
Route::post('/update-teaching/{teaching_id}', 'TeachingManagement@update_teaching');
