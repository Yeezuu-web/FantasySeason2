<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\FilesController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\admin\ApprovalController;
use App\Http\Controllers\Admin\CandidatesController;
use App\Http\Controllers\Admin\FileImportController;
use App\Http\Controllers\Admin\UserAlertsController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Auth\ChangePasswordController;

Route::get('/', [CandidatesController::class, 'register'])->name('candidate');
Route::get('/thankyoulffaing4335', function(){return view('frontend.thankyou');})->name('thankyou');
Route::get('register-fan/{club}', [CandidatesController::class, 'registerFan']);
Route::post('registering', [CandidatesController::class, 'registering'])->name('registering');
Route::post('candidates/media', [CandidatesController::class, 'storeMedia'])->name('candidates.storeMedia');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.candidates.index')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Permissions
    Route::delete('permissions/destroy', [PermissionsController::class, 'massDestroy'])->name('permissions.massDestroy');
    Route::resource('permissions', PermissionsController::class);

    // Roles
    Route::delete('roles/destroy', [RolesController::class , 'massDestroy'])->name('roles.massDestroy');
    Route::resource('roles', RolesController::class);

    // Users
    Route::delete('users/destroy', [UsersController::class , 'massDestroy'])->name('users.massDestroy');
    Route::resource('users', UsersController::class);

    // User Alerts
    Route::delete('user-alerts/destroy', [UserAlertsController::class , 'massDestroy'])->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', [UserAlertsController::class , 'read']);
    Route::resource('user-alerts', UserAlertsController::class)->except(['edit', 'update']);

    //Candidate
    Route::delete('candidates/destroy', [CandidatesController::class , 'massDestroy'])->name('candidates.massDestroy');
    Route::resource('candidates', CandidatesController::class)->except(['create', 'store']);

    Route::get('approval/index', [ApprovalController::class, 'index'])->name('approval.index');
    Route::post('approval/update/{id}', [ApprovalController::class, 'update'])->name('approval.update');
    Route::post('approval/reject/{id}', [ApprovalController::class, 'reject'])->name('approval.reject');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', [ChangePasswordController::class , 'edit'])->name('password.edit');
        Route::post('password', [ChangePasswordController::class , 'update'])->name('password.update');
        Route::post('profile', [ChangePasswordController::class , 'updateProfile'])->name('password.updateProfile');
        Route::post('profile/destroy', [ChangePasswordController::class , 'destroy'])->name('password.destroyProfile');
    }
});