<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::latest()->paginate(10);
        return view('informasi.index', compact('informasi'));
    }

    public function indexPengumuman()
    {
        $pengumuman = Informasi::where('kategori', 'pengumuman')->latest()->paginate(10);
        return view('informasi.pengumuman', compact('pengumuman'));
    }

    public function indexAgenda()
    {
        $agenda = Informasi::where('kategori', 'agenda')->latest()->paginate(10);
        return view('informasi.agenda', compact('agenda'));
    }

    public function create()
    {
        return view('informasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => 'required|in:berita,pengumuman,agenda',
            'judul' => 'required|string|max:200',
            'isi' => 'required|string',
            'tanggal_publish' => 'required|date',
            'penulis' => 'required|string|max:100',
            'lampiran' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        // HANDLE LAMPIRAN
        if ($request->hasFile('lampiran')) {
            $filename = time() . '.' . $request->file('lampiran')->getClientOriginalExtension();
            $path = public_path('lampiran-informasi');

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $request->file('lampiran')->move($path, $filename);

            $validated['lampiran'] = 'lampiran-informasi/' . $filename;
        }

        Informasi::create($validated);

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil ditambahkan!');
    }

    public function show($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('informasi.show', compact('informasi'));
    }

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('informasi.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori' => 'required|in:berita,pengumuman,agenda',
            'judul' => 'required|string|max:200',
            'isi' => 'required|string',
            'tanggal_publish' => 'required|date',
            'penulis' => 'required|string|max:100',
            'lampiran' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $informasi = Informasi::findOrFail($id);

        // UPDATE LAMPIRAN
        if ($request->hasFile('lampiran')) {

            // hapus file lama
            if ($informasi->lampiran && file_exists(public_path($informasi->lampiran))) {
                unlink(public_path($informasi->lampiran));
            }

            $filename = time() . '.' . $request->file('lampiran')->getClientOriginalExtension();
            $path = public_path('lampiran-informasi');

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $request->file('lampiran')->move($path, $filename);

            $validated['lampiran'] = 'lampiran-informasi/' . $filename;
        }

        $informasi->update($validated);

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);

        if ($informasi->lampiran && file_exists(public_path($informasi->lampiran))) {
            unlink(public_path($informasi->lampiran));
        }

        $informasi->delete();

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil dihapus!');
    }
}