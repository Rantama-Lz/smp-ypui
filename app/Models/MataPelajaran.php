<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $guarded = [];
    public function guru(){
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }
}
