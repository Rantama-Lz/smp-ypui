<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $guarded = [];

    public function tagihan(){
        return $this->belongsTo(Tagihan::class, 'tagihan_id', 'id');
    }
}
