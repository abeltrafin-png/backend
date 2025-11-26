@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Dashboard Pengabdian Masyarakat</h1>

    <a href="{{ route('pengabdianmasyarakat.create') }}" class="btn btn-success mb-3">+ Tambah Pengabdian Masyarakat</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>NO</th>
                    <th>NIDN</th>
                    <th>Nama Dosen</th>
                    <th>Judul Pengabdian</th>
                    <th>Bidang Pengabdian</th>
                    <th>Lokasi</th>
                    <th>Tahun</th>
                    <th>Sumber Dana</th>
                    <th>Jumlah Dana</th>
                    <th>Mitra</th>
                    <th>File Laporan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengabdian as $pkm)
                    <tr>
                        <td>{{ $loop->iteration + ($pengabdian->currentPage() - 1) * $pengabdian->perPage() }}</td>
                        <td>{{ $pkm->nidn }}</td>
                        <td>{{ $pkm->nama_dosen }}</td>
                        <td>{{ $pkm->judul_pengabdian }}</td>
                        <td>{{ $pkm->bidang_pengabdian ?? '-' }}</td>
                        <td>{{ $pkm->lokasi ?? '-' }}</td>
                        <td>{{ $pkm->tahun ?? '-' }}</td>
                        <td>{{ $pkm->sumber_dana ?? '-' }}</td>
                        <td>{{ $pkm->jumlah_dana ? 'Rp ' . number_format($pkm->jumlah_dana, 0, ',', '.') : '-' }}</td>
                        <td>{{ $pkm->mitra ?? '-' }}</td>
                        <td>
                            @if ($pkm->file_laporan)
                                <a href="{{ asset($pkm->file_laporan) }}" target="_blank" class="btn btn-sm btn-info">Lihat</a>
                            @else
                                <span class="text-muted">Belum ada</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pengabdianmasyarakat.show', $pkm->id_pengabdian) }}" class="btn btn-sm btn-info mb-1">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                            <a href="{{ route('pengabdianmasyarakat.edit', $pkm->id_pengabdian) }}" class="btn btn-sm btn-warning mb-1">
                                <i class="fas fa-edit"></i> Ubah
                            </a>
                            <form action="{{ route('pengabdianmasyarakat.destroy', $pkm->id_pengabdian) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger mb-1">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center">Data Pengabdian Masyarakat Tidak Tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $pengabdian->links() }}
@endsection
