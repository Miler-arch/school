<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subject\StoreRequest;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }
    public function store(StoreRequest $request)
    {
        try {
            $data = $request->except('_token');
            Subject::create($data);
            return response()->json(['message' => 'Materia creada correctamente'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear la materia'], 500);
        }
    }
    public function update(Request $request, Subject $subject)
    {
        //
    }
    public function destroy(Subject $subject)
    {
        //
    }
}
