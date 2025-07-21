<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;
    protected $guarded = [];

     public function kelas()
    {
        return $this->hasMany(Kelas::class, 'kelas_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function mapels()
{
    return $this->belongsToMany(MapelMaster::class, 'guru_mapel', 'guru_id', 'mapel_master_id');
}
    public function gurumapel()
    {
    return $this->hasMany(GuruMapel::class);
    }

    protected static function booted(): void
{
    static::deleting(function ($guru) {
        
        if ($guru->user) {
            $guru->user->delete();
        }
    });
}
}
