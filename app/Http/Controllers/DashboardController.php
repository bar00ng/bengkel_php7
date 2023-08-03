<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use Auth;

class DashboardController extends Controller
{
    public function index() {
        if(Auth::user()->hasRole('owner|mekanik')) {
            return redirect()->route('list.book');
        } elseif (Auth::user()->hasRole('guest')) {
            return redirect()->route('guest.dashboard');
        }
    }

    public function userDashboard(){
        $dataTestimoni = Testimoni::latest()->limit(3)->get();

        return view('user.index', compact('dataTestimoni'));
    }
}
