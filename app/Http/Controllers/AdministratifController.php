<?php

namespace App\Http\Controllers;

use App\Models\Administratif;
use Illuminate\Http\Request;

class AdministratifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administratifs = Administratif::paginate(10);
        return view('administratif.index', compact('administratifs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administratif.create');
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
            $data['file_dokumen'] = $request->file('file_dokumen')->store('administratif', 'public');
        }

        Administratif::create($data);

        return redirect()->route('administratif.index')->with('success', 'Administratif created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $administratif = Administratif::findOrFail($id);
        return view('administratif.show', compact('administratif'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $administratif = Administratif::findOrFail($id);
        return view('administratif.edit', compact('administratif'));
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

        $administratif = Administratif::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('file_dokumen')) {
            $data['file_dokumen'] = $request->file('file_dokumen')->store('administratif', 'public');
        }

        $administratif->update($data);

        return redirect()->route('administratif.index')->with('success', 'Administratif updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $administratif = Administratif::findOrFail($id);
        $administratif->delete();

        return redirect()->route('administratif.index')->with('success', 'Administratif deleted successfully.');
    }
}
