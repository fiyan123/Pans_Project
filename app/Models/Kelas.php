<?php

namespace App\Models;

use Alert;
use App\Models\Siswa;
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
        return $this->hasMany(Siswa::class, 'id_kelas');
    }

    // Membuat event model
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($var) {
            // Mengecek apakah parent memiliki child atau tidak
            if($var->siswa->count() > 0) {
                Alert::error('Gagal', 'Data Tidak Bisa Dihapus Karena Dimiliki Data Lain');
                return false;
            }
        });
    }

}
