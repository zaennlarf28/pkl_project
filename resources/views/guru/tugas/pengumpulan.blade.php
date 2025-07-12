@extends('layouts.guru')

@section('content')
<div class="container mt-4">
    <h3>Pengumpulan Tugas: {{ $tugas->judul }}</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Catatan</th>
                <th>File</th>
                <th>Status</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tugas->pengumpulan as $p)
                <tr>
                    <td>{{ $p->siswa->name ?? '-' }}</td>
                    <td>{{ $p->catatan }}</td>
                    <td><iframe src="{{ asset('storage/' . $p->file) }}" width="50%" height="50%"></iframe></td>
                    <td>{{ ucfirst($p->status) }}</td>
                    <td>
    @if ($p->status === 'dikirim')
        <form action="{{ route('guru.tugas.nilai', $p->id) }}" method="POST" class="d-flex">
            @csrf
            @method('PUT')
            <input type="number" name="nilai" class="form-control form-control-sm me-1" min="0" max="100" required>
            <button type="submit" class="btn btn-sm btn-primary">Nilai</button>
        </form>
    @else
        {{ $p->nilai }}
    @endif
</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
