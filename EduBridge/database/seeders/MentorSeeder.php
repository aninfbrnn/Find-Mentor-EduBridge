<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mentor;

class MentorSeeder extends Seeder
{
    public function run()
    {
        $mentors = [
            [
                'image' => 'gambar1.png',
                'name' => 'Natalie Shien',
                'skills' => 'UI/UX Design for Beginners',
                'price' => 98,
                'description' => 'An expert in UI/UX design for beginners.',
            ],
            [
                'image' => 'gambar2.png',
                'name' => 'John Carter',
                'skills' => 'Mastering Python Programming',
                'price' => 120,
                'description' => 'An expert in Python Programming.',
            ],
            [
                'image' => 'gambar3.png',
                'name' => 'Emma Brooks',
                'skills' => 'Adobe Photoshop Essentials',
                'price' => 85,
                'description' => 'An expert in Python Programming.',
            ],
            [
                'image' => 'gambar4.png',
                'name' => 'Liam Davies',
                'skills' => 'Data Science for Beginners',
                'price' => 110,
                'description' => 'An expert in Python Programming.',
            ],
            [
                'image' => 'gambar5.png',
                'name' => 'Olivia Morgan',
                'skills' => 'Advanced Excel for Business',
                'price' => 70,
                'description' => 'An expert in Python Programming.',
            ],
            [
                'image' => 'gambar6.png',
                'name' => 'Lucas Smith',
                'skills' => 'Digital Marketing 101',
                'price' => 98,
                'description' => 'An expert in Python Programming.',
            ],
            [
                'image' => 'gambar7.png',
                'name' => 'Sophia Johnson',
                'skills' => 'Graphic Design Masterclass',
                'price' => 105,
                'description' => 'An expert in Python Programming.',
            ],
            [
                'image' => 'gambar8.png',
                'name' => 'Mochammad Ichal',
                'skills' => 'Mobile App Development Basics',
                'price' => 115,
                'description' => 'An expert in Python Programming.',
            ],
            [
                'image' => 'gambar9.png',
                'name' => 'James Wilson',
                'skills' => 'Photography Basics',
                'price' => 80,
                'description' => 'An expert in Python Programming.',
            ],
            [
                'image' => 'gambar10.png',
                'name' => 'John Baskara',
                'skills' => 'Cyber Security',
                'price' => 100,
                'description' => 'An expert in Python Programming.',
            ],
            [
                'image' => 'gambar11.png',
                'name' => 'Elijah Taylor',
                'skills' => 'Cybersecurity Fundamentals',
                'price' => 130,
                'description' => 'An expert in Python Programming.',
            ],
            [
                'image' => 'gambar12.png',
                'name' => 'Isabella Davis',
                'skills' => 'Interior Design Essentials',
                'price' => 90,
                'description' => 'An expert in Python Programming.',
            ],
        ];

        foreach ($mentors as $mentor) {
            Mentor::create($mentor);
        }
    }
}