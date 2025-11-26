@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Ubah Dosen</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nidn" class="form-label">NIDN</label>
            <input type="text" name="nidn" id="nidn" class="form-control" value="{{ old('nidn', $dosen->nidn) }}" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $dosen->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $dosen->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ old('jurusan', $dosen->jurusan) }}" required>
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ old('jabatan', $dosen->jabatan) }}" required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
            @if ($dosen->foto)
                <img src="{{ asset(str_replace('storage/', '', $dosen->foto)) }}" width="100px" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
