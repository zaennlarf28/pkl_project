<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Tugas;
use App\Models\PengumpulanTugas;

class TugasController extends Controller
{
    // Tampilkan form tambah tugas (opsional)

    public function index()
    {
        $kelas = Kelas::with('tugas')->where('guru_id', auth()->id())->get();
        return view('guru.tugas.index', compact('kelas'));
    }

    public function create(Kelas $kelas)
    {
        return view('guru.tugas.create', compact('kelas'));
    }

    // Simpan tugas baru
    public function store(Request $request, Kelas $kelas)
    {
        $request->validate([
            'judul' => 'required',
            'perintah' => 'required',
            'deskripsi' => 'required',
            'deadline' => 'required|date',
            'tipe' => 'required|in:individu,kelompok',
        ]);

        Tugas::create([
            'kelas_id' => $kelas->id,
            'judul' => $request->judul,
            'perintah' => $request->perintah,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'tipe' => $request->tipe,
        ]);

        return redirect()->route('guru.kelas.index')->with('success', 'Tugas berhasil ditambahkan.');
    }

    // Tampilkan form edit tugas
    public function edit($id)
{
    $tugas = Tugas::findOrFail($id);
    return view('guru.tugas.edit', compact('tugas'));
}

public function update(Request $request, $id)
{
    $tugas = Tugas::findOrFail($id);
    $tugas->update($request->only(['judul', 'perintah', 'deskripsi', 'deadline', 'tipe']));
    return redirect()->route('guru.tugas.index')->with('success', 'Tugas berhasil diperbarui.');
}

public function destroy($id)
{
    $tugas = Tugas::findOrFail($id);
    $tugas->delete();
    return back()->with('success', 'Tugas berhasil dihapus.');
}


    public function lihatPengumpulan($tugasId)
{
    $tugas = Tugas::with(['pengumpulan.siswa'])->findOrFail($tugasId);
    return view('guru.tugas.pengumpulan', compact('tugas'));
}

public function beriNilai(Request $request, $id)
{
    $request->validate([
        'nilai' => 'required|integer|min:0|max:100'
    ]);

    $pengumpulan = \App\Models\PengumpulanTugas::findOrFail($id);
    $pengumpulan->nilai = $request->nilai;
    $pengumpulan->status = 'dinilai';
    $pengumpulan->save();

    return back()->with('success', 'Nilai berhasil diberikan.');
}


}
