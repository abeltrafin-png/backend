@extends('layout.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Alumni</h1>
        <a href="{{ route('alumni.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Alumni
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Alumni</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Angkatan</th>
                            <th>Jurusan</th>
                            <th>Pekerjaan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumnis as $alumni)
                        <tr>
                            <td>{{ $alumni->nama }}</td>
                            <td>{{ $alumni->angkatan }}</td>
                            <td>{{ $alumni->jurusan }}</td>
                            <td>{{ $alumni->pekerjaan ?? '-' }}</td>
                            <td>
                                <span class="badge badge-{{ $alumni->status == 'approved' ? 'success' : ($alumni->status == 'rejected' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($alumni->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('alumni.show', $alumni) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('alumni.edit', $alumni) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('alumni.destroy', $alumni) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus alumni ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $alumnis->links() }}
        </div>
    </div>
</div>
@endsection
