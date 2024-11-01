<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RehabilitatedPrisoner;
use App\Models\Prisoner;
use App\Models\Merit;
use App\Models\Demerit;
use Carbon\Carbon;

class RehabilitatedPrisonerController extends Controller
{
    public function create()
    {
        return view('rehabilitatedprisoners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'prisoner_id' => 'required|exists:prisoners,id',
        ]);

        $prisoner = Prisoner::findOrFail($request->input('prisoner_id'));

        $rehabilitatedPrisoner = new RehabilitatedPrisoner();
        $rehabilitatedPrisoner->prisoner_id = $prisoner->id;
        $rehabilitatedPrisoner->rehabilitated = $rehabilitatedPrisoner->canBeSubmitted();

        if ($rehabilitatedPrisoner->rehabilitated) {
            $existingEntry = RehabilitatedPrisoner::where('prisoner_id', $prisoner->id)->first();
            if ($existingEntry) {
                return redirect()->back()->withErrors('This prisoner is already marked as rehabilitated.');
            }
            
            $rehabilitatedPrisoner->save();
            return redirect()->route('rehabilitated.index')->with('success', 'Rehabilitated prisoner has been created.');
        } else {
            return redirect()->back()->withErrors('Conditions are not met. Rehabilitated prisoner could not be created.');
        }
    }

    public function edit(RehabilitatedPrisoner $rehabilitatedPrisoner)
    {
        return view('rehabilitatedprisoners.edit', compact('rehabilitatedPrisoner'));
    }

    public function update(Request $request, RehabilitatedPrisoner $rehabilitatedPrisoner)
    {
        $request->validate([
            // Add your validation rules here
        ]);

        $rehabilitatedPrisoner->update($request->all());

        return redirect()->route('rehabilitated.index')->with('success', 'Rehabilitated prisoner has been updated.');
    }

    public function index()
    {
        $rehabilitatedPrisoners = RehabilitatedPrisoner::all();
        return view('rehabilitatedprisoners.index', compact('rehabilitatedPrisoners'));
    }
    public function destroy($id)
    {
        $rehabilitatedPrisoner = RehabilitatedPrisoner::findOrFail($id);
        $rehabilitatedPrisoner->delete();

        return redirect()->route('rehabilitated.index')->with('success', 'Rehabilitated prisoner has been deleted.');
    }
}
