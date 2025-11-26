<?php

namespace App\Http\Controllers;

use App\Models\galeri;
use GMP;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    
    public function index()
    {
        $galeri = galeri::with('kegiatan')->latest()->get();
        return view('galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
           'kegiatan_id' => 'required|exists:tbl_kegiatan,id',
           'file' => 'required|image|mimes:jpg,jpeg,png, mp4', 
           'tipe' => 'required|string',
           'keterangan' => 'nullable|string',
        ]);
        // Upload file
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('galeri', 'public');
        } 
        galeri::create($validated);

        return redirect()->route('galeri.index')->
        with('success', 'Galeri berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(galeri $galeri)
    {
        return view('galeri.show', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(galeri $galeri)
    {
        return view('galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, galeri $galeri)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($galeri->foto && file_exists(public_path($galeri->foto))) {
                unlink(public_path($galeri->foto));
            }
            $filename = time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $path = public_path('foto-galeri');
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
            $request->file('foto')->move($path, $filename);
            $validated['foto'] = 'foto-galeri/' . $filename;
        }

        $galeri->update($validated);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(galeri $galeri)
    {
        if ($galeri->foto && file_exists(public_path($galeri->foto))) {
            unlink(public_path($galeri->foto));
        }

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus!');
    }
}
