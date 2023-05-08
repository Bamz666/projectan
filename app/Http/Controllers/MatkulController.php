<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
 
    public $matkul;
    // membuat instance dari model data
    public function __construct()
    {
        $this->matkul = new Matkul();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Matkul::all();

        return view('matkul.index', compact('data'));
    }

    public function create()
    {
        $data = Matkul::all();
        return view('matkul.create', compact('data'));
    }

    public function store(Request $request)
    {
        $rules = [
            'matkul' => 'required|min:3|max:80|unique:matkul,nama_matakuliah',
            'sks' => 'required'
        ];

        $messages = [
            'required' => ":attribute gak boleh kosong",
            'min' => ":attribute kurang banyak",
            'max' => ":attribute kebanyakan / ukuran file terlalu besar",
            'unique' => ":attribute sudah tersedia, silakan input lain"
        ];

        $this->validate($request, $rules, $messages);

        $this->matkul->nama_matakuliah = $request->matkul;
        $this->matkul->sks = $request->sks;

        $this->matkul->save();

        return redirect()->route('matkul');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $edit = Matkul::findOrFail($id);
        return view('matkul.edit', compact('edit'));
    }

    public function update(Request $request, $id)
{
    $update = Matkul::findOrFail($id);
    $namaMatkulBaru = $request->matkul;

    if($namaMatkulBaru === $update->nama_matakuliah){
        $update->sks = $request->sks;
        $update->save();
        return redirect()->route('matkul')->with('status', 'Data matkul berhasil diupdate');
    } else {
        $existingMatkul = Matkul::where('nama_matakuliah', $namaMatkulBaru)->first();
        if($existingMatkul){
            return redirect()->route('matkul')->with('error', 'Maaf, matakuliah sudah tersedia, silakan input lain');
        } else {
            $update->nama_matakuliah = $namaMatkulBaru;
            $update->sks = $request->sks;
            $update->save();
            return redirect()->route('matkul')->with('status', 'Data matkul berhasil diupdate');
        }
    }
}


    public function destroy($id)
    {
        $destroy = Matkul::findOrFail($id);
        $destroy->delete();
        return redirect()->route('matkul')->with('status', ' data Matkul berhasil dihapus');
    }
}
