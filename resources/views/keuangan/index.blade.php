@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Daftar Peraturan Keuangan</h1>

    <a href="{{ route('keuangan.create') }}" class="btn btn-success mb-3">+ Tambah Peraturan Keuangan</a>

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
            @forelse ($keuangans as $keuangan)
                <tr>
                    <td>{{ $loop->iteration + ($keuangans->currentPage() - 1) * $keuangans->perPage() }}</td>
                    <td>{{ $keuangan->nama_peraturan }}</td>
                    <td>{{ $keuangan->deskripsi }}</td>
                    <td>
                        @if($keuangan->file_dokumen)
                            <a href="{{ asset('storage/' . $keuangan->file_dokumen) }}" target="_blank">Lihat Dokumen</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $keuangan->status }}</td>
                    <td>
                        <a href="{{ route('keuangan.show', $keuangan) }}" class="btn btn-sm btn-info mb-1">
                            <i class="fas fa-eye"></i> Detail</a>
                        <a href="{{ route('keuangan.edit', $keuangan) }}" class="btn btn-sm btn-warning mb-1">
                            <i class="fas fa-edit"></i> Ubah</a>
                        <form action="{{ route('keuangan.destroy', $keuangan) }}" method="POST" class="d-inline"
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
                    <td colspan="6" class="text-center">Data Peraturan Keuangan Tidak Tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $keuangans->links() }}
@endsection
