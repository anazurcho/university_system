<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Models\Lecture;
use App\Models\StudentShell;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function create(Lecture $lecture)
    {
        $student_shells = StudentShell::whereIn('lecture_id', $lecture)->pluck('user_id')->toArray();
        $students = User::whereIn('id', $student_shells)->pluck('email')->implode(',');
        return view('mail/create', compact('students', 'lecture'));
    }

    public function send(MailRequest $request)
    {

        Mail::raw($request->text, function ($message){
            $message -> to(explode(',', str_replace(' ', '', request('mail'))))
            ->subject("Lecture #" . request('lecture')  . "  #" . request('subject') . " :)");
        });
        return redirect()->back();
    }
}
