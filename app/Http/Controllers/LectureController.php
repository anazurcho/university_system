<?php

namespace App\Http\Controllers;

use App\Http\Requests\lecture_requests\LectureRequest;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\StudentShell;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LectureController extends Controller
{
    public function index()
    {
        $lectures = Lecture::paginate(10);
        return view('lecture/index', compact('lectures'));
    }
    public function create()
    {
        $lecturers =  User::where("status", "lecturer")->get();
        $courses =  Course::all();
        return view('lecture/create', compact('lecturers', 'courses'));
    }
    public function save(LectureRequest  $request)
    {
        $lecture = new Lecture($request->all());
        $lecture->save();
        return redirect()->action([LectureController::class, 'index']);
    }

    public function edit(Lecture $lecture)
    {
        $lecturers =  User::where("status", "lecturer")->get();
        $courses =  Course::all();
        return view("lecture/edit", compact('lecture', 'lecturers', 'courses'));
    }
    public function open(Lecture $lecture)
    {
        $my_score = StudentShell::where(['lecture_id' => $lecture->id, 'user_id' => Auth::user()->id])->first();
        $student_shells = $lecture->student_shell()->paginate(5);
        return view("lecture/lecture", compact('lecture', 'student_shells', 'my_score'));
    }
    public function update(LectureRequest $request, Lecture $lecture)
    {
        $lecture->update($request->all());
        return redirect()->action([LectureController::class, 'index']);
    }

    public function delete(Lecture $lecture)
    {
        $lecture->delete();
        return redirect()->action([LectureController::class, 'index']);
    }
}
