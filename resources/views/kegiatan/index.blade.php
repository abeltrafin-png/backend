@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Dashboard Kegiatan</h1>

    <a href="{{ route('kegiatan.create') }}" class="btn btn-success mb-3">+ Tambah Kegiatan</a>

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
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kegiatan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                        <td>{{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') : '-' }}</td>
                        <td>{{ $item->lokasi }}</td>
                        <td>
                            <a href="{{ route('kegiatan.show', $item->id) }}" class="btn btn-sm btn-info mb-1">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                            <a href="{{ route('kegiatan.edit', $item->id) }}" class="btn btn-sm btn-warning mb-1">
                                <i class="fas fa-edit"></i> Ubah
                            </a>
                            <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST" class="d-inline"
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
                        <td colspan="6" class="text-center">Data Kegiatan Tidak Tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
