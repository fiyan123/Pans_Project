<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\Role;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // membuat Role
        $adminRole = Role::create([
            'name' => 'admin',
            'display_name' => 'User Administrator', // optional
        ]);

        $memberRole = Role::create([
            'name' => 'member',
            'display_name' => 'Project Member', // optional

        ]);
        
        // User
        $adminUser = new User();
        $adminUser->name = 'Admin Website';
        $adminUser->email = 'admin@gmail.com'; // optional
        $adminUser->password = bcrypt('password');
        $adminUser->save();
        $adminUser->attachRole($adminRole);

        // Sample Kelas
        // $kelas = new Kelas();
        // $kelas->kelas = 'Test';
        // $kelas->jurusan = 'test';
        // $kelas->save();

        // Sample Siswa
        // $siswa = new Siswa();
        // $siswa->nis = '0101010';
        // $siswa->nama = 'Test'; 
        // $siswa->jenis_kelamin = 'Laki-laki';
        // $siswa->id_kelas = '1';
        // $siswa->save();

        // Sample Guru
        // $guru = new Guru();
        // $guru->nip = '0101010';
        // $guru->nama = 'Test'; 
        // $guru->mata_pelajaran = 'test';
        // $guru->jenis_kelamin = 'Laki-laki'; 
        // $guru->save();

    }
}
