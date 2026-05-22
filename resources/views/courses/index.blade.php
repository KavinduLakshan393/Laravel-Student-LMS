@extends('layouts.main')

@section('title', 'Courses')
@section('header', 'Available Courses')
@section('content')
    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif
    <a href="{{ route('courses.create') }}">Add Course</a>
    <ul>
        @foreach($courses as $course)
            <li>
                {{ $course->title }} (Instructor: {{ $course->instructor }})
                <form method="POST" action="{{ route('enroll', $course->id) }}">
                    @csrf
                    <button type="submit">Enroll</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection