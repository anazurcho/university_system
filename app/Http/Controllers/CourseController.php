<?php

namespace App\Http\Controllers;

use App\Http\Requests\course_requests\CourseRequest;
use App\Http\Requests\course_requests\CourseEditRequest;
use App\Models\Course;
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
        $student_shells = Auth::user()->student_shells()->paginate(10);
        return view('course/my_courses', compact('lectures', 'student_shells'));
    }

    public function create()
    {
        return view('course/create');
    }

    public function save(CourseRequest $request)
    {
        $course = new Course($request->all());
        $course->save();
        return redirect()->action([CourseController::class, 'index']);
    }

    public function course(Course $course)
    {
        $lectures = $course->lectures()->paginate(5);
        return view("course/course", compact('course', 'lectures'));
    }

    public function edit(Course $course)
    {
        return view("course/edit", compact('course'));
    }

    public function update(CourseEditRequest $request, Course $course)
    {
        $course->update($request->all());
        return redirect()->action([CourseController::class, 'index']);
    }

    public function delete(Course $course)
    {
        $course->delete();
        return redirect()->action([CourseController::class, 'index']);
    }
}
