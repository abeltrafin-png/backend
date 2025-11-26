<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Peraturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeraturanController extends Controller
{
    /**
     * Display a listing of peraturan
     * Support filter by kategori
     */
    public function index(Request $request)
    {
        try {
            $query = Peraturan::where('status', 'aktif');

            // Filter by kategori if provided
            if ($request->filled('kategori')) {
                $query->where('kategori', $request->kategori);
            }

            $peraturan = $query->orderBy('tanggal_berlaku', 'desc')->get();

            return response()->json($peraturan, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch peraturan',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created peraturan
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'judul'             => 'required|string|max:200',
                'nomor_peraturan'   => 'required|string|max:100',
                'isi'               => 'required|string',
                'kategori'          => 'required|in:akademik,kemahasiswaan,administratif,keuangan',
                'tanggal_berlaku'   => 'required|date',
                'file_url'          => 'nullable|string|max:255',
                'status'            => 'nullable|in:aktif,tidak_aktif'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => 'Validation failed',
                    'messages' => $validator->errors()
                ], 422);
            }

            $peraturan = Peraturan::create([
                'judul'             => $request->judul,
                'nomor_peraturan'   => $request->nomor_peraturan,
                'isi'               => $request->isi,
                'kategori'          => $request->kategori,
                'file_url'          => $request->file_url,
                'tanggal_berlaku'   => $request->tanggal_berlaku,
                'status'            => $request->status ?? 'aktif'
            ]);

            return response()->json([
                'message' => 'Peraturan created successfully',
                'data' => $peraturan
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create peraturan',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified peraturan
     */
    public function show($id)
    {
        try {
            $peraturan = Peraturan::findOrFail($id);

            return response()->json($peraturan, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Peraturan not found',
                'message' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Update the specified peraturan
     */
    public function update(Request $request, $id)
    {
        try {
            $peraturan = Peraturan::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'judul'             => 'sometimes|required|string|max:200',
                'nomor_peraturan'   => 'sometimes|required|string|max:100',
                'isi'               => 'sometimes|required|string',
                'kategori'          => 'sometimes|required|in:akademik,kemahasiswaan,administratif,keuangan',
                'tanggal_berlaku'   => 'sometimes|required|date',
                'file_url'          => 'nullable|string|max:255',
                'status'            => 'nullable|in:aktif,tidak_aktif'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => 'Validation failed',
                    'messages' => $validator->errors()
                ], 422);
            }

            $peraturan->update($request->all());

            return response()->json([
                'message' => 'Peraturan updated successfully',
                'data' => $peraturan
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update peraturan',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified peraturan
     */
    public function destroy($id)
    {
        try {
            $peraturan = Peraturan::findOrFail($id);
            $peraturan->delete();

            return response()->json([
                'message' => 'Peraturan deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete peraturan',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
