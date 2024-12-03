<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\AvailableDate;

class DashboardController extends Controller
{
    public function showAdminDashboard()
    {
        // Haal alle datums op en laad de bijbehorende tijden
        $dates = AvailableDate::with('times')->orderBy('date', 'asc')->get();

        // Stuur de gegevens door naar de view
        return view('admin_dashboard', compact('dates'));
    }

    public function showUserDashboard()
    {
        // Code voor het weergeven van het dashboard voor normale gebruikers
        return View::make('dashboard');
    }
}

