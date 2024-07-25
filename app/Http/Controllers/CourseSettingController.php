<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseSetting\StoreRequest;
use App\Models\CourseSetting;
use Illuminate\Http\Request;

class CourseSettingController extends Controller
{
    public function index()
    {
        $courses_settings = CourseSetting::orderBy('parallel', 'asc')->get();
        return view('courses-settings.index', compact('courses_settings'));
    }
    public function store(StoreRequest $request)
    {
        try {
            $course = CourseSetting::firstOrCreate([
                'parallel' => $request['parallel'],
                'degree' => $request['degree'],
                'level' => $request['level'],
            ]);

            if ($course->wasRecentlyCreated) {
                return response()->json(['success' => true, 'message' => 'Curso creado correctamente']);
            } else {
                return response()->json(['success' => false, 'message' => 'El curso ya existe']);
            }
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'message' => 'Ocurrió un error']);
        }
    }
    public function show(CourseSetting $courses_setting)
    {
        //
    }
    public function edit(CourseSetting $courses_setting)
    {
        //
    }
    public function update(Request $request, CourseSetting $courses_setting)
    {
        //
    }
    public function destroy(CourseSetting $courses_setting)
    {
        $courses_setting->delete();
        return redirect()->route('courses_settings.index')->with('success', 'Curso eliminado correctamente');
    }
}
