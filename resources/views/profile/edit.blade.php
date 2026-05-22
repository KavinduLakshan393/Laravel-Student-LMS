<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-3xl">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Your Enrolled Courses</h3>
                    @if($enrollments->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-gray-300">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Course Title</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Instructor</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Duration</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($enrollments as $enrollment)
                                        <tr class="hover:bg-gray-100">
                                            <td class="border border-gray-300 px-4 py-2">{{ $enrollment->course->title }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $enrollment->course->instructor ?? 'N/A' }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $enrollment->course->duration ? $enrollment->course->duration . ' hours' : 'N/A' }}</td>
                                            <td class="border border-gray-300 px-4 py-2 text-sm">{{ Str::limit($enrollment->course->description, 100) ?? 'N/A' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-600 italic">You are not enrolled in any courses yet. <a href="{{ route('courses.index') }}" class="text-blue-600 hover:underline">Browse available courses</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
