<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapelMaster extends Model
{
    protected $guarded = [];

    public function guruMapels()
{
    return $this->hasMany(GuruMapel::class);
}
}
