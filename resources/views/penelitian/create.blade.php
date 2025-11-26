@extends('layout.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Penelitian</h1>
        <a href="{{ route('penelitian.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Penelitian</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('penelitian.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nidn">NIDN</label>
                                    <input type="text" class="form-control @error('nidn') is-invalid @enderror" id="nidn" name="nidn" value="{{ old('nidn') }}" maxlength="20">
                                    @error('nidn')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_dosen">Nama Dosen</label>
                                    <input type="text" class="form-control @error('nama_dosen') is-invalid @enderror" id="nama_dosen" name="nama_dosen" value="{{ old('nama_dosen') }}" maxlength="100">
                                    @error('nama_dosen')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="judul_penelitian">Judul Penelitian</label>
                            <input type="text" class="form-control @error('judul_penelitian') is-invalid @enderror" id="judul_penelitian" name="judul_penelitian" value="{{ old('judul_penelitian') }}" maxlength="255">
                            @error('judul_penelitian')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bidang_penelitian">Bidang Penelitian</label>
                                    <input type="text" class="form-control @error('bidang_penelitian') is-invalid @enderror" id="bidang_penelitian" name="bidang_penelitian" value="{{ old('bidang_penelitian') }}" maxlength="100">
                                    @error('bidang_penelitian')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_penelitian">Jenis Penelitian</label>
                                    <input type="text" class="form-control @error('jenis_penelitian') is-invalid @enderror" id="jenis_penelitian" name="jenis_penelitian" value="{{ old('jenis_penelitian') }}" maxlength="100">
                                    @error('jenis_penelitian')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="number" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun') }}" min="1900" max="{{ date('Y') + 10 }}">
                                    @error('tahun')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lama_kegiatan">Lama Kegiatan (bulan)</label>
                                    <input type="number" class="form-control @error('lama_kegiatan') is-invalid @enderror" id="lama_kegiatan" name="lama_kegiatan" value="{{ old('lama_kegiatan') }}" min="1">
                                    @error('lama_kegiatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status_penelitian">Status Penelitian</label>
                                    <select class="form-control @error('status_penelitian') is-invalid @enderror" id="status_penelitian" name="status_penelitian">
                                        <option value="Proposal" {{ old('status_penelitian') == 'Proposal' ? 'selected' : '' }}>Proposal</option>
                                        <option value="Berjalan" {{ old('status_penelitian') == 'Berjalan' ? 'selected' : '' }}>Berjalan</option>
                                        <option value="Selesai" {{ old('status_penelitian') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                    @error('status_penelitian')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sumber_dana">Sumber Dana</label>
                                    <input type="text" class="form-control @error('sumber_dana') is-invalid @enderror" id="sumber_dana" name="sumber_dana" value="{{ old('sumber_dana') }}" maxlength="100">
                                    @error('sumber_dana')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jumlah_dana">Jumlah Dana</label>
                                    <input type="number" step="0.01" class="form-control @error('jumlah_dana') is-invalid @enderror" id="jumlah_dana" name="jumlah_dana" value="{{ old('jumlah_dana') }}" min="0">
                                    @error('jumlah_dana')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="anggota_peneliti">Anggota Peneliti</label>
                            <textarea class="form-control @error('anggota_peneliti') is-invalid @enderror" id="anggota_peneliti" name="anggota_peneliti" rows="3">{{ old('anggota_peneliti') }}</textarea>
                            @error('anggota_peneliti')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mitra">Mitra</label>
                            <input type="text" class="form-control @error('mitra') is-invalid @enderror" id="mitra" name="mitra" value="{{ old('mitra') }}" maxlength="150">
                            @error('mitra')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="hasil_penelitian">Hasil Penelitian</label>
                            <textarea class="form-control @error('hasil_penelitian') is-invalid @enderror" id="hasil_penelitian" name="hasil_penelitian" rows="3">{{ old('hasil_penelitian') }}</textarea>
                            @error('hasil_penelitian')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="publikasi">Publikasi</label>
                            <input type="text" class="form-control @error('publikasi') is-invalid @enderror" id="publikasi" name="publikasi" value="{{ old('publikasi') }}" maxlength="255">
                            @error('publikasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="file_laporan">File Laporan</label>
                            <input type="file" class="form-control-file @error('file_laporan') is-invalid @enderror" id="file_laporan" name="file_laporan" accept=".pdf,.doc,.docx">
                            @error('file_laporan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Format yang didukung: PDF, DOC, DOCX. Maksimal 10MB.</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('penelitian.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
