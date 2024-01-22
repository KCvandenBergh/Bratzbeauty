<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AvailableDate;

class AvailableDateController extends Controller
{
    public function index()
    {
        $dates = AvailableDate::orderBy('date')->get();
        return view('available_dates.index', compact('dates'));
    }

    public function create()
    {
        return view('available_dates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        AvailableDate::create([
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ]);

        return redirect()->route('available-dates.index')->with('success', 'Datum succesvol toegevoegd!');
    }

    // Voeg update en destroy methodes toe zoals nodig
}
