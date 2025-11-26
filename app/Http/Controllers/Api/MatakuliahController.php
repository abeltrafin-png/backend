<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $matakuliah = Matakuliah::with('dosen')->paginate(10);
        return response()->json($matakuliah);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'kode_matkul' => 'required|string|max:20|unique:tbl_matakuliah',
            'nama_matkul' => 'required|string|max:100',
            'semester' => 'required|integer|min:1|max:8',
            'sks' => 'required|integer|min:1|max:6',
            'deskripsi' => 'nullable|string',
            'dosen_id' => 'required|exists:tbl_dosen,id',
        ]);

        $matakuliah = Matakuliah::create($validated);
        return response()->json($matakuliah, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Matakuliah $matakuliah): JsonResponse
    {
        return response()->json($matakuliah->load('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matakuliah $matakuliah): JsonResponse
    {
        $validated = $request->validate([
            'kode_matkul' => 'required|string|max:20|unique:tbl_matakuliah,kode_matkul,' . $matakuliah->id,
            'nama_matkul' => 'required|string|max:100',
            'semester' => 'required|integer|min:1|max:8',
            'sks' => 'required|integer|min:1|max:6',
            'deskripsi' => 'nullable|string',
            'dosen_id' => 'required|exists:tbl_dosen,id',
        ]);

        $matakuliah->update($validated);
        return response()->json($matakuliah);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matakuliah $matakuliah): JsonResponse
    {
        $matakuliah->delete();
        return response()->json(null, 204);
    }
}
