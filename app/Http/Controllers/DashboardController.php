<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        switch (auth()->user()?->role) {
            case 'member':
                // return redirect()->route('dashboard.role', ['role' => 'member']);
                return redirect()->route('dashboard.role', 'member');
            case 'instructor':
                return redirect()->route('dashboard.role', 'instructor');
            case 'admin':
                return redirect()->route('dashboard.role', 'admin');
            default:
                return redirect()->route('login');
        }
    }

    public function show($role)
    {
        return View::exists("dashboard.$role") ? view("dashboard.$role") : abort(404);
    }
}