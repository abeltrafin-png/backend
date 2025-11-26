@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-primary">Daftar Informasi</h5>
            <a href="{{ route('informasi.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Informasi
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($informasi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>
                                    <span class="badge badge-{{ $item->status == 'aktif' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_publish)->format('d/m/Y') }}</td>
                                <td> 
                                     <a href="{{ route('informasi.edit', $item->id_informasi) }}" class="btn btn-warning btn-sm">Ubah</a> 
                                     <form action="{{ route('informasi.destroy', $item->id_informasi) }} " method="POST" class="d-inline" 
                                           onsubmit="return confirm('Yakin ingin menghapus informasi ini?')"> 
                                         @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data informasi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $informasi->links() }}
        </div>
    </div>
</div>
@endsection


    <!-- Nav Item - Informasi -->
    <li class="nav-item {{ request()->is('informasi*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('informasi.index') }}">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>Informasi</span>
        </a>
    </li>