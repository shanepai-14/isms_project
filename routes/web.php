<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherSeniorHighController;
use App\Http\Controllers\RegistrarController;

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


route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');
Route::group(['middleware' => 'checkRole:admin'], function () {
    // Define routes accessible to admin
    route::get('post',[HomeController::class,'post']);
    route::get('/admin/home',[AdminController::class,'index'])->middleware('auth')->name('adminhome');
    Route::post('/storeAdminProfile', [AdminController::class, 'storeAdminProfile'])->name('storeAdminProfile');
    Route::get('/admin/createprofile', [AdminController::class, 'showAdminProfileCreate'])->name('admin.createprofile');
    Route::get('/admin/profile/{profileUuid}', [AdminController::class, 'showAdminProfile'])->name('admin.profile');
    Route::put('/admin/update/{profileUuid}', [AdminController::class, 'updateAdminProfile'])->name('admin.profileupdate');
    Route::get('/admin/enrollment', [AdminController::class, 'showAdminEnrollment'])->name('student.enrollment');
    Route::get('/admin/enrollmentlist', [EnrollmentController::class, 'AdminPopulateEnrollmentTable'])->name('admin.enrollmentlist');
    Route::get('/getClassesIdAdmin', [EnrollmentController::class, 'AdminPopulateClassesTable'])->name('getClassesIdAdmin');
    Route::get('/getStudentAccount', [EnrollmentController::class, 'populateStudentAccount'])->name('getStudentAccount');
    Route::get('/AdminSearch', [EnrollmentController::class, 'AllStudentSearch'])->name('AdminSearch');
    Route::get('/AdminStudentAccountSearch', [AdminController::class, 'AllStudentAccountSearch'])->name('AdminStudentAccountSearch');
    Route::get('/admin/student-acounts', [AdminController::class, 'showAdminStudentAccountList'])->name('AdminStudentAccounts');
    Route::post('/update-student-account-status', [AdminController::class, 'updateStudentAccountStatus'])->name('update-student-account-status');
    Route::get('/admin/student-management/{job_order}', [AdminController::class, 'showAdminStudentManagement'])->name('admin.studentmanagement');
    Route::post('/storePayment', [AdminController::class, 'StorePayment'])->name('storePayment');
    Route::get('/get-subjects-management', [CourseController::class, 'getSubjects'])->name('get.subjects-management');
    
    Route::post('/AddingStudentSubjects', [EnrollmentController::class, 'AddingStudentSubjects'])->name('AddingStudentSubjects');
    Route::post('/updateStudentSubjectStatusRow', [EnrollmentController::class, 'updateStudentSubjectStatusRow'])->name('updateStudentSubjectStatusRow');

    Route::post('/updateStudentSubjectGradeRow', [EnrollmentController::class, 'updateStudentSubjectGradeRow'])->name('updateStudentSubjectGradeRow');
    Route::post('/createcollegecourseadmin', [CourseController::class, 'storeCourseCollegeAdmin'])->name('store.collegecourse');
    Route::get('admin/college-course/create', [AdminController::class, 'showCollegeCreateCourse'])->name('admin.collegecourses');

    Route::post('/admin/createseniorhighcourse', [CourseController::class, 'storeCourseSeniorHighAdmin'])->name('store.seniorhighcourses');
    Route::get('admin/senior-high-course/create', [AdminController::class, 'showCollegeSeniorCourse'])->name('admin.seniorhighcourses');
    Route::get('admin/Student-Information/{enrollment_type}', [AdminController::class, 'ShowStudentInfoCollege'])->name('admin.studentinfocollege');
    
    Route::get('/SearchStudentInfoCollege', [AdminController::class, 'SearchStudentInfoCollege'])->name('admin.SearchStudentInfoCollege');

    Route::post('/updateStudentPayment', [EnrollmentController::class, 'updateStudentPayment'])->name('updateStudentPayment');
    Route::post('/updateScholarShip', [EnrollmentController::class, 'updateScholarShip'])->name('updateScholarShip');

    Route::get('/admin/student-management/{job_order}/{enrollment_status}', [AdminController::class, 'updateEnrollmentStatus'])->name('admin.studentmanagementenrollmentstatus');

    Route::get('/admin/miscellaneous', [AdminController::class, 'showMiscellaneousFee'])->name('adminMiscellaneous');
    Route::post('/admin/store-misc', [MiscellaneousController::class, 'CreateMisc'])->name('storeMisc');
    
    Route::post('registerEmployee', [AdminController::class, 'storeEmployees'])->name('storeEmployees');
    Route::post('addUser', [AdminController::class, 'storeEmployees'])->name('addUser');
    Route::get('/admin/addEmployee', [AdminController::class, 'showEmployeeCreate'])->name('showEmployeeCreate');
    
    Route::get('/admin/ClassSchedule/{enrollment_type}/{course}/{school_year}', [ScheduleController::class, 'ShowSchedule'])->name('ShowSchedule');

    Route::get('/admin/ClassScheduleV2/{role}/{enrollment_type}/{course}/{school_year}', [ScheduleController::class, 'ShowScheduleV2'])->name('ShowScheduleV2');

    
    Route::post('/updateSchedule', [ScheduleController::class, 'updateSchedule'])->name('updateSchedule');
    Route::post('/CreateSchedule', [ScheduleController::class, 'CreateSchedule'])->name('CreateSchedule');
   
    Route::post('/UpdateExistingSchedule', [ScheduleController::class, 'updateExistingSchedule'])->name('updateExistingSchedule');

    Route::get('/admin/student-details/{enrollment_type}/{student_id_number}', [AdminController::class, 'showStudentDetails'])->name('showStudentDetails');
    Route::get('/admin/transaction-history', [AdminController::class, 'showAdminPayments'])->name('showAdminPayments');
    Route::get('/admin-search-transaction-history', [AdminController::class, 'SearchTransaction'])->name('admin-search-transaction-history');
    Route::get('/admin-update-fee', [AdminController::class, 'ViewMiscfees'])->name('admin-update-fee');
});

