<?php

namespace App\Http\Controllers;

use App\Models\WorkTime;
use Illuminate\Http\Request;

class WorkTimeController extends Controller
{
    public function index() {
        $workTimes = WorkTime::all();
        return view('layouts.Setting.index', compact('workTimes'));
    }

    public function update(Request $request) {
        $request->validate([
            'FromTime' => 'required|date_format:H:i',
            'ToTime' => 'required|date_format:H:i',
            'id' => 'required|exists:work_times,id',
        ]);

        $workTime = WorkTime::find($request->id);
        if ($workTime) {
            $workTime->update([
                'FromTime' => $request->FromTime,
                'ToTime' => $request->ToTime,
            ]);
        }else {
            return redirect()->route('worktimes.index')->with('errors', 'يجب ملى البيانات');
        }

        return redirect()->route('worktimes.index')->with('success', 'تم تحديث وقت العمل بنجاح');
    }
}