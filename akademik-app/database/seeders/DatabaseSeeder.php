<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $akun = [
            ['Admin Akademik',  'admin@akademik.test',     'admin'],
            ['Dosen Satu',      'dosen@akademik.test',     'dosen'],
            ['Mahasiswa Satu',  'mahasiswa@akademik.test', 'mahasiswa'],
        ];

        foreach ($akun as [$nama, $email, $role]) {
            User::create([
                'name'     => $nama,
                'email'    => $email,
                'password' => Hash::make('password'),
                'role'     => $role,
            ]);
        }
    }
}