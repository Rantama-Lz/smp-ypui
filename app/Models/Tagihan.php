<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $guarded = [];

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function spp(){
        return $this->belongsTo(Spp::class, 'spp_id', 'id');
    }
}
