@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Administratif</h3>
                    <a href="{{ route('administratif.index') }}" class="btn btn-secondary float-right">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Nama Peraturan</h5>
                            <p>{{ $administratif->nama_peraturan }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Status</h5>
                            <p>
                                @if($administratif->status == 'aktif')
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-danger">Nonaktif</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Deskripsi</h5>
                            <p>{{ $administratif->deskripsi }}</p>
                        </div>
                    </div>
                    @if($administratif->file_dokumen)
                    <div class="row">
                        <div class="col-md-12">
                            <h5>File Dokumen</h5>
                            <a href="{{ asset('storage/' . $administratif->file_dokumen) }}" target="_blank" class="btn btn-primary">Lihat Dokumen</a>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Dibuat Pada</h5>
                            <p>{{ $administratif->created_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
