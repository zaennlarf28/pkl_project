<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function index()
{
    $kelas = Kelas::with('guru')->where('guru_id', Auth::id())->get();
    return view('guru.kelas.index', compact('kelas'));
}

    public function create()
    {
        return view('guru.kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama_kelas' => 'required']);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'guru_id' => Auth::id()
        ]);

        return redirect()->route('guru.kelas.index')->with('success', 'Kelas berhasil dibuat.');
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

