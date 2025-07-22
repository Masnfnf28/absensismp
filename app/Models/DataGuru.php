<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGuru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'jenis_kelamin',
        'alamat',
        'tgl_lahir',
    ];

    protected $table = 'dataguru';

    // protected $primaryKey = 'nip';
}
