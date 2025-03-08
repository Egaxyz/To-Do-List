<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => md5('password123'),
                'kontak' => 6281234,
                'gender' => 'pria',
                'status_akun' => 'aktif',
            ],
            [
                'name' => 'User1',
                'email' => 'user1@example.com',
                'password' => md5('password123'),
                'kontak' => 6289876,
                'gender' => 'wanita',
                'status_akun' => 'nonaktif',
            ],
        ]);
    }
}