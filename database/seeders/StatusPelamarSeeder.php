<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class StatusPelamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_status_pelamar')->insert([
            'nama' => 'menunggu panggilan',
        ]);

        DB::table('tbl_status_pelamar')->insert([
            'nama' => 'proses interview',
        ]);

        DB::table('tbl_status_pelamar')->insert([
            'nama' => 'diterima',
        ]);

        DB::table('tbl_status_pelamar')->insert([
            'nama' => 'ditolak',
        ]);
    }
}
