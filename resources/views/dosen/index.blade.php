@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Dashboard Dosen</h1>

    <a href="{{ route('dosen.create') }}" class="btn btn-success mb-3">+ Tambah Dosen</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>NO</th>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jurusan</th>
                    <th>Jabatan</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dosen as $dsn)
                    <tr>
                        <td>{{ $loop->iteration + ($dosen->currentPage() - 1) * $dosen->perPage() }}</td>
                        <td>{{ $dsn->nidn }}</td>
                        <td>{{ $dsn->nama }}</td>
                        <td>{{ $dsn->email }}</td>
                        <td>{{ $dsn->jurusan }}</td>
                        <td>{{ $dsn->jabatan }}</td>
                        <td>
                            @if ($dsn->foto)
                                <img src="{{ $dsn->foto_url }}" width="70" class="img-thumbnail" alt="Foto Dosen">
                            @else
                                <span class="text-muted">Belum ada</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('dosen.show', $dsn->id) }}" class="btn btn-sm btn-info mb-1">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                            <a href="{{ route('dosen.edit', $dsn->id) }}" class="btn btn-sm btn-warning mb-1">
                                <i class="fas fa-edit"></i> Ubah
                            </a>
                            <form action="{{ route('dosen.destroy', $dsn->id) }}" method="POST" class="d-inline"
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
                        <td colspan="8" class="text-center">Data Dosen Tidak Tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $dosen->links() }}
@endsection