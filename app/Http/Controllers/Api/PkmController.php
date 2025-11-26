<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PengabdianMasyarakat;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $pengabdian = PengabdianMasyarakat::paginate(10);
        return response()->json($pengabdian);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
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

        $pengabdian = PengabdianMasyarakat::create($validated);
        return response()->json($pengabdian, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PengabdianMasyarakat $pengabdianmasyarakat): JsonResponse
    {
        return response()->json($pengabdianmasyarakat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengabdianMasyarakat $pengabdianmasyarakat): JsonResponse
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
        return response()->json($pengabdianmasyarakat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengabdianMasyarakat $pengabdianmasyarakat): JsonResponse
    {
        if ($pengabdianmasyarakat->file_laporan && file_exists(public_path($pengabdianmasyarakat->file_laporan))) {
            unlink(public_path($pengabdianmasyarakat->file_laporan));
        }

        $pengabdianmasyarakat->delete();
        return response()->json(null, 204);
    }
}
