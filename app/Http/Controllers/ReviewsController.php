<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\LoginLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Controleer of de gebruiker minstens 5 keer heeft ingelogd
        $loginCount = LoginLog::where('user_id', Auth::id())->count();

        if ($loginCount < 5) {
            return redirect()->route('user.dashboard')
                ->withErrors('Je moet minimaal 5 keer ingelogd zijn om een review te kunnen plaatsen.');
        }

        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Controleer of de gebruiker minstens 5 keer heeft ingelogd
        $loginCount = LoginLog::where('user_id', Auth::id())->count();

        if ($loginCount < 5) {
            return redirect()->route('user.dashboard')
                ->withErrors('Je moet minimaal 5 keer ingelogd zijn om een review te kunnen plaatsen.');
        }

        // Valideer de invoer
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'score' => 'required|integer|min:0|max:5', // 0 tot 5 sterren
        ]);

        // Maak een nieuwe Review aan en sla deze op
        Review::create([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'score' => $request->input('score'),
            'user_id' => Auth::id(), // Optioneel, als je reviews wilt koppelen aan een gebruiker
        ]);

        // Terugkeren naar de indexpagina voor reviews met een succesmelding
        return redirect()->route('reviews.index')
            ->with('success', 'Review is succesvol toegevoegd.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
