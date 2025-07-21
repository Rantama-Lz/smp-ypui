<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuruMapel extends Model
{
     protected $table = 'guru_mapel';

    protected $guarded = [];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function mapelmaster()
    {
        return $this->belongsTo(MapelMaster::class, 'mapel_master_id');
    }
}
