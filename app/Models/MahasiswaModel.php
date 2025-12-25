<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MahasiswaModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    protected $fillable = ['nm_mahasiswa','tmp_lahir','tgl_lahir','alamat','no_hp'];
}
