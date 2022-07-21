<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CKEditorController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProfileController;
// use App\Http\Controllers\Admin\ShopController;

use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CenterDetailsController;
use App\Http\Controllers\Admin\CityDetailsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\QualificationController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\VideoController;

/*
|--------------------------------------------------------------------------
| Superadmin & Vendor Routes
|--------------------------------------------------------------------------
*/

// // Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/chk_refcode/{rc}', [StudentController::class, 'chkRefCode'])->name('students.chkRefCode');

Route::group(['middleware' => ['auth']], function() {
    // CKEditor Image Upload
    Route::post('ckeditor/upload', [CKEditorController::class,'upload'])->name('ckeditor.image-upload');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('users', UserController::class);
    Route::get('/changeUserStatus', [UserController::class, 'changeStatus'])->name('user.changeStatus');

    Route::resource('profile', ProfileController::class);
    Route::get('/chpwd', [ProfileController::class, 'chpwdform'])->name('profile.chpwd');
    Route::post('/chpwd', [ProfileController::class, 'chpwdsubmit'])->name('profile.chpwdsubmit');

    Route::resource('roles', RoleController::class);
    Route::delete('/rolesDeleteAll', [PermissionController::class, 'deleteAll'])->name('roles.deleteAll');

    Route::resource('permissions', PermissionController::class);
    Route::delete('/permissionsDeleteAll', [PermissionController::class, 'deleteAll'])->name('permissions.deleteAll');

    // Route::resource('shops', ShopController::class);
    // Route::get('/changeShopStatus', [ShopController::class, 'changeStatus'])->name('shops.changeStatus');

    Route::resource('carousels', CarouselController::class);
    Route::get('/changeCarouselStatus', [CarouselController::class, 'changeStatus'])->name('carousels.changeStatus');
    Route::delete('/carouselsDeleteAll', [CarouselController::class, 'deleteAll'])->name('carousels.deleteAll');

    Route::resource('admin/courses', CourseController::class);
    Route::get('admin/changeCourseStatus', [CourseController::class, 'changeStatus'])->name('courses.changeStatus');
    Route::delete('admin/coursesDeleteAll', [CourseController::class, 'deleteAll'])->name('courses.deleteAll');

    Route::resource('students', StudentController::class);
    Route::get('/changeStudentStatus', [StudentController::class, 'changeStatus'])->name('students.changeStatus');
    Route::delete('/studentsDeleteAll', [StudentController::class, 'deleteAll'])->name('students.deleteAll');
    Route::get('/chStudPwd/{id}', [StudentController::class, 'chpwdform'])->name('students.chpwd');
    Route::put('/chStudPwd/{id}', [StudentController::class, 'chpwdsubmit'])->name('students.chpwdsubmit');

    Route::resource('centers', CenterDetailsController::class);
    Route::get('/changeCentersStatus', [CenterDetailsController::class, 'changeStatus'])->name('centers.changeStatus');
    Route::delete('/centersDeleteAll', [CenterDetailsController::class, 'deleteAll'])->name('centers.deleteAll');

    Route::resource('cities', CityDetailsController::class);
    Route::get('/changeCityStatus', [CityDetailsController::class, 'changeStatus'])->name('cities.changeStatus');
    Route::delete('/citiesDeleteAll', [CityDetailsController::class, 'deleteAll'])->name('cities.deleteAll');

    Route::resource('qualifications', QualificationController::class);
    Route::delete('/qualificationsDeleteAll', [QualificationController::class, 'deleteAll'])->name('qualifications.deleteAll');

    Route::resource('contacts', ContactController::class);
    Route::delete('/contactsDeleteAll', [ContactController::class, 'deleteAll'])->name('contacts.deleteAll');

    Route::resource('photos', PhotoController::class);
    Route::get('/changePhotosStatus', [PhotoController::class, 'changeStatus'])->name('photos.changeStatus');
    Route::delete('/photosDeleteAll', [PhotoController::class, 'deleteAll'])->name('photos.deleteAll');

    Route::resource('videos', VideoController::class);
    Route::get('/changeVideosStatus', [VideoController::class, 'changeStatus'])->name('videos.changeStatus');
    Route::delete('/videosDeleteAll', [VideoController::class, 'deleteAll'])->name('videos.deleteAll');

});


/*
|--------------------------------------------------------------------------
| User Panel Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\User\UserPanelController;
use App\Http\Controllers\User\UserProfileController;

Route::get('/loginpage', [UserProfileController::class, 'userlogin'])->name('userprofile.loginpage');
Route::post('/loginsubmit', [UserProfileController::class, 'uservalidate'])->name('userprofile.loginsubmit');

Route::get('/registerpage', [UserProfileController::class, 'signup'])->name('userprofile.registerpage');
Route::post('/registeruser', [UserProfileController::class, 'userstore'])->name('userprofile.registersubmit');

Route::group(['middleware' => ['auth:student']], function() {
    Route::get('/userdashboard', [UserPanelController::class, 'index'])->name('userpanel.dashboard');
    Route::get('/userprofile', [UserPanelController::class, 'profile'])->name('userpanel.profile');
    Route::get('/ch_pwd', [UserPanelController::class, 'ch_pwd'])->name('userpanel.change_password');
    Route::get('/mycourses', [UserPanelController::class, 'mycourses'])->name('userpanel.mycourses');
    Route::get('/myreferral', [UserPanelController::class, 'myreferral'])->name('userpanel.myreferral');
    Route::get('/myearnings', [UserPanelController::class, 'myearnings'])->name('userpanel.myearnings');
    Route::get('/quiz', [UserPanelController::class, 'quiz'])->name('userpanel.quiz');
    Route::get('/upload_receipt', [UserPanelController::class, 'upload_receipt'])->name('userpanel.upload_receipt');
});

/*
|--------------------------------------------------------------------------
| Frontend Website Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\WebsiteController;

Route::get('/', [WebsiteController::class, 'index'])->name('website.root');
Route::get('/aboutus', [WebsiteController::class, 'aboutus'])->name('website.aboutus');
Route::get('/directordesk', [WebsiteController::class, 'directordesk'])->name('website.directordesk');
Route::get('/certificate', [WebsiteController::class, 'certificate'])->name('website.certificate');
Route::get('/courses', [WebsiteController::class, 'courses'])->name('website.courses');
Route::get('/course_details', [WebsiteController::class, 'course_details'])->name('website.course_details');
Route::get('/course_intro', [WebsiteController::class, 'course_intro'])->name('website.course_intro');
Route::get('/referral', [WebsiteController::class, 'referral'])->name('website.referral');
Route::get('/photogallery', [WebsiteController::class, 'photogallery'])->name('website.photogallery');
Route::get('/videogallery', [WebsiteController::class, 'videogallery'])->name('website.videogallery');
Route::get('/student_verification', [WebsiteController::class, 'student_verification'])->name('website.student_verification');
Route::get('/donation', [WebsiteController::class, 'donation'])->name('website.donation');
Route::get('/contactus', [WebsiteController::class, 'contactus'])->name('website.contactus');
Route::post('/contactsubmit', [ContactController::class, 'store'])->name('website.contactsubmit');