Route::group(['middleware' => 'checkRole:student'], function () {
    // Define routes accessible to students
    route::get('/student/unathorized',[StudentController::class,'studentUnauthorized'])->middleware('auth')->name('student.Unauthorized');
    Route::post('/storeStudentProfile', [StudentController::class, 'storeStudentProfile'])->name('storeStudentProfile');
    Route::get('/student/createprofile', [StudentController::class, 'showStudentProfileCreate'])->name('student.createprofile');
 
    Route::middleware('checkProfileStatus')->group(function () {
        Route::get('/student/profile/{profileUuid}', [StudentController::class, 'showStudentProfile'])->name('student.profile');
        Route::get('/student/home', [StudentController::class, 'showStudentHome'])->name('showStudentHome');;
        Route::get('/student/enrollment', [StudentController::class, 'showStudentEnrollment'])->name('student.enrollment');
        Route::get('/student/enrollmentlist', [EnrollmentController::class, 'populateEnrollmentTable'])->name('student.enrollmentlist');
        Route::put('/student/update/{profileUuid}', [StudentController::class, 'updateStudentProfile'])->name('student.profileupdate');
        Route::get('/student/courses', [CourseController::class, 'create'])->name('student.courses');
        Route::post('/', [CourseController::class, 'storeCourse'])->name('storeCourses');
        Route::get('/get-subjects', [CourseController::class, 'getSubjects'])->name('get.subjects');
        Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('student.enroll');
        Route::get('/getClassesId', [EnrollmentController::class, 'populateClassesTable'])->name('getClassesId');
        Route::get('/search', [EnrollmentController::class, 'StudentSearch'])->name('search');
        Route::get('/student/student-management/{job_order}', [AdminController::class, 'showAdminStudentManagement'])->name('student.studentmanagement');
        Route::get('/student/student-details/{enrollment_type}/{student_id_number}', [AdminController::class, 'showStudentDetails'])->name('showCurrentStudentDetails');
    });
});

