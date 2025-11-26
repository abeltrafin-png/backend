<?php

namespace App\Http\Controllers;

use App\Models\PengabdianMasyarakat;
use Illuminate\Http\Request;

class PengabdianMasyarakatController extends Controller
{
    public function index()
    {
        // Kalau banyak data bisa pakai paginate
        $pengabdian = PengabdianMasyarakat::paginate(10);
        return view('pengabdianmasyarakat.index', compact('pengabdian'));
    }

    public function create()
    {
        return view('pengabdianmasyarakat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nidn' => 'required|string|max:20',
            'nama_dosen' => 'required|string|max:100',
            'judul_pengabdian' => 'required|string|max:255',
            'bidang_pengabdian' => 'nullable|string|max:100',
            'lokasi' => 'nullable|string|max:150',
            'tahun' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'sumber_dana' => 'nullable|string|max:100',
            'jumlah_dana' => 'nullable|numeric|min:0',
            'mitra' => 'nullable|string|max:150',
            'deskripsi' => 'nullable|string',
            'file_laporan' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // 5MB max
        ]);

        if ($request->hasFile('file_laporan')) {
            $filename = time() . '.' . $request->file('file_laporan')->getClientOriginalExtension();
            $path = public_path('file-laporan');
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
            $request->file('file_laporan')->move($path, $filename);
            $validated['file_laporan'] = 'file-laporan/' . $filename;
        }

        PengabdianMasyarakat::create($validated);

        return redirect()->route('pengabdianmasyarakat.index')->with('success', 'Data Pengabdian Masyarakat berhasil ditambahkan!');
    }

    public function show(PengabdianMasyarakat $pengabdianmasyarakat)
    {
        return view('pengabdianmasyarakat.show', compact('pengabdianmasyarakat'));
    }

    public function edit(PengabdianMasyarakat $pengabdianmasyarakat)
    {
        return view('pengabdianmasyarakat.edit', compact('pengabdianmasyarakat'));
    }

    public function update(Request $request, PengabdianMasyarakat $pengabdianmasyarakat)
    {
        $validated = $request->validate([
            'nidn' => 'required|string|max:20',
            'nama_dosen' => 'required|string|max:100',
            'judul_pengabdian' => 'required|string|max:255',
            'bidang_pengabdian' => 'nullable|string|max:100',
            'lokasi' => 'nullable|string|max:150',
            'tahun' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'sumber_dana' => 'nullable|string|max:100',
            'jumlah_dana' => 'nullable|numeric|min:0',
            'mitra' => 'nullable|string|max:150',
            'deskripsi' => 'nullable|string',
            'file_laporan' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // 5MB max
        ]);

        if ($request->hasFile('file_laporan')) {
            if ($pengabdianmasyarakat->file_laporan && file_exists(public_path($pengabdianmasyarakat->file_laporan))) {
                unlink(public_path($pengabdianmasyarakat->file_laporan));
            }
            $filename = time() . '.' . $request->file('file_laporan')->getClientOriginalExtension();
            $path = public_path('file-laporan');
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
            $request->file('file_laporan')->move($path, $filename);
            $validated['file_laporan'] = 'file-laporan/' . $filename;
        }

        $pengabdianmasyarakat->update($validated);

        return redirect()->route('pengabdianmasyarakat.index')->with('success', 'Data Pengabdian Masyarakat berhasil diperbarui!');
    }

    public function destroy(PengabdianMasyarakat $pengabdianmasyarakat)
    {
        if ($pengabdianmasyarakat->file_laporan && file_exists(public_path($pengabdianmasyarakat->file_laporan))) {
            unlink(public_path($pengabdianmasyarakat->file_laporan));
        }

        $pengabdianmasyarakat->delete();

        return redirect()->route('pengabdianmasyarakat.index')->with('success', 'Data Pengabdian Masyarakat berhasil dihapus!');
    }
}
