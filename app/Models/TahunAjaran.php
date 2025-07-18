<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $guarded = [];
    
    public function kelas(){
        return $this->hasMany(Kelas::class, 'kelas_id', 'id');
    }

    public function siswaKelas()
{
    return $this->hasMany(SiswaKelas::class);
}
}
