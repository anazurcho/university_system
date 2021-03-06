<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\StudentScore;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function create(Lecture $lecture)
    {
        $student_scores = StudentScore::whereIn('lecture_id', $lecture)->pluck('user_id')->toArray();
        $students = User::whereIn('id', $student_scores)->pluck('email')->implode(',');
        return view('mail/create', compact('students', 'lecture'));
    }

    public function send(Lecture $lecture)
    {
        Mail::raw(request('text'), function ($message){
            $message -> to(explode(',', str_replace(' ', '', request('mail'))))
                    ->subject(request('subject'));
        });
        return redirect()->route('open.lecture', $lecture);
    }
    public function create_user(User $user)
    {
        $student = $user;
        return view('mail/create_user', compact('student'));
    }

    public function send_user(User $user)
    {
        Mail::raw(request('text'), function ($message){
            $message -> to(request('mail'))
                    ->subject(request('subject'));
        });
        return redirect()->route('open.user', $user);
    }
}
