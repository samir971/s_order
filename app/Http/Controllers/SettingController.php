<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller {
    public function index() {
        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
            $setting->waitingTime = 0;
        }
        return view('layouts.Setting.waiting_time', compact('setting'));
    }

    public function update(Request $request) {
        $request->validate([
            'waitingTime' => 'required|numeric|min:0',
        ]);

        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }

        $setting->waitingTime = $request->input('waitingTime');
        $setting->save();

        return redirect()->route('settings.index')->with('success', 'تم تحديث فترة السماح بنجاح.');
    }

    public function reset() {
        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }
        $setting->waitingTime = 0;
        $setting->save();
        return redirect()->route('settings.index')->with('success', 'تمت اعادة ضبط فترة السماح');
    }
}