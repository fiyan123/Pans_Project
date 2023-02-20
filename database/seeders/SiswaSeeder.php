<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data ke table siswa
        DB::table('siswas')->insert([
        	'nis'           => 109212,
        	'nama'          => 'test',
        	'jenis_kelamin' => 'laki-laki',
        	'id_kelas'      => 1
        ]);
    }
}
