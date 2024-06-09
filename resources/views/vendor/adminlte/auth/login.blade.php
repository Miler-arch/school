@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_body')
<div>
    <div class="justify-content-center mt-5">

            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Inicio de Sesión') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">{{ __('Seleccionar Rol') }}</label>
                            <div class="form-check">
                                @foreach($roles as $role)
                                    <input class="form-check-input" type="radio" name="role" id="{{ $role->name }}" value="{{ $role->name }}" required>
                                    <label class="form-check-label" for="{{ $role->name }}">
                                        {{ $role->name }}
                                    </label><br>
                                @endforeach
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">{{ __('Iniciar Sesión') }}</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>

</div>
@stop

