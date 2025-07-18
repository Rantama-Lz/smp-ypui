<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $guarded = [];
    public function guru(){
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'nilai_id', 'id');
    }

    public function tingkatkelas()
    {
        return $this->belongsTo(TingkatKelas::class, 'tingkat_kelas_id', 'id');
    }

    public function tahunajaran() 
    {
    return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id' , 'id');
    }
    
    public function mapelmaster() {

    return $this->belongsTo(MapelMaster::class, 'mapel_master_id' , 'id');
}
}
