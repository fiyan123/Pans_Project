<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
        	'kelas'     => '10 Rpl 1',
        	'jurusan'   => 'Rekayasa Perangkat Lunak',
        ]);
    }
}
