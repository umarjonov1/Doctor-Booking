<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (\Auth::user()->role->name == 'patient') {
            return view('home');
        }
        return view('dashboard');
    }
}
