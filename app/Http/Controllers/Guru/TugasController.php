<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Tugas;

class TugasController extends Controller
{
    // Tampilkan form tambah tugas (opsional)
    public function create(Kelas $kelas)
    {
        return view('guru.tugas.create', compact('kelas'));
    }

    // Simpan tugas baru
    public function store(Request $request, Kelas $kelas)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'deadline' => 'required|date',
            'tipe' => 'required|in:individu,kelompok',
        ]);

        Tugas::create([
            'kelas_id' => $kelas->id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'tipe' => $request->tipe,
        ]);

        return redirect()->route('guru.kelas.index')->with('success', 'Tugas berhasil ditambahkan.');
    }

    // Tampilkan form edit tugas
    public function edit(Tugas $tugas)
    {
        return view('guru.tugas.edit', compact('tugas'));
    }

    // Simpan hasil edit
    public function update(Request $request, Tugas $tugas)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'deadline' => 'required|date',
            'tipe' => 'required|in:individu,kelompok',
        ]);

        $tugas->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'tipe' => $request->tipe,
        ]);

        return redirect()->route('guru.kelas.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    // Hapus tugas
    public function destroy(Tugas $tugas)
    {
        $tugas->delete();

        return redirect()->route('guru.kelas.index')->with('success', 'Tugas berhasil dihapus.');
    }
}
