<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnis = Alumni::paginate(10);
        return view('alumni.index', compact('alumnis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumni.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'angkatan' => 'required|integer',
            'jurusan' => 'required|string|max:100',
            'pekerjaan' => 'nullable|string|max:150',
            'kisah_sukses' => 'nullable|string',
            'foto_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $data = $request->only(['nama', 'angkatan', 'jurusan', 'pekerjaan', 'kisah_sukses', 'status']);

        if ($request->hasFile('foto_url')) {
            $path = $request->file('foto_url')->store('foto_alumni', 'public');
            $data['foto_url'] = $path;
        }

        Alumni::create($data);

        return redirect()->route('alumni.index')->with('success', 'Alumni berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumni $alumni)
    {
        return view('alumni.show', compact('alumni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumni $alumni)
    {
        return view('alumni.edit', compact('alumni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumni $alumni)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'angkatan' => 'required|integer',
            'jurusan' => 'required|string|max:100',
            'pekerjaan' => 'nullable|string|max:150',
            'kisah_sukses' => 'nullable|string',
            'foto_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $data = $request->only(['nama', 'angkatan', 'jurusan', 'pekerjaan', 'kisah_sukses', 'status']);

        if ($request->hasFile('foto_url')) {
            // Hapus foto lama jika ada
            if ($alumni->foto_url && Storage::disk('public')->exists($alumni->foto_url)) {
                Storage::disk('public')->delete($alumni->foto_url);
            }
            // Simpan foto baru
            $path = $request->file('foto_url')->store('foto_alumni', 'public');
            $data['foto_url'] = $path;
        }

        $alumni->update($data);

        return redirect()->route('alumni.index')->with('success', 'Alumni berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumni $alumni)
    {
        if ($alumni->foto_url && Storage::disk('public')->exists($alumni->foto_url)) {
            Storage::disk('public')->delete($alumni->foto_url);
        }

        $alumni->delete();

        return redirect()->route('alumni.index')->with('success', 'Alumni berhasil dihapus');
    }
}
