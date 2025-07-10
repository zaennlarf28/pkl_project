@extends('layouts.guru')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Buat Kelas Baru</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('guru.kelas.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                    <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kode Kelas</label>
                    <input type="text" class="form-control" value="Akan dibuat otomatis" disabled>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('guru.kelas.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
