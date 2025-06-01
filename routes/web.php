<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::controller(AdminController::class)->group(function() {

    Route::get('admin/logout' , [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('admin/profile' , [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('admin/profile/update' , [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');
    Route::get('admin/pasword/change' , [AdminController::class, 'AdminPasswordChange'])->name('admin.pasword.change');
    Route::post('admin/pasword/update' , [AdminController::class, 'AdminPasswordUpdate'])->name('admin.pasword.update');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
