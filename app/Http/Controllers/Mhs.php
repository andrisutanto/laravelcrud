<?php

namespace App\Http\Controllers;


use App\Models\Modelmhs;
use Illuminate\Http\Request;

class Mhs extends Controller
{
    //
    public function index(Request $request) {

        //untuk searching
        $cari = $request->query('cari');

        if(!empty($cari)){
            $dataMahasiswa = Modelmhs::sortable()
            ->where('mahasiswa.mhsnim','like','%'.$cari.'%')
            ->orwhere('mahasiswa.mhsnama','like','%'.$cari.'%')
            ->paginate(10)->onEachSide(2)->fragment('mahasiswa');
        }else{
            $dataMahasiswa = Modelmhs::sortable()->paginate(10)->onEachSide(2)->fragment('mahasiswa');
        }

        // before pagination
        // $data=[
        //     'dataMhs' => Modelmhs::all()
        // ];

        //add pagination
        // $data=[
        //     'dataMhs' => Modelmhs::sortable()->paginate(10)->onEachSide(2)->fragment('mahasiswa'),
        // ];

        //return View('mahasiswa.data', $data);

        //return nya diganti
        return View('mahasiswa.data')->with([
            'dataMhs' => $dataMahasiswa,
            'cari' => $cari,
        ]);
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


            // add validation
            $validateData = $r->validate([
                'nim' => 'required|unique:mahasiswa,mhsnim',
                'nama' => 'required',
                'telp' => 'required|numeric',
                'alamat' => 'required',
            ],
            [
                'nim.required' => 'NIM tidak boleh kosong',
                'nim.unique' => 'NIM sudah ada',
                'nama.required' => 'Nama tidak boleh kosong',
            ]);

            $mhs = new Modelmhs;
            $mhs->mhsnim = $nim;
            $mhs->mhsnama = $nama;
            $mhs->mhstelp = $telp;
            $mhs->mhsalamat = $alamat;
            $mhs->save();

            //echo "data saved";
            $r->session()->flash('msg', "data $nama saved");
            return redirect('/mhs/tambah');

        
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
