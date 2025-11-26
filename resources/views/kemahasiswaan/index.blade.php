@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Daftar Peraturan Kemahasiswaan</h1>

    <a href="{{ route('kemahasiswaan.create') }}" class="btn btn-success mb-3">+ Tambah Peraturan Kemahasiswaan</a>

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
            @forelse ($kemahasiswaans as $kemahasiswaan)
                <tr>
                    <td>{{ $loop->iteration + ($kemahasiswaans->currentPage() - 1) * $kemahasiswaans->perPage() }}</td>
                    <td>{{ $kemahasiswaan->nama_peraturan }}</td>
                    <td>{{ $kemahasiswaan->deskripsi }}</td>
                    <td>
                        @if($kemahasiswaan->file_dokumen)
                            <a href="{{ asset('storage/' . $kemahasiswaan->file_dokumen) }}" target="_blank">Lihat Dokumen</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $kemahasiswaan->status }}</td>
                    <td>
                        <a href="{{ route('kemahasiswaan.show', $kemahasiswaan) }}" class="btn btn-sm btn-info mb-1">
                            <i class="fas fa-eye"></i> Detail</a>
                        <a href="{{ route('kemahasiswaan.edit', $kemahasiswaan) }}" class="btn btn-sm btn-warning mb-1">
                            <i class="fas fa-edit"></i> Ubah</a>
                        <form action="{{ route('kemahasiswaan.destroy', $kemahasiswaan) }}" method="POST" class="d-inline"
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
                    <td colspan="6" class="text-center">Data Peraturan Kemahasiswaan Tidak Tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $kemahasiswaans->links() }}
@endsection
