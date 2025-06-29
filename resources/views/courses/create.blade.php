@extends('layouts.app')

@section('title', 'Add New Course - Student Management System')

@section('content')
<div class="px-4 py-6 sm:px-0">
    <div class="max-w-3xl mx-auto">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Add New Course
                </h2>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <a href="{{ route('courses.index') }}" 
                   class="ml-3 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Back to Courses
                </a>
            </div>
        </div>

        <div class="mt-8">
            <form action="{{ route('courses.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Course Information</h3>
                            <p class="mt-1 text-sm text-gray-500">Basic information about the course.</p>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" 
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('title') border-red-300 @enderror" required>
                                    @error('title')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea name="description" id="description" rows="4" 
                                              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('description') border-red-300 @enderror" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="instructor" class="block text-sm font-medium text-gray-700">Instructor</label>
                                    <input type="text" name="instructor" id="instructor" value="{{ old('instructor') }}" 
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('instructor') border-red-300 @enderror" required>
                                    @error('instructor')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="credits" class="block text-sm font-medium text-gray-700">Credits</label>
                                    <input type="number" name="credits" id="credits" value="{{ old('credits') }}" min="1" max="6"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('credits') border-red-300 @enderror" required>
                                    @error('credits')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Course Details</h3>
                            <p class="mt-1 text-sm text-gray-500">Additional course settings and requirements.</p>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                                    <select name="level" id="level" 
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('level') border-red-300 @enderror" required>
                                        <option value="">Select Level</option>
                                        <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                        <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                        <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                                    </select>
                                    @error('level')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                    <select name="status" id="status" 
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('status') border-red-300 @enderror" required>
                                        <option value="">Select Status</option>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="max_students" class="block text-sm font-medium text-gray-700">Maximum Students</label>
                                    <input type="number" name="max_students" id="max_students" value="{{ old('max_students', 30) }}" min="1" max="100"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('max_students') border-red-300 @enderror" required>
                                    @error('max_students')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="fee" class="block text-sm font-medium text-gray-700">Course Fee ($)</label>
                                    <input type="number" name="fee" id="fee" value="{{ old('fee') }}" min="0" step="0.01"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('fee') border-red-300 @enderror" required>
                                    @error('fee')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('courses.index') }}" 
                       class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Create Course
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 