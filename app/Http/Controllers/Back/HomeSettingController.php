<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeSettingRequest;
use App\Models\HomeSetting;

class HomeSettingController extends Controller
{
    public function edit()
    {
        $settings = HomeSetting::firstOrCreate([])->fresh();

        return view('back.home.edit', compact('settings'));
    }

    public function update(HomeSettingRequest $request)
    {
        
        $settings = HomeSetting::firstOrCreate([]);
        $settings->update($request->validated());

        return redirect()->back()->with('success', 'Home page settings updated successfully.');
    }
}
