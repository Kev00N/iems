<?php

namespace App\Http\Controllers;

use App\Models\Demerit;
use App\Models\Prisoner;
use Illuminate\Http\Request;

class DemeritController extends Controller
{
    public function index()
    {
        $demerits = Demerit::all();
        return view('demerits.index', compact('demerits'));
    }
   
    public function show(Prisoner $prisoner)
    {
        $demerits = $prisoner->demerits;

        $previousPrisoner = Prisoner::where('id', '<', $prisoner->id)->orderBy('id', 'desc')->first();

        $nextPrisoner = Prisoner::where('id', '>', $prisoner->id)->orderBy('id')->first();

        return view('demerits.show', compact('demerits', 'prisoner', 'previousPrisoner', 'nextPrisoner'));
    }


    public function create()
    {
        $prisoners = Prisoner::all();
        return view('demerits.create', compact('prisoners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prisoner_id' => 'required|exists:prisoners,id',
            'description' => 'required|string',
            'points' => 'required|integer',
        ]);

        Demerit::create($request->all());

        return redirect()->route('demerits.index')
            ->with('success', 'Demerit created successfully.');
    }

    public function edit(Demerit $demerit)
    {
        $prisoners = Prisoner::all();
        return view('demerits.edit', compact('demerit', 'prisoners'));
    }

    public function update(Request $request, Demerit $demerit)
    {
        $request->validate([
            'prisoner_id' => 'required|exists:prisoners,id',
            'description' => 'required|string',
            'points' => 'required|integer',
        ]);

        $demerit->update($request->all());

        return redirect()->route('demerits.index')
            ->with('success', 'Demerit updated successfully.');
    }

    public function destroy(Demerit $demerit)
    {
        $demerit->delete();

        return redirect()->route('demerits.index')
            ->with('success', 'Demerit deleted successfully.');
    }
}
