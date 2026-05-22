<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $enrollments = $user->enrollments()->with('course')->get();
        return view('dashboard', compact('user', 'enrollments'));
    }
}
