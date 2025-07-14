<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    protected $guarded = [];

    public function tahunajaran(){
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id', 'id');
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class , 'tagihan_id', 'id');
    }
}
