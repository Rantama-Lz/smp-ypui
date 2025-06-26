<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nip',
        'jenis_kelamin',
        'alamat',
        'agama',
        'tgl_lahir',
    ];
}
