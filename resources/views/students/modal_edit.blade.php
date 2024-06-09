<div class="modal fade" id="editModal{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Estudiante: {{$student->user->name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('students.update', $student) }}" method="POST" id="form">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <x-adminlte-input name="rude" type="number" label="Rude" value="{{$student->rude}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-id-card"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <div id="rude-error">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <x-adminlte-input name="place_of_birth" label="Lugar de Nacimiento" value="{{$student->place_of_birth}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <div id="place_of_birth-error">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <x-adminlte-input name="nationality" label="Nacionalidad" value="{{$student->nationality}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-flag"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <div id="nacionality-error">
                        </div>
                    </div>

                    <div>
                        <x-adminlte-select name="course_id" label="Curso" id="course_id" value="{{$student->course_id}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                            </x-slot>
                            <option disabled selected>Asignar curso</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id', $student->course_id) == $course->id ? 'selected' : '' }}>{{ $course->courseSetting->degree }} {{ $course->courseSetting->parallel }} {{ $course->courseSetting->level }}</option>
                            @endforeach
                        </x-adminlte-select>
                        <div id="course_id-error">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
