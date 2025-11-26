@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Project Mahasiswa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projectmahasiswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="mahasiswa_id">Mahasiswa</label>
            <select class="form-control" id="mahasiswa_id" name="mahasiswa_id" required>
                <option value="">Pilih Mahasiswa</option>
                @foreach($mahasiswas as $mahasiswa)
                    <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}</option>
                @endforeach
            </select>
        </div>

        <h3>Data Project</h3>
        <div class="form-group">
            <label for="nama_project">Nama Project</label>
            <input type="text" class="form-control" id="nama_project" name="nama_project" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="ongoing">Ongoing</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
        <div class="form-group">
            <label for="foto">Foto Project</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('projectmahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
