@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Daftar Peraturan Administratif</h1>

    <a href="{{ route('administratif.create') }}" class="btn btn-success mb-3">+ Tambah Peraturan Administratif</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>NO</th>
                <th>Nama Peraturan</th>
                <th>Deskripsi</th>
                <th>File Dokumen</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($administratifs as $administratif)
                <tr>
                    <td>{{ $loop->iteration + ($administratifs->currentPage() - 1) * $administratifs->perPage() }}</td>
                    <td>{{ $administratif->nama_peraturan }}</td>
                    <td>{{ $administratif->deskripsi }}</td>
                    <td>
                        @if($administratif->file_dokumen)
                            <a href="{{ asset('storage/' . $administratif->file_dokumen) }}" target="_blank">Lihat Dokumen</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $administratif->status }}</td>
                    <td>
                        <a href="{{ route('administratif.show', $administratif) }}" class="btn btn-sm btn-info mb-1">
                            <i class="fas fa-eye"></i> Detail</a>
                        <a href="{{ route('administratif.edit', $administratif) }}" class="btn btn-sm btn-warning mb-1">
                            <i class="fas fa-edit"></i> Ubah</a>
                        <form action="{{ route('administratif.destroy', $administratif) }}" method="POST" class="d-inline"
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
                    <td colspan="6" class="text-center">Data Peraturan Administratif Tidak Tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $administratifs->links() }}
@endsection
