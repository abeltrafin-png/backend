@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa</h5>
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Mahasiswa
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
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jurusan</th>
                            <th>Angkatan</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mahasiswa as $mhs)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->nama }}</td>
                                <td>{{ $mhs->email }}</td>
                                <td>{{ $mhs->jurusan }}</td>
                                <td>{{ $mhs->angkatan }}</td>
                                <td>
                                    @if($mhs->foto)
                                        <img src="{{ asset('storage/' . $mhs->foto) }}" width="70" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('mahasiswa.show', $mhs->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                    <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus mahasiswa ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data mahasiswa</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $mahasiswa->links() }}
        </div>
    </div>
</div>
@endsection
