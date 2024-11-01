<?php

namespace App\Http\Controllers;

use App\Models\Prisoner;
use App\Models\PrisonerTotalPoints;
use Illuminate\Http\Request;

class PrisonerTotalPointsController extends Controller
{
    public function index()
    {
        $prisoners = Prisoner::all();
        $prisonersTotalPoints = [];

        foreach ($prisoners as $prisoner) {
            $prisonerTotalPoints = new PrisonerTotalPoints([
                'prisoner_id' => $prisoner->id,
            ]);

            $totalPoints = $prisonerTotalPoints->total_points;

            $prisonersTotalPoints[] = [
                'prisoner_id' => $prisoner->id,
                'name' => $prisoner->name,
                'total_points' => $totalPoints,
            ];
        }

        return view('prisonertotalpoints.index', compact('prisonersTotalPoints'));
    }
}
