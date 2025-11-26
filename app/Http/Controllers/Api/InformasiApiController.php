<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiApiController extends Controller
{
    /**
     * Mengambil semua informasi atau berdasarkan kategori.
     */
    public function index(Request $request)
    {
        $kategori = $request->query('kategori');

        $query = Informasi::query();

        if ($kategori) {
            // Validasi kategori
            if (!in_array($kategori, ['berita', 'pengumuman', 'agenda'])) {
                return response()->json(['message' => 'Kategori tidak valid. Gunakan: berita, pengumuman, atau agenda.'], 400);
            }
            $query->where('kategori', $kategori);
        }

        $informasi = $query->where('status', 'aktif')->latest()->paginate(10);

        return response()->json($informasi->items());
    }

    /**
     * Mengambil detail informasi berdasarkan ID.
     */
    public function show($id)
    {
        $informasi = Informasi::where('status', 'aktif')->find($id);

        if (!$informasi) {
            return response()->json(['message' => 'Informasi tidak ditemukan'], 404);
        }

        return response()->json($informasi);
    }
}