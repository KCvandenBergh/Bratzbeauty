<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\AvailableDate;
use App\Models\LoginLog;

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

        // Haal het aantal logins van de gebruiker op
        $loginCount = LoginLog::where('user_id', \Auth::id())->count();

        // Stuur het aantal logins naar de view
        return view('dashboard', ['loginCount' => $loginCount]);
    }


}

