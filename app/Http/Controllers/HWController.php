<?php

namespace App\Http\Controllers;

use App\Models\HW;
use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HWController extends Controller
{
    public function index(Lecture $lecture)
    {
        $hws = HW::where('lecture_id', $lecture->id)->paginate(10);
        return view('hw/index', compact('lecture', 'hws'));
    }

    public function create(Lecture $lecture)
    {
        return view('hw/create', compact('lecture'));
    }

    public function save(Request $request, Lecture $lecture)
    {
        $hw = new Hw($request->all());
        $hw->lecture_id = $lecture->id;
        $hw->due_to = $request->due_to;
        if ($request->file('image')) {
            $imgName = Str::random(16) . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('hws'), $imgName);
            $hw->image = $imgName;
        }

        $hw->save();
        return redirect()->route('hws.open', $lecture->id);
    }

    public function hw(Hw $hw)
    {
        return view("hw/hw", compact('hw'));
    }

    public function hw_file(Hw $hw)
    {
        $file_path = public_path('hws/' . $hw->image);
        return response()->download($file_path);
    }


}
