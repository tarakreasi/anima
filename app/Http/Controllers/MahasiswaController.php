<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MahasiswaModel;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = MahasiswaModel::latest()->get();
        return view('tampilmahasiswa', ['mahasiswa' => $mahasiswa]);
    }
    
    public function create()
    {
        return view('tambahmahasiswa');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nm_mahasiswa' => 'required|string|max:255',
            'tmp_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        MahasiswaModel::create($validated);

        session()->flash('success', 'Data mahasiswa berhasil ditambahkan!');
        return redirect()->route('mahasiswa.index');
    }

    public function edit($id_mahasiswa)
    {
        $mahasiswa = MahasiswaModel::findOrFail($id_mahasiswa);
        return view('ubahmahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id_mahasiswa' => 'required|exists:mahasiswa,id_mahasiswa',
            'nm_mahasiswa' => 'required|string|max:255',
            'tmp_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        $mahasiswa = MahasiswaModel::findOrFail($request->id_mahasiswa);
        $mahasiswa->update($validated);

        session()->flash('success', 'Data mahasiswa berhasil diperbarui!');
        return redirect()->route('mahasiswa.index');
    }

    public function destroy($id_mahasiswa)
    {
        $mahasiswa = MahasiswaModel::findOrFail($id_mahasiswa);
        $mahasiswa->delete();

        session()->flash('success', 'Data mahasiswa berhasil dihapus!');
        return redirect()->route('mahasiswa.index');
    }
}
