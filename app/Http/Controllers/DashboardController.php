<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index() {
        if(Auth::user()->hasRole('owner|mekanik')) {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->hasRole('guest')) {
            return redirect()->route('guest.dashboard');
        }
    }
}
