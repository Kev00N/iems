<?php

namespace App\Http\Controllers;

use App\Models\Prisoner;
use App\Models\Crime;
use Illuminate\Http\Request;

class PrisonerController extends Controller
{
    public function index()
    {
        $prisoners = Prisoner::all();
        return view('prisoners.index', compact('prisoners'));
    }
   
    public function show(Prisoner $prisoner)
    {
        $nextPrisoner = Prisoner::where('id', '>', $prisoner->id)->orderBy('id')->first();
        $previousPrisoner = Prisoner::where('id', '<', $prisoner->id)->orderBy('id', 'desc')->first();

        return view('prisoners.show', compact('prisoner', 'nextPrisoner', 'previousPrisoner'));
    }

    public function create()
    {
        $crimes = Crime::all();
        return view('prisoners.create', compact('crimes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'national_id' => 'required|string|unique:prisoners|max:255',
            'sentence_period' => 'required|integer',
            'admission_date' => 'required|date',
            'date_to_be_released' => 'required|date',
            'crime_id' => 'required|exists:crimes,id',
        ]);
    
        $prisoner = new Prisoner();
        $prisoner->name = $request->name;
        $prisoner->national_id = $request->national_id;
        $prisoner->sentence_period = $request->sentence_period;
        $prisoner->admission_date = $request->admission_date;
        $prisoner->date_to_be_released = $request->date_to_be_released;
        $prisoner->crime_id = $request->crime_id;
        $prisoner->save();
    
        return redirect()->route('prisoners.show', $prisoner->id)
            ->with('success', 'Prisoner created successfully.');
    }  

    public function edit(Prisoner $prisoner)
    {
        $crimes = Crime::all();
        return view('prisoners.edit', compact('prisoner', 'crimes'));
    }

    public function update(Request $request, Prisoner $prisoner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'national_id' => 'required|string|unique:prisoners,national_id,' . $prisoner->id,
            'sentence_period' => 'required|integer',
            'admission_date' => 'required|date',
            'date_to_be_released' => 'required|date',
            'crime_id' => 'required|exists:crimes,id',
        ]);

        $prisoner->update($request->all());

        return redirect()->route('prisoners.index')
            ->with('success', 'Prisoner updated successfully.');
    }

    public function destroy(Prisoner $prisoner)
    {
        $prisoner->delete();

        return redirect()->route('prisoners.index')
            ->with('success', 'Prisoner deleted successfully.');
    }
}
