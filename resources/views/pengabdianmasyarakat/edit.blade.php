@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Ubah Pengabdian Masyarakat</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengabdianmasyarakat.update', $pengabdianmasyarakat->id_pengabdian) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nidn" class="form-label">NIDN</label>
            <input type="text" name="nidn" id="nidn" class="form-control" value="{{ old('nidn', $pengabdianmasyarakat->nidn) }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_dosen" class="form-label">Nama Dosen</label>
            <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" value="{{ old('nama_dosen', $pengabdianmasyarakat->nama_dosen) }}" required>
        </div>

        <div class="mb-3">
            <label for="judul_pengabdian" class="form-label">Judul Pengabdian</label>
            <input type="text" name="judul_pengabdian" id="judul_pengabdian" class="form-control" value="{{ old('judul_pengabdian', $pengabdianmasyarakat->judul_pengabdian) }}" required>
        </div>

        <div class="mb-3">
            <label for="bidang_pengabdian" class="form-label">Bidang Pengabdian</label>
            <input type="text" name="bidang_pengabdian" id="bidang_pengabdian" class="form-control" value="{{ old('bidang_pengabdian', $pengabdianmasyarakat->bidang_pengabdian) }}">
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi', $pengabdianmasyarakat->lokasi) }}">
        </div>

        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" name="tahun" id="tahun" class="form-control" value="{{ old('tahun', $pengabdianmasyarakat->tahun) }}" min="1900" max="{{ date('Y') + 1 }}">
        </div>

        <div class="mb-3">
            <label for="sumber_dana" class="form-label">Sumber Dana</label>
            <input type="text" name="sumber_dana" id="sumber_dana" class="form-control" value="{{ old('sumber_dana', $pengabdianmasyarakat->sumber_dana) }}">
        </div>

        <div class="mb-3">
            <label for="jumlah_dana" class="form-label">Jumlah Dana</label>
            <input type="number" name="jumlah_dana" id="jumlah_dana" class="form-control" value="{{ old('jumlah_dana', $pengabdianmasyarakat->jumlah_dana) }}" step="0.01" min="0">
        </div>

        <div class="mb-3">
            <label for="mitra" class="form-label">Mitra</label>
            <input type="text" name="mitra" id="mitra" class="form-control" value="{{ old('mitra', $pengabdianmasyarakat->mitra) }}">
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $pengabdianmasyarakat->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="file_laporan" class="form-label">File Laporan</label>
            <input type="file" name="file_laporan" id="file_laporan" class="form-control" accept=".pdf,.doc,.docx">
            @if ($pengabdianmasyarakat->file_laporan)
                <small class="form-text text-muted">File saat ini: <a href="{{ asset($pengabdianmasyarakat->file_laporan) }}" target="_blank">{{ basename($pengabdianmasyarakat->file_laporan) }}</a></small>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pengabdianmasyarakat.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
