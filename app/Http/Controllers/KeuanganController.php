<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keuangans = Keuangan::paginate(10);
        return view('keuangan.index', compact('keuangans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keuangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_peraturan' => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'file_dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $data = $request->all();

        if ($request->hasFile('file_dokumen')) {
            $data['file_dokumen'] = $request->file('file_dokumen')->store('keuangan', 'public');
        }

        Keuangan::create($data);

        return redirect()->route('keuangan.index')->with('success', 'Keuangan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        return view('keuangan.show', compact('keuangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        return view('keuangan.edit', compact('keuangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_peraturan' => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'file_dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $keuangan = Keuangan::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('file_dokumen')) {
            $data['file_dokumen'] = $request->file('file_dokumen')->store('keuangan', 'public');
        }

        $keuangan->update($data);

        return redirect()->route('keuangan.index')->with('success', 'Keuangan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        $keuangan->delete();

        return redirect()->route('keuangan.index')->with('success', 'Keuangan deleted successfully.');
    }
}
