<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $guarded = [];

    public function tagihan(){
        return $this->belongsTo(Tagihan::class);
    }
    public function validator()
{
    return $this->belongsTo(User::class, 'validated_by');
}
    // public function siswa(){
    //     return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    // }
}
