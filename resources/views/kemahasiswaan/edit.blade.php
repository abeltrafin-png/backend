@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Kemahasiswaan</h3>
                    <a href="{{ route('kemahasiswaan.index') }}" class="btn btn-secondary float-right">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('kemahasiswaan.update', $kemahasiswaan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_peraturan">Nama Peraturan</label>
                            <input type="text" class="form-control @error('nama_peraturan') is-invalid @enderror" id="nama_peraturan" name="nama_peraturan" value="{{ old('nama_peraturan', $kemahasiswaan->nama_peraturan) }}" required>
                            @error('nama_peraturan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $kemahasiswaan->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file_dokumen">File Dokumen (PDF, DOC, DOCX)</label>
                            <input type="file" class="form-control @error('file_dokumen') is-invalid @enderror" id="file_dokumen" name="file_dokumen" accept=".pdf,.doc,.docx">
                            @error('file_dokumen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($kemahasiswaan->file_dokumen)
                                <small class="form-text text-muted">File saat ini: <a href="{{ asset('storage/' . $kemahasiswaan->file_dokumen) }}" target="_blank">{{ basename($kemahasiswaan->file_dokumen) }}</a></small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="aktif" {{ old('status', $kemahasiswaan->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status', $kemahasiswaan->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
