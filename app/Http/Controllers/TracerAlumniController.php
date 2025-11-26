<?php

namespace App\Http\Controllers;

use App\Models\TracerAlumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TracerAlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracers = TracerAlumni::paginate(10);
        return view('tracer-alumni.index', compact('tracers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tracer-alumni.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|string|max:20',
            'nama_lengkap' => 'required|string|max:100',
            'program_studi' => 'nullable|string|max:100',
            'tahun_lulus' => 'required|integer|min:1900|max:' . (date('Y') + 10),
            'email' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:20',
            'status_pekerjaan' => 'required|in:Bekerja,Wirausaha,Belum Bekerja,Melanjutkan Studi',
            'nama_perusahaan' => 'nullable|string|max:150',
            'jabatan' => 'nullable|string|max:100',
            'bidang_pekerjaan' => 'nullable|string|max:100',
            'alamat_perusahaan' => 'nullable|string',
            'tanggal_mulai' => 'nullable|date',
            'gaji_awal' => 'nullable|numeric|min:0',
            'posisi' => 'nullable|string|max:100',
            'gaji' => 'nullable|numeric|min:0',
            'lokasi' => 'nullable|string|max:150',
            'periode_berkerja' => 'nullable|string|max:50',
            'komentar' => 'nullable|string',
            'lama_mendapat_pekerjaan' => 'nullable|integer|min:0',
            'relevansi_pekerjaan' => 'nullable|in:Sangat Relevan,Relevan,Kurang Relevan,Tidak Relevan',
            'kepuasan_pekerjaan' => 'nullable|in:Sangat Puas,Puas,Cukup,Kurang',
            'saran_untuk_kampus' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        TracerAlumni::create($request->all());

        return redirect()->route('tracer-alumni.index')
            ->with('success', 'Data tracer alumni berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TracerAlumni $tracerAlumni)
    {
        return view('tracer-alumni.show', compact('tracerAlumni'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TracerAlumni $tracerAlumni)
    {
        return view('tracer-alumni.edit', compact('tracerAlumni'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TracerAlumni $tracerAlumni)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|string|max:20',
            'nama_lengkap' => 'required|string|max:100',
            'program_studi' => 'nullable|string|max:100',
            'tahun_lulus' => 'required|integer|min:1900|max:' . (date('Y') + 10),
            'email' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:20',
            'status_pekerjaan' => 'required|in:Bekerja,Wirausaha,Belum Bekerja,Melanjutkan Studi',
            'nama_perusahaan' => 'nullable|string|max:150',
            'jabatan' => 'nullable|string|max:100',
            'bidang_pekerjaan' => 'nullable|string|max:100',
            'alamat_perusahaan' => 'nullable|string',
            'tanggal_mulai' => 'nullable|date',
            'gaji_awal' => 'nullable|numeric|min:0',
            'posisi' => 'nullable|string|max:100',
            'gaji' => 'nullable|numeric|min:0',
            'lokasi' => 'nullable|string|max:150',
            'periode_berkerja' => 'nullable|string|max:50',
            'komentar' => 'nullable|string',
            'lama_mendapat_pekerjaan' => 'nullable|integer|min:0',
            'relevansi_pekerjaan' => 'nullable|in:Sangat Relevan,Relevan,Kurang Relevan,Tidak Relevan',
            'kepuasan_pekerjaan' => 'nullable|in:Sangat Puas,Puas,Cukup,Kurang',
            'saran_untuk_kampus' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $tracerAlumni->update($request->all());

        return redirect()->route('tracer-alumni.index')
            ->with('success', 'Data tracer alumni berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TracerAlumni $tracerAlumni)
    {
        $tracerAlumni->delete();

        return redirect()->route('tracer-alumni.index')
            ->with('success', 'Data tracer alumni berhasil dihapus.');
    }
}
