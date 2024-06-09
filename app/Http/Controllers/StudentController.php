<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:students.index')->only('index');
        $this->middleware('can:students.show')->only('show');
        $this->middleware('can:students.edit')->only('edit');
        $this->middleware('can:students.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
        $courses = Course::all();
        $students = Student::with([ 'user' => function($query) {
            $query->select('id', 'name', 'paternal_lastname', 'maternal_lastname', 'birthdate', 'gender', 'address', 'phone', 'email');},
            'course'
        ])->whereHas('user', function($query) {
            $query->where('status', 1);
        })->get();

        return view('students.index', compact('students', 'courses'));
    }
    public function update(Request $request, Student $student)
    {
        try {
            $student->update($request->all());
            return redirect()->route('students.index')->with('info', 'El estudiante se actualizó con éxito');
        } catch (\Exception $exception) {
            return redirect()->route('students.index')->with('error', 'Ocurrió un error al actualizar el estudiante');
        }
    }
}
