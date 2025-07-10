@extends('layouts.guru')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
<style>
    /* Tambahkan jarak atas */
    .content-wrapper {
        margin-top: 30px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid content-wrapper">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Daftar Kelas</h4>
            <a href="{{ route('guru.kelas.create') }}" class="btn btn-sm btn-outline-primary">Tambah Kelas</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="kelasTable">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Guru</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th></th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kelas }}</td>
                            <td>{{ $item->guru->name ?? '-' }}</td>
                            <td>
                                <a href="{{ route('guru.kelas.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('guru.kelas.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus kelas ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
<script>
    $(document).ready(function () {
        $('#kelasTable').DataTable();
    });
</script>
@endpush
