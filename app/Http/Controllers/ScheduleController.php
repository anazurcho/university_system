<?php

namespace App\Http\Controllers;

use App\Http\Requests\schedule_requests\ScheduleRequest;
use App\Models\Lecture;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::paginate(10);
        return view('schedule/index', compact('schedules'));
    }
    public function create()
    {
        $lectures =  Lecture::all();
        return view('schedule/create', compact('lectures'));
    }
    public function save(ScheduleRequest  $request)
    {
        $schedule = new Schedule($request->all());
        $schedule->save();
        return redirect()->action([ScheduleController::class, 'index']);
    }
}
