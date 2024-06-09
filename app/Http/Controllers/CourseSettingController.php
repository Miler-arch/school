<?php

namespace App\Http\Controllers;

use App\Models\CourseSetting;
use Illuminate\Http\Request;

class CourseSettingController extends Controller
{
    public function index()
    {
        $courses_settings = CourseSetting::all();
        
        return view('courses-settings.index', compact('courses_settings'));
    }
    public function store(Request $request)
    {
        try{
            CourseSetting::create($request->all());
            return redirect()->route('courses_settings.index')->with('success', 'Curso creado correctamente');
        }catch(\Exception $exception){
            return redirect()->route('courses_settings.index')->with('error', 'Ocurrió un error');
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
