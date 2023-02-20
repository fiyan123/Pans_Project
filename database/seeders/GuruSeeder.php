<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data ke table guru
        DB::table('gurus')->insert([
        	'nip'            => 1100298,
        	'nama'           => 'test',
        	'mata_pelajaran' => 'test',
        	'jenis_kelamin'  => 'laki-laki'
        ]);
    }
}
