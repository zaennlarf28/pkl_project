<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permintaan_join extends Model
{
    public function siswa()
{
    return $this->belongsTo(Siswa::class);
}

public function kelas()
{
    return $this->belongsTo(Kelas::class);
}

}
