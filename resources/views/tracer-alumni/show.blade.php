@extends('layout.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Tracer Alumni</h1>
        <a href="{{ route('tracer-alumni.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Tracer Alumni: {{ $tracerAlumni->nama_lengkap }}</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>NIM:</strong></label>
                                <p>{{ $tracerAlumni->nim }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Nama Lengkap:</strong></label>
                                <p>{{ $tracerAlumni->nama_lengkap }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Program Studi:</strong></label>
                                <p>{{ $tracerAlumni->program_studi ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Tahun Lulus:</strong></label>
                                <p>{{ $tracerAlumni->tahun_lulus }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Email:</strong></label>
                                <p>{{ $tracerAlumni->email ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>No. HP:</strong></label>
                                <p>{{ $tracerAlumni->no_hp ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><strong>Status Pekerjaan:</strong></label>
                        <p>{{ $tracerAlumni->status_pekerjaan }}</p>
                    </div>

                    @if($tracerAlumni->status_pekerjaan == 'Bekerja' || $tracerAlumni->status_pekerjaan == 'Wirausaha')
                    <hr>
                    <h5>Informasi Pekerjaan</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Nama Perusahaan:</strong></label>
                                <p>{{ $tracerAlumni->nama_perusahaan ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Jabatan:</strong></label>
                                <p>{{ $tracerAlumni->jabatan ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Bidang Pekerjaan:</strong></label>
                                <p>{{ $tracerAlumni->bidang_pekerjaan ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Alamat Perusahaan:</strong></label>
                                <p>{{ $tracerAlumni->alamat_perusahaan ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Tanggal Mulai:</strong></label>
                                <p>{{ $tracerAlumni->tanggal_mulai ? \Carbon\Carbon::parse($tracerAlumni->tanggal_mulai)->format('d/m/Y') : '-' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Gaji Awal:</strong></label>
                                <p>{{ $tracerAlumni->gaji_awal ? 'Rp ' . number_format($tracerAlumni->gaji_awal, 0, ',', '.') : '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Lama Mendapat Pekerjaan:</strong></label>
                                <p>{{ $tracerAlumni->lama_mendapat_pekerjaan ? $tracerAlumni->lama_mendapat_pekerjaan . ' bulan' : '-' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Relevansi Pekerjaan:</strong></label>
                                <p>{{ $tracerAlumni->relevansi_pekerjaan ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><strong>Kepuasan Pekerjaan:</strong></label>
                        <p>{{ $tracerAlumni->kepuasan_pekerjaan ?? '-' }}</p>
                    </div>
                    @endif

                    <hr>
                    <div class="form-group">
                        <label><strong>Saran untuk Kampus:</strong></label>
                        <p>{{ $tracerAlumni->saran_untuk_kampus ?? '-' }}</p>
                    </div>

                    <div class="form-group">
                        <label><strong>Tanggal Pengisian:</strong></label>
                        <p>{{ $tracerAlumni->tanggal_pengisian ? \Carbon\Carbon::parse($tracerAlumni->tanggal_pengisian)->format('d/m/Y H:i') : '-' }}</p>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('tracer-alumni.edit', $tracerAlumni) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('tracer-alumni.destroy', $tracerAlumni) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data tracer ini?')">
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
