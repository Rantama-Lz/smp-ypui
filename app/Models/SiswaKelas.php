<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaKelas extends Model
{
    protected $guarded = [];
    
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function tahunajaran()
    {
        return $this->belongsTo(TahunAjaran::class , 'tahun_ajaran_id', 'id');
    }
}
