<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matkul;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public $nilai;
    // membuat instance dari model data
    public function __construct()
    {
        $this->nilai = new Nilai();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Nilai::all();

        return view('nilai.index', compact('data'));
    }

    public function create()
    {
        $data = Mahasiswa::all();
        $matkul = Matkul::all();
        return view('nilai.create', compact('data', 'matkul'));
    }

    public function store(Request $request)
    {
        $rules = [
            'id_mahasiswa' => 'required',
            'id_matakuliah' => 'required',
            'nilai_angka' => 'required|min:0|max:100',
            'grade' => 'required'
        ];

        $messages = [
            'required' => ":attribute gak boleh kosong",
            'min' => ":attribute kurang banyak",
            'max' => ":attribute kebanyakan / ukuran file terlalu besar",
        ];

        $this->validate($request, $rules, $messages);

        $this->nilai->nilai_angka = $request->nilai_angka;
        $this->nilai->id_mahasiswa = $request->id_mahasiswa;
        $this->nilai->id_matakuliah = $request->id_matakuliah;
        $this->nilai->huruf_mutu = $request->grade;

        $this->nilai->save();

        return redirect()->route('nilai');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $edit = Nilai::findOrFail($id);
        $matkul = Matkul::all();
        $nama = Mahasiswa::all();

        return view('nilai.edit', compact('edit', 'matkul', 'nama'));
    }

    public function update(Request $request, $id)
    {
        $update = Nilai::findOrFail($id);

        $update->id_mahasiswa = $request->id_mahasiswa;
        $update->id_matakuliah = $request->id_matakuliah;
        $update->nilai_angka = $request->nilai;
        $update->huruf_mutu = $request->huruf;

        if ($update->isDirty()) {
            $update->save();
            return redirect()->route('nilai')->with('status', 'Data nilai berhasil diupdate');
        } else {
            return redirect()->route('nilai');
        }
    }

    public function destroy($id)
    {
        $destroy = Nilai::findOrFail($id);
        $destroy->delete();
        return redirect()->route('nilai')->with('status', ' data Nilai berhasil dihapus');
    }
}
