@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Ubah Data Berita</h5>
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

<form action="{{ route('berita.update', ['berita' => $berita->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul"
                           value="{{ old('judul', $berita->judul) }}"
                           class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="isi">Isi Berita</label>
                    <textarea name="isi" id="isi" rows="5" class="form-control" required>{{ old('isi', $berita->isi) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="penulis">Penulis</label>
                    <input type="text" name="penulis" id="penulis"
                           value="{{ old('penulis', $berita->penulis) }}"
                           class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal"
                           value="{{ old('tanggal', $berita->tanggal) }}"
                           class="form-control" required>
                </div>

                <div class="form-group mb-4">
                    <label for="foto">Foto</label><br>
                    @if ($berita->foto)
                        <img src="{{ asset($berita->foto) }}" width="120" class="mb-2 img-thumbnail"><br>
                    @endif
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
