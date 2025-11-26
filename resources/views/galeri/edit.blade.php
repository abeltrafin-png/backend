@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Galeri</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $galeri->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
            @if ($galeri->foto)
                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
                <img src="{{ asset($galeri->foto) }}" class="img-thumbnail mt-2" style="max-width: 200px;" alt="Foto Saat Ini">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
