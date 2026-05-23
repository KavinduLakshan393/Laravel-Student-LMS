<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function enroll(Course $course)
    {
        $enrollment = Enrollment::firstOrCreate([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
        ]);

        if (! $enrollment->wasRecentlyCreated) {
            return redirect()
                ->back()
                ->with('status', 'You are already enrolled in this course.');
        }

        return redirect()
            ->back()
            ->with('success', 'Successfully enrolled in the course.');
    }
}