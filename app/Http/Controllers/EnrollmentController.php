<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function enroll(Course $course)
    {
        Enrollment::create([
            'user_id' => Auth::id(),
            'course_id' => $course->id
        ]);

        return redirect()->back()->with('success', 'Successfully enrolled!');
    }
}