<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function showAdminDashboard()
    {
        // Middleware 'admin' wordt hier automatisch toegepast
        return View::make('admin_dashboard');
    }

    public function showUserDashboard()
    {
        // Code voor het weergeven van het dashboard voor normale gebruikers
        return View::make('dashboard');
    }
}

