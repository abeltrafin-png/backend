@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Daftar Peraturan Akademik</h1>

    <a href="{{ route('akademik.create') }}" class="btn btn-success mb-3">+ Tambah Peraturan Akademik</a>

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
            @forelse ($akademiks as $akademik)
                <tr>
                    <td>{{ $loop->iteration + ($akademiks->currentPage() - 1) * $akademiks->perPage() }}</td>
                    <td>{{ $akademik->nama_peraturan }}</td>
                    <td>{{ $akademik->deskripsi }}</td>
                    <td>
                        @if($akademik->file_dokumen)
                            <a href="{{ asset('storage/' . $akademik->file_dokumen) }}" target="_blank">Lihat Dokumen</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $akademik->status }}</td>
                    <td>
                        <a href="{{ route('akademik.show', $akademik) }}" class="btn btn-sm btn-info mb-1">
                            <i class="fas fa-eye"></i> Detail
                        </a>
                        <a href="{{ route('akademik.edit', $akademik) }}" class="btn btn-sm btn-warning mb-1">
                            <i class="fas fa-edit"></i> Ubah
                        </a>
                        <form action="{{ route('akademik.destroy', $akademik) }}" method="POST" class="d-inline"
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
                    <td colspan="6" class="text-center">Data Peraturan Akademik Tidak Tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $akademiks->links() }}
@endsection