Route::group(['middleware' => 'checkRole:registrar'], function () {
    
    route::get('/registrar/home',[RegistrarController::class,'index'])->middleware('auth')->name('registrarhome');
    Route::post('/storeRegistrarProfile', [RegistrarController::class, 'storeRegistrarProfile'])->name('storeRegistrarProfile');
    Route::get('/registrar/createprofile', [RegistrarController::class, 'showRegistrarProfileCreate'])->name('registrar.createprofile');
    Route::get('/registrar/profile/{profileUuid}', [RegistrarController::class, 'showAdminProfile'])->name('registrar.profile');
    Route::put('/registrar/update/{profileUuid}', [RegistrarController::class, 'updateRegistrarProfile'])->name('registrar.profileupdate');
    // Route::get('/registrar/enrollment', [RegistrarController::class, 'showAdminEnrollment'])->name('student.enrollment');
    Route::get('/registrar/enrollmentlist', [EnrollmentController::class, 'RegistrarPopulateEnrollmentTable'])->name('registrar.enrollmentlist');
    Route::get('/getClassesIdRegistrar', [EnrollmentController::class, 'AdminPopulateClassesTable'])->name('getClassesIdRegistrar');
    Route::get('/getRegistrarStudentAccount', [EnrollmentController::class, 'populateStudentAccount'])->name('getRegistrarStudentAccount');
    Route::get('/RegistrarSearch', [EnrollmentController::class, 'AllStudentSearch'])->name('RegistrarSearch');
    Route::get('/RegistrarStudentAccountSearch', [RegistrarController::class, 'AllStudentAccountSearch'])->name('RegistrarStudentAccountSearch');
    Route::get('/registrar/student-acounts', [RegistrarController::class, 'showRegistrarStudentAccountList'])->name('RegistrarStudentAccounts');
    Route::post('/registrar-update-student-account-status', [RegistrarController::class, 'updateStudentAccountStatus'])->name('registrar-update-student-account-status');
    Route::get('/registrar/student-management/{job_order}', [RegistrarController::class, 'showAdminStudentManagement'])->name('registrar.studentmanagement');
    Route::post('/storeRegistrarPayment', [RegistrarController::class, 'StorePayment'])->name('storeRegistrarPayment');
    Route::get('/get-subjects-management-registrar', [CourseController::class, 'getSubjects'])->name('get.subjects-management-registrar');
    
    Route::post('/AddingStudentSubjects-registrar', [EnrollmentController::class, 'AddingStudentSubjects'])->name('AddingStudentSubjects-registrar');
    Route::post('/updateRegistrarStudentSubjectStatusRow', [EnrollmentController::class, 'updateStudentSubjectStatusRow'])->name('updateRegistrarStudentSubjectStatusRow');

    Route::post('/updateRegistrarStudentSubjectGradeRow', [EnrollmentController::class, 'updateStudentSubjectGradeRow'])->name('updateRegistrarStudentSubjectGradeRow');
    Route::post('/createcollegecourseregistrar', [CourseController::class, 'storeCourseCollegeRegistrar'])->name('store.collegecourseregistrar');
    Route::get('registrar/college-course/create', [RegistrarController::class, 'showCollegeCreateCourse'])->name('registrar.collegecourses');

    Route::post('/createseniorhighcourseregistrar', [CourseController::class, 'storeCourseSeniorHighRegistrar'])->name('store.seniorhighcoursesregistrar');
    Route::get('registrar/senior-high-course/create', [RegistrarController::class, 'showCollegeSeniorCourse'])->name('registrar.seniorhighcourses');
    Route::get('registrar/Student-Information/{enrollment_type}', [RegistrarController::class, 'ShowStudentInfoCollege'])->name('registrar.studentinfocollege');
    
    Route::get('/SearchRegistrarStudentInfoCollege', [RegistrarController::class, 'SearchStudentInfoCollege'])->name('registrar.SearchRegistrarStudentInfoCollege');

    Route::post('/updateRegistrarStudentPayment', [EnrollmentController::class, 'updateStudentPayment'])->name('updateRegistrarStudentPayment');
    Route::post('/updateScholarShipRegistrar', [EnrollmentController::class, 'updateScholarShip'])->name('updateScholarShipRegistrar');

    Route::get('/registrar/student-management/{job_order}/{enrollment_status}', [AdminController::class, 'updateEnrollmentStatus'])->name('registrar.studentmanagementenrollmentstatus');

    Route::get('/registrar/miscellaneous', [RegistrarController::class, 'showMiscellaneousFee'])->name('registrarMiscellaneous');
    Route::post('/registrar/store-misc', [MiscellaneousController::class, 'RegistrarCreateMisc'])->name('registrarstoreMisc');
    
    Route::post('/storeRegistrarEmployees', [RegistrarController::class, 'storeRegistrarEmployees'])->name('storeRegistrarEmployees');

    Route::get('/registrar/add-registrarstaff', [RegistrarController::class, 'showEmployeeCreate'])->name('RegistrarshowEmployeeCreate');
    
    Route::get('/registrar/ClassSchedule/{enrollment_type}/{course}/{school_year}', [ScheduleController::class, 'ShowSchedule'])->name('ShowSchedule');

    Route::get('/registrar/ClassScheduleV2/{role}/{enrollment_type}/{course}/{school_year}', [ScheduleController::class, 'ShowScheduleV2'])->name('ShowRegistrarScheduleV2');

    
    Route::post('/updateSchedule', [ScheduleController::class, 'updateSchedule'])->name('updateSchedule');
    Route::post('/CreateSchedule', [ScheduleController::class, 'CreateSchedule'])->name('CreateSchedule');
   
    Route::post('/UpdateExistingSchedule', [ScheduleController::class, 'updateExistingSchedule'])->name('updateExistingSchedule');

    Route::get('/registrar/student-details/{enrollment_type}/{student_id_number}', [RegistrarController::class, 'showStudentDetails'])->name('showRegistrarStudentDetails');
    Route::get('/registrar/transaction-history', [RegistrarController::class, 'showRegistrarPayments'])->name('showRegistrarPayments');
    Route::get('/registrar-search-transaction-history', [AdminController::class, 'SearchTransaction'])->name('registrar-search-transaction-history');




});

