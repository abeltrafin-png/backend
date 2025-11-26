<?php

namespace App\Http\Controllers;

use App\Models\Akademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AkademikController extends Controller
{
    public function index()
    {
        $akademiks = Akademik::paginate(10);
        return view('akademik.index', compact('akademiks'));
    }

    public function create()
    {
        return view('akademik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peraturan' => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'file_dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $data = $request->only(['nama_peraturan', 'deskripsi', 'status']);

        if ($request->hasFile('file_dokumen')) {
            $data['file_dokumen'] = $request->file('file_dokumen')->store('akademik', 'public');
        }

        Akademik::create($data);

        return redirect()->route('akademik.index')->with('success', 'Data akademik berhasil ditambahkan.');
    }

    // ✅ gunakan route model binding biar tidak error parameter
    public function show(Akademik $akademik)
    {
        return view('akademik.show', compact('akademik'));
    }

    public function edit(Akademik $akademik)
    {
        return view('akademik.edit', compact('akademik'));
    }

    public function update(Request $request, Akademik $akademik)
    {
        $request->validate([
            'nama_peraturan' => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'file_dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $data = $request->only(['nama_peraturan', 'deskripsi', 'status']);

        if ($request->hasFile('file_dokumen')) {
            // hapus file lama jika ada
            if ($akademik->file_dokumen && Storage::disk('public')->exists($akademik->file_dokumen)) {
                Storage::disk('public')->delete($akademik->file_dokumen);
            }
            $data['file_dokumen'] = $request->file('file_dokumen')->store('akademik', 'public');
        }

        $akademik->update($data);

        return redirect()->route('akademik.index')->with('success', 'Data akademik berhasil diperbarui.');
    }

    public function destroy(Akademik $akademik)
    {
        if ($akademik->file_dokumen && Storage::disk('public')->exists($akademik->file_dokumen)) {
            Storage::disk('public')->delete($akademik->file_dokumen);
        }

        $akademik->delete();

        return redirect()->route('akademik.index')->with('success', 'Data akademik berhasil dihapus.');
    }
}
