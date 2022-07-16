<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CKEditorController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProfileController;
// use App\Http\Controllers\Admin\ShopController;

use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CenterDetailsController;
use App\Http\Controllers\Admin\CityDetailsController;
use App\Http\Controllers\Admin\ContactController;


/*
|--------------------------------------------------------------------------
| Superadmin & Vendor Routes
|--------------------------------------------------------------------------
*/

// // Auth::routes();
Auth::routes(['verify' => true]);

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

    Route::resource('carousels', CarouselController::class);
    Route::get('/changeCarouselStatus', [CarouselController::class, 'changeStatus'])->name('carousels.changeStatus');
    Route::delete('/carouselsDeleteAll', [CarouselController::class, 'deleteAll'])->name('carousels.deleteAll');

    Route::resource('admin/courses', CourseController::class);
    Route::get('admin/changeCourseStatus', [CourseController::class, 'changeStatus'])->name('courses.changeStatus');
    Route::delete('admin/coursesDeleteAll', [CourseController::class, 'deleteAll'])->name('courses.deleteAll');

    Route::resource('centers', CenterDetailsController::class);
    Route::get('/changeCentersStatus', [CenterDetailsController::class, 'changeStatus'])->name('centers.changeStatus');
    Route::delete('/centersDeleteAll', [CenterDetailsController::class, 'deleteAll'])->name('centers.deleteAll');

    Route::resource('cities', CityDetailsController::class);
    Route::get('/changeCityStatus', [CityDetailsController::class, 'changeStatus'])->name('cities.changeStatus');
    Route::delete('/citiesDeleteAll', [CityDetailsController::class, 'deleteAll'])->name('cities.deleteAll');

    Route::resource('contacts', ContactController::class);
    Route::delete('/contactsDeleteAll', [ContactController::class, 'deleteAll'])->name('contacts.deleteAll');


    // Route::resource('shops', ShopController::class);
    // Route::get('/changeShopStatus', [ShopController::class, 'changeStatus'])->name('shops.changeStatus');

});


/*
|--------------------------------------------------------------------------
| Student Panel Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Student\StudentPanelController;
use App\Http\Controllers\Student\StudentProfileController;

Route::get('/studdashboard', [StudentPanelController::class, 'index'])->name('studpanel.dashboard');
Route::get('/studprofile', [StudentPanelController::class, 'profile'])->name('studpanel.profile');
Route::get('/ch_pwd', [StudentPanelController::class, 'ch_pwd'])->name('studpanel.change_password');
Route::get('/mycourses', [StudentPanelController::class, 'mycourses'])->name('studpanel.mycourses');
Route::get('/myreferral', [StudentPanelController::class, 'myreferral'])->name('studpanel.myreferral');
Route::get('/myearnings', [StudentPanelController::class, 'myearnings'])->name('studpanel.myearnings');
Route::get('/quiz', [StudentPanelController::class, 'quiz'])->name('studpanel.quiz');
Route::get('/upload_receipt', [StudentPanelController::class, 'upload_receipt'])->name('studpanel.upload_receipt');


/*
|--------------------------------------------------------------------------
| Frontend Website Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\WebsiteController;

Route::get('/', [WebsiteController::class, 'index'])->name('website.root');
Route::get('/loginpage', [WebsiteController::class, 'login'])->name('website.loginpage');
Route::get('/registerpage', [WebsiteController::class, 'register'])->name('website.registerpage');
Route::get('/aboutus', [WebsiteController::class, 'aboutus'])->name('website.aboutus');
Route::get('/directordesk', [WebsiteController::class, 'directordesk'])->name('website.directordesk');
Route::get('/certificate', [WebsiteController::class, 'certificate'])->name('website.certificate');
Route::get('/courses', [WebsiteController::class, 'courses'])->name('website.courses');
Route::get('/course_details', [WebsiteController::class, 'course_details'])->name('website.course_details');
Route::get('/course_intro', [WebsiteController::class, 'course_intro'])->name('website.course_intro');
Route::get('/referral', [WebsiteController::class, 'referral'])->name('website.referral');
Route::get('/photos', [WebsiteController::class, 'photos'])->name('website.photos');
Route::get('/videos', [WebsiteController::class, 'videos'])->name('website.videos');
Route::get('/student_verification', [WebsiteController::class, 'student_verification'])->name('website.student_verification');
Route::get('/donation', [WebsiteController::class, 'donation'])->name('website.donation');
Route::get('/contactus', [WebsiteController::class, 'contactus'])->name('website.contactus');
Route::post('/contactsubmit', [ContactController::class, 'store'])->name('website.contactsubmit');
