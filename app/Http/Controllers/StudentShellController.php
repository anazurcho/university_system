<?php

namespace App\Http\Controllers;

use App\Http\Requests\studentshell_requests\StudentShellRequest;
use App\Models\Lecture;
use App\Models\StudentShell;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentShellController extends Controller
{
    //
    public function index()
    {
        $student_shells = StudentShell::paginate(10);
        return view('student_shell/index', compact('student_shells'));
    }
    public function my_student_shells()
    {
        $student_shells = StudentShell::where('user_id', Auth::user()->id);
        $avg = collect($student_shells->pluck('total_score')->toArray())->avg();
        $student_shells = $student_shells-> paginate(5);
        return view('student_shell/index', compact('student_shells', 'avg'));
    }
    public function create()
    {
        $students =  User::where("status", "student")->get();
        $lectures =  Lecture::all();
        return view('student_shell/create', compact('students', 'lectures'));
    }
    public function save(StudentShellRequest  $request)
    {
        $student_shell = new StudentShell($request->all());
        $student_shell->save();
        return redirect()->action([StudentShellController::class, 'index']);
    }
    public function choose(Request  $request)
    {
        $student_shell = new StudentShell($request->all());
        $student_shell->user_id = Auth::user()->id;
        $student_shell->total_score = 0;
        $student_shell->save();
        return redirect()->action([StudentShellController::class, 'index']);
    }
    public function change_score(Request  $request, StudentShell $student_shell)
    {
        $student_shell->total_score += abs(intval($request->total_score));
        $student_shell->save();
        return redirect()->back();
    }

}
