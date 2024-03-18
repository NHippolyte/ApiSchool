<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'pseudo' => 'administrateur',
            'password' => Hash::make('Azerty89'),
            'email' => 'admin@exemple.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => 2,
        ]);
        User::create([
            'pseudo' => 'utilisateur',
            'password' => Hash::make('Azerty89'),
            'email' => 'exemple@exemple.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => 1,
        ]);
        
        User::factory(8)->create();
    }
    }
