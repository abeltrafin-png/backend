@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Project Mahasiswa</h1>

    <form action="{{ route('projectmahasiswa.update', $projectmahasiswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_project">Nama Project</label>
            <input type="text" class="form-control" id="nama_project" name="nama_project" value="{{ $projectmahasiswa->nama_project }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $projectmahasiswa->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="ongoing" {{ $projectmahasiswa->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="completed" {{ $projectmahasiswa->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $projectmahasiswa->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mahasiswa_id">Mahasiswa</label>
            <select class="form-control" id="mahasiswa_id" name="mahasiswa_id" required>
                @foreach($mahasiswas as $mahasiswa)
                    <option value="{{ $mahasiswa->id }}" {{ $projectmahasiswa->mahasiswa_id == $mahasiswa->id ? 'selected' : '' }}>{{ $mahasiswa->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="foto">Foto Project</label>
            @if($projectmahasiswa->foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $projectmahasiswa->foto) }}" width="200px" alt="Current Foto">
                </div>
            @endif
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('projectmahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
