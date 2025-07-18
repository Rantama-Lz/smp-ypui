<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $guarded = [];

    public function siswa(){
        return $this->belongsTo(Siswa::class);
    }
    public function siswaKelas()
    {
        return $this->belongsTo(SiswaKelas::class);
    }
    public function mapelmaster()
    {
        return $this->belongsTo(MapelMaster::class, 'mapel_master_id', 'id');
    }

    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id', 'id');
    }

    public function tahunajaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id', 'id');
    }
//     protected static function booted()
// {
//     static::saving(function ($nilai) {
//         $nilai->nilai_akhir = round(
//             ($nilai->nilai_harian * 0.3) +
//             ($nilai->nilai_uts * 0.3) +
//             ($nilai->nilai_uas * 0.4)
//         );
//     });
// }
}
