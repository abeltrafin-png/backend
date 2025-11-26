@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="m-0">Detail Pengabdian Masyarakat</h5>
        </div>
        <div class="card-body">

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">NIDN</div>
                <div class="col-sm-9">{{ $pengabdianmasyarakat->nidn }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Nama Dosen</div>
                <div class="col-sm-9">{{ $pengabdianmasyarakat->nama_dosen }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Judul Pengabdian</div>
                <div class="col-sm-9">{{ $pengabdianmasyarakat->judul_pengabdian }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Bidang Pengabdian</div>
                <div class="col-sm-9">{{ $pengabdianmasyarakat->bidang_pengabdian ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Lokasi</div>
                <div class="col-sm-9">{{ $pengabdianmasyarakat->lokasi ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Tahun</div>
                <div class="col-sm-9">{{ $pengabdianmasyarakat->tahun ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Sumber Dana</div>
                <div class="col-sm-9">{{ $pengabdianmasyarakat->sumber_dana ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Jumlah Dana</div>
                <div class="col-sm-9">{{ $pengabdianmasyarakat->jumlah_dana ? 'Rp ' . number_format($pengabdianmasyarakat->jumlah_dana, 0, ',', '.') : '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Mitra</div>
                <div class="col-sm-9">{{ $pengabdianmasyarakat->mitra ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Deskripsi</div>
                <div class="col-sm-9">{{ $pengabdianmasyarakat->deskripsi ?? '-' }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">File Laporan</div>
                <div class="col-sm-9">
                    @if ($pengabdianmasyarakat->file_laporan)
                        <a href="{{ asset($pengabdianmasyarakat->file_laporan) }}" target="_blank" class="btn btn-info">Lihat File</a>
                    @else
                        <span class="text-muted">Tidak ada file</span>
                    @endif
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-sm-3 font-weight-bold">Tanggal Input</div>
                <div class="col-sm-9">{{ $pengabdianmasyarakat->tanggal_input }}</div>
            </div>

            <a href="{{ route('pengabdianmasyarakat.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('pengabdianmasyarakat.edit', $pengabdianmasyarakat->id_pengabdian) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Ubah Data
            </a>

        </div>
    </div>
</div>
@endsection
