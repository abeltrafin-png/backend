@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Ubah Mata Kuliah</h1>

    <form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kode_matkul" class="form-label">Kode Matkul</label>
            <input type="text" name="kode_matkul" id="kode_matkul" class="form-control" value="{{ old('kode_matkul', $matakuliah->kode_matkul) }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_matkul" class="form-label">Nama Matkul</label>
            <input type="text" name="nama_matkul" id="nama_matkul" class="form-control" value="{{ old('nama_matkul', $matakuliah->nama_matkul) }}" required>
        </div>

        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <input type="number" name="semester" id="semester" class="form-control" min="1" max="8" value="{{ old('semester', $matakuliah->semester) }}" required>
        </div>

        <div class="mb-3">
            <label for="sks" class="form-label">SKS</label>
            <input type="number" name="sks" id="sks" class="form-control" min="1" max="6" value="{{ old('sks', $matakuliah->sks) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $matakuliah->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="dosen_id" class="form-label">Dosen</label>
            <select name="dosen_id" id="dosen_id" class="form-control" required>
                <option value="">Pilih Dosen</option>
                @foreach($dosens as $dosen)
                    <option value="{{ $dosen->id }}" {{ $dosen->id == old('dosen_id', $matakuliah->dosen_id) ? 'selected' : '' }}>{{ $dosen->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
