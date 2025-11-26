@extends('layout.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Galeri</h6>
    </div>

 <div class="card-body">
    <a href = "{{ route('galeri.create') }}" class="btn btn-primary">Tambah Data</a>
    @if (session('success'))
    <div class="alert alert-success">{{session('success')}}</div>

    @endif
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="table-light">
        <tr>
            <th>No.</th>
            <th>Kegiatan</th>
            <th>File</th>
            <th>Tipe</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($galeri as $glr)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $glr->kegiatan->judul ?? 'N/A' }}</td>
                <td>
                    @if ($glr->file)
                        @if($glr->tipe == 'image')
                            <img src="{{ asset('storage/'.$glr->file) }}" width="70px">
                        @elseif($glr->tipe == 'video')
                            <video width="70px" controls>
                                <source src="{{ asset('storage/'.$glr->file) }}" type="video/mp4">
                            </video>
                        @endif
                    @endif
                </td>
                <td>{{ $glr->tipe }}</td>
                <td>{{ $glr->keterangan ?? '-' }}</td>
                <td>
                    <a href="{{ route('galeri.show', $glr->id) }}" class="btn btn-sm btn-info mb-1">
                        <i class="fas fa-eye"></i>Detail</a>
                    <a href="{{ route('galeri.edit', $glr->id) }}" class="btn btn-sm btn-warning mb-1">
                        <i class="fas fa-edit"></i>Ubah</a>
                    <form action="{{ route('galeri.destroy', $glr->id) }}" method="POST" class="d-Inline"
                    onsubmit="return confirm('Yakin Ingin Menghapus Data ini?')">
                    @csrf
                    @method('Delete')
                    <button type='submit' class="btn btn-sm btn-danger mb-1">
                        <i class="fas fa-trash"></i>Hapus</button> </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada Data GALERI </td>
            </tr>
        @endforelse
    </tbody>
    </table>
    </div>
</div>
 </div>


@endsection