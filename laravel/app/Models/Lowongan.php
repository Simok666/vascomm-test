<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;
    protected $table = "lowongan";
    protected $fillable = ["nama", "deskripsi", "tingkat_pendidikan", "tanggal_tutup", "kuota", "tanggal_buka"];
}
