@extends('adminlte::page')
@section('title', 'Notas')

@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)
@section('plugins.Select2', true)

@section('content_header')
    <h1 class="text-center text-uppercase p-3">Seleccione un trimestre para agregar nota</h1>
    <ul class="nav nav-tabs" id="trimesterTabs" role="tablist">
        @foreach ($trimesters as $index => $trimester)
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="trimester-tab-{{ $trimester->id }}" data-toggle="tab" href="#trimester-{{ $trimester->id }}" role="tab" aria-controls="trimester-{{ $trimester->id }}" aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                    Trimestre {{ $trimester->name }}
                </a>
            </li>
        @endforeach
    </ul>
@stop

@section('content')
    <div class="tab-content" id="trimesterTabsContent">
        @foreach ($trimesters as $index => $trimester)
            <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="trimester-{{ $trimester->id }}" role="tabpanel" aria-labelledby="trimester-tab-{{ $trimester->id }}">
                <form id="notes-form-{{ $trimester->id }}" class="notes-form">
                    @csrf
                    <input type="hidden" name="trimester" value="{{ $trimester->id }}">
                    <table id="trimester-datatable-{{ $trimester->id }}" class="table table-striped display responsive" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Alumno</th>
                                <th>Nota 1</th>
                                <th>Nota 2</th>
                                <th>Nota 3</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->user->name }}</td>
                                    <td>
                                        <input type="number" name="notes[{{ $student->id }}][note1]" class="form-control">
                                        <input type="hidden" name="notes[{{ $student->id }}][student_id]" value="{{ $student->id }}">
                                    </td>
                                    <td>
                                        <input type="number" name="notes[{{ $student->id }}][note2]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="notes[{{ $student->id }}][note3]" class="form-control">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary save-notes-button">Guardar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        @endforeach
    </div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        let tables = {};

        $('.save-notes-button').click(function() {
            let form = $(this).closest('form');
            let trimesterId = form.find('input[name="trimester"]').val();

            $.ajax({
                url: "{{ route('califications.saveNotes') }}",
                method: 'POST',
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        Swal.fire('Éxito', 'Notas guardadas correctamente', 'success');
                    } else {
                        Swal.fire('Error', 'Ocurrió un error al guardar las notas', 'error');
                    }
                }
            });
        });

        $('#trimesterTabs a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            let trimesterId = $(e.target).attr('href').replace('#trimester-', '');
            if (!tables[trimesterId]) {
                tables[trimesterId] = $(`#trimester-datatable-${trimesterId}`).DataTable();
            }
        });

        // Cargar la tabla del primer trimestre por defecto
        let firstTrimesterId = '{{ $trimesters[0]->id }}';
        tables[firstTrimesterId] = $(`#trimester-datatable-${firstTrimesterId}`).DataTable();
    });
</script>
@stop
