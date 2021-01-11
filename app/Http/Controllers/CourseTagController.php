<?php

namespace App\Http\Controllers;

use App\Http\Requests\course_tag_requests\CourseTagRequest;
use App\Models\CourseTag;

class CourseTagController extends Controller
{
    //
    public function index()
    {
        $course_tags = CourseTag::paginate(10);
        return view('course_tag/index', compact('course_tags'));
    }
    public function create()
    {
        return view('course_tag/create');
    }
    public function save(CourseTagRequest $request)
    {
        $course_tag = new CourseTag($request->all());
        $course_tag->save();
        return redirect()->action([CourseTagController::class, 'index']);
    }
    public function course_tag(CourseTag $course_tag)
    {
        $courses = $course_tag->courses()->paginate(5);
        return view("course_tag/course_tag", compact('course_tag', 'courses'));
    }
}
