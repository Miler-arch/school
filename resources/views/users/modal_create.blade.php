<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modelId">
    <i class="fas fa-plus-circle"></i> Crear Usuario
</button>
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.store') }}" method="POST" id="form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <x-adminlte-input name="name" label="Nombre">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div id="name-error">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <x-adminlte-input name="paternal_lastname" label="Apellido Paterno">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div id="paternal_lastname-error">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <x-adminlte-input name="maternal_lastname" label="Apellido Materno">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div id="maternal_lastname-error">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <x-adminlte-input name="birthdate" label="Fecha de Nacimiento" type="date">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div id="birthdate-error">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Género</label>
                            <div class="d-flex justify-content-center">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Masculino">
                                    <label class="form-check-label">Masculino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Femenino">
                                    <label class="form-check-label">Femenino</label>
                                </div>
                            </div>
                            <div id="gender-error">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <x-adminlte-input name="address" label="Dirección">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-map"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div id="address-error">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <x-adminlte-input name="phone" label="Teléfono" type="number">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div id="phone-error">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Rol</label>
                            <div class="d-flex justify-content-center">
                                <div class="form-group">
                                    @foreach ($roles as $role)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role" id="role{{ $role->name }}" value="{{ $role->name }}">
                                            <label class="form-check-label" for="role{{ $role->name }}">{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="role-error">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <x-adminlte-input name="email" label="Email">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div id="email-error">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <x-adminlte-input name="password" label="Contraseña" type="password">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div id="password-error">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <x-adminlte-input name="password_confirmation" label="Confirmar Contraseña" type="password">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div id="password_confirmation-error">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
