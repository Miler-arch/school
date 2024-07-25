@extends('adminlte::page')
@section('title', 'Asignaturas')

@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)
@section('plugins.Select2', true)

@section('content_header')
    <h1>Asignaturas</h1>
@stop

@section('content')

@include('subjects.modal_create')

<table id="data" class="table table-striped display responsive" style="width:100%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Código</th>
            <th>Campo de saberes</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subjects as $subject)
            <tr>
                <td>{{ $subject->id }}</td>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->code }}</td>
                <td>{{ $subject->knowledge }}</td>
                <td>
                    {{-- <a href="{{ route('subjects.show', $subject) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a> --}}
                    <form action="{{ route('subjects.destroy', $subject) }}" method="POST">
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
            url: "{{ route('subjects.store') }}",
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
