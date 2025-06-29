<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'credits' => 'required|integer|min:1|max:6',
            'instructor' => 'required|string|max:255',
            'level' => 'required|in:beginner,intermediate,advanced',
            'status' => 'required|in:active,inactive',
            'max_students' => 'required|integer|min:1|max:100',
            'fee' => 'required|numeric|min:0',
        ]);

        $course = new Course($request->all());
        $course->course_code = 'CRS' . date('Y') . Str::random(6);
        $course->save();

        return redirect()->route('courses.index')
            ->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course->load(['enrollments.student']);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'credits' => 'required|integer|min:1|max:6',
            'instructor' => 'required|string|max:255',
            'level' => 'required|in:beginner,intermediate,advanced',
            'status' => 'required|in:active,inactive',
            'max_students' => 'required|integer|min:1|max:100',
            'fee' => 'required|numeric|min:0',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
