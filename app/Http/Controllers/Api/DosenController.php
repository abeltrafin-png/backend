<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class DosenController extends Controller
{
    public function index(): JsonResponse
    {
        $dosens = Dosen::paginate(10);

        // Removed manual foto_url assignment, accessor will be used automatically

        return response()->json($dosens);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nidn' => 'required|string|unique:tbl_dosen',
            'email' => 'required|email|unique:tbl_dosen',
            'jurusan' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'foto' => 'nullable|file|image|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto-dosen', 'public');
            $data['foto'] = $path;
        }

        $dosen = Dosen::create($data);

        $dosen = Dosen::all()->map(function($item) {
        $item->foto_url = $item->foto ? url('storage/' . $item->foto) : null;
        return $item;
        });
        return response()->json($dosen);

    }

    public function show(Dosen $dosen): JsonResponse
    {
        // Remove manual foto_url assignment to rely on model accessor
        return response()->json($dosen);
    }

    public function update(Request $request, Dosen $dosen): JsonResponse
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nidn' => 'required|string|unique:tbl_dosen,nidn,' . $dosen->id,
            'email' => 'required|email|unique:tbl_dosen,email,' . $dosen->id,
            'jurusan' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'foto' => 'nullable|file|image|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($dosen->foto) {
                Storage::disk('public')->delete($dosen->foto);
            }

            $path = $request->file('foto')->store('foto-dosen', 'public');
            $data['foto'] = $path;
        }

        $dosen->update($data);

        // Remove manual foto_url assignment to rely on model accessor
        return response()->json($dosen);
    }

    public function destroy(Dosen $dosen): JsonResponse
    {
        if ($dosen->foto && Storage::disk('public')->exists($dosen->foto)) {
            Storage::disk('public')->delete($dosen->foto);
        }

        $dosen->delete();
        return response()->json(null, 204);
    }
}