<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Course
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <form action="{{ route('courses.update', $course) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Title <span class="text-red-600">*</span>
                        </label>
                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $course->title) }}"
                               required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            Description
                        </label>
                        <textarea name="description"
                                  id="description"
                                  rows="4"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description', $course->description) }}</textarea>

                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="instructor" class="block text-sm font-medium text-gray-700">
                            Instructor
                        </label>
                        <input type="text"
                               name="instructor"
                               id="instructor"
                               value="{{ old('instructor', $course->instructor) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                        @error('instructor')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="duration" class="block text-sm font-medium text-gray-700">
                            Duration in Hours
                        </label>
                        <input type="number"
                               name="duration"
                               id="duration"
                               value="{{ old('duration', $course->duration) }}"
                               min="1"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                        @error('duration')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-2">
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Update Course
                        </button>

                        <a href="{{ route('courses.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                            Cancel
                        </a>
                    </div>
                </form>

                <form action="{{ route('courses.destroy', $course) }}"
                      method="POST"
                      class="mt-6 pt-6 border-t border-gray-300"
                      onsubmit="return confirm('Are you sure you want to delete this course?');">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Delete Course
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>