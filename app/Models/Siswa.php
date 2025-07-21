<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function siswaKelas()
    {
        return $this->hasMany(SiswaKelas::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'nilai_id', 'id');
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'tagihan_id', 'id');
    }

    public function kelas()
{
    return $this->belongsToMany(Kelas::class, 'siswa_kelas')
        ->withPivot('tahun_ajaran_id') 
        ->withTimestamps();
}

protected static function booted(): void
{
    static::deleting(function ($siswa) {
        
        if ($siswa->user) {
            $siswa->user->delete();
        }
    });
}
}
