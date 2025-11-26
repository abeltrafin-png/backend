<?php

namespace App\Http\Controllers;

use App\Models\ProjectMahasiswa;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class ProjectMahasiswaController extends Controller
{
    public function index()
    {
        $projects = ProjectMahasiswa::with('mahasiswa')->paginate(10);
        return view('projectmahasiswa.index', compact('projects'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        return view('projectmahasiswa.create', compact('mahasiswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_project' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:ongoing,completed,cancelled',
            'mahasiswa_id' => 'required|exists:tbl_mahasiswa,id',
            'foto' => 'nullable|image|max:2048',
        ]);

        $project = new ProjectMahasiswa();
        $project->nama_project = $request->nama_project;
        $project->deskripsi = $request->deskripsi;
        $project->status = $request->status;
        $project->mahasiswa_id = $request->mahasiswa_id;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('project_fotos', 'public');
            $project->foto = $path;
        }

        $project->save();

        return redirect()->route('projectmahasiswa.index')->with('success', 'Project Mahasiswa berhasil ditambahkan.');
    }

    public function show(ProjectMahasiswa $projectmahasiswa)
    {
        return view('projectmahasiswa.show', compact('projectmahasiswa'));
    }

    public function edit(ProjectMahasiswa $projectmahasiswa)
    {
        $mahasiswas = Mahasiswa::all();
        return view('projectmahasiswa.edit', compact('projectmahasiswa', 'mahasiswas'));
    }

    public function update(Request $request, ProjectMahasiswa $projectmahasiswa)
    {
        $request->validate([
            'nama_project' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:ongoing,completed,cancelled',
            'mahasiswa_id' => 'required|exists:tbl_mahasiswa,id',
            'foto' => 'nullable|image|max:2048',
        ]);

        $projectmahasiswa->nama_project = $request->nama_project;
        $projectmahasiswa->deskripsi = $request->deskripsi;
        $projectmahasiswa->status = $request->status;
        $projectmahasiswa->mahasiswa_id = $request->mahasiswa_id;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('project_fotos', 'public');
            $projectmahasiswa->foto = $path;
        }

        $projectmahasiswa->save();

        return redirect()->route('projectmahasiswa.index')->with('success', 'Project Mahasiswa berhasil diupdate.');
    }

    public function destroy(ProjectMahasiswa $projectmahasiswa)
    {
        $projectmahasiswa->delete();
        return redirect()->route('projectmahasiswa.index')->with('success', 'Project Mahasiswa berhasil dihapus.');
    }
}
