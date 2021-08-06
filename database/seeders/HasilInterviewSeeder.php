<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class HasilInterviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_hasil_interview')->insert([
            'hasil_interview' => '<p> pelamar 1 interview </p>',
            'status' => 1,
            'id_pelamar' => 1,
            'id_jenis_interview' => 1
        ]);
        
        DB::table('tbl_hasil_interview')->insert([
            'hasil_interview' => '<p> pelamar 1 kontrak kerja </p>',
            'status' => 1,
            'id_pelamar' => 1,
            'id_jenis_interview' => 2
        ]);
        
        DB::table('tbl_hasil_interview')->insert([
            'hasil_interview' => '<p> pelamar 2 interview </p>',
            'status' => 1,
            'id_pelamar' => 2,
            'id_jenis_interview' => 1
        ]);
        
        DB::table('tbl_hasil_interview')->insert([
            'hasil_interview' => '<p> sppelamar 2 kontrak kerja </p>',
            'status' => 1,
            'id_pelamar' => 2,
            'id_jenis_interview' => 2
        ]);
    }
}
