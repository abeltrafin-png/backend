<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlumniController extends Controller
{
    public function index(): JsonResponse
    {
        $alumnis = Alumni::select('nama', 'NIM')
            ->where('angkatan', '>', 2022)
            ->paginate(10);

        $baseUrl = config('app.url');

        $collection = $alumnis->getCollection()->map(function ($alumni) use ($baseUrl) {
            $alumni->foto_url = $alumni->foto_url
                ? "{$baseUrl}/storage/{$alumni->foto_url}"
                : null;

            return $alumni;
        });

        $alumnis->setCollection($collection);

        return response()->json($alumnis);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:100',
            'angkatan' => 'required|integer',
            'jurusan' => 'required|string|max:100',
            'pekerjaan' => 'nullable|string|max:150',
            'kisah_sukses' => 'nullable|string',
            'foto_url' => 'nullable|string',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $alumni = Alumni::create($request->all());

        $baseUrl = config('app.url');
        $alumni->foto_url = $alumni->foto_url
            ? "{$baseUrl}/storage/{$alumni->foto_url}"
            : null;

        return response()->json($alumni, 201);
    }

    public function show(Alumni $alumni): JsonResponse
    {
        $baseUrl = config('app.url');
        $alumni->foto_url = $alumni->foto_url
            ? "{$baseUrl}/storage/{$alumni->foto_url}"
            : null;

        return response()->json($alumni);
    }

    public function update(Request $request, Alumni $alumni): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:100',
            'angkatan' => 'required|integer',
            'jurusan' => 'required|string|max:100',
            'pekerjaan' => 'nullable|string|max:150',
            'kisah_sukses' => 'nullable|string',
            'foto_url' => 'nullable|string',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $alumni->update($request->all());

        $baseUrl = config('app.url');
        $alumni->foto_url = $alumni->foto_url
            ? "{$baseUrl}/storage/{$alumni->foto_url}"
            : null;

        return response()->json($alumni);
    }

    public function destroy(Alumni $alumni): JsonResponse
    {
        $alumni->delete();

        return response()->json(null, 204);
    }
}
