<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function dashboard()
    {
        $user = Auth::user();
        $upcomingAppointments = Reservation::where('email', $user->email)
            ->where('reservation_date', '>', now())
            ->get();

        return view('dashboard', compact('upcomingAppointments'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->isAdmin()) {
                return redirect()->route('reservations.index');
            }

            // Voeg hier andere controles voor andere rollen toe, indien nodig

            return view('dashboard');
        }

        return view('dashboard');
    }
}
