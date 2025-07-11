@extends('layouts.frontend')

@section('content')
<div class="container mt-4">
    <h3>{{ $tugas->judul }}</h3>
    <p>{{ $tugas->deskripsi }}</p>

    <form method="POST" action="{{ route('siswa.tugas.kumpulkan', $tugas->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">Upload File</label>
            <input type="file" class="form-control" name="file" required>
        </div>
        <div class="mb-3">
            <label for="catatan" class="form-label">Deskripsi / Catatan</label>
            <textarea class="form-control" name="catatan" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Kumpulkan</button>
    </form>
</div>
@endsection
