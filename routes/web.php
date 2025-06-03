<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\backend\TeacherController;
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

Route::controller(StudentController::class)->group(function () {
    Route::get('add/student', 'AddStudent')->name('add.student');
    Route::post('store/student', 'StoreStudent')->name('store.student');
    Route::get('manage/student', 'ManageStudent')->name('manage.student');
    Route::get('edit/student/{id}', 'EditStudent')->name('edit.student');
    Route::post('update/student/{id}', 'UpdateStudent')->name('update.student');
    Route::get('delete/student/{id}', 'DeleteStudent')->name('delete.student');
});


Route::controller(TeacherController::class)->group(function() {
    Route::get('add/teacher', 'AddTeacher')->name('add.teacher');
    Route::post('store/teacher','StoreTeacher')->name('store.teacher');
    Route::get('manage/teacher', 'ManageTeacher')->name('manage.teacher');
    Route::get('edit/teacher/{id}', 'EditTeacher')->name('edit.teacher');
    Route::get('delete/teacher/{id}', 'DeleteTeacher')->name('delete.teacher');
    Route::post('teacher/update/{id}', 'UpdateTeacher')->name('update.teacher');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


