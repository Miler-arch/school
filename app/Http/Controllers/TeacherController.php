<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:teachers.index')->only('index');
        $this->middleware('can:teachers.show')->only('show');
        $this->middleware('can:teachers.edit')->only('edit');
        $this->middleware('can:teachers.destroy')->only('destroy');
    }
    public function index()
    {
        $teachers = Teacher::with(['user' => function($query) {
            $query->select('id', 'name', 'paternal_lastname', 'maternal_lastname', 'birthdate', 'gender', 'address', 'phone', 'email');
        }, 'courses'])->whereHas('user', function($query) {
            $query->where('status', 1);
        })->get();
        $courses = Course::all();
        $subjects = Subject::all();
        return view('teachers.index', compact('teachers', 'courses', 'subjects'));
    }
    public function store(Request $request)
    {
        try{
            $data = $request->except('_token');
            Teacher::create($data);
            return response()->json(['message' => 'Profesor creado correctamente'], 201);
        } catch(\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Error al crear el profesor'], 500);
        }
    }

    public function update(Request $request, Teacher $teacher)
    {
        try {
            $data = $request->except('_token');
            $teacher->update($data);
            return redirect()->route('teachers.index')->with('info', 'Profesor actualizado correctamente');
        } catch(\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('teachers.index')->with('error', 'Error al actualizar el docente');
        }
    }
}
