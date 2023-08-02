<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Jasa;
use App\Models\BookingDetail;

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

    public function formAdd() {
        $jasa = Jasa::get();

        return view('user.formbooking', compact('jasa'));
    }

    public function storeData(Request $request) {
        $total_booking = 0;
        $kd_booking = Booking::generateKodeBooking();

        $validated = $request->validate([
            'nama_booking' => 'required|string|max:255',
            'nomor_hp_booking' => 'required|numeric',
            'email_booking' => 'required|email',
            'jasa' => 'array',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'email' => 'Kolom :attribute harus berupa alamat email yang valid.',
        ]);

        $jasa = $validated['jasa'];
        
        $book = new Booking();
        $book->kd_booking = $kd_booking;
        $book->nama_booking = $validated['nama_booking'];
        $book->nomor_hp_booking = $validated['nomor_hp_booking'];
        $book->email_booking = $validated['email_booking'];
        foreach($jasa as $j){
            $dataJasa = Jasa::find($j);

            $total_booking += $dataJasa->harga_jasa;
        }
        $book->total_booking = $total_booking;
        $savedBook = $book->save();

        if($savedBook) {
            foreach ($jasa as $j) {
                BookingDetail::create([
                    'kd_booking' => $kd_booking,
                    'jasa_id' => $j
                ]);
            }

            return back()->with('success', 'Berhasil Booking!');
        } else {
            return back()->with('failed', 'Gagal Booking. Coba beberapa saat lagi');
        }
    }
    
    public function delete($kd_booking) {
        Booking::where('kd_booking', $kd_booking)->delete(); 

        return back()->with('success', 'Berhasil mengapus data!');
    }

    public function patch($kd_booking, $status) {
        if ($status == "on-progress") {
            $updatedStatus = "On Progress";
            $message = "Berhasil menandai sebagai On Progress";
        } else if ($status == "selesai"){
            $updatedStatus = "Selesai";
            $message = "Berhasil menandai sebagai Selesai";
        }

        Booking::where('kd_booking', $kd_booking)->update([
            'status' => $updatedStatus
        ]);

        return back()->with('success', $message);
    }
}
