<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::with('dosen')->paginate(10);
        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        // Fetch dosen data from database
        $dosens = Dosen::all();

        return view('matakuliah.create', compact('dosens'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_matkul' => 'required|string|max:20|unique:tbl_matakuliah',
            'nama_matkul' => 'required|string|max:100',
            'semester' => 'required|integer|min:1|max:8',
            'sks' => 'required|integer|min:1|max:6',
            'deskripsi' => 'nullable|string',
            'dosen_id' => 'required|exists:tbl_dosen,id',
        ]);

        Matakuliah::create($validated);

        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan!');
    }

    public function show(Matakuliah $matakuliah)
    {
        return view('matakuliah.show', compact('matakuliah'));
    }

    public function edit(Matakuliah $matakuliah)
    {
        $dosens = Dosen::all();
        return view('matakuliah.edit', compact('matakuliah', 'dosens'));
    }

    public function update(Request $request, Matakuliah $matakuliah)
    {
        $validated = $request->validate([
            'kode_matkul' => 'required|string|max:20|unique:tbl_matakuliah,kode_matkul,' . $matakuliah->id,
            'nama_matkul' => 'required|string|max:100',
            'semester' => 'required|integer|min:1|max:8',
            'sks' => 'required|integer|min:1|max:6',
            'deskripsi' => 'nullable|string',
            'dosen_id' => 'required|exists:tbl_dosen,id',
        ]);

        $matakuliah->update($validated);

        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah berhasil diperbarui!');
    }

    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah berhasil dihapus!');
    }
}
