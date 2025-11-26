@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-primary">Daftar Berita</h5>
            <a href="{{ route('berita.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Berita
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
                            <th>Penulis</th>
                            <th>Tanggal</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($berita as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->penulis }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>
                                    @if($item->foto)
                                        <img src="{{ asset($item->foto) }}" width="70" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('berita.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                    <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data berita</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $berita->links() }}
        </div>
    </div>
</div>
@endsection
