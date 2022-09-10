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

    public function datasoft() {

        $data=[
            'dataMhs' => Modelmhs::onlyTrashed()->get()
        ];

        return View('mahasiswa.datasoft', $data);
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

    public function edit($nim){
        $mhs = Modelmhs::find($nim);
        $data = [
            'nim' => $nim,
            'nama' => $mhs->mhsnama,
            'telp' => $mhs->mhstelp,
            'alamat' => $mhs->mhsalamat
        ];

        return View('mahasiswa.edit', $data);
    }

    public function update(Request $r) {
        $nim = $r->nim;
        $nama = $r->nama;
        $telp = $r->telp;
        $alamat = $r->alamat;

        try{
            $mhs = Modelmhs::find($nim);
            $mhs->find($nim);
            $mhs->mhsnama = $nama;
            $mhs->mhstelp = $telp;
            $mhs->mhsalamat = $alamat;
            $mhs->save();
    
            //echo "data saved";
            $r->session()->flash('msg', "data $nama updated");
            return redirect('/mhs/index');

        }catch(Throwable $e) {
            report($e);
        }
    }

    public function hapus($nim) {
        Modelmhs::find($nim)->delete();
        return redirect()->back();
    }

    public function restore($nim){
        Modelmhs::withTrashed()->find($nim)->restore();
        return redirect()->back();
    }

    public function forceDelete($nim) {
        Modelmhs::onlyTrashed()->find($nim)->forceDelete();
        return redirect()->back();
    }
}
