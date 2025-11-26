@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Ubah Data Pengumuman</h5>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pengumuman.update', ['pengumuman' => $pengumuman->id_pengumuman]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul"
                           value="{{ old('judul', $pengumuman->judul) }}"
                           class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="isi">Isi Pengumuman</label>
                    <textarea name="isi" id="isi" rows="5" class="form-control" required>{{ old('isi', $pengumuman->isi) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Akademik" {{ old('kategori', $pengumuman->kategori) == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                        <option value="Kemahasiswaan" {{ old('kategori', $pengumuman->kategori) == 'Kemahasiswaan' ? 'selected' : '' }}>Kemahasiswaan</option>
                        <option value="Beasiswa" {{ old('kategori', $pengumuman->kategori) == 'Beasiswa' ? 'selected' : '' }}>Beasiswa</option>
                        <option value="Kegiatan" {{ old('kategori', $pengumuman->kategori) == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="Umum" {{ old('kategori', $pengumuman->kategori) == 'Umum' ? 'selected' : '' }}>Umum</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="tanggal_publish">Tanggal Publish</label>
                    <input type="date" name="tanggal_publish" id="tanggal_publish"
                           value="{{ old('tanggal_publish', $pengumuman->tanggal_publish->format('Y-m-d')) }}"
                           class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="penulis">Penulis</label>
                    <input type="text" name="penulis" id="penulis"
                           value="{{ old('penulis', $pengumuman->penulis) }}"
                           class="form-control">
                </div>

                <div class="form-group mb-4">
                    <label for="lampiran">Lampiran</label><br>
                    @if ($pengumuman->lampiran)
                        <a href="{{ asset($pengumuman->lampiran) }}" target="_blank" class="btn btn-sm btn-info mb-2">Lihat Lampiran</a><br>
                    @endif
                    <input type="file" name="lampiran" id="lampiran" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="published" {{ old('status', $pengumuman->status) == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ old('status', $pengumuman->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
