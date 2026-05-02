<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Country;

class CountryController extends Controller
{
    public function edit()
    {
        $countries = Country::orderBy('sort_order')->get();

        return view('back.countries.index', compact('countries'));
    }

    public function create()
    {
        $country = new Country();

        return view('back.countries.form', compact('country'));
    }

    public function store(CountryRequest $request)
    {
        Country::create($request->validated());

        return redirect()->route('admin.countries.edit')->with('success', 'Country added successfully.');
    }

    public function show(Country $country)
    {
        return view('back.countries.form', compact('country'));
    }

    public function update(CountryRequest $request, Country $country)
    {
        $country->update($request->validated());

        return redirect()->route('admin.countries.edit')->with('success', 'Country updated successfully.');
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return response()->json(['success' => true]);
    }
}
