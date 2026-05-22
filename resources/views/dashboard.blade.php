<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">Welcome, {{ Auth::user()->name }}!</h2>

                    @if(session('success'))
                        <div style="background-color: #d4edda; padding: 10px; margin:10px 0; color:#155724; border-radius: 4px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h3 class="text-xl font-semibold mt-6 mb-4">Your Enrolled Courses:</h3>
                    @if($enrollments->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-gray-300">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Course Title</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Instructor</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($enrollments as $enrollment)
                                        <tr class="hover:bg-gray-100">
                                            <td class="border border-gray-300 px-4 py-2">{{ $enrollment->course->title }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $enrollment->course->instructor ?? 'N/A' }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $enrollment->course->duration ? $enrollment->course->duration . ' hours' : 'N/A' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-600 italic">You are not enrolled in any courses yet. <a href="{{ route('courses.index') }}" class="text-blue-600 hover:underline">Browse courses</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
