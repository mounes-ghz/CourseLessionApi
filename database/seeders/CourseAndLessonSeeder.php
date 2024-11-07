<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Pricing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseAndLessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $course = Course::create(['name' => 'Laravel Basics']);
        Pricing::create([
            'model_id' => $course->id,
            'model_type' => Course::class,
            'price' => 100.00,
        ]);


        $lesson1 = Lesson::create(['name' => 'Introduction to Laravel', 'course_id' => $course->id]);
        $lesson2 = Lesson::create(['name' => 'Routing in Laravel', 'course_id' => $course->id]);


        Pricing::create([
            'model_id' => $lesson1->id,
            'model_type' => Lesson::class,
            'price' => 25.00,
        ]);

        Pricing::create([
            'model_id' => $lesson2->id,
            'model_type' => Lesson::class,
            'price' => 30.00,
        ]);
    }

}
