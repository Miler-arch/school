<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.show')->only('show');
        $this->middleware('can:users.edit')->only('edit');
        $this->middleware('can:users.destroy')->only('destroy');
    }
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('users.index', compact('users', 'roles'));
    }
    public function store(StoreRequest $request)
    {
        try {
            $data = $request->except('_token');
            $user = User::create($data);

            if ($request->role == 'Administrador') {
                $user->assignRole('Administrador');
            } elseif ($request->role == 'Estudiante') {
                $user->assignRole('Estudiante');
                $student = new Student();
                $student->user_id = $user->id;
                $student->save();
            } elseif ($request->role == 'Profesor') {
                $user->assignRole('Profesor');
                $profesor = new Teacher();
                $profesor->user_id = $user->id;
                $profesor->save();
            }
            return response()->json($user, 201);
        } catch(\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Error al crear el usuario'], 500);
        }
    }

    public function updateStatus(Request $request){
        $user = User::find($request->id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $newStatus = $request->status === '1' ? '0' : '1';
        $user->status = $newStatus;
        $user->save();
        return response()->json(['status' => $newStatus]);
    }
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }

        if ($user->id == 1) {
            return redirect()->back()->with('error', 'No se puede eliminar el usuario administrador');
        }

        if ($user->students()->exists()) {
            return redirect()->back()->with('error', 'No se puede eliminar el usuario porque tiene un estudiante asociado');
        }

        if ($user->teachers()->exists()) {
            return redirect()->back()->with('error', 'No se puede eliminar el usuario porque tiene un profesor asociado');
        }

        $user->delete();
        flash()->addSuccess('Usuario eliminado con éxito');
        return redirect()->route('users.index');
    }
}
