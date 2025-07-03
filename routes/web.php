<?php

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\backend\DepartmentController;
use App\Http\Controllers\backend\piadController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\backend\TeacherController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SubjectController;
use App\Http\Controllers\Frontend\TeachersController;
use App\Http\Controllers\Backend\StafController;
use App\Http\Controllers\Backend\ExpenseController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\salaryController;

// Route::get('/', function () {
//     return view('frontend.teacher_login');
// });

Route::get('/', [TeachersController::class, 'index'])->name('index');


Route::post('/teacher/dashboard', [TeachersController::class, 'TeacherLogin'])->name('teacher.login');


// Route::get('/teacher/dashboard' , [TeacherController::class , 'TeacherDashboard'])->name('teacher.dashboard');

Route::middleware('teacher')->group(function () {
    Route::get('/teacher/dashboard', [TeachersController::class, 'TeacherDashboard'])->name('teacher.dashboard');
    Route::get('teacher/view/{id}', [TeachersController::class, 'TeacherView'])->name('teacher.view');
    // Route::get('teacher/index/{id}', [TeachersController::class, 'TeacherIndex'])->name('teachers.index');
    // Route::get('', 'TeacherIndex')->name('teacher.index');

});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(AdminController::class)->group(function () {

    Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('admin/profile/update', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');
    Route::get('admin/pasword/change', [AdminController::class, 'AdminPasswordChange'])->name('admin.pasword.change');
    Route::post('admin/pasword/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.pasword.update');
});

Route::controller(StudentController::class)->group(function () {
    Route::get('add/student', 'AddStudent')->name('add.student');
    Route::post('store/student', 'StoreStudent')->name('store.student');
    Route::get('manage/student', 'ManageStudent')->name('manage.student');
    Route::get('edit/student/{id}', 'EditStudent')->name('edit.student');
    Route::post('update/student/{id}', 'UpdateStudent')->name('update.student');
    Route::get('delete/student/{id}', 'DeleteStudent')->name('delete.student');
    Route::get('/print/invoice/{id}', 'PrintInvoice')->name('print.invoice');
});


Route::controller(TeacherController::class)->group(function () {
    Route::get('add/teacher', 'AddTeacher')->name('add.teacher');
    Route::post('store/teacher', 'StoreTeacher')->name('store.teacher');
    Route::get('manage/teacher', 'ManageTeacher')->name('manage.teacher');
    Route::get('edit/teacher/{id}', 'EditTeacher')->name('edit.teacher');
    Route::get('delete/teacher/{id}', 'DeleteTeacher')->name('delete.teacher');
    Route::post('teacher/update/{id}', 'UpdateTeacher')->name('update.teacher');
    Route::get('view/teachers/{id}', 'ViewTeacher')->name('view.teachers');
    Route::get('teacher/index/{id}', 'TeacherIndex')->name('teacher.index');
});


//start department
Route::controller(DepartmentController::class)->group(function () {
    Route::get('add/depart', 'AddDepart')->name('add.depart');
    Route::post('store/depart', 'StoreDepart')->name('store.depart');
    Route::get('all/depart', 'AllDepart')->name('all.depart');
    Route::get('edit/depart/{id}', 'EditDepart')->name('edit.depart');
    Route::post('depart/update/{id}', 'UpdateDepart')->name('update.depart');
    Route::get('delete/depart/{id}', 'DeleteDepart')->name('delete.depart');
});


Route::get('/get-subjects/{id}', [SubjectController::class, 'getSubjectsByDepartment']);
Route::get('/get-subjects/{department_id}', [SubjectController::class, 'getSubjectsByDepartment']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';

// route paid

// ----------------------------
Route::controller(piadController::class)->group(function () {
    Route::get('add/paid', 'AddPaid')->name('add.paid');
    Route::post('store/paid', 'Storepiad')->name('store.paid');
    Route::get('manage/paid', 'ManagePaid')->name('manage.paid');
    Route::get('edit/paid/{id}', 'EditPaid')->name('edit.paid');
    Route::post('update/paid/{id}', 'UpdatePaid')->name('update.paid');
    Route::get('delete/paid/{id}', 'DeletePaid')->name('delete.paid');
    Route::get('deactivate/paid/{id}' ,  'DeactivatePaid')->name('deactivate.paid');
});


// -------------------------------- expense

Route::controller(ExpenseController::class)->group(function () {
    Route::get('add/expense', 'AddExpense')->name('add.expense');
    Route::post('store/expense', 'StoreExpense')->name('store.expense');
    Route::get('manage/expense', 'ManageExpense')->name('manage.expense');
    Route::get('edit/expense/{id}', 'EditExpense')->name('edit.expense');
    Route::post('update/expense/{id}', 'UpdateExpense')->name('update.expense');
    Route::get('delete/expense/{id}', 'DeleteExpense')->name('delete.expense');
});
// -------------------------------- expense


// -------------------------------- Staf


Route::controller(StafController::class)->group(function () {
    Route::get('add/staf', 'AddStaf')->name('add.staf');
    Route::post('store/staf', 'StoreStaf')->name('store.staf');
    Route::get('manage/staf', 'ManageStaf')->name('manage.staf');
    Route::get('edit/staf/{id}', 'EditStaf')->name('edit.staf');
    Route::get('delete/staf/{id}', 'DeleteStaf')->name('delete.staf');
    Route::post('staf/update/{id}', 'UpdateStaf')->name('update.staf');
});

// -------------------------------- Staf


// -------------------------------- Report



Route::controller(ReportController::class)->group(function(){
    Route::get('/admin/all/reports', 'AdminAllReports')->name('admin.all.reports');
    Route::post('/admin/search/bydate', 'AdminSearchByDate')->name('admin.search.bydate');
    Route::post('/admin/search/bymonth', 'AdminSearchByMonth')->name('admin.search.bymonth');
    Route::post('/admin/search/byyear', 'AdminSearchByYear')->name('admin.search.byyear');
    Route::get('/all/invoice/{id}', 'AllInvoice')->name('all.invoice');
});

Route::controller(salaryController::class)->group(function() {
    Route::get('all/salary' , 'AllSalary')->name('all.salary');
    Route::get('add/salary', 'AddSalary')->name('add.salary');
    Route::post('store/salary', 'StoreSalary')->name('store.salary');
    Route::get('edit/salary/{id}', 'EditSalary')->name('edit.salary');
    Route::post('salary/update/{id}', 'UpdateSalary')->name('update.salary');
    Route::get('delete/salary/{id}', 'DeleteSalary')->name('delete.salary');

});
