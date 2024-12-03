<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AvailableDate;
use App\Models\AvailableTime;

class AvailableTimeController extends Controller
{
    // Toon een lijst van alle tijden voor een bepaalde datum
    public function index($dateId)
    {
        $date = AvailableDate::findOrFail($dateId);
        $times = $date->times()->get();

        return view('available_times.index', compact('times', 'date'));
    }

    // Toon het formulier om een nieuwe tijd toe te voegen
    public function create($dateId)
    {
        return view('available_times.create', compact('dateId'));
    }

    // Sla een nieuwe tijd op
    public function store(Request $request, $dateId)
    {
        $request->validate([
            'time' => 'required|date_format:H:i',
        ]);

        $date = AvailableDate::findOrFail($dateId);
        $date->times()->create($request->all());

        return redirect()->route('available-times.index', $dateId)->with('success', 'Tijd succesvol toegevoegd!');
    }

    // Toon het formulier om een bestaande tijd te bewerken
    public function edit($id)
    {
        $time = AvailableTime::findOrFail($id);

        return view('available_times.edit', compact('time'));
    }

    // Werk een bestaande tijd bij
    public function update(Request $request, $id)
    {
        $request->validate([
            'time' => 'required|date_format:H:i',
        ]);

        $time = AvailableTime::findOrFail($id);
        $time->update($request->all());

        return redirect()->route('admin_dashboard.index', $time->available_date_id)->with('success', 'Tijd succesvol bijgewerkt!');
    }

    // Verwijder een bestaande tijd
    public function destroy($id)
    {
        $time = AvailableTime::findOrFail($id);
        $dateId = $time->available_date_id;
        $time->delete();

        return redirect()->route('admin_dashboard.index', $dateId)->with('success', 'Tijd succesvol verwijderd!');
    }

    public function getTimesForDate($dateId)
    {
        $times = AvailableTime::where('available_date_id', $dateId)
            ->get(['id', 'time']);

        return response()->json($times);
    }
}
