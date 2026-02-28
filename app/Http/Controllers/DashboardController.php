<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\People;

class DashboardController extends Controller
{
    // Admin Dashboard
    public function admin()
    {
        $totalUsers = User::count();
        $totalPeople = People::count();

        return view('admin.dashboard', compact('totalUsers','totalPeople'));
    }

    // Agent Dashboard
    public function agent()
    {
        return view('agent.dashboard');
    }

    // Jemaah Dashboard
    public function jemaah()
    {
        return view('jemaah.dashboard');
    }
}