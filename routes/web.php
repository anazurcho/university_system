<?php

use App\Http\Controllers\CourseTagController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentShellController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',
    function () {
        if (Auth::user()) {
            return redirect()->action([UserController::class, 'my_profile']);
        } else {
        return view('user.login');
        }
    })->name('welcome');
Route::get('/login',function () { return view('user.login'); })->name('login');
Route::post('/post-login', [UserController::class, 'postLogin'])->name('post_login');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/post-register', [UserController::class, 'postRegister'])->name('post_register');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/about',function () { return view('about'); })->name('about');


Route::middleware(['edit.password'])->group(function () {

    Route::put('/users/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{user}/password_edit', [UserController::class, 'password_edit'])->name('password_edit');
    Route::put('/users/{user}/password_update', [UserController::class, 'password_update'])->name('password_update');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users/create_user', [UserController::class, 'user_create'])->name('create.user');
    Route::post('/users/save_user', [UserController::class, 'user_save'])->name('save.user');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/my_students', [UserController::class, 'my_students'])->name('my_students');
    Route::get('/users', [UserController::class, 'index'])->name('all_users');
    Route::get('/users/my_profile', [UserController::class, 'my_profile'])->name('my_profile');
    Route::get('/users/{user}', [UserController::class, 'open'])->name('open.user');

    Route::get('/lectures', [LectureController::class, 'index'])->name('all_lectures');
    Route::get('/lectures/create', [LectureController::class, 'create'])->name('create.lecture');
    Route::post('/lectures/save', [LectureController::class, 'save'])->name('save.lecture');
    Route::get('/lectures/{lecture}/edit', [LectureController::class, 'edit'])->name('edit.lecture');
    Route::get('/lectures/{lecture}', [LectureController::class, 'open'])->name('open.lecture');
    Route::put('/lectures/{lecture}/update', [LectureController::class, 'update'])->name('update.lecture');
    Route::delete('/lectures/{lecture}/delete', [LectureController::class, 'delete'])->name('delete.lecture');


    Route::get('/courses', [CourseController::class, 'index'])->name('all_courses');
    Route::get('/my_courses', [CourseController::class, 'my_courses'])->name('my_courses');
    Route::get('/courses/{course}', [CourseController::class, 'course'])->name('course');
    Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('/courses/save', [CourseController::class, 'save'])->name('save.course');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('edit.course');
    Route::put('/courses/{course}/update', [CourseController::class, 'update'])->name('update.course');
    Route::delete('/courses/{course}/delete', [CourseController::class, 'delete'])->name('delete.course');


    Route::get('/student_shells', [StudentShellController::class, 'index'])->name('all_student_shells');
    Route::get('/my_student_shells', [StudentShellController::class, 'my_student_shells'])->name('my_student_shells');
    Route::get('/student_shells/create', [StudentShellController::class, 'create'])->name('create.student_shell');
    Route::post('/student_shells/save', [StudentShellController::class, 'save'])->name('save.student_shell');
    Route::post('/student_shells/choose', [StudentShellController::class, 'choose'])->name('choose.student_shell');
    Route::put('/student_shells/{student_shell}/change_score', [StudentShellController::class, 'change_score'])->name('change_score.student_shell');


    Route::get('/schedules', [ScheduleController::class, 'index'])->name('all_schedules');
    Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('create.schedule');
    Route::post('/schedules/save', [ScheduleController::class, 'save'])->name('save.schedule');

    Route::get('/course_tags', [CourseTagController::class, 'index'])->name('all_course_tags');
    Route::get('/course_tags/create', [CourseTagController::class, 'create'])->name('create.course_tag');
    Route::post('/course_tags/save', [CourseTagController::class, 'save'])->name('save.course_tag');
    Route::get('/course_tags/{course_tag}', [CourseTagController::class, 'course_tag'])->name('course_tag');

    Route::get('/mail/create/{lecture}', [MailController::class, 'create'])->name('mail.create');
    Route::post('/mail/send/{lecture}', [MailController::class, 'send'])->name('mail.send');
    Route::get('/mail/create_user/{user}', [MailController::class, 'create_user'])->name('mail.create_user');
    Route::post('/mail/send_user/{user}', [MailController::class, 'send_user'])->name('mail.send_user');


});


