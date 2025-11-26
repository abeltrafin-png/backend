@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Daftar Mata Kuliah</h1>

    <a href="{{ route('matakuliah.create') }}" class="btn btn-success mb-3">+ Tambah Mata Kuliah</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>NO</th>
                    <th>ID</th>
                    <th>Kode Matkul</th>
                    <th>Nama Matkul</th>
                    <th>Semester</th>
                    <th>SKS</th>
                    <th>Deskripsi</th>
                    <th>Dosen ID</th>
                    <th>Action</th>
                </tr>
            </thead>
        <tbody>
            @forelse ($matakuliah as $mk)
                <tr>
                    <td>{{ $loop->iteration + ($matakuliah->currentPage() - 1) * $matakuliah->perPage() }}</td>
                    <td>{{ $mk->id }}</td>
                    <td>{{ $mk->kode_matkul }}</td>
                    <td>{{ $mk->nama_matkul }}</td>
                    <td>{{ $mk->semester }}</td>
                    <td>{{ $mk->sks }}</td>
                    <td>{{ $mk->deskripsi ?? 'N/A' }}</td>
                    <td>{{ $mk->dosen_id }}</td>
                    <td>
                        <a href="{{ route('matakuliah.show', $mk->id) }}" class="btn btn-sm btn-info mb-1">
                            <i class="fas fa-eye"></i> Detail</a>
                        <a href="{{ route('matakuliah.edit', $mk->id) }}" class="btn btn-sm btn-warning mb-1">
                            <i class="fas fa-edit"></i> Ubah</a>
                        <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger mb-1">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Data Mata Kuliah Tidak Tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $matakuliah->links() }}
@endsection
