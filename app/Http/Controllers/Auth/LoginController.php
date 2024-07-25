<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        $roles = Role::all();
        return view('auth.login', compact('roles'));
    }

    protected function authenticated(Request $request, $user)
    {
        flash()->option('timeout', 2500)->addSuccess('Bienvenido ' . $user->name, '¡Hola!');
        return redirect('/users');
    }

    protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
