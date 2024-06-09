<div class="modal fade" id="showModal{{$teacher->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Estudiante: {{$teacher->user->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th>Nombre</th>
                        <td>{{$teacher->user->name}}</td>
                    </tr>
                    <tr>
                        <th>Apellido</th>
                        <td>{{$teacher->user->paternal_lastname}} {{ $teacher->user->maternal_lastname }}</td>
                    </tr>
                    <tr>
                        <th>Fecha de Nacimiento</th>
                        <td>{{ $teacher->user->birthdate }}</td>
                    </tr>
                    <tr>
                        <th>Genero</th>
                        <td>{{ $teacher->user->gender }}</td>
                    </tr>
                    <tr>
                        <th>Direccion</th>
                        <td>{{ $teacher->user->address }}</td>
                    </tr>
                    <tr>
                        <th>Telefono</th>
                        <td>{{ $teacher->user->phone }}</td>
                    </tr>
                    <tr>
                        <th>Correo Electronico</th>
                        <td>{{ $teacher->user->email }}</td>
                    </tr>
                    <tr>
                        <th>Rda</th>
                        <td>{{ $teacher->rda }}</td>
                    </tr>
                    <tr>
                        <th>Grado Académico</th>
                        <td>{{ $teacher->academic_degree }}</td>
                    </tr>
                    <tr>
                        <th>Especialidad</th>
                        <td>{{ $teacher->specialty }}</td>
                    </tr>
                    <tr>
                        <th>Asignatura</th>
                        <td>{{ $teacher->subject }}</td>
                    </tr>
                    {{-- <tr>
                        <th>Grado</th>
                        <td>{{ $teacher->course->name }} | {{ $teacher->course->parallel }} {{ $teacher->course->level }}</td>
                    </tr> --}}
                </table>
            </div>
        </div>
    </div>
</div>
