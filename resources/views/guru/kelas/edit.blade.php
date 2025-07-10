@extends('layouts.guru')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0">Edit Kelas</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('guru.kelas.update', $kelas->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                    <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" value="{{ old('nama_kelas', $kelas->nama_kelas) }}" required>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('guru.kelas.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
