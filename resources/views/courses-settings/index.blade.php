@extends('adminlte::page')
@section('title', 'Configuración Cursos')

@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)
@section('plugins.Select2', true)

@section('content_header')
    <h1>Configuración Cursos</h1>
@stop

@section('content')

@include('courses-settings.modal_create')

<table id="data" class="table table-striped display responsive" style="width:100%;">
    <thead>
        <tr>
            <th>Grado</th>
            <th>Paralelo</th>
            <th>Nivel</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses_settings as $course)
            <tr>
                <td>{{ $course->degree }}</td>
                <td>{{ $course->parallel }}</td>
                <td>{{ $course->level }}</td>
                <td>
                    {{-- <a href="{{ route('courses.show', $course) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a> --}}
                    <form action="{{ route('courses_settings.destroy', $course) }}" method="POST" class="delete">
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
    $("#form").on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "{{ route('courses_settings.store') }}",
            data: $("#form").serialize(),
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: response.message,
                        showConfirmButton: false,
                    });

                    $("#form")[0].reset();

                    setTimeout(function() {
                        location.reload();
                    }, 500);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: response.message,
                        showConfirmButton: true,
                    });
                }
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
