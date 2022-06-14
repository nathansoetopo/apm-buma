<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
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
                'name' => 'admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'kepala',
                'guard_name' => 'web',
            ],
            [
                'name' => 'pegawai',
                'guard_name' => 'web',
            ],
        ])->each(function($roles){
            Role::create($roles);
        });
    }
}
