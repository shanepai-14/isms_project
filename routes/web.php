<?php

use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'checkRole:admin'], function () {
    // Define routes accessible to admin
    route::get('post',[HomeController::class,'post']);
});

Route::group(['middleware' => 'checkRole:student'], function () {
    // Define routes accessible to students
    Route::get('/student/profile/{profileUuid}', [StudentController::class, 'showStudentProfile'])->name('student.profile');
    Route::get('/student/home', [StudentController::class, 'showStudentHome']);
    Route::get('/student/enrollment', [StudentController::class, 'showStudentEnrollment'])->name('student.enrollment');
    Route::get('/student/enrollmentlist', [EnrollmentController::class, 'populateEnrollmentTable'])->name('student.enrollmentlist');
    Route::get('/student/createprofile', [StudentController::class, 'showStudentProfileCreate'])->name('student.createprofile');
    Route::post('/storeStudentProfile', [StudentController::class, 'storeStudentProfile'])->name('storeStudentProfile');
    Route::put('/student/update/{profileUuid}', [StudentController::class, 'updateStudentProfile'])->name('student.profileupdate');
    Route::get('/student/courses', [CourseController::class, 'create'])->name('student.courses');
    Route::post('/', [CourseController::class, 'storeCourse'])->name('storeCourses');
    Route::get('/get-subjects', [CourseController::class, 'getSubjects'])->name('get.subjects');
    Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('student.enroll');
    Route::get('/getClassesId', [EnrollmentController::class, 'populateClassesTable'])->name('getClassesId');
    Route::get('/search', [EnrollmentController::class, 'StudentSearch'])->name('search');
});

Route::group(['middleware' => 'checkRole:registrar'], function () {
    // Define routes accessible to registrar
});

Route::group(['middleware' => 'checkRole:assessor'], function () {
    // Define routes accessible to assessor
});
Route::group(['middleware' => 'checkRole:teacher'], function () {
    // Define routes accessible to teacher
});

route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
