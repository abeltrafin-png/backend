<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penelitians = Penelitian::all();
        return view('penelitian.index', compact('penelitians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penelitian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'nullable|string|max:20',
            'nama_dosen' => 'nullable|string|max:100',
            'judul_penelitian' => 'nullable|string|max:255',
            'bidang_penelitian' => 'nullable|string|max:100',
            'jenis_penelitian' => 'nullable|string|max:100',
            'tahun' => 'nullable|integer|min:1900|max:' . (date('Y') + 10),
            'lama_kegiatan' => 'nullable|integer|min:1',
            'sumber_dana' => 'nullable|string|max:100',
            'jumlah_dana' => 'nullable|numeric|min:0',
            'anggota_peneliti' => 'nullable|string',
            'mitra' => 'nullable|string|max:150',
            'status_penelitian' => 'required|in:Proposal,Berjalan,Selesai',
            'hasil_penelitian' => 'nullable|string',
            'publikasi' => 'nullable|string|max:255',
            'file_laporan' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $data = $request->all();

        if ($request->hasFile('file_laporan')) {
            $data['file_laporan'] = $request->file('file_laporan')->store('penelitian', 'public');
        }

        Penelitian::create($data);

        return redirect()->route('penelitian.index')->with('success', 'Penelitian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penelitian = Penelitian::findOrFail($id);
        return view('penelitian.show', compact('penelitian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penelitian = Penelitian::findOrFail($id);
        return view('penelitian.edit', compact('penelitian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nidn' => 'nullable|string|max:20',
            'nama_dosen' => 'nullable|string|max:100',
            'judul_penelitian' => 'nullable|string|max:255',
            'bidang_penelitian' => 'nullable|string|max:100',
            'jenis_penelitian' => 'nullable|string|max:100',
            'tahun' => 'nullable|integer|min:1900|max:' . (date('Y') + 10),
            'lama_kegiatan' => 'nullable|integer|min:1',
            'sumber_dana' => 'nullable|string|max:100',
            'jumlah_dana' => 'nullable|numeric|min:0',
            'anggota_peneliti' => 'nullable|string',
            'mitra' => 'nullable|string|max:150',
            'status_penelitian' => 'required|in:Proposal,Berjalan,Selesai',
            'hasil_penelitian' => 'nullable|string',
            'publikasi' => 'nullable|string|max:255',
            'file_laporan' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $penelitian = Penelitian::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('file_laporan')) {
            if ($penelitian->file_laporan) {
                Storage::disk('public')->delete($penelitian->file_laporan);
            }
            $data['file_laporan'] = $request->file('file_laporan')->store('penelitian', 'public');
        }

        $penelitian->update($data);

        return redirect()->route('penelitian.index')->with('success', 'Penelitian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penelitian = Penelitian::findOrFail($id);

        if ($penelitian->file_laporan) {
            Storage::disk('public')->delete($penelitian->file_laporan);
        }

        $penelitian->delete();

        return redirect()->route('penelitian.index')->with('success', 'Penelitian berhasil dihapus.');
    }
}
