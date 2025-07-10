<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Tugas;

class TugasController extends Controller
{
    public function create(Kelas $kelas)
    {
        return view('guru.tugas.create', compact('kelas'));
    }

    public function store(Request $request, Kelas $kelas)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'deadline' => 'required|date',
        ]);

        Tugas::create([
            'kelas_id' => $kelas->id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('guru.kelas.index')->with('success', 'Tugas berhasil ditambahkan.');
    }
}

