<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Testimoni;

use Auth;
class TestimoniController extends Controller
{
    public function index ($kd_booking) {
        $data = Booking:: where('kd_booking',$kd_booking)-> first();

        return view('user.formtestimoni', compact('data'));
    }

    public function storeData (Request $req, $kd_booking) {
        $validated =$req->validate([
            'rating_testimoni'=>'required|numeric|min:1',
            'deskripsi_testimoni'=>'required|'
        ]);

        if ($req->hasFile('file_testimoni') && $req->file('file_testimoni')->isValid()){
            $file = $req->file('file_testimoni');
            $filename = $file->getClientOriginalName();

            $file->storeAs('public/uploads/file_testimoni', $filename);
            $validated['file_testimoni'] = $filename;
        }
        $validated['user_id']= Auth::user()-> id;
        $validated['kd_booking']= $kd_booking; 

        Testimoni:: create($validated);

        return back()->with('success', 'Berhasil upload testimoni!');
    }
}
