@extends('layouts.app')

@section('title', $course->title . ' - Course Details')

@section('content')
<div class="px-4 py-6 sm:px-0">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    {{ $course->title }}
                </h2>
                <p class="mt-1 text-sm text-gray-500">Course Code: {{ $course->course_code }}</p>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4 space-x-3">
                <a href="{{ route('courses.edit', $course) }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Course
                </a>
                <a href="{{ route('courses.index') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Back to Courses
                </a>
            </div>
        </div>

        <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Course Information -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Course Details -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Course Information</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Course details and description.</p>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Course Title</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $course->title }}</dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Course Code</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $course->course_code }}</dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Description</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $course->description }}</dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Instructor</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $course->instructor }}</dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Credits</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $course->credits }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Course Settings -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Course Settings</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Course level, status, and enrollment settings.</p>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Level</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    @if($course->level === 'beginner')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Beginner
                                        </span>
                                    @elseif($course->level === 'intermediate')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            Intermediate
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            Advanced
                                        </span>
                                    @endif
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Status</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    @if($course->status === 'active')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            Inactive
                                        </span>
                                    @endif
                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Maximum Students</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $course->max_students }}</dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Course Fee</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">${{ number_format($course->fee, 2) }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Quick Stats -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Enrollment Stats</h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                        <dl class="grid grid-cols-1 gap-5 sm:grid-cols-1">
                            <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow sm:px-6 sm:pt-6">
                                <dt>
                                    <div class="absolute rounded-md bg-green-500 p-3">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="ml-16 truncate text-sm font-medium text-gray-500">Enrolled Students</p>
                                </dt>
                                <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                                    <p class="text-2xl font-semibold text-gray-900">{{ $course->enrolled_students_count }}</p>
                                    <p class="ml-2 flex items-baseline text-sm font-semibold text-gray-600">
                                        / {{ $course->max_students }}
                                    </p>
                                </dd>
                            </div>
                            
                            <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow sm:px-6 sm:pt-6">
                                <dt>
                                    <div class="absolute rounded-md bg-blue-500 p-3">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="ml-16 truncate text-sm font-medium text-gray-500">Available Seats</p>
                                </dt>
                                <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                                    <p class="text-2xl font-semibold text-gray-900">{{ $course->available_seats }}</p>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Quick Actions</h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                        <div class="space-y-3">
                            <a href="{{ route('enrollments.create') }}?course_id={{ $course->id }}" 
                               class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Enroll Student
                            </a>
                            
                            <form action="{{ route('courses.destroy', $course) }}" method="POST" class="w-full">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                        onclick="return confirm('Are you sure you want to delete this course?')">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Delete Course
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enrolled Students -->
        @if($course->enrollments->count() > 0)
        <div class="mt-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Enrolled Students</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Students currently enrolled in this course.</p>
                </div>
                <div class="border-t border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Enrollment Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grade</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($course->enrollments as $enrollment)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                                    <span class="text-sm font-medium text-indigo-600">{{ substr($enrollment->student->first_name, 0, 1) }}{{ substr($enrollment->student->last_name, 0, 1) }}</span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $enrollment->student->full_name }}</div>
                                                <div class="text-sm text-gray-500">{{ $enrollment->student->student_id }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $enrollment->enrollment_date->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($enrollment->status === 'enrolled')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                Enrolled
                                            </span>
                                        @elseif($enrollment->status === 'completed')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Completed
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                Dropped
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $enrollment->grade ? $enrollment->grade . '% (' . $enrollment->grade_letter . ')' : 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('enrollments.edit', $enrollment) }}" 
                                           class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection 