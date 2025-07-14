<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $guarded = [];

    public function siswaKelas()
    {
        return $this->belongsTo(SiswaKelas::class);
    }

    public function siswa()
    {
        return $this->siswaKelas->siswa(); // relasi perantara
    }
    public function spp(){
        return $this->belongsTo(Spp::class, 'spp_id', 'id');
    }

    public function tahunajaran(){
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id', 'id');
    }
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class , 'pembayaran_id', 'id');
    }
}
