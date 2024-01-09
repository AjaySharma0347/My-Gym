<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        switch (auth()->user()?->role) {
            case 'member':
                // return redirect()->route('dashboard.member', ['role' => 'member']);
                return to_route('dashboard.member');
            case 'instructor':
                return to_route('dashboard.instructor');
            case 'admin':
                return to_route('dashboard.admin');
            default:
                return to_route('login');
        }
    }

    // public function show($role)
    // {
    //     return View::exists("dashboard.$role") ? view("dashboard.$role") : abort(404);
    // }

    public function member()
    {
        return view('dashboard.member');
    }

    public function instructor()
    {
        return view('dashboard.instructor');
    }

    public function admin()
    {
        return view('dashboard.admin');
    }
}