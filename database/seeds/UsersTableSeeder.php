<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'username' => 'adminSystem',
            'user_role' => 'Admin',
            'jenis_kelamin' => 'laki-laki',
            'no_telepon' => '081283918362',
            'tempat_lahir' => 'Tangerang',
            'tanggal_lahir' => '1997-01-01',
            'password' => Hash::make('qwerty'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'username' => 'manager',
            'user_role' => 'Manager',
            'jenis_kelamin' => 'laki-laki',
            'no_telepon' => '089182913912',
            'tempat_lahir' => 'Tangerang',
            'tanggal_lahir' => '1991-03-12',
            'password' => Hash::make('qwerty'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'leader',
            'email' => 'leader@gmail.com',
            'username' => 'leader',
            'user_role' => 'Leader',
            'jenis_kelamin' => 'Perempuan',
            'no_telepon' => '08131381371',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2000-08-12',
            'password' => Hash::make('qwerty'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
