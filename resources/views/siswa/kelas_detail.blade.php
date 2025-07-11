@extends('layouts.frontend')

@section('content')
<div class="container mt-4">
    <h3>{{ $kelas->nama_kelas }}</h3>
    <p>Total Tugas: {{ $tugas->count() }}</p>

    <ul class="list-group mt-3">
        @forelse ($tugas as $t)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $t->judul }}
                <a href="{{ route('siswa.tugas.show', $t->id) }}" class="btn btn-sm btn-primary">Lihat</a>
            </li>
        @empty
            <li class="list-group-item">Belum ada tugas.</li>
        @endforelse
    </ul>
</div>
@endsection
