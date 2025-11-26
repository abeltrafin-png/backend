<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TracerAlumni;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TracerAlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $tracers = TracerAlumni::paginate(10);
        return response()->json($tracers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|string|max:20',
            'nama_lengkap' => 'required|string|max:100',
            'program_studi' => 'nullable|string|max:100',
            'tahun_lulus' => 'required|integer|min:1900|max:' . (date('Y') + 10),
            'email' => 'nullable|email|max:100',
            'no_hp' => 'nullable|string|max:20',
            'status_pekerjaan' => 'required|in:Bekerja,Wirausaha,Belum Bekerja,Melanjutkan Studi',
            'nama_perusahaan' => 'nullable|string|max:150',
            'jabatan' => 'nullable|string|max:100',
            'bidang_pekerjaan' => 'nullable|string|max:100',
            'alamat_perusahaan' => 'nullable|string',
            'tanggal_mulai' => 'nullable|date',
            'gaji_awal' => 'nullable|numeric|min:0',
            'lama_mendapat_pekerjaan' => 'nullable|integer|min:0',
            'relevansi_pekerjaan' => 'nullable|in:Sangat Relevan,Relevan,Kurang Relevan,Tidak Relevan',
            'kepuasan_pekerjaan' => 'nullable|in:Sangat Puas,Puas,Cukup,Kurang',
            'saran_untuk_kampus' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $tracer = TracerAlumni::create($request->all());
        return response()->json($tracer, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(TracerAlumni $tracer): JsonResponse
    {
        return response()->json($tracer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, TracerAlumni $tracer): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'sometimes|required|string|max:20',
            'nama_lengkap' => 'sometimes|required|string|max:100',
            'program_studi' => 'nullable|string|max:100',
            'tahun_lulus' => 'sometimes|required|integer|min:1900|max:' . (date('Y') + 10),
            'email' => 'nullable|email|max:100',
            'no_hp' => 'nullable|string|max:20',
            'status_pekerjaan' => 'sometimes|required|in:Bekerja,Wirausaha,Belum Bekerja,Melanjutkan Studi',
            'nama_perusahaan' => 'nullable|string|max:150',
            'jabatan' => 'nullable|string|max:100',
            'bidang_pekerjaan' => 'nullable|string|max:100',
            'alamat_perusahaan' => 'nullable|string',
            'tanggal_mulai' => 'nullable|date',
            'gaji_awal' => 'nullable|numeric|min:0',
            'lama_mendapat_pekerjaan' => 'nullable|integer|min:0',
            'relevansi_pekerjaan' => 'nullable|in:Sangat Relevan,Relevan,Kurang Relevan,Tidak Relevan',
            'kepuasan_pekerjaan' => 'nullable|in:Sangat Puas,Puas,Cukup,Kurang',
            'saran_untuk_kampus' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $tracer->update($request->all());
        return response()->json($tracer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(TracerAlumni $tracer): JsonResponse
    {
        $tracer->delete();
        return response()->json(null, 204);
    }
}
