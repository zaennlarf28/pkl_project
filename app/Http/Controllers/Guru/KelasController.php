<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function index()
{
    $kelas = Kelas::with('guru', 'tugas')->where('guru_id', Auth::id())->get();
    return view('guru.kelas.index', compact('kelas'));
}

    public function create()
    {
        return view('guru.kelas.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_kelas' => 'required',
    ]);

    $kode_kelas = strtoupper(Str::random(6)); // Contoh: 'XZP8LQ'

    Kelas::create([
        'nama_kelas' => $request->nama_kelas,
        'kode_kelas' => $kode_kelas,
        'guru_id' => Auth::id()
    ]);

    return redirect()->route('guru.kelas.index')
        ->with('success', 'Kelas berhasil dibuat.')
        ->with('kode_kelas', $kode_kelas);
}
    public function edit($id)
{
    $kelas = Kelas::findOrFail($id);

    // Cek hak akses guru
    if ($kelas->guru_id !== Auth::id()) {
        abort(403, 'Anda tidak diizinkan mengedit kelas ini.');
    }

    return view('guru.kelas.edit', compact('kelas'));
}

public function update(Request $request, $id)
{
    $kelas = Kelas::findOrFail($id);

    // Cek hak akses guru
    if ($kelas->guru_id !== Auth::id()) {
        abort(403, 'Anda tidak diizinkan mengubah kelas ini.');
    }

    $request->validate(['nama_kelas' => 'required']);

    $kelas->update([
        'nama_kelas' => $request->nama_kelas,
    ]);

    return redirect()->route('guru.kelas.index')->with('success', 'Kelas berhasil diupdate.');
}


    public function destroy($id)
{
    $kelas = Kelas::findOrFail($id);

    // (Opsional) Cek apakah yang menghapus adalah pembuat kelas
    if ($kelas->guru_id !== Auth::id()) {
        abort(403, 'Anda tidak diizinkan menghapus kelas ini.');
    }

    $kelas->delete();

    return redirect()->route('guru.kelas.index')->with('success', 'Kelas berhasil dihapus.');
}

}

