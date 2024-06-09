<div class="modal fade" id="editModal{{$teacher->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Profesor/a: {{$teacher->user->name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('teachers.update', $teacher) }}" method="POST" id="form">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <x-adminlte-input name="rda" type="number" label="Rda" value="{{$teacher->rda}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-id-card"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <div id="rda-error">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <x-adminlte-input name="academic_degree" label="Grado Académico" value="{{$teacher->academic_degree}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <div id="academic_degree-error">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <x-adminlte-input name="specialty" label="Especialidad" value="{{$teacher->specialty}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <div id="specialty-error">
                        </div>
                    </div>

{{--
                    <div>
                        <x-adminlte-select name="course_id" label="Curso" id="course_id" value="{{$teacher->course_id}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                            </x-slot>
                            <option disabled selected>Asignar curso</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id', $teacher->course_id) == $course->id ? 'selected' : '' }}>{{ $course->degree }} {{ $course->parallel }} {{ $course->level }}</option>
                            @endforeach
                        </x-adminlte-select>
                        <div id="course_id-error">
                        </div>
                    </div>

                    <div>
                        <x-adminlte-select name="subject_id" label="Asignatura" id="subject_id" value="{{$teacher->subject_id}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-book"></i>
                                </div>
                            </x-slot>
                            <option disabled selected>Asignar asignatura</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ old('subject_id', $teacher->subject_id) == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                            @endforeach
                        </x-adminlte-select>
                        <div id="subject_id-error">
                        </div>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
