<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public $mahasiswa;
    // membuat instance dari model data
    public function __construct()
    {
        $this->mahasiswa = new Mahasiswa();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Mahasiswa::all();

        return view('admin.index', compact('data'));
    }

    public function create()
    {
        $data = Mahasiswa::all();
        return view('admin.create', compact('data'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required|min:3|max:80|unique:mahasiswa,nama',
            'nim' => 'required|integer'
        ];

        $messages = [
            'required' => ":attribute gak boleh kosong",
            'min' => ":attribute kurang banyak",
            'max' => ":attribute kebanyakan / ukuran file terlalu besar",
            'unique' => ":attribute sudah tersedia, silakan input lain",
            'integer' => ":attribute harus berupa angka"
        ];

        $this->validate($request, $rules, $messages);

        $this->mahasiswa->nama = $request->nama;
        $this->mahasiswa->nim = $request->nim;

        $this->mahasiswa->save();

        return redirect()->route('admin');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $edit = Mahasiswa::findOrFail($id);
        return view('admin.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $update = Mahasiswa::findOrFail($id);

        $rules = [
            'nama' => 'required|min:3|max:80|unique:mahasiswa,nama',
            'nim' => 'required|integer'
        ];

        $messages = [
            'required' => ":attribute gak boleh kosong",
            'min' => ":attribute kurang banyak",
            'max' => ":attribute kebanyakan / ukuran file terlalu besar",
            'unique' => ":attribute sudah tersedia, silakan input lain",
            'integer' => ":attribute harus berupa angka"
        ];

        $this->validate($request, $rules, $messages);

        $namaBaru = $request->nama;

        if ($namaBaru === $update->nama) {
            $update->nim = $request->nim;
            $update->save();
            return redirect()->route('admin')->with('success', 'Data mahasiswa berhasil diupdate');
        } else {
            $existingMahasiswa = Mahasiswa::where('nama', $namaBaru)->first();
            if ($existingMahasiswa) {
                return redirect()->route('admin')->with('error', 'Maaf, nama mahasiswa sudah tersedia, silakan input lain');
            } else {
                $update->nama = $namaBaru;
                $update->nim = $request->nim;
                $update->save();
                return redirect()->route('admin')->with('success', 'Data mahasiswa berhasil diupdate');
            }
        }
    }

    public function destroy($id_mahasiswa)
    {
        $destroy = Mahasiswa::findOrFail($id_mahasiswa);
        $destroy->delete();
        return redirect()->route('admin')->with('success', ' data Mahasiswa berhasil dihapus');
    }
}
