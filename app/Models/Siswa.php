<?php

namespace App\Models;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;
    public $fillable = ['nis', 'nama', 'jenis_kelamin' , 'id_kelas'];
    public $timestamps = true;

    public function kelas()
    {
        // data dari model 'Siswa' bisa dimiliki
        // oleh model 'kelas' melalui 'id_kelas'
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }


    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->when('nama', 'like', '%' .$search. '%');
        });
    }

}
