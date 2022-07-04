<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'nik' => rand(1, 99999999),
                'name' => 'Admin',
                'email' => 'admin@test.test',
                'password' => Hash::make('password'),
                'status' => 1,
            ],
            [
                'nik' => rand(1, 99999999),
                'name' => 'Kepala',
                'email' => 'kepala@test.test',
                'password' => Hash::make('password'),
                'status' => 1,
            ],
            [
                'nik' => rand(1, 99999999),
                'name' => 'Pegawai',
                'email' => 'pegawai@test.test',
                'password' => Hash::make('password'),
                'status' => 1,
            ],
        ])->each(function($users){
            $user = User::create($users);
            $user->id == 1 ? $user->assignRole('admin') : '';
            $user->id == 2 ? $user->assignRole('kepala') : '';
            $user->id == 3 ? $user->assignRole('pegawai') : '';
        });
    }
}
