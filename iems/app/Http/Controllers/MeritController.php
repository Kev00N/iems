<?php

namespace App\Http\Controllers;

use App\Models\Merit;
use App\Models\Prisoner;
use Illuminate\Http\Request;

class MeritController extends Controller
{
    public function index()
    {
        $prisoner = Prisoner::first();

        if ($prisoner) {
            $merits = $prisoner->merits;
        } else {
            $merits = collect();
        }

        return view('merits.index', compact('merits', 'prisoner'));
    }

    public function show($prisonerId)
    {
        $prisoner = Prisoner::findOrFail($prisonerId);
        $merits = $prisoner->merits;

        $previousPrisoner = Prisoner::where('id', '<', $prisoner->id)->orderBy('id', 'desc')->first();

        $nextPrisoner = Prisoner::where('id', '>', $prisoner->id)->orderBy('id')->first();

        return view('merits.show', compact('merits', 'prisoner', 'previousPrisoner', 'nextPrisoner'));
    }

    public function create()
    {
        $prisoners = Prisoner::all();
        return view('merits.create', compact('prisoners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prisoner_id' => 'required|exists:prisoners,id',
            'description' => 'required|string',
            'points' => 'required|integer',
        ]);

        $merit = new Merit();
        $merit->prisoner_id = $request->prisoner_id;
        $merit->description = $request->description;
        $merit->points = $request->points;
        $merit->save();

        return redirect()->route('merits.index')
            ->with('success', 'Merit created successfully.');
    }

    public function edit(Merit $merit)
    {
        $prisoners = Prisoner::all();
        return view('merits.edit', compact('merit', 'prisoners'));
    }

    public function update(Request $request, Merit $merit)
    {
        $request->validate([
            'prisoner_id' => 'required|exists:prisoners,id',
            'description' => 'required|string',
            'points' => 'required|integer',
        ]);

        $merit->update([
            'prisoner_id' => $request->prisoner_id,
            'description' => $request->description,
            'points' => $request->points,
        ]);

        return redirect()->route('merits.index')
            ->with('success', 'Merit updated successfully.');
    }

    public function destroy(Merit $merit)
    {
        $merit->delete();

        return redirect()->route('merits.index')
            ->with('success', 'Merit deleted successfully.');
    }
}
