<?php

use App\Http\Controllers\CourseTagController;
use App\Http\Controllers\HWController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostTagController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentScoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\CourseController;
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
    Route::delete('/users/{user}/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::get('/users/{user}/upload_image', [UserController::class, 'upload_image'])->name('users.upload_image');
    Route::put('/users/{user}/save_image', [UserController::class, 'save_image'])->name('users.save_image');
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

    Route::get('/student_scores', [StudentScoreController::class, 'index'])->name('all_student_scores');
    Route::get('/my_student_scores', [StudentScoreController::class, 'my_student_scores'])->name('my_student_scores');
    Route::get('/student_scores/create', [StudentScoreController::class, 'create'])->name('create.student_score');
    Route::post('/student_scores/save', [StudentScoreController::class, 'save'])->name('save.student_score');
    Route::post('/student_scores/choose', [StudentScoreController::class, 'choose'])->name('choose.student_score');
    Route::put('/student_scores/{student_score}/change_score', [StudentScoreController::class, 'change_score'])->name('change_score.student_score');

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

    Route::get('/posts', [PostController::class, 'index'])->name('posts.all');
    Route::get('/my_posts', [PostController::class, 'my_posts'])->name('my_posts');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/save', [PostController::class, 'save'])->name('posts.save');
    Route::get('/posts/{post}', [PostController::class, 'post'])->name('post');
    Route::delete('/posts/{post}/delete', [PostController::class, 'delete'])->name('posts.delete');
    Route::put('/posts/{post}/approved', [PostController::class, 'approved'])->name('approved');
    Route::put('/posts/{post}/like', [PostController::class, 'like'])->name('like');

    Route::get('/post_tags', [PostTagController::class, 'index'])->name('post_tags.all');
    Route::post('/post_tags/save', [PostTagController::class, 'save'])->name('post_tags.save');
    Route::delete('/post_tags/{post_tag}/delete', [PostTagController::class, 'delete'])->name('post_tags.delete');
    Route::get('/post_tags/{post_tag}', [PostTagController::class, 'post_tag'])->name('post_tag');

    Route::post('/post_comments/{post}', [PostCommentController::class, 'save'])->name('post_comments.save');

    Route::get('/hws/lecture/{lecture}', [HWController::class, 'index'])->name('hws.open');
    Route::get('/hws/{lecture}/create', [HWController::class, 'create'])->name('hws.create');
    Route::post('/hws/{lecture}/save', [HWController::class, 'save'])->name('hws.save');
    Route::get('/hws/hw/{hw}', [HWController::class, 'hw'])->name('hw.open');
    Route::get('/hws/file/{hw}', [HWController::class, 'hw_file'])->name('hw.file');

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
//Route::get('/student_shells/create', [StudentShellController::class, 'create'])->name('create.student_score')->middleware('auth');
//Route::post('/student_shells/save', [StudentShellController::class, 'save'])->name('save.student_score')->middleware('auth');
//Route::post('/student_shells/choose', [StudentShellController::class, 'choose'])->name('choose.student_score')->middleware('auth');
//Route::put('/student_shells/{student_score}/change_score', [StudentShellController::class, 'change_score'])->name('change_score.student_score')->middleware('auth');

//Route::get('/schedules', [ScheduleController::class, 'index'])->name('all_schedules')->middleware('auth');
//Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('create.schedule')->middleware('auth');
//Route::post('/schedules/save', [ScheduleController::class, 'save'])->name('save.schedule')->middleware('auth');
