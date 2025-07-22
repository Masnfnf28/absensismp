<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'nama_matapelajaran';

    protected $fillable = ['nama_mapel', 'kode_mapel']; // atau 'nama_matapelajaran' kalau memang begitu di DB
}
