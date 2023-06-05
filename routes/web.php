<?php

use App\Http\Controllers\Auth\SigninController;
use App\Http\Controllers\Auth\Teacher\RegisterController;
use App\Http\Controllers\Auth\Teacher\LogoutController;
use App\Http\Controllers\RegisterController as ControllersRegisterController;
use App\Http\Controllers\Student\AssessmentController as StudentAssessmentController;
use App\Http\Controllers\Student\ProfileController as StudentProfileController;
use App\Http\Controllers\Student\RegisterController as StudentRegisterController;
use App\Http\Controllers\Student\SubjectController as StudentSubjectController;
use App\Http\Controllers\Teacher\AssessmentController;
use App\Http\Controllers\Teacher\ClassController;
use App\Http\Controllers\Teacher\HomeController;
use App\Http\Controllers\Teacher\ProfileController;
use App\Http\Controllers\Teacher\SubjectController;
use App\Models\Classs;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
})->name('index');

Route::get('/tt', function () {
    $s  = Classs::all();

    return $s;
});

// Register
Route::get('/signup/student', [ControllersRegisterController::class, 'showStudentSignup'])->name('student.signup');
Route::get('/signup/teacher', [ControllersRegisterController::class, 'showSignup'])->name('teacher.signup');
Route::get('/signup', [ControllersRegisterController::class, 'showSignupOption'])->name('signup');
Route::post('/signup/teacher', [RegisterController::class, 'register'])->name('teacher.signup.create');
Route::post('/signup/student', [StudentRegisterController::class, 'register'])->name('student.signup.create');

// Login
Route::get('/signin', [SigninController::class, 'showLoginForm'])->name('signin');
Route::post('/signin', [SigninController::class, 'login'])->name('signin.login');

Route::post('/signin/student', [SigninController::class, 'studentlogin'])->name('signin.login.student');

Route::middleware('auth:teacher')->group(function () {

    // Signout
    Route::get('signout', [LogoutController::class, 'signOut'])->name('signout');
    Route::get('/homepage', [HomeController::class, 'showHomePage'])->name('homepage');

    // Assessment
    Route::get('/assessment/add', function () {
        return view('pages.assessment.assessment');
    })->name('assessment.add');

    Route::get('/assessment/subject/{subject?}/class/{class?}', [AssessmentController::class, 'showClassAssessment'])->name('assessment.view');
    Route::get('/assessment/subject/{subject?}/class/{class?}/add', [AssessmentController::class, 'showAddClassAssessment'])->name('assessment.class.add');
    Route::post('/assessment/subject/{subject?}/class/{class?}/add', [AssessmentController::class, 'addClassAssessment'])->name('assessment.class.adding');

    Route::get('/assessment/subject/{subject?}/class/{class?}/{assessment?}/submission', [AssessmentController::class, 'showSubmission'])->name('assessment.submission');
    Route::get('/assessment/subject/{subject?}/class/{class?}/{assessment?}/submission/{submission?}/grade', [AssessmentController::class, 'addGrade'])->name('assessment.addgrade');
    Route::post('/assessment/subject/{subject?}/class/{class?}/{assessment?}/submission/{submission?}/grade', [AssessmentController::class, 'grading'])->name('assessment.grading');
    // Route::get('/assessment/subject/{subject?}/class/{class?}/submission', [AssessmentController::class, 'showSubmission'])->name('assessment.submission');

    // Class
    Route::get('/class/list', [ClassController::class, 'showClass'])->name('class.list');
    Route::get('/class/add', [ClassController::class, 'showAddClass'])->name('class.add');
    Route::post('/class/add', [ClassController::class, 'addClass'])->name('class.adding');
    Route::get('/class/edit/{id}', [ClassController::class, 'showEdit'])->name('class.edit');
    Route::post('/class/edit/{id}', [ClassController::class, 'editclass'])->name('class.editing');
    Route::get('/class/detail/{id}', [ClassController::class, 'showDetail'])->name('class.detail');
    Route::get('/class/delete/{id}', [ClassController::class, 'delete'])->name('class.delete');
    Route::get('/class/myclass', [ClassController::class, 'showMyClass'])->name('class.myclass');
    Route::get('/class/myclass/add', [ClassController::class, 'showAddMyClass'])->name('class.myclass.add');
    Route::post('/class/myclass/add', [ClassController::class, 'addmyclass'])->name('class.myclass.adding');
    Route::get('/class/myclass/delete/{id}', [ClassController::class, 'deletemyclass'])->name('class.myclass.delete');


    // Subject
    Route::get('/subject/list', [SubjectController::class, 'showSubject'])->name('subject.list');
    Route::get('/subject/add', [SubjectController::class, 'showAddSubject'])->name('subject.add');
    Route::post('/subject/add', [SubjectController::class, 'addSubject'])->name('subject.add.post');
    Route::get('/subject/delete/{id}', [SubjectController::class, 'delete'])->name('subject.delete');
    Route::get('/subject/edit/{id}', [SubjectController::class, 'showEdit'])->name('subject.edit');
    Route::post('/subject/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit.post');
    Route::get('/subject/mysubject', [SubjectController::class, 'showmysubject'])->name('subject.mysubject');
    Route::get('/subject/mysubject/add', [SubjectController::class, 'showaddmysubject'])->name('subject.mysubject.add');
    Route::post('/subject/mysubject/add', [SubjectController::class, 'addmysubject'])->name('subject.mysubject.adding');
    Route::get('/subject/mysubject/delete/{id}', [SubjectController::class, 'deletemysubject'])->name('subject.mysubject.delete');
    Route::get('/subject/mysubject/detail/{id}', [SubjectController::class, 'showmysubjectdetail'])->name('subject.mysubject.detail');
    Route::get('/subject/mysubject/detail/{subject?}/{id?}', [SubjectController::class, 'deletemyclasssubject'])->name('subject.mysubject.class.delete');

    // User
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('user.profile');
    Route::get('/profile/edit', [ProfileController::class, 'showEditProfile'])->name('user.edit');
    Route::post('/profile/edit/{id}', [ProfileController::class, 'update'])->name('user.update');
});

// Student
Route::prefix('student')->middleware('auth:student')->group(function () {

    // Signout
    Route::get('signout', [LogoutController::class, 'signOut'])->name('student.signout');

    Route::get('/homepage', function () {
        return view('pages.student.homepage');
    })->name('student.home');

    // Assessment
    Route::get('/assessment/subject', [StudentAssessmentController::class, 'showSubjectAss'])->name('student.assessment.view');
    Route::get('/assessment/subject/{subject?}', [StudentAssessmentController::class, 'showAssessments'])->name('student.assessment.view.subject');
    Route::get('/assessment/subject/{subject?}/assessment/{assessment?}', [StudentAssessmentController::class, 'showSubmission'])->name('student.assessment.detail');
    Route::post('/assessment/subject/{subject?}/assessment/{assessment?}', [StudentAssessmentController::class, 'AssessmentSubmission'])->name('student.assessment.detail.post');

    // Subject
    Route::get('/subject', [StudentSubjectController::class, 'showSubject'])->name('student.subject.view');

    // Route::get('/subject/add', function () {
    //     return view('pages.student.subject.add');
    // })->name('student.subject.add');

    // Profile
    Route::get('/profile', [StudentProfileController::class, 'showProfile'])->name('student.profile');
    Route::get('/profile/edit', [StudentProfileController::class, 'showEditProfile'])->name('student.profile.edit');
    Route::post('/profile/edit', [StudentProfileController::class, 'edit'])->name('student.profile.editing');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
