<?php

namespace App\Http\Controllers;

use App\Models\Trimester;
use Illuminate\Http\Request;

class TrimesterController extends Controller
{
    public function index()
    {
        $trimesters = Trimester::all();
        return view('trimesters.index', compact('trimesters'));
    }
    public function store(Request $request)
    {
        try{
            Trimester::create($request->all());
            return redirect()->route('trimesters.index')->with('success', 'Trimestre creado correctamente');
        }catch(\Exception $exception){
            return redirect()->route('trimesters.index')->with('error', 'Ocurrió un error');
        }
    }

    public function show(Trimester $trimester)
    {
        //
    }
    public function edit(Trimester $trimester)
    {
        //
    }
    public function update(Request $request, Trimester $trimester)
    {
        //
    }
    public function destroy(Trimester $trimester)
    {
        //
    }
}
