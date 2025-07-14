<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TingkatKelas extends Model
{
    protected $guarded = [];
        public function mapel(){
        return $this->hasMany(MataPelajaran::class, 'mata_pelajaran_id', 'id');
    }
        public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
}
