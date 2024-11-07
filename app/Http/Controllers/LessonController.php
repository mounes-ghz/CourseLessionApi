<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function updatePrice(Request $request, Lesson $lesson)
    {
        $request->validate([
            'price' => 'required|numeric|min:0',
        ]);

        $lesson->price()->updateOrCreate(
            ['priceable_id' => $lesson->id, 'priceable_type' => Lesson::class],
            ['price' => $request->input('price')]
        );

        return response()->json(['message' => 'Lesson price updated successfully.'], 200);
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $lesson = new Lesson([
            'name' => $request->input('name'),
        ]);

        $course->lessons()->save($lesson);

        return response()->json($lesson, 201);
    }

}
