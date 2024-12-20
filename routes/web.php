<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminNewspaperController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about-us', [PageController::class, 'aboutUs'])->name('aboutUs');
Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contactUs');
Route::get('/create-dp', [PageController::class, 'showMAANimageGenerate'])->name('user.imageGenerate');

Route::get('/subscribe', [PageController::class, 'subscribe'])->name('subscribe');

Route::post('/payment/create', [PaymentController::class, 'createPayment'])->name('payment.create');
Route::get('/payment/execute', [PaymentController::class, 'executePayment'])->name('payment.execute');
Route::get('/payment/cancel', [PaymentController::class, 'cancelPayment'])->name('payment.cancel');

Route::prefix('user')->group(function () {
    Route::get('/register', [UserController::class, 'register'])->name(('user.register'));
    Route::post('/register', [UserController::class, 'registerSubmit'])->name(('user.registerSubmit'));

    Route::get('/profile/{user_id}/view-detail', [UserController::class, 'showProfile'])->name('user.profile');
    Route::get('/login', [UserController::class, 'login'])->name('user.login');
    Route::post('/login', [UserController::class, 'loginSubmit'])->name('user.loginSubmit');
    // Forgot Password
    Route::get('/forgot-password', [UserController::class, 'showForgotPasswordForm'])->name('user.password.request');
    Route::post('/forgot-password', [UserController::class, 'sendResetLinkEmail'])->name('user.password.email');

    // Reset Password
    Route::get('/reset-password/{token}', [UserController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('user.password.update');

    Route::middleware(['user'])->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
        Route::get('/qr-code/view-qr', [UserController::class, 'viewQR'])->name('user.viewQR');
        Route::get('/download-qr-code/{user_id}', [UserController::class, 'downloadQRCode'])->name('user.qrdownload');
        Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
        Route::get('/edit-details', [UserController::class, 'showEditUser'])->name('user.edit');
        Route::put('/edit-details', [Usercontroller::class, 'updateUser'])->name('user.update');
    });
});



