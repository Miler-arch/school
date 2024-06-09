@extends('adminlte::page')
@section('title', 'Calificaciones')

@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)
@section('plugins.Select2', true)

@section('content_header')
    <h1>Calificaciones</h1>
@stop

@section('content')

@include('califications.modal_create')

<table id="data" class="table table-striped display responsive" style="width:100%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Profesor</th>
            <th>Asignatura</th>
            <th>Curso</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->teacher->user->name }}</td>
                <td>{{ $course->subject->name }}</td>
                <td>{{ $course->courseSetting->degree }} "{{ $course->courseSetting->parallel }}" {{ $course->courseSetting->level }}</td>
                <td>
                    <div class="d-flex">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Año
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                @foreach ($trimesters as $trimester)
                                    <a class="dropdown-item text-decoration-none hover-effect" href="{{ route('califications.notes', $trimester->year) }}">{{ $trimester->year }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<style>
    .hover-effect:hover {
        background: rgb(6, 74, 177);
        color: white;
    }
</style>
@stop

@section('js')
<script>
    $("#form").on('submit', function(e) {
        e.preventDefault();

        $("#form button[type=submit]").prop('disabled', true);

        $.ajax({
            type: "POST",
            url: "{{ route('califications.store') }}",
            data: $("#form").serialize(),
            success: function(response) {
                $("#modal-create").modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: 'El curso ha sido registrado correctamente.',
                    showConfirmButton: false,
                });
                $("#form")[0].reset();

                setTimeout(function() {
                    location.reload();
                }, 500);
            },
            error: function(xhr, status, error) {
                $("#form button[type=submit]").prop('disabled', false);

                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $("#" + key + "-error").html("<span class='text-danger'>" + value + "</span>");

                        $("#" + key).addClass('is-invalid');

                        $("#" + key).on('input', function() {
                            let isValid = true;
                            let value = $("#" + key).val();

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
@stop
