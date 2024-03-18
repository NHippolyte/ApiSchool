<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
        Role::create([
            'role' => 'user'
        ]);
        Role::create([
            'role' => 'admin'
        ]);
    }
}