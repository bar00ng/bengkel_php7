<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index($filter = null) {
        if ($filter == null) {
            $data = Booking::get();
        } elseif ($filter == 'Selesai') {
            $data = Booking::where('status', 'Selesai')->get();
        } elseif ($filter == 'On Progress') {
            $data = Booking::where('status', 'On Progress')->get();
        } elseif ($filter == 'Belum Selesai') {
            $data = Booking::where('status', 'Belum Selesai')->get();
        }

        return view('admin.listBooking', compact('data'));
    }

    public function storeData(Request $req) {
        Booking::create([
            'nama_booking' => $req->nama,
            'nomor_hp_booking' => $req->nomor_hp_booking,
            'email_booking' =>$req->email_booking,
            'kd_booking' => Booking::generateKodeBooking(),
            'total_booking' => 100000
        ]);
    }
    
    public function delete($kd) {
        Booking::where('kd_booking', $kd)->delete(); 

        return redirect('/admin/list-booking/');
    }
}