Route::group(['middleware' => 'checkRole:teacherseniorhigh'], function () {

    Route::get('/teacher/seniorhigh/createprofile', [TeacherSeniorHighController::class, 'showTeacherSeniorHighProfileCreate'])->name('teacherseniorhigh.createprofile'); //done

    Route::post('/storeEmployeeProfileSeniorHigh', [AdminController::class, 'storeAdminProfile'])->name('storeEmployeeProfileSeniorHigh');//done

    route::get('/teacher/seniorhigh/home',[TeacherSeniorHighController::class,'indexteacherseniorhigh'])->middleware('auth')->name('teacherseniorhighhome');//done

    Route::get('/teacher/seniorhigh/profile/{profileUuid}', [TeacherSeniorHighController::class, 'showTeacherSeniorHighProfile'])->name('employeeseniorhigh.profile');//done

    route::get('/teacher/seniorhigh/subjects/{semester}/{school_year}',[TeacherSeniorHighController::class,'ShowTeacherSubjects'])->middleware('auth')->name('teacherseniorhighsubjects');//done

    Route::get('/teacher/seniorhigh/student-management/{job_order}', [TeacherSeniorHighController::class, 'showTeacherSeniorHighStudentManagement'])->name('teacherseniorhigh.studentmanagement'); //done

    route::get('/teacher/seniorhigh/class/{course_id}/{semester}/{department}/{school_year}',[TeacherSeniorHighController::class,'ShowTeacherSubjectClass'])->middleware('auth')->name('teachershssubjectclass');//done
    
    Route::post('/updateSeniorHighStudentSubjectStatusRow', [EnrollmentController::class, 'updateStudentSubjectStatusRow'])->name('updateSeniorHighStudentSubjectStatusRow');

    Route::post('/updateSeniorHighStudentSubjectGradeRow', [EnrollmentController::class, 'updateStudentSubjectGradeRow'])->name('updateStudentSeniorHighSubjectGradeRow');
    Route::get('/teacher/seniorhigh/ClassScheduleV2/{role}/{enrollment_type}/{course}/{school_year}', [ScheduleController::class, 'ShowScheduleV2'])->name('TeacherSeniorHighShowScheduleV2');
    Route::get('/teacher/seniorhigh/employee', [TeacherSeniorHighController::class, 'ShowTeacherEmployee'])->name('ShowTeacherSeniorHighEmployee');
    Route::post('registerEmployeeSeniorHigh', [TeacherController::class, 'TeacherStoreEmployee'])->name('TeacherSeniorHighstoreEmployee');
    Route::post('/TeacherSeniorHighUpdateExistingSchedule', [ScheduleController::class, 'updateExistingSchedule'])->name('TeacherSeniorHighupdateExistingSchedule');
    Route::post('/Teacher/seniorhigh/CreateSchedule', [ScheduleController::class, 'CreateSchedule'])->name('TeacherSeniorHighCreateSchedule');
    Route::get('Teacher/seniorhigh/Student-Information', [TeacherSeniorHighController::class, 'ShowStudentSeniorHighbyDepartment'])->name('teacherseniorhigh.studentlistbydepartment');

    Route::get('/TeacherSearchStudentInfoSeniorHigh', [TeacherSeniorHighController::class, 'SearchStudentInfoSeniorHigh'])->name('Teacher.SearchStudentInfoSeniorHigh');
    Route::get('/teacher/seniorhigh/student-details/{enrollment_type}/{student_id_number}', [AdminController::class, 'showStudentDetails'])->name('TeacherSeniorHighshowCurrentStudentDetails');
});
Route::group(['middleware' => 'checkRole:teachercollege'], function () {
    Route::get('/teacher/createprofile', [AdminController::class, 'showAdminProfileCreate'])->name('teacher.createprofile');
    Route::post('/storeEmployeeProfile', [AdminController::class, 'storeAdminProfile'])->name('storeEmployeeProfile');
    route::get('/teacher/home',[AdminController::class,'indexteacher'])->middleware('auth')->name('teacherhome');
    Route::get('/teacher/profile/{profileUuid}', [AdminController::class, 'showEmployeeProfile'])->name('employee.profile');
    route::get('/teacher/subjects/{semester}/{school_year}',[TeacherController::class,'ShowTeacherSubjects'])->middleware('auth')->name('teachersubjects');
    Route::get('/teacher/student-management/{job_order}', [AdminController::class, 'showAdminStudentManagement'])->name('teacher.studentmanagement');
    route::get('/teacher/class/{course_id}/{semester}/{department}/{school_year}',[TeacherController::class,'ShowTeacherSubjectClass'])->middleware('auth')->name('teachersubjectclass');
    Route::post('/TeacherupdateStudentSubjectStatusRow', [EnrollmentController::class, 'updateStudentSubjectStatusRow'])->name('TeacherupdateStudentSubjectStatusRow');
    Route::post('/updateStudentSubjectGradeRow', [EnrollmentController::class, 'updateStudentSubjectGradeRow'])->name('updateStudentSubjectGradeRow');
    Route::get('/teacher/ClassScheduleV2/{role}/{enrollment_type}/{course}/{school_year}', [ScheduleController::class, 'ShowScheduleV2'])->name('TeacherShowScheduleV2');
    Route::get('/teacher/employee', [TeacherController::class, 'ShowTeacherEmployee'])->name('ShowTeacherEmployee');
    Route::post('registerEmployee', [TeacherController::class, 'TeacherStoreEmployee'])->name('TeacherstoreEmployee');
    Route::post('/TeacherUpdateExistingSchedule', [ScheduleController::class, 'updateExistingSchedule'])->name('TeacherupdateExistingSchedule');
    Route::post('/TeacherCreateSchedule', [ScheduleController::class, 'CreateSchedule'])->name('TeacherCreateSchedule');
    Route::get('Teacher/Student-Information/{enrollment_type}', [TeacherController::class, 'ShowStudentCollegebyDepartment'])->name('teacher.studentlistbydepartment');

    Route::get('/TeacherSearchStudentInfoCollege', [AdminController::class, 'SearchStudentInfoCollege'])->name('Teacher.SearchStudentInfoCollege');
    Route::get('/teacher/student-details/{enrollment_type}/{student_id_number}', [AdminController::class, 'showStudentDetails'])->name('TeachershowCurrentStudentDetails');
});






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
