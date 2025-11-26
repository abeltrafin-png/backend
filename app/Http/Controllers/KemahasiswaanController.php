<?php

namespace App\Http\Controllers;

use App\Models\Kemahasiswaan;
use Illuminate\Http\Request;

class KemahasiswaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kemahasiswaans = Kemahasiswaan::paginate(10);
        return view('kemahasiswaan.index', compact('kemahasiswaans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kemahasiswaan.create');
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
            $data['file_dokumen'] = $request->file('file_dokumen')->store('kemahasiswaan', 'public');
        }

        Kemahasiswaan::create($data);

        return redirect()->route('kemahasiswaan.index')->with('success', 'Kemahasiswaan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kemahasiswaan = Kemahasiswaan::findOrFail($id);
        return view('kemahasiswaan.show', compact('kemahasiswaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kemahasiswaan = Kemahasiswaan::findOrFail($id);
        return view('kemahasiswaan.edit', compact('kemahasiswaan'));
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

        $kemahasiswaan = Kemahasiswaan::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('file_dokumen')) {
            $data['file_dokumen'] = $request->file('file_dokumen')->store('kemahasiswaan', 'public');
        }

        $kemahasiswaan->update($data);

        return redirect()->route('kemahasiswaan.index')->with('success', 'Kemahasiswaan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kemahasiswaan = Kemahasiswaan::findOrFail($id);
        $kemahasiswaan->delete();

        return redirect()->route('kemahasiswaan.index')->with('success', 'Kemahasiswaan deleted successfully.');
    }
}
