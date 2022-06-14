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
                'name' => 'Admin',
                'email' => 'admin@test.test',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Kepala',
                'email' => 'kepala@test.test',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Pegawai',
                'email' => 'pegawai@test.test',
                'password' => Hash::make('password'),
            ],
        ])->each(function($users){
            $user = User::create($users);
            $user->id == 1 ? $user->assignRole('admin') : '';
            $user->id == 2 ? $user->assignRole('kepala') : '';
            $user->id == 3 ? $user->assignRole('pegawai') : '';
        });
    }
}
