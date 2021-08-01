<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      DB::table('tbl_jenis_interview')->insert([
        'nama' => 'Interview'
      ]);

      DB::table('tbl_jenis_interview')->insert([
        'nama' => 'Pembahasan Kontrak Pegawai'
      ]);

      DB::table('tbl_role')->insert([
        'nama' => 'pimpinan'
      ]);
      DB::table('tbl_role')->insert([
        'nama' => 'admin'
      ]);
      DB::table('tbl_role')->insert([
        'nama' => 'pelamar'
      ]);
      DB::table('tbl_role')->insert([
        'nama' => 'unitkerja'
      ]);
      DB::table('tbl_role')->insert([
        'nama' => 'pegawai'
      ]);
    
            // DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
            DB::table('users')->insert([
              'name' => 'the admin user',
              'email' => 'iamadmin@gmail.com',
              'role' => 'admin',
              'password' => Hash::make('password'),
            ]);
            DB::table('users')->insert([
              'name' => 'the seller user',
              'email' => 'pimpinan@gmail.com',
              'role' => 'pimpinan',
              'password' => Hash::make('password'),
            ]);
            DB::table('users')->insert([
              'name' => 'unit kerja',
              'email' => 'unit@gmail.com',
              'role' => 'unitkerja',
              'password' => Hash::make('password'),
            ]);

            
            DB::table('users')->insert([
              'name' => 'pelamar',
              'email' => '123@gmail.com',
              'role' => 'pelamar',
              'password' => Hash::make('123'),
            ]);

            
            DB::table('users')->insert([
              'name' => 'pelamar 2',
              'email' => '456@gmail.com',
              'role' => 'pelamar',
              'password' => Hash::make('123'),
            ]);

            DB::table('datapelamar')->insert([
              'nama' => 'pelamar',
              'tempat_lahir' => 'Palembang',
              'tanggal_lahir' => '2021-07-09',
              'jenis_kelamin' => 0,
              'email' => '123@gmail.com',
              'no_hp' => '00000000',
              'foto_kk' => 'storage/pelamar/9/kk_2021_07_28_09_55_22.png',
              'foto_ktp' => 'storage/pelamar/9/ktp_2021_07_28_08_42_37.jpg',
              'foto_ijazah' => 'storage/pelamar/9/ijazah_2021_07_28_08_42_37.jpg',
              'foto_diri' => 'storage/pelamar/9/diri_2021_07_28_08_42_37.jpg',
              'foto_skck' => 'storage/pelamar/9/skck_2021_07_28_08_42_37.png',
              'surat_keterangan_sehat' => 'storage/pelamar/9/surat_keterangan_sehat_2021_07_28_08_42_37.jpg',
              'surat_pengalaman_kerja' => 'storage/pelamar/9/surat_pengalaman_kerja_2021_07_28_08_42_37.jpg',
              'id_user' => 3,
              'status' => 1,
            ]);

            DB::table('datapelamar')->insert([
              'nama' => 'pelamar 2',
              'tempat_lahir' => 'Palembang 2',
              'tanggal_lahir' => '2021-07-09',
              'jenis_kelamin' => 1,
              'email' => '456@gmail.com',
              'no_hp' => '00000000',
              'foto_kk' => 'storage/pelamar/9/kk_2021_07_28_09_55_22.png',
              'foto_ktp' => 'storage/pelamar/9/ktp_2021_07_28_08_42_37.jpg',
              'foto_ijazah' => 'storage/pelamar/9/ijazah_2021_07_28_08_42_37.jpg',
              'foto_diri' => 'storage/pelamar/9/diri_2021_07_28_08_42_37.jpg',
              'foto_skck' => 'storage/pelamar/9/skck_2021_07_28_08_42_37.png',
              'surat_keterangan_sehat' => 'storage/pelamar/9/surat_keterangan_sehat_2021_07_28_08_42_37.jpg',
              'surat_pengalaman_kerja' => 'storage/pelamar/9/surat_pengalaman_kerja_2021_07_28_08_42_37.jpg',
              'id_user' => 4,
              'status' => 1,
            ]);
    }
}

