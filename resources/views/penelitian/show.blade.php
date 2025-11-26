@extends('layout.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Penelitian</h1>
        <a href="{{ route('penelitian.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Penelitian #{{ $penelitian->id_penelitian }}</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>ID Penelitian:</strong></label>
                                <p>{{ $penelitian->id_penelitian }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>NIDN:</strong></label>
                                <p>{{ $penelitian->nidn ?: '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><strong>Nama Dosen:</strong></label>
                        <p>{{ $penelitian->nama_dosen ?: '-' }}</p>
                    </div>

                    <div class="form-group">
                        <label><strong>Judul Penelitian:</strong></label>
                        <p>{{ $penelitian->judul_penelitian ?: '-' }}</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Bidang Penelitian:</strong></label>
                                <p>{{ $penelitian->bidang_penelitian ?: '-' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Jenis Penelitian:</strong></label>
                                <p>{{ $penelitian->jenis_penelitian ?: '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong>Tahun:</strong></label>
                                <p>{{ $penelitian->tahun ?: '-' }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong>Lama Kegiatan:</strong></label>
                                <p>{{ $penelitian->lama_kegiatan ? $penelitian->lama_kegiatan . ' bulan' : '-' }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong>Status:</strong></label>
                                <p>
                                    <span class="badge badge-{{ $penelitian->status_penelitian == 'Proposal' ? 'warning' : ($penelitian->status_penelitian == 'Berjalan' ? 'info' : 'success') }}">
                                        {{ $penelitian->status_penelitian }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Sumber Dana:</strong></label>
                                <p>{{ $penelitian->sumber_dana ?: '-' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Jumlah Dana:</strong></label>
                                <p>{{ $penelitian->jumlah_dana ? 'Rp ' . number_format($penelitian->jumlah_dana, 0, ',', '.') : '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><strong>Anggota Peneliti:</strong></label>
                        <p>{{ $penelitian->anggota_peneliti ?: '-' }}</p>
                    </div>

                    <div class="form-group">
                        <label><strong>Mitra:</strong></label>
                        <p>{{ $penelitian->mitra ?: '-' }}</p>
                    </div>

                    <div class="form-group">
                        <label><strong>Hasil Penelitian:</strong></label>
                        <p>{{ $penelitian->hasil_penelitian ?: '-' }}</p>
                    </div>

                    <div class="form-group">
                        <label><strong>Publikasi:</strong></label>
                        <p>{{ $penelitian->publikasi ?: '-' }}</p>
                    </div>

                    <div class="form-group">
                        <label><strong>File Laporan:</strong></label>
                        @if($penelitian->file_laporan)
                            <p>
                                <a href="{{ Storage::url($penelitian->file_laporan) }}" target="_blank" class="btn btn-sm btn-info">
                                    <i class="fas fa-download"></i> Download File
                                </a>
                            </p>
                        @else
                            <p>-</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label><strong>Dibuat:</strong></label>
                        <p>{{ $penelitian->created_at->format('d M Y H:i') }}</p>
                    </div>

                    <div class="form-group">
                        <label><strong>Diubah:</strong></label>
                        <p>{{ $penelitian->updated_at->format('d M Y H:i') }}</p>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('penelitian.edit', $penelitian->id_penelitian) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('penelitian.destroy', $penelitian->id_penelitian) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
