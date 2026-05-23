<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-2">
                        Welcome, {{ $user->name }}!
                    </h2>

                    <p class="text-gray-600 mb-6">
                        This is your Laravel LMS dashboard. You can view your enrolled courses here.
                    </p>

                    <div class="mb-6 flex gap-2">
                        <a href="{{ route('courses.index') }}"
                           class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Browse Courses
                        </a>

                        <a href="{{ route('courses.create') }}"
                           class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                            Add Course
                        </a>
                    </div>

                    <h3 class="text-xl font-semibold mb-4">
                        Your Enrolled Courses
                    </h3>

                    @if($enrollments->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-gray-300">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Course Title</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Instructor</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Duration</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Enrolled Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($enrollments as $enrollment)
                                        <tr class="hover:bg-gray-100">
                                            <td class="border border-gray-300 px-4 py-2">
                                                {{ $enrollment->course?->title ?? 'Course not available' }}
                                            </td>
                                            <td class="border border-gray-300 px-4 py-2">
                                                {{ $enrollment->course?->instructor ?? 'N/A' }}
                                            </td>
                                            <td class="border border-gray-300 px-4 py-2">
                                                {{ $enrollment->course?->duration ? $enrollment->course->duration . ' hours' : 'N/A' }}
                                            </td>
                                            <td class="border border-gray-300 px-4 py-2">
                                                {{ $enrollment->created_at->format('Y-m-d') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-600 italic">
                            You are not enrolled in any courses yet.
                            <a href="{{ route('courses.index') }}" class="text-blue-600 hover:underline">
                                Browse courses
                            </a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>