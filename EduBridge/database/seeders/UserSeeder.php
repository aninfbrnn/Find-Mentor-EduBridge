<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password123'),
            'education' => 'Mahasiswa',
            'interest' => 'Sains',
            'university' => 'University of Science',
            'description' => 'A passionate student of science.',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'password' => Hash::make('password123'),
            'education' => 'SMA',
            'interest' => 'Bisnis',
            'university' => null,
            'description' => 'Aspiring entrepreneur with a love for business.',
        ]);

        User::create([
            'name' => 'Alice Johnson',
            'email' => 'alicejohnson@example.com',
            'password' => Hash::make('password123'),
            'education' => 'Mahasiswa',
            'interest' => 'Komunikasi',
            'university' => 'University of Communication',
            'description' => 'Enthusiast in public relations and media.',
        ]);

        User::create([
            'name' => 'Michael Brown',
            'email' => 'michaelbrown@example.com',
            'password' => Hash::make('password123'),
            'education' => 'Mahasiswa',
            'interest' => 'Bisnis',
            'university' => 'Business University',
            'description' => 'Future business leader with a strong vision.',
        ]);

        User::create([
            'name' => 'Sarah Lee',
            'email' => 'sarahlee@example.com',
            'password' => Hash::make('password123'),
            'education' => 'SMA',
            'interest' => 'Sains',
            'university' => null,
            'description' => 'High school student with a deep interest in biology.',
        ]);

        User::create([
            'name' => 'Robert Davis',
            'email' => 'robertdavis@example.com',
            'password' => Hash::make('password123'),
            'education' => 'Mahasiswa',
            'interest' => 'Komunikasi',
            'university' => 'Media University',
            'description' => 'Aspiring journalist and communication expert.',
        ]);

        User::create([
            'name' => 'Emily White',
            'email' => 'emilywhite@example.com',
            'password' => Hash::make('password123'),
            'education' => 'Mahasiswa',
            'interest' => 'Sains',
            'university' => 'Tech University',
            'description' => 'Tech enthusiast exploring the world of AI.',
        ]);

        User::create([
            'name' => 'Daniel Wilson',
            'email' => 'danielwilson@example.com',
            'password' => Hash::make('password123'),
            'education' => 'SMA',
            'interest' => 'Bisnis',
            'university' => null,
            'description' => 'Young entrepreneur building a startup.',
        ]);
    }
}
