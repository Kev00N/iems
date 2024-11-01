<?php

namespace App\Http\Controllers;

use App\Models\Prisoner;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        $prisoner = Prisoner::first();

        return view('evaluation.index', compact('prisoner'));
    }
}
