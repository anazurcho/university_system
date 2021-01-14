<?php

namespace App\Http\Controllers;

use App\Http\Requests\course_requests\CourseRequest;
use App\Http\Requests\course_requests\CourseEditRequest;
use App\Models\Course;
use App\Models\CourseTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(10);
        return view('course/index', compact('courses'));
    }

    public function my_courses()
    {
        $lectures = Auth::user()->lecturer()->paginate(5);
        $student_scores = Auth::user()->student_scores()->paginate(10);
        return view('course/my_courses', compact('lectures', 'student_scores'));
    }

    public function create()
    {
        $course_tags = CourseTag::all();
        return view('course/create', compact('course_tags'));
    }

    public function save(CourseRequest $request)
    {
        $course = new Course($request->all());
        $course->save();
        $course->course_tags()->attach($request->course_tags);
        return redirect()->action([CourseController::class, 'index']);
    }

    public function course(Course $course)
    {
        $lectures = $course->lectures()->paginate(5);
        return view("course/course", compact('course', 'lectures'));
    }

    public function edit(Course $course)
    {
        $course_tags = CourseTag::all();
        return view("course/edit", compact('course', 'course_tags'));
    }

    public function update(CourseEditRequest $request, Course $course)
    {
        $course->update($request->all());
        $course->course_tags()->detach($course->course_tags->pluck('id'));
        $course->course_tags()->attach($request->course_tags);
        return redirect()->action([CourseController::class, 'index']);
    }

    public function delete(Course $course)
    {
        $course->delete();
        return redirect()->action([CourseController::class, 'index']);
    }
}