//Route::get('/my_students', [UserController::class, 'my_students'])->name('my_students')->middleware('auth');
//Route::get('/users', [UserController::class, 'index'])->name('all_users')->middleware('auth');
//Route::get('/users/my_profile', [UserController::class, 'my_profile'])->name('my_profile')->middleware('auth');
//Route::get('/users/{user}', [UserController::class, 'open'])->name('open.user')->middleware('auth');
//Route::put('/users/{user}/update', [UserController::class, 'update'])->name('users.update')->middleware('edit.password');
//Route::get('/users/{user}/password_edit', [UserController::class, 'password_edit'])->name('password_edit')->middleware('edit.password');
//Route::put('/users/{user}/password_update', [UserController::class, 'password_update'])->name('password_update')->middleware('edit.password');
//Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('edit.password');


//Route::get('/lectures', [LectureController::class, 'index'])->name('all_lectures')->middleware('auth');
//Route::get('/lectures/create', [LectureController::class, 'create'])->name('create.lecture')->middleware('auth');
//Route::post('/lectures/save', [LectureController::class, 'save'])->name('save.lecture')->middleware('auth');
//Route::get('/lectures/{lecture}/edit', [LectureController::class, 'edit'])->name('edit.lecture')->middleware('auth');
//Route::get('/lectures/{lecture}', [LectureController::class, 'open'])->name('open.lecture')->middleware('auth');
//Route::put('/lectures/{lecture}/update', [LectureController::class, 'update'])->name('update.lecture')->middleware('auth');
//Route::delete('/lectures/{lecture}/delete', [LectureController::class, 'delete'])->name('delete.lecture')->middleware('auth');

//Route::get('/courses', [CourseController::class, 'index'])->name('all_courses')->middleware('auth');
//Route::get('/my_courses', [CourseController::class, 'my_courses'])->name('my_courses')->middleware('auth');
//Route::get('/courses/{course}', [CourseController::class, 'course'])->name('course')->middleware('auth');
//Route::get('/course/create', [CourseController::class, 'create'])->name('course.create')->middleware('auth');
//Route::post('/courses/save', [CourseController::class, 'save'])->name('save.course')->middleware('auth');
//Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('edit.course')->middleware('auth');
//Route::put('/courses/{course}/update', [CourseController::class, 'update'])->name('update.course')->middleware('auth');
//Route::delete('/courses/{course}/delete', [CourseController::class, 'delete'])->name('delete.course')->middleware('auth');


//Route::get('/student_shells', [StudentShellController::class, 'index'])->name('all_student_shells')->middleware('auth');
//Route::get('/my_student_shells', [StudentShellController::class, 'my_student_shells'])->name('my_student_shells')->middleware('auth');
//Route::get('/student_shells/create', [StudentShellController::class, 'create'])->name('create.student_shell')->middleware('auth');
//Route::post('/student_shells/save', [StudentShellController::class, 'save'])->name('save.student_shell')->middleware('auth');
//Route::post('/student_shells/choose', [StudentShellController::class, 'choose'])->name('choose.student_shell')->middleware('auth');
//Route::put('/student_shells/{student_shell}/change_score', [StudentShellController::class, 'change_score'])->name('change_score.student_shell')->middleware('auth');

//Route::get('/schedules', [ScheduleController::class, 'index'])->name('all_schedules')->middleware('auth');
//Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('create.schedule')->middleware('auth');
//Route::post('/schedules/save', [ScheduleController::class, 'save'])->name('save.schedule')->middleware('auth');
