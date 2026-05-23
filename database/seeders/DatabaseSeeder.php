<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $courses = collect([
            [
                'title' => 'Introduction to Laravel',
                'description' => 'Learn the basic concepts of Laravel including routing, Blade templates, controllers, and MVC structure.',
                'instructor' => 'Lakshitha Viraj',
                'duration' => 10,
            ],
            [
                'title' => 'Laravel Database and Eloquent',
                'description' => 'Learn migrations, models, seeders, relationships, and Eloquent ORM operations.',
                'instructor' => 'Lakshitha Viraj',
                'duration' => 12,
            ],
            [
                'title' => 'Laravel Course Enrollment System',
                'description' => 'Practice authentication, course CRUD operations, form validation, and student enrollments.',
                'instructor' => 'Course Admin',
                'duration' => 15,
            ],
        ])->map(fn (array $course) => Course::create($course));

        Enrollment::firstOrCreate([
            'user_id' => $user->id,
            'course_id' => $courses->first()->id,
        ]);
    }
}