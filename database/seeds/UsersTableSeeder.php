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
            'user_role' => 'admin',
            'jenis_kelamin' => 'laki-laki',
            'no_telepon' => '081212121212',
            'tempat_lahir' => 'Brebes',
            'tanggal_lahir' => '1999-11-19',
            'password' => Hash::make('qwerty'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
