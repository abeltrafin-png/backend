@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Pengumuman</h1>
            <a href="{{ route('informasi.create') }}" class="btn btn-primary btn-sm">Tambah Pengumuman</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Tanggal Publish</th>
                                <th>Penulis</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengumuman as $item)
                                <tr>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ ucfirst($item->kategori) }}</td>
                                    <td>{{ $item->tanggal_publish->format('d-m-Y H:i') }}</td>
                                    <td>{{ $item->penulis }}</td>
                                    <td>
                                        <span class="badge badge-{{ $item->status == 'aktif' ? 'success' : 'danger' }}">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('informasi.show', $item->id_informasi) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('informasi.edit', $item->id_informasi) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('informasi.destroy', $item->id_informasi) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $pengumuman->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection