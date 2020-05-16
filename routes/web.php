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
    Route::get('chuc-nang','Frontend\Page@dashboard')->name('dashboard');

Route::group(['prefix' => 'student','middleware'=>'LoginStudent'], function () {

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
        Route::post('post_create_group','Frontend\Page@post_create_group')->name('post_create_group');
        //Xem Danh Sách Yêu cầu
        Route::get('view_contact','Frontend\Page@view_contact')->name('view_contact');
        //Đăng Ký Môn Học Update
        Route::get('dang-ky.html','Frontend\Update@dang_ky')->name('dang_ky');
        Route::post('postdang_ky','Frontend\Update@post_dang_ky')->name('post_dang_ky');
        Route::get('huy_dang_ky/{id_lopmonhoc}','Frontend\Update@huy_dang_ky')->name('huy_dang_ky');
        //Thời Khóa biểu
        Route::get('thoi-khoa-bieu.html','Frontend\Update@thoi_khoa_bieu')->name('thoi_khoa_bieu');
        // Đăng ký nhóm ajax

        Route::get('danh_sach/{id}/{id_monhoc}', 'Frontend\Update@getRequest')->name('getRequest');
        // Chọn nhóm
        Route::get('nhom/{id_nhom}/{id_monhoc}', 'Frontend\Update@chon_nhom')->name('chon_nhom');
        //yêu cầu tạo nhóm
        Route::get('tao_nhom/{id_monhoc}','Frontend\Update@tao_nhom')->name('tao_nhom');
        Route::post('tao_nhom_post/{id_monhoc}','Frontend\Update@tao_nhom_post')->name('tao_nhom_post');
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
Route::get('/unactive-student/{student_id}', 'StudentManagementController@unactive_student');
Route::get('/active-student/{student_id}', 'StudentManagementController@active_student');

Route::post('/save-student', 'StudentManagementController@save_student');
Route::post('/update-student/{student_id}', 'StudentManagementController@update_student');
Route::get('/all-search-student/{id}', 'StudentManagementController@view_search');
Route::get('/add-student-to-class/{id}/{id_student}','StudentManagementController@addToClass');
Route::post('/search-student','StudentManagementController@search');

//==========router Phần của THI de o day đây==================================//
//---------------------------Thông Báo--------------------------------------//

Route::get('registration','Frontend\Page@registrationStudent')->name('registrationStudent');

//get
Route::get('danhsach/{id_lopmh}', 'StudentManagementController@danhsach')->name('danhsach');


//router de o day di
    //registration student


//-------------------------------------Gửi Yêu Cầu-------------------------------//

Route::get('contact/{id_giangvien}/{id_lop_mh}','Frontend\userController@contactStudent')->name('contactStudent');
Route::post('contact/{id_giangvien}/{id_lop_mh}','Frontend\userController@postcontactStudent')->name('postcontactStudent');
Route::get('danh_sach/{id_lop_mh}', 'Frontend\userController@getdanhsach')->name('getdanhsach');

//-----------------------------Thảo Luận--------------------------------------//
Route::get('talkkpage','Frontend\userController@talkpageStudent')->name('talkpageStudent');

//-----------------------------tạo bài viết-------------------------------------------//
Route::get('posts','Frontend\userController@postsStudent')->name('postsStudent');

Route::post('posts','Frontend\userController@Post_postsStudent')->name('Post_postsStudent');

//---------------------------tạo bình luận--------------------------------------------//
Route::get('comments', 'Frontend\userController@getComments')->name('getComments');
Route::post('comments', 'Frontend\userController@postComments')->name('postComments');

//===========================================================================================

//=======


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

//backend quản lý phản hồi
Route::get('/view_report/','ReportController@reportview')->name('view_report');
//Route::get('/view_port-un/{id_phanhoi}','ReportController@postReportUn')->name('post_report');
Route::get('/view_port-ac/{id_phanhoi}','ReportController@postReportAc')->name('post_report');
