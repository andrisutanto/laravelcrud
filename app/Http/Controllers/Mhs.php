<?php

namespace App\Http\Controllers;

use App\Models\Modelmhs;
use Illuminate\Http\Request;

class Mhs extends Controller
{
    //
    public function index() {

        $data=[
            'dataMhs' => Modelmhs::all()
        ];

        return View('mahasiswa.data', $data);
    }

    public function add() {
        return View('mahasiswa.formtambah');
    }

    public function save(Request $r) {
        $nim = $r->nim;
        $nama = $r->nama;
        $telp = $r->telp;
        $alamat = $r->alamat;

        try{
            $mhs = new Modelmhs;
            $mhs->mhsnim = $nim;
            $mhs->mhsnama = $nama;
            $mhs->mhstelp = $telp;
            $mhs->mhsalamat = $alamat;
            $mhs->save();
    
            //echo "data saved";
            $r->session()->flash('msg', "data $nama saved");
            return redirect('/mhs/tambah');

        }catch(Throwable $e) {
            report($e);
        }
        
    }
}
