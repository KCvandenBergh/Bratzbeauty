<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Treatment;
use App\Models\Reservation;
use App\Models\AvailableDate;
use App\Models\AvailableTime;



class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Request $request)
{
    $query = Reservation::query();

    // Filter op zoekterm (naam)
    if ($request->has('search') && !empty($request->search)) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('last_name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        });
    }

    // Filter op datum
    if ($request->has('date') && !empty($request->date)) {
        $query->where('reservation_date', $request->date);
    }

    // Filter op behandeling
    if ($request->has('treatment') && !empty($request->treatment)) {
        $query->where('treatment_id', $request->treatment);
    }

    // Haal de gefilterde reserveringen op
    $reservations = $query->with('treatment')->get();

    // Haal alle beschikbare datums en behandelingen op voor de filters
    $availableDates = AvailableDate::all();
    $treatments = Treatment::all();

    return view('reservations.index', compact('reservations', 'availableDates', 'treatments'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $availableDates = AvailableDate::with('times')->where('date', '>=', now())->get();
        $treatments = Treatment::all();

        // Initialiseer $availableTimes als een lege collectie
        $availableTimes = collect();

        return view('reservations.create', [
            'availableDates' => $availableDates,
            'treatments' => $treatments,
            'availableTimes' => $availableTimes,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Laat alle request data zien voor debugging

        $request->validate([
            'treatment_id' => 'required|string',
            'reservation_date' => 'required|exists:available_dates,id',
            'reservation_time' => 'required|exists:available_times,id',
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'zip_code' => 'required|string',
            'house_number' => 'required|string',
            'birthdate' => 'required|date',
            'comments' => 'nullable|string',
        ]);

        // Zoek de datum en tijd op aan de hand van hun id
        $availableDate = AvailableDate::find($request->input('reservation_date'));
        $availableTime = AvailableTime::find($request->input('reservation_time'));

        if (!$availableDate || !$availableTime) {
            return redirect()->back()->withErrors(['message' => 'Ongeldige datum of tijd geselecteerd.']);
        }

        // Maak een nieuwe reservering aan
        $reservation = new Reservation([
            'treatment_id' => $request->input('treatment_id'),
            'reservation_date' => $availableDate->date,
            'reservation_time' => $availableTime->time,
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'zip_code' => $request->input('zip_code'),
            'house_number' => $request->input('house_number'),
            'birthdate' => $request->input('birthdate'),
            'comments' => $request->input('comments'),
        ]);

        // Sla de reservering op
        $reservation->save();

        // Stuur succesbericht
        return redirect()->route('home')
            ->with('success', 'Reservering succesvol geplaatst!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $treatments = Treatment::all();
        $availableDates = AvailableDate::with('times')->where('date', '>=', now())->get();

        return view('reservations.edit', compact('reservation', 'treatments', 'availableDates'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'treatment_id' => 'required|string',
            'reservation_date' => 'required|exists:available_dates,id',
            'reservation_time' => 'required|exists:available_times,id',
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'zip_code' => 'required|string',
            'house_number' => 'required|string',
            'birthdate' => 'required|date',
            'comments' => 'nullable|string',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());

        return redirect()->route('reservations.index')->with('success', 'Reservering succesvol bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservering succesvol verwijderd.');
    }
}
