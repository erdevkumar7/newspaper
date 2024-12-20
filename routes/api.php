<?php

use App\Http\Controllers\OrganizerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('organizer')->group(function(){
    Route::post('/login', [OrganizerController::class, 'loginApi']);
    Route::post('/view-user/details', [OrganizerController::class, 'getUserByIdOrPhoneNumber']);

    Route::post('/update-user/status', [OrganizerController::class, 'apiUpdateUserStatus']);

    // Route::get('/user-detail', [OrganizerController::class, 'getUserById']);

});
