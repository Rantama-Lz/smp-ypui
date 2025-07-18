<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    /** @use HasFactory<\Database\Factories\KelasFactory> */
    use HasFactory;
    protected $guarded = [];

    public function guru(){
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }
    public function tahunajaran(){
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id', 'id');
    }

    public function tingkatkelas(){
        return $this->belongsTo(TingkatKelas::class, 'tingkat_kelas_id', 'id');
    }
    public function siswaKelas()
    {
        return $this->hasMany(SiswaKelas::class);
    }
    
}
