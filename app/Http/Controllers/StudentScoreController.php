<?php

namespace App\Http\Controllers;

use App\Http\Requests\student_score_requests\StudentScoreRequest;
use App\Models\Lecture;
use App\Models\StudentScore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentScoreController extends Controller
{
    //
    public function index()
    {
        $student_scores = StudentScore::paginate(10);
        return view('student_score/index', compact('student_scores'));
    }
    public function my_student_scores()
    {
        $this->authorize('student');
        $student_scores = StudentScore::where('user_id', Auth::user()->id);
        $avg = collect($student_scores->pluck('total_score')->toArray())->avg();
        $student_scores = $student_scores-> paginate(5);
        return view('student_score/index', compact('student_scores', 'avg'));
    }
    public function create()
    {
        $students =  User::where("status", "student")->get();
        $lectures =  Lecture::all();
        return view('student_score/create', compact('students', 'lectures'));
    }
    public function save(StudentScoreRequest  $request)
    {
        $student_score = new StudentScore($request->all());
        $student_score->save();
        return redirect()->action([StudentScoreController::class, 'index']);
    }
    public function choose(Request  $request)
    {
        $student_score = new StudentScore($request->all());
        $student_score->user_id = Auth::user()->id;
        $student_score->total_score = 0;
        $student_score->save();
        return redirect()->action([StudentScoreController::class, 'index']);
    }
    public function change_score(Request  $request, StudentScore $student_score)
    {
        $this->authorize('lecturer');
        $student_score->total_score += abs(intval($request->total_score));
        $student_score->save();
        return redirect()->back();
    }
}
