<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminNewspaperController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about-us', [PageController::class, 'aboutUs'])->name('aboutUs');
Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contactUs');
Route::get('/subscribe', [PageController::class, 'subscribe'])->name('subscribe');

Route::post('/payment/create', [PaymentController::class, 'createPayment'])->name('payment.create');
Route::get('/payment/execute', [PaymentController::class, 'executePayment'])->name('payment.execute');
Route::get('/payment/cancel', [PaymentController::class, 'cancelPayment'])->name('payment.cancel');


Route::prefix('user')->group(function () {
    Route::get('/register', [UserController::class, 'register'])->name(('user.register'));
    Route::post('/register', [UserController::class, 'registerSubmit'])->name(('user.registerSubmit'));

    Route::get('/qr-code/{user_id}/view-qr', [UserController::class, 'viewQR'])->name('user.viewQR');
    Route::get('/profile/{user_id}/view-detail', [UserController::class, 'showProfile'])->name('user.profile');
    Route::get('/download-qr-code/{user_id}', [UserController::class, 'downloadQRCode'])->name('user.qrdownload');

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
        Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
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
        Route::get('/add-user', [AdminController::class, 'adduser'])->name('admin.adduser');
        Route::post('/add-user', [AdminController::class, 'adduserSubmit'])->name('admin.adduserSubmit');

        Route::get('/user/{user_id}/view', [AdminController::class, 'viewUser'])->name('admin.viewuser');

        Route::get('/user/{user_id}/edit-user', [AdminController::class, 'editUser'])->name('admin.edituser');
        Route::put('/user/{user_id}/edit-user', [AdminController::class, 'editUserSubmit'])->name('admin.editusersubmit');

        Route::post('/user/update-status', [AdminController::class, 'updateUserStatus'])->name('admin.updateuserstatus');
        Route::delete('/delete-user', [AdminController::class, 'deleteUser'])->name('admin.deleteuser');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
    // Admin Newspaper Functionality
    Route::middleware('admin')->group(function () {
        Route::get('/all-newspaper', [AdminNewspaperController::class, 'allNewsPaper'])->name('admin.allnewspaper');
        Route::get('/newspaper/{paper_id}/view', [AdminNewspaperController::class, 'viewNewsPaper'])->name('admin.viewnewspaper');

        Route::get('/add-newspaper', [AdminNewspaperController::class, 'addNewsPaper'])->name('admin.addnewspaper');
        Route::post('/add-newspaper', [AdminNewspaperController::class, 'addNewsPaperSubmit'])->name('admin.addnewspapersubmit');

        Route::get('/newspaper/{paper_id}/edit-paper', [AdminNewspaperController::class, 'editNewsPaper'])->name('admin.editnewspaper');
        Route::put('/newspaper/{paper_id}/edit-paper', [AdminNewspaperController::class, 'editNewsPaperSubmit'])->name('admin.editNewsPaperSubmit');

        Route::delete('/delete-newspaper', [AdminNewspaperController::class, 'deleteNeswPaper'])->name('admin.deleteNeswPaper');
        Route::get('/newspaper/{paper_id}/download', [AdminNewspaperController::class, 'downloadPDF'])->name('admin.newspaper.download');
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
