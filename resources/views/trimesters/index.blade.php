@extends('adminlte::page')
@section('title', 'Trimestres')

@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)
@section('plugins.Select2', true)

@section('content_header')
    <h1>Trimestres</h1>
@stop

@section('content')

@include('trimesters.modal_create')

<table id="data" class="table table-striped display responsive" style="width:100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Trimestre</th>
            <th>Año</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trimesters as $trimester)
            <tr>
                <td>{{ $trimester->id }}</td>
                <td>{{ $trimester->name }}</td>
                <td>{{ $trimester->year }}</td>
                <td>
                    {{-- <a href="{{ route('courses.show', $course) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a> --}}
                    <form action="{{ route('courses_settings.destroy', $trimester) }}" method="POST" class="delete">
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

        $("#form button[type=submit]").prop('disabled', true);

        $.ajax({
            type: "POST",
            url: "{{ route('trimesters.store') }}",
            data: $("#form").serialize(),
            success: function(response) {
                $("#modal-create").modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: 'La configuración del curso ha sido registrado correctamente.',
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
