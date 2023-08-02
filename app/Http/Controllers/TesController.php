<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tes;

class TesController extends Controller
{
    public function index(){
        $data_tes = Tes::get();

        return view('tes', compact('data_tes'));
    }
    public function store() {
        Tes::create([
            'nama' => 'Jovi',
            'umur' => 22,
            'alamat' => 'Taman Anyelir 2'
        ]);

        return back();
    }

    public function delete($id) {
        Tes::find($id)->delete();

        return "berhasil";
    }
}
