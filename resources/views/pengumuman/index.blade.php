@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-primary">Daftar Pengumuman</h5>
            <a href="{{ route('pengumuman.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Pengumuman
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Tanggal Publish</th>
                            <th>Views</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengumuman as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>
                                    <span class="badge badge-{{ $item->status == 'published' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td>{{ $item->tanggal_publish->format('d/m/Y') }}</td>
                                <td>{{ $item->views }}</td>
                                <td>
                                    <a href="{{ route('pengumuman.show', $item->id_pengumuman) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('pengumuman.edit', $item->id_pengumuman) }}" class="btn btn-warning btn-sm">Ubah</a>
                                    <form action="{{ route('pengumuman.destroy', $item->id_pengumuman) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data pengumuman</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $pengumuman->links() }}
        </div>
    </div>
</div>
@endsection
