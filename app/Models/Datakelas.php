<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datakelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kodekelas',
        'kelas',
    ];

    protected $table = 'datakelas';
    protected $primaryKey = 'kodekelas';
    public $incrementing = false; // Tambahkan ini jika kodekelas bukan integer
    protected $keyType = 'string'; // Pastikan sesuai tipe data kodekelas
}
