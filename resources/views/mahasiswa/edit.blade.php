@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Ubah Data Mahasiswa</h5>
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

            <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" id="nim" value="{{ $mahasiswa->nim }}" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ $mahasiswa->nama }}" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ $mahasiswa->email }}" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" value="{{ $mahasiswa->jurusan }}" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="angkatan">Angkatan</label>
                    <input type="number" name="angkatan" id="angkatan" value="{{ $mahasiswa->angkatan }}" class="form-control" required>
                </div>

                <div class="form-group mb-4">
                    <label for="foto">Foto</label><br>
                    @if ($mahasiswa->foto)
                        <img src="{{ asset('storage/'.$mahasiswa->foto) }}" width="80" class="mb-2"><br>
                    @endif
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Ubah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
