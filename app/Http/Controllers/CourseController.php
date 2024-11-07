<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function updatePrice(Request $request, Course $course)
    {
        $request->validate([
            'price' => 'required|numeric|min:0',
        ]);

        $course->price()->updateOrCreate(
            ['priceable_id' => $course->id, 'priceable_type' => Course::class],
            ['price' => $request->input('price')]
        );

        return response()->json(['message' => 'Course price updated successfully.'], 200);
    }
}
