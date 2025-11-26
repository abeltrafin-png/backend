@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Project Mahasiswa</h1>

    <a href="{{ route('projectmahasiswa.create') }}" class="btn btn-success mb-3">+ Tambah Project Mahasiswa</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>NO</th>
                <th>Nama Project</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Mahasiswa</th>
                <th>Foto</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $project->nama_project }}</td>
                    <td>{{ $project->deskripsi }}</td>
                    <td>{{ $project->status }}</td>
                    <td>{{ $project->mahasiswa->nama ?? 'Mahasiswa tidak ditemukan' }}</td>
                    <td>
                        @if($project->foto)
                            <img src="{{ asset('storage/' . $project->foto) }}" width="70px" alt="Foto Project">
                        @else
                            <span class="text-muted">Belum ada</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('projectmahasiswa.show', $project->id) }}" class="btn btn-sm btn-info mb-1">Detail</a>
                        <a href="{{ route('projectmahasiswa.edit', $project->id) }}" class="btn btn-sm btn-warning mb-1">Ubah</a>
                        <form action="{{ route('projectmahasiswa.destroy', $project->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger mb-1">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Data Project Mahasiswa Tidak Tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $projects->links() }}
@endsection