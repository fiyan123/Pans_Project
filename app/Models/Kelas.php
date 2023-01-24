<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    // field apa saja yang bisa di isi
    public $fillable = ['kelas',  'jurusan'];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)
    // aktif
    public $timestamps = true;

      // membuat relasi one to many
    public function siswa()
    {
          // data dari model 'kelas' bisa memiliki banyak data
          // dari model 'Siswa' melalui id_kelas
          return $this->belongsTo(Siswa::class, 'id_kelas');
    }

}
