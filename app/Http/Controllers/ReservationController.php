<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Treatment;
use App\Models\Reservation;
use App\Models\AvailableDate;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $availableDates = AvailableDate::with('availabilities')->where('date', '>=', now())->get();
        $treatments = Treatment::all();

        return view('reservations.create', [
            'availableDates' => $availableDates,
            'treatments' => $treatments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'treatment_id' => 'required|string', // Voeg de vereisten voor 'dienst' toe op basis van je databasestructuur
            'reservation_date' => 'required|date|after:today', // Datum moet vandaag of later zijn
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'zip_code' => 'required|string',
            'house_number' => 'required|string',
            'birthdate' => 'required|date',
            'comments' => 'nullable|string',
        ]);

        // Maak een nieuwe reservering aan en vul deze met de gevalideerde gegevens
        $reservation = new Reservation([
            'treatment_id' => $request->input('treatment_id'),
            'reservation_date' => $request->input('reservation_date'),
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

        // Voeg hier eventueel extra logica toe, bijvoorbeeld het koppelen van behandelingen aan de reservering

        return redirect()->route('reservations.create')
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
