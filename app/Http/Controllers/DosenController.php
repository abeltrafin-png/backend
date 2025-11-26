<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class DosenController extends Controller
{
    public function index()
    {
        // Kalau banyak data bisa pakai paginate
        $dosen = Dosen::paginate(10);
        return view('dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nidn'    => 'required|unique:tbl_dosen',
            'nama'    => 'required',
            'email'   => 'required|email|unique:tbl_dosen',
            'jurusan' => 'required',
            'jabatan' => 'required',
            'foto'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('dosen', 'public');
            $validated['foto'] = $path;
        }

        Dosen::create($validated);

        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil ditambahkan!');
    }

    public function show(Dosen $dosen)
    {
        return view('dosen.show', compact('dosen'));
    }

    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

public function update(Request $request, Dosen $dosen)
{
    $validated = $request->validate([
        'nidn'    => 'required|unique:tbl_dosen,nidn,' . $dosen->id,
        'nama'    => 'required',
        'email'   => 'required|email|unique:tbl_dosen,email,' . $dosen->id,
        'jurusan' => 'required',
        'jabatan' => 'required',
        'foto'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('foto')) {
        if ($dosen->foto && \Illuminate\Support\Facades\Storage::disk('public')->exists($dosen->foto)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($dosen->foto);
        }
        $path = $request->file('foto')->store('dosen', 'public');
        $validated['foto'] = $path;
    }

    $dosen->update($validated);

    return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil diperbarui!');
}

    public function destroy(Dosen $dosen)
{
    if ($dosen->foto && file_exists(public_path($dosen->foto))) {
        unlink(public_path($dosen->foto));
    }

    $dosen->delete();

    return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil dihapus!');
    }
}
