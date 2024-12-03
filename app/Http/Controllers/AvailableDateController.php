<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AvailableDate;
use Carbon\Carbon;

class AvailableDateController extends Controller
{
    public function index()
    {
        $dates = AvailableDate::orderBy('date')->get();
        return view('available_dates.index', compact('dates'));
    }

    public function showOpeningHours()
    {
        $startOfWeek = Carbon::now()->startOfWeek()->toDateString();
        $endOfWeek = Carbon::now()->endOfWeek()->toDateString();

        $dates = AvailableDate::where('date', '>=', $startOfWeek)
            ->where('date', '<=', $endOfWeek)
            ->orderBy('date', 'asc')
            ->get();

        return view('openinghours', compact('dates'));
    }


    public function create()
    {
        return view('available_dates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'times' => 'required|array',
            'times.*' => 'date_format:H:i',
        ]);

        $date = AvailableDate::create(['date' => $request->date]);

        foreach ($request->times as $time) {
            $date->times()->create(['time' => $time]);
        }

        return redirect()->route('dashboard.admin')->with('success', 'Beschikbare datum en tijden succesvol toegevoegd!');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        $availableDate = AvailableDate::findOrFail($id);
        $availableDate->update($request->only('date'));

        return redirect()->route('dashboard.admin')->with('success', 'Datum succesvol bijgewerkt!');
    }


    public function destroy($id)
    {
        $availableDate = AvailableDate::findOrFail($id);
        $availableDate->delete();

        return redirect()->route('dashboard.admin')->with('success', 'Datum succesvol verwijderd!');
    }
}
