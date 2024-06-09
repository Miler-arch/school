<?php

namespace App\Http\Controllers;

use App\Models\Calification;
use App\Models\Course;
use App\Models\Student;
use App\Models\Trimester;
use Illuminate\Http\Request;

class CalificationController extends Controller
{
public function index()
    {
        $courses = Course::with(['teacher.user', 'subject', 'courseSetting'])->get();
        $trimesters = Trimester::all();
        $years = $trimesters->groupBy('year')->keys();
        $students = Student::all();

        return view('califications.index', compact('courses', 'years', 'trimesters', 'students'));
    }

    public function indexCalifications(){
        $trimesters = Trimester::all();
        $courses = Course::all();
        $students = Student::all();
        return view('califications.notes', compact('trimesters', 'courses', 'students'));
    }

    public function getNotes(Request $request)
    {
        $trimesterId = $request->input('trimester');
        $notes = Calification::with('student.user')->where('trimester_id', $trimesterId)->get();

        return response()->json($notes);
    }

    public function saveNotes(Request $request)
    {
        $notes = $request->input('notes');
        $trimesterId = $request->input('trimester');

        foreach ($notes as $noteData) {
            Calification::updateOrCreate(
                ['student_id' => $noteData['student_id'], 'trimester_id' => $trimesterId],
                ['note1' => $noteData['note1'], 'note2' => $noteData['note2'], 'note3' => $noteData['note3']]
            );
        }

        return response()->json(['success' => true]);
    }

    public function create()
    {
        //
    }
    public function store()
    {

    }
    public function show(Calification $calification)
    {
        //
    }
    public function edit(Calification $calification)
    {
        //
    }
    public function update(Request $request, Calification $calification)
    {
        //
    }
    public function destroy(Calification $calification)
    {
        //
    }
}
