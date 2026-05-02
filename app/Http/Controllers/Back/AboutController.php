<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;


class AboutController extends Controller
{
    public function edit()
    {
        $about = About::firstOrCreate([]);

        return view('back.about.edit', compact('about'));
    }

    public function update(AboutRequest $request)
    {
        $about = About::firstOrCreate([]);
        $about->update($request->validated());

        return redirect()->back()->with('success', 'About page updated successfully.');
    }
}
