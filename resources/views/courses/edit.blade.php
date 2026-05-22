@extends('layouts.app')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if(session('success'))
                    <div style="color:green; margin-bottom: 15px;">{{ session('success') }}</div>
                @endif

                <form action="{{ route('courses.update', $course->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title *</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $course->title) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('title')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description', $course->description) }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="instructor" class="block text-sm font-medium text-gray-700">Instructor</label>
                        <input type="text" name="instructor" id="instructor" value="{{ old('instructor', $course->instructor) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('instructor')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="duration" class="block text-sm font-medium text-gray-700">Duration (hours)</label>
                        <input type="number" name="duration" id="duration" value="{{ old('duration', $course->duration) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('duration')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Update Course
                        </button>
                        <a href="{{ route('courses.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-500">
                            Cancel
                        </a>
                    </div>
                </form>

                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="mt-6 pt-6 border-t border-gray-300">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700" onclick="return confirm('Are you sure you want to delete this course?');">
                        Delete Course
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection
