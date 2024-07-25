@extends('adminlte::page')
@section('title', 'Usuarios')

@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')

@include('users.modal_create')

<table id="data" class="table table-striped display responsive" style="width:100%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Fecha de Nacimiento</th>
            <th>Género</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->paternal_lastname }}</td>
                <td>{{ $user->maternal_lastname }}</td>
                <td>{{ $user->birthdate }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <form action="{{ route('users.update.status') }}" method="POST" class="status-form" id="statusForm{{ $user->id }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <input type="hidden" name="status" value="{{ $user->status }}">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="hidden" name="status_hidden" value="{{ $user->status }}">
                            <input type="checkbox" class="custom-control-input status-checkbox" id="customSwitch{{ $user->id }}" {{ $user->status == '1' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customSwitch{{ $user->id }}"></label>
                        </div>
                    </form>
                </td>
                <td>{{ $user->email }}</td>
                <td>
                    {{-- <a href="{{ route('users.show', $user) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a> --}}
                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop

@section('js')
<script>
    document.querySelectorAll('.status-checkbox').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            let status = this.checked ? '1' : '0';
            let form = this.closest('.status-form');
            let formData = new FormData(form);
            fetch(form.action, {
                method: 'POST',
                body: formData,
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
            })
            .then(data => {
                const SuccessStatus = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                SuccessStatus.fire({
                    icon: 'success',
                    text: 'El estado del usuario ha sido actualizado.'
                })

                setTimeout(function() {
                    location.reload();
                }, 600);
            })
            .catch(error => {
                console.error('There was an error!', error);
            });
        });
    });
</script>
<script>
    $("#form").on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "{{ route('users.store') }}",
            data: $("#form").serialize(),
            success: function(response) {
                $("#modal-create").modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: 'El usuario ha sido creado.',
                    showConfirmButton: false,
                });
                $("#form")[0].reset();

                setTimeout(function() {
                    location.reload();
                }, 500);
            },
            error: function(xhr, status, error) {

                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $("#" + key + "-error").html("<span class='text-danger'>" + value + "</span>");

                        $("#" + key).addClass('is-invalid');

                        $("#" + key).on('input', function() {
                            let isValid = true;
                            let value = $("#" + key).val();

                            if (key === 'email') {
                                let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                isValid = emailRegex.test(value);

                                if (!isValid) {
                                    $("#" + key).removeClass('is-valid').addClass('is-invalid');
                                    $("#" + key + "-error").html("<span class='text-danger'>Por favor, ingresa un correo electrónico válido</span>");
                                } else {
                                    $("#" + key).removeClass('is-invalid');
                                    $("#" + key + "-error").empty();
                                    $("#" + key).addClass('is-valid');
                                }
                            }

                            if (value.trim() === '') {
                                $("#" + key).removeClass('is-valid').addClass('is-invalid');
                                $("#" + key + "-error").html("<span class='text-danger'>Este campo es obligatorio</span>");
                                isValid = false;
                            } else {
                                $("#" + key).removeClass('is-invalid');
                                $("#" + key + "-error").empty();
                                $("#" + key).addClass('is-valid');
                            }
                        });
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'Ha ocurrido un error en el servidor.'
                    });
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('.delete').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, bórralo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    })
</script>
@stop
