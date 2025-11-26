<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Mahasiswa::query();

        if ($request->has('angkatan_gt') && is_numeric($request->angkatan_gt)) {
            $query->where('angkatan', '>', $request->angkatan_gt);
        }

        $mahasiswas = $query->paginate(10);

        $baseUrl = config('app.url');

        $collection = $mahasiswas->getCollection()->map(function ($mahasiswa) use ($baseUrl) {
            $mahasiswa->foto_url = $mahasiswa->foto
                ? "{$baseUrl}/storage/{$mahasiswa->foto}"
                : null;

            return $mahasiswa;
        });

        $mahasiswas->setCollection($collection);

        return response()->json($mahasiswas);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|string|unique:tbl_mahasiswa,nim',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:tbl_mahasiswa,email',
            'jurusan' => 'required|string|max:255',
            'angkatan' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $mahasiswa = Mahasiswa::create($request->all());

        $baseUrl = config('app.url');
        $mahasiswa->foto_url = $mahasiswa->foto
            ? "{$baseUrl}/storage/{$mahasiswa->foto}"
            : null;

        return response()->json($mahasiswa, 201);
    }

    public function show(Mahasiswa $mahasiswa): JsonResponse
    {
        $baseUrl = config('app.url');
        $mahasiswa->foto_url = $mahasiswa->foto
            ? "{$baseUrl}/storage/{$mahasiswa->foto}"
            : null;

        return response()->json($mahasiswa);
    }

    public function update(Request $request, Mahasiswa $mahasiswa): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|string|unique:tbl_mahasiswa,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:tbl_mahasiswa,email,' . $mahasiswa->id,
            'jurusan' => 'required|string|max:255',
            'angkatan' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $mahasiswa->update($request->all());

        $baseUrl = config('app.url');
        $mahasiswa->foto_url = $mahasiswa->foto
            ? "{$baseUrl}/storage/{$mahasiswa->foto}"
            : null;

        return response()->json($mahasiswa);
    }

    public function destroy(Mahasiswa $mahasiswa): JsonResponse
    {
        $mahasiswa->delete();

        return response()->json(null, 204);
    }
}
