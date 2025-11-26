@extends('layout.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Tracer Alumni</h1>
        <a href="{{ route('tracer-alumni.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Tracer Alumni</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('tracer-alumni.update', $tracerAlumni) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim', $tracerAlumni->nim) }}" required>
                                    @error('nim')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $tracerAlumni->nama_lengkap) }}" required>
                                    @error('nama_lengkap')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="program_studi">Program Studi</label>
                                    <input type="text" class="form-control @error('program_studi') is-invalid @enderror" id="program_studi" name="program_studi" value="{{ old('program_studi', $tracerAlumni->program_studi) }}">
                                    @error('program_studi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tahun_lulus">Tahun Lulus</label>
                                    <input type="number" class="form-control @error('tahun_lulus') is-invalid @enderror" id="tahun_lulus" name="tahun_lulus" value="{{ old('tahun_lulus', $tracerAlumni->tahun_lulus) }}" required>
                                    @error('tahun_lulus')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $tracerAlumni->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_hp">No. HP</label>
                                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $tracerAlumni->no_hp) }}">
                                    @error('no_hp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status_pekerjaan">Status Pekerjaan</label>
                            <select class="form-control @error('status_pekerjaan') is-invalid @enderror" id="status_pekerjaan" name="status_pekerjaan" required>
                                <option value="">Pilih Status</option>
                                <option value="Bekerja" {{ old('status_pekerjaan', $tracerAlumni->status_pekerjaan) == 'Bekerja' ? 'selected' : '' }}>Bekerja</option>
                                <option value="Wirausaha" {{ old('status_pekerjaan', $tracerAlumni->status_pekerjaan) == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                                <option value="Belum Bekerja" {{ old('status_pekerjaan', $tracerAlumni->status_pekerjaan) == 'Belum Bekerja' ? 'selected' : '' }}>Belum Bekerja</option>
                                <option value="Melanjutkan Studi" {{ old('status_pekerjaan', $tracerAlumni->status_pekerjaan) == 'Melanjutkan Studi' ? 'selected' : '' }}>Melanjutkan Studi</option>
                            </select>
                            @error('status_pekerjaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div id="pekerjaan-fields" style="{{ in_array(old('status_pekerjaan', $tracerAlumni->status_pekerjaan), ['Bekerja', 'Wirausaha']) ? '' : 'display: none;' }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_perusahaan">Nama Perusahaan</label>
                                        <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan', $tracerAlumni->nama_perusahaan) }}">
                                        @error('nama_perusahaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan', $tracerAlumni->jabatan) }}">
                                        @error('jabatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bidang_pekerjaan">Bidang Pekerjaan</label>
                                        <input type="text" class="form-control @error('bidang_pekerjaan') is-invalid @enderror" id="bidang_pekerjaan" name="bidang_pekerjaan" value="{{ old('bidang_pekerjaan', $tracerAlumni->bidang_pekerjaan) }}">
                                        @error('bidang_pekerjaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat_perusahaan">Alamat Perusahaan</label>
                                        <textarea class="form-control @error('alamat_perusahaan') is-invalid @enderror" id="alamat_perusahaan" name="alamat_perusahaan" rows="2">{{ old('alamat_perusahaan', $tracerAlumni->alamat_perusahaan) }}</textarea>
                                        @error('alamat_perusahaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_mulai">Tanggal Mulai</label>
                                        <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai', $tracerAlumni->tanggal_mulai ? \Carbon\Carbon::parse($tracerAlumni->tanggal_mulai)->format('Y-m-d') : '') }}">
                                        @error('tanggal_mulai')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gaji_awal">Gaji Awal (Rp)</label>
                                        <input type="number" class="form-control @error('gaji_awal') is-invalid @enderror" id="gaji_awal" name="gaji_awal" value="{{ old('gaji_awal', $tracerAlumni->gaji_awal) }}" min="0">
                                        @error('gaji_awal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lama_mendapat_pekerjaan">Lama Mendapat Pekerjaan (bulan)</label>
                                        <input type="number" class="form-control @error('lama_mendapat_pekerjaan') is-invalid @enderror" id="lama_mendapat_pekerjaan" name="lama_mendapat_pekerjaan" value="{{ old('lama_mendapat_pekerjaan', $tracerAlumni->lama_mendapat_pekerjaan) }}" min="0">
                                        @error('lama_mendapat_pekerjaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="relevansi_pekerjaan">Relevansi Pekerjaan</label>
                                        <select class="form-control @error('relevansi_pekerjaan') is-invalid @enderror" id="relevansi_pekerjaan" name="relevansi_pekerjaan">
                                            <option value="">Pilih Relevansi</option>
                                            <option value="Sangat Relevan" {{ old('relevansi_pekerjaan', $tracerAlumni->relevansi_pekerjaan) == 'Sangat Relevan' ? 'selected' : '' }}>Sangat Relevan</option>
                                            <option value="Relevan" {{ old('relevansi_pekerjaan', $tracerAlumni->relevansi_pekerjaan) == 'Relevan' ? 'selected' : '' }}>Relevan</option>
                                            <option value="Kurang Relevan" {{ old('relevansi_pekerjaan', $tracerAlumni->relevansi_pekerjaan) == 'Kurang Relevan' ? 'selected' : '' }}>Kurang Relevan</option>
                                            <option value="Tidak Relevan" {{ old('relevansi_pekerjaan', $tracerAlumni->relevansi_pekerjaan) == 'Tidak Relevan' ? 'selected' : '' }}>Tidak Relevan</option>
                                        </select>
                                        @error('relevansi_pekerjaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kepuasan_pekerjaan">Kepuasan Pekerjaan</label>
                                <select class="form-control @error('kepuasan_pekerjaan') is-invalid @enderror" id="kepuasan_pekerjaan" name="kepuasan_pekerjaan">
                                    <option value="">Pilih Kepuasan</option>
                                    <option value="Sangat Puas" {{ old('kepuasan_pekerjaan', $tracerAlumni->kepuasan_pekerjaan) == 'Sangat Puas' ? 'selected' : '' }}>Sangat Puas</option>
                                    <option value="Puas" {{ old('kepuasan_pekerjaan', $tracerAlumni->kepuasan_pekerjaan) == 'Puas' ? 'selected' : '' }}>Puas</option>
                                    <option value="Cukup" {{ old('kepuasan_pekerjaan', $tracerAlumni->kepuasan_pekerjaan) == 'Cukup' ? 'selected' : '' }}>Cukup</option>
                                    <option value="Kurang" {{ old('kepuasan_pekerjaan', $tracerAlumni->kepuasan_pekerjaan) == 'Kurang' ? 'selected' : '' }}>Kurang</option>
                                </select>
                                @error('kepuasan_pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="saran_untuk_kampus">Saran untuk Kampus</label>
                            <textarea class="form-control @error('saran_untuk_kampus') is-invalid @enderror" id="saran_untuk_kampus" name="saran_untuk_kampus" rows="3">{{ old('saran_untuk_kampus', $tracerAlumni->saran_untuk_kampus) }}</textarea>
                            @error('saran_untuk_kampus')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('tracer-alumni.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('status_pekerjaan').addEventListener('change', function() {
    var pekerjaanFields = document.getElementById('pekerjaan-fields');
    if (this.value === 'Bekerja' || this.value === 'Wirausaha') {
        pekerjaanFields.style.display = 'block';
    } else {
        pekerjaanFields.style.display = 'none';
    }
});
</script>
@endsection
