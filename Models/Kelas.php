<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facedes\Storage;

class Kelas extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'nama_kelas', 'kompetensi_keahlian'
];
}
