<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $kategori = $request->query('kategori');

        if ($kategori) {
            $informasis = Informasi::where('kategori', $kategori)
                ->where('status', 'aktif')
                ->orderBy('tanggal_publish', 'desc')
                ->paginate(10);
        } else {
            $informasis = Informasi::where('status', 'aktif')
                ->orderBy('tanggal_publish', 'desc')
                ->paginate(10);
        }

        return response()->json($informasis);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'kategori' => 'required|in:berita,pengumuman,agenda',
            'judul' => 'required|string|max:200',
            'isi' => 'required|string',
            'tanggal_publish' => 'required|date',
            'penulis' => 'required|string|max:100',
            'lampiran' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $informasi = Informasi::create($request->all());
        return response()->json($informasi, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Informasi $informasi): JsonResponse
    {
        return response()->json($informasi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Informasi $informasi): JsonResponse
    {
        $request->validate([
            'kategori' => 'required|in:berita,pengumuman,agenda',
            'judul' => 'required|string|max:200',
            'isi' => 'required|string',
            'tanggal_publish' => 'required|date',
            'penulis' => 'required|string|max:100',
            'lampiran' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $informasi->update($request->all());
        return response()->json($informasi);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informasi $informasi): JsonResponse
    {
        $informasi->delete();
        return response()->json(null, 204);
    }
}
