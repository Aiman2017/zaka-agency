<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    public function edit()
    {
        $service = Service::firstOrCreate([])->fresh();

        return view('back.services.edit', compact('service'));
    }

    public function update(ServiceRequest $request)
    {
        $service = Service::firstOrCreate([]);
        $service->update($request->validated());

        return redirect()->back()->with('success', 'Service settings updated successfully.');
    }
}
