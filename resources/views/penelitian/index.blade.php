@extends('layout.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penelitian</h1>
        <a href="{{ route('penelitian.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Penelitian
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Penelitian</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NIDN</th>
                            <th>Nama Dosen</th>
                            <th>Judul Penelitian</th>
                            <th>Bidang</th>
                            <th>Jenis</th>
                            <th>Tahun</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penelitians as $penelitian)
                        <tr>
                            <td>{{ $penelitian->id_penelitian }}</td>
                            <td>{{ $penelitian->nidn }}</td>
                            <td>{{ $penelitian->nama_dosen }}</td>
                            <td>{{ $penelitian->judul_penelitian }}</td>
                            <td>{{ $penelitian->bidang_penelitian }}</td>
                            <td>{{ $penelitian->jenis_penelitian }}</td>
                            <td>{{ $penelitian->tahun }}</td>
                            <td>
                                <span class="badge badge-{{ $penelitian->status_penelitian == 'Proposal' ? 'warning' : ($penelitian->status_penelitian == 'Berjalan' ? 'info' : 'success') }}">
                                    {{ $penelitian->status_penelitian }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('penelitian.show', $penelitian->id_penelitian) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('penelitian.edit', $penelitian->id_penelitian) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('penelitian.destroy', $penelitian->id_penelitian) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
