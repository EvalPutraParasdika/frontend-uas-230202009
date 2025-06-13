@extends('layout')

@section('title', 'matakuliah')

@section('judul', 'matakuliah')


@section('isi')


    <div class="card shadow mb-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert"
                style="background: rgba(40, 167, 69, 0.2); border: 1px solid rgba(40, 167, 69, 0.5); color: #155724;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert"
                style="background: rgba(220, 53, 69, 0.2); border: 1px solid rgba(220, 53, 69, 0.5); color: #721c24;">
                {{ session('error') }}
            </div>
        @endif
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <!-- Tombol buka modal tambah -->
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah">
                + Tambah Mata Kuliah
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Dosen ID</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matakuliah as $mtk)
                            <tr>
                                <!-- Modal Edit Dosen -->
                                <div class="modal fade" id="modalEdit{{ $mtk['id'] }}" tabindex="-1"
                                    aria-labelledby="modalEditLabel{{ $mtk['id'] }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('matakuliah.update', $mtk['id']) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalEditLabel{{ $mtk['id'] }}">Edit Matkul
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="nama{{ $mtk['id'] }}">Nama</label>
                                                        <input type="text" name="nama" id="nama{{ $mtk['id'] }}"
                                                            class="form-control" value="{{ $mtk['nama'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dosen_id{{ $mtk['id'] }}">Dosen ID</label>
                                                        <input type="text" name="dosen_id" id="dosen_id{{ $mtk['dosen_id'] }}"
                                                            class="form-control" value="{{ $mtk['dosen_id'] }}" required>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <td>{{ $mtk['id'] }}</td>
                                <td>{{ $mtk['nama'] }}</td>
                                <td>{{ $mtk['dosen_id'] }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#modalEdit{{ $mtk['id'] }}">Edit</button>

                                    <form action="{{ route('matakuliah.destroy', $mtk['id']) }}" method="POST"
                                        style="display:inline-block;"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Tambah Dosen -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('matakuliah.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahLabel">Tambah Dosen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Dosen ID</label>
                            <input type="text" name="dosen_id" id="dosen_id" class="form-control" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
<script>
    // Menghilangkan alert otomatis setelah 2 detik
    setTimeout(function () {
        let alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 500);
        });
    }, 2000);
</script>