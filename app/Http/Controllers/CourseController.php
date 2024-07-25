<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\StoreRequest;
use App\Models\Course;
use App\Models\CourseSetting;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $courses_settings = CourseSetting::all();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('courses.index', compact('courses', 'courses_settings', 'teachers', 'subjects'));
    }
    public function store(StoreRequest $request)
    {
        try {
            $data = $request->except('_token');

            foreach ($data['course_setting_id'] as $courseSettingId) {
                auth()->user()->courses()->create([
                    'teacher_id' => $data['teacher_id'],
                    'subject_id' => $data['subject_id'],
                    'course_setting_id' => $courseSettingId,
                ]);
            }

            return response()->json(['message' => 'Curso creado correctamente'], 201);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Error al crear el curso'], 500);
        }
    }

    public function edit(Course $course)
    {

    }
    public function update(Request $request, Course $course)
    {

    }
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Curso eliminado correctamente');
    }
}