Route::prefix('admin')->group(function () {
    Route::get('/register', [AdminController::class, 'register'])->name(('admin.register'));
    Route::post('/register', [AdminController::class, 'registerSubmit'])->name('admin.registerSubmit');

    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'loginSubmit'])->name('admin.loginSubmit');


    // Admin User Functionality
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/all-user', [AdminController::class, 'allUser'])->name('admin.alluser');
        Route::get('/mp-user', [AdminController::class, 'mpUsers'])->name('admin.mpUser');
        Route::get('/other-state-user', [AdminController::class, 'otherStateUser'])->name('admin.otherStateUser');
        Route::get('/verified-user', [AdminController::class, 'verifiedUser'])->name('admin.verifiedUser');
        Route::get('/not-verified-user', [AdminController::class, 'NotVerifiedUser'])->name('admin.NotVerifiedUser');
        Route::get('/{jnv_name}/user/{status}', [AdminController::class, 'jnvWiseUser'])->name('admin.jnvWiseUser');
        
        Route::get('/add-user', [AdminController::class, 'adduser'])->name('admin.adduser');
        Route::post('/add-user', [AdminController::class, 'adduserSubmit'])->name('admin.adduserSubmit');

        Route::get('/user/{user_id}/view', [AdminController::class, 'viewUser'])->name('admin.viewuser');
        Route::get('/user/{user_id}/edit-user', [AdminController::class, 'editUser'])->name('admin.edituser');
        Route::put('/user/{user_id}/edit-user', [AdminController::class, 'editUserSubmit'])->name('admin.editusersubmit');
        Route::post('/user/update-status', [AdminController::class, 'updateUserStatus'])->name('admin.updateuserstatus');

        Route::delete('/delete-user', [AdminController::class, 'deleteUser'])->name('admin.deleteuser');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });

    // Admin Volunteer Functionality
    Route::middleware('admin')->group(function () {
        Route::get('/all-volunteer', [OrganizerController::class, 'allOrganizer'])->name('admin.allOrganizer');
        Route::get('/volunteer/{org_id}/view', [OrganizerController::class, 'viewOrganizer'])->name('admin.viewOrganizer');

        Route::get('/add-volunteer', [OrganizerController::class, 'addOrganizer'])->name('admin.addOrganizer');
        Route::post('/add-volunteer', [OrganizerController::class, 'addOrganizerSubmit'])->name('admin.addOrganizerSubmit');

        Route::get('/volunteer/{org_id}/edit-volunteer', [OrganizerController::class, 'AdminOrgUpdateForm'])->name('admin.orgUpdateForm');
        Route::put('/volunteer/{org_id}/update-volunteer', [OrganizerController::class, 'AdminOrgUpdateSubmit'])->name('admin.OrgUpdateSubmit');

        Route::post('/volunteer/update-status', [OrganizerController::class, 'updateOrganizerStatus'])->name('admin.updateOrganizerStatus');
        Route::delete('/delete-organizer', [OrganizerController::class, 'deleteOrganizer'])->name('admin.deleteOrganizer');
    });
 

    // page(content) management functionality
    Route::middleware('admin')->group(function () {
        Route::get('/all-page', [AdminPageController::class, 'allPage'])->name('admin.allpage');
        Route::get('/page/{page_id}/view', [AdminPageController::class, 'viewPage'])->name('admin.viewpage');

        Route::get('/add-page', [AdminPageController::class, 'addPage'])->name('admin.addpage');
        Route::post('/add-page', [AdminPageController::class, 'addPageSubmit'])->name('admin.addPageSubmit');

        Route::get('/page/{page_id}/edit-page', [AdminPageController::class, 'editPage'])->name('admin.editpage');
        Route::post('/page/{page_id}/edit-page', [AdminPageController::class, 'updatePage'])->name('admin.updatepagesubmit');

        Route::get('/add-banner', [AdminPageController::class, 'AddBanner'])->name('admin.addBanner');
        Route::post('/add-banner', [AdminPageController::class, 'AddBannerSubmit'])->name('admin.AddBannerSubmit');

        Route::delete('/delete/{banner_id}/banner', [AdminPageController::class, 'DeleteBanner'])->name('admin.DeleteBanner');

        Route::post('/page/update-status', [AdminPageController::class, 'updatePageStatus'])->name('admin.updatepagestatus');

        Route::get('/all-page-setting', [AdminPageController::class, 'allPageSetting'])->name('admin.allPageSetting');
        Route::put('/all-page-setting', [AdminPageController::class, 'upadteAllPageSetting'])->name('admin.upadteAllPageSetting');

        Route::get('/add-page-setting', [AdminPageController::class, 'addPageSetting'])->name('admin.addPageSetting');
        Route::post('/add-page-setting', [AdminPageController::class, 'addPageSettingSubmit'])->name('admin.addPageSettingSubmit');
    });
});

Route::prefix('volunteer')->group(function(){
    Route::get('/', [OrganizerController::class, 'organizerHome'])->name('organizer.home');
    Route::get('/register', [OrganizerController::class, 'organizerRegForm'])->name('organizer.register');
    Route::post('/register', [OrganizerController::class, 'organizerRegisterSubmit'])->name('organizer.registerSubmit');

    Route::get('/login', [OrganizerController::class, 'showLoginForm'])->name('organizer.login');
    Route::post('/login', [OrganizerController::class, 'loginSubmit'])->name('organizer.loginSubmit');

    Route::group(['middleware' => 'organizer.auth'], function () {
        Route::get('/dashboard', [OrganizerController::class, 'dashboard'])->name('organizer.dashboard');

        Route::get('/edit-user/{user_id}/details', [OrganizerController::class, 'showEditUser'])->name('organizer.showEditUser');
        Route::put('/edit-user/{user_id}/details', [OrganizerController::class, 'updateUser'])->name('organizer.updateUser');

        Route::post('/update-status', [AdminController::class, 'updateUserStatus'])->name('organizer.updateuserstatus');
        Route::get('/qr-scan', [OrganizerController::class, 'QrScan'])->name('organizer.QrScan');
        Route::get('/user-by-phonenumber', [OrganizerController::class, 'userByPhoneNumber'])->name('organizer.userByPhoneNumber');
        Route::post('/logout', [OrganizerController::class, 'logout'])->name('organizer.logout');
    });
});


Route::prefix('organizer')->group(function () {
    Route::group(['middleware' => 'organizer.auth'], function () {
        Route::get('/view-user/{user_id}', [OrganizerController::class, 'showUserProfile'])->name('organizer.showUserProfile');
    });
});


