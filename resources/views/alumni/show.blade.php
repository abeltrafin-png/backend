@extends('layout.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Alumni</h1>
        <a href="{{ route('alumni.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Alumni</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Nama:</strong><br>
                            {{ $alumni->nama }}
                        </div>
                        <div class="col-md-6">
                            <strong>Angkatan:</strong><br>
                            {{ $alumni->angkatan }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Jurusan:</strong><br>
                            {{ $alumni->jurusan }}
                        </div>
                        <div class="col-md-6">
                            <strong>Pekerjaan:</strong><br>
                            {{ $alumni->pekerjaan ?? '-' }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Status:</strong><br>
                            <span class="badge badge-{{ $alumni->status == 'approved' ? 'success' : ($alumni->status == 'rejected' ? 'danger' : 'warning') }}">
                                {{ ucfirst($alumni->status) }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <strong>Dibuat:</strong><br>
                            {{ $alumni->created_at ? $alumni->created_at->format('d M Y H:i') : 'N/A' }}
                        </div>
                    </div>
                    @if($alumni->kisah_sukses)
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Kisah Sukses:</strong><br>
                            <p>{{ $alumni->kisah_sukses }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Foto Alumni</h6>
                </div>
                <div class="card-body text-center">
                    @if($alumni->foto_url)
                        <img src="{{ asset('storage/' . $alumni->foto_url) }}" alt="Foto {{ $alumni->nama }}" class="img-fluid rounded" style="max-height: 300px;">
                    @else
                        <div class="text-muted">
                            <i class="fas fa-user-circle fa-5x"></i>
                            <p>Tidak ada foto</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    <a href="{{ route('alumni.edit', $alumni) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('alumni.destroy', $alumni) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus alumni ini?')">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
