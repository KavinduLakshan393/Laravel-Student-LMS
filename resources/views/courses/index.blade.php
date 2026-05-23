<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Available Courses
            </h2>

            <a href="{{ route('courses.create') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Add Course
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($courses->isEmpty())
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <p class="text-gray-600">No courses are available yet.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($courses as $course)
                        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                            <h3 class="text-lg font-bold text-gray-900">
                                {{ $course->title }}
                            </h3>

                            <p class="mt-2 text-gray-600">
                                {{ $course->description ?? 'No description available.' }}
                            </p>

                            <div class="mt-4 text-sm text-gray-700 space-y-1">
                                <p><strong>Instructor:</strong> {{ $course->instructor ?? 'N/A' }}</p>
                                <p><strong>Duration:</strong> {{ $course->duration ? $course->duration . ' hours' : 'N/A' }}</p>
                                <p><strong>Total Enrollments:</strong> {{ $course->enrollments_count }}</p>
                            </div>

                            <div class="mt-5 flex flex-wrap gap-2">
                                @if(in_array($course->id, $enrolledCourseIds))
                                    <button disabled
                                            class="px-4 py-2 bg-gray-400 text-white rounded-md cursor-not-allowed">
                                        Already Enrolled
                                    </button>
                                @else
                                    <form method="POST" action="{{ route('enroll', $course) }}">
                                        @csrf
                                        <button type="submit"
                                                class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                                            Enroll
                                        </button>
                                    </form>
                                @endif

                                <a href="{{ route('courses.edit', $course) }}"
                                   class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                                    Edit
                                </a>

                                <form method="POST"
                                      action="{{ route('courses.destroy', $course) }}"
                                      onsubmit="return confirm('Are you sure you want to delete this course?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>