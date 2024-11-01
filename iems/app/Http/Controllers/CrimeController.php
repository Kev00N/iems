<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use Illuminate\Http\Request;

class CrimeController extends Controller
{
    public function index()
    {
        $crimes = Crime::all();
        return view('crimes.index', compact('crimes'));
    }

    public function create()
    {
        return view('crimes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'crime' => 'required|string|unique:crimes|max:255',
        ]);

        Crime::create($request->all());

        return redirect()->route('crimes.index')
            ->with('success', 'Crime created successfully.');
    }

    public function edit(Crime $crime)
    {
        return view('crimes.edit', compact('crime'));
    }

    public function update(Request $request, Crime $crime)
    {
        $request->validate([
            'crime' => 'required|string|max:255|unique:crimes,crime,' . $crime->id,
        ]);

        $crime->update($request->all());

        return redirect()->route('crimes.index')
            ->with('success', 'Crime updated successfully.');
    }

    public function destroy(Crime $crime)
    {
        $crime->delete();

        return redirect()->route('crimes.index')
            ->with('success', 'Crime deleted successfully.');
    }
}
