<div class="modal fade" id="showModal{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Estudiante: {{$student->user->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th>Nombre</th>
                        <td>{{$student->user->name}}</td>
                    </tr>
                    <tr>
                        <th>Apellido</th>
                        <td>{{$student->user->paternal_lastname}} {{ $student->user->maternal_lastname }}</td>
                    </tr>
                    <tr>
                        <th>Fecha de Nacimiento</th>
                        <td>{{ $student->user->birthdate }}</td>
                    </tr>
                    <tr>
                        <th>Genero</th>
                        <td>{{ $student->user->gender }}</td>
                    </tr>
                    <tr>
                        <th>Direccion</th>
                        <td>{{ $student->user->address }}</td>
                    </tr>
                    <tr>
                        <th>Telefono</th>
                        <td>{{ $student->user->phone }}</td>
                    </tr>
                    <tr>
                        <th>Correo Electronico</th>
                        <td>{{ $student->user->email }}</td>
                    </tr>
                    <tr>
                        <th>Rude</th>
                        <td>{{ $student->rude }}</td>
                    </tr>
                    <tr>
                        <th>Lugar de Nacimiento</th>
                        <td>{{ $student->place_of_birth }}</td>
                    </tr>
                    <tr>
                        <th>Nacionalidad</th>
                        <td>{{ $student->nationality }}</td>
                    </tr>
                    <tr>
                        <th>Curso</th>
                        <td>
                            @if ($student->course_id == null)
                                <span class="badge badge-warning text-black fs-6">Aún no fue asignado</span>
                            @else
                                {{ $student->course->degree }} {{ $student->course->parallel }} {{ $student->course->level }}
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
