@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Dashboard Galeri</h1>

    <a href="{{ route('galeri.create') }}" class="btn btn-success mb-3">+ Tambah Galeri</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>NO</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($galeri as $item)
                    <tr>
                        <td>{{ $loop->iteration + ($galeri->currentPage() - 1) * $galeri->perPage() }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                        <td>
                            @if ($item->foto)
                                <img src="{{ asset($item->foto) }}" width="70" class="img-thumbnail" alt="Foto Galeri">
                            @else
                                <span class="text-muted">Belum ada</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('galeri.show', $item->id) }}" class="btn btn-sm btn-info mb-1">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                            <a href="{{ route('galeri.edit', $item->id) }}" class="btn btn-sm btn-warning mb-1">
                                <i class="fas fa-edit"></i> Ubah
                            </a>
                            <form action="{{ route('galeri.destroy', $item->id) }}" method="POST" class="d-inline"
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
                        <td colspan="5" class="text-center">Data Galeri Tidak Tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $galeri->links() }}
@endsection
