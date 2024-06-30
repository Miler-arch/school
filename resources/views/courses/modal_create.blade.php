<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
   <i class="fas fa-plus-circle"></i> Registrar Curso
</button>
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar Curso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('courses.store') }}" method="POST" id="form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <x-adminlte-select name="teacher_id" label="Profesor" igroup-size="md" label-class="required" class="form-select">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-sort-alpha-up"></i>
                                    </div>
                                </x-slot>
                                <option selected disabled>Seccione una opción</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                                @endforeach
                            </x-adminlte-select>
                            <div id="teacher_id-error">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <x-adminlte-select name="subject_id" label="Asignatura" igroup-size="md" label-class="required" class="form-select">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-sort-alpha-up"></i>
                                    </div>
                                </x-slot>
                                <option selected disabled>Seccione una opción</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </x-adminlte-select>
                            <div id="subject_id-error">
                            </div>
                        </div>
                        <div class="col-md-12">
                        <label class="required">Grado</label>
                        <div class="input-group mb-3">
                            <div class="row">
                                @foreach ($courses_settings as $course_setting)
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="course_setting_id[]" value="{{ $course_setting->id }}" id="course_setting_{{ $course_setting->id }}">
                                            <label class="form-check-label" for="course_setting_{{ $course_setting->id }}">
                                                {{ $course_setting->degree }} "{{ $course_setting->parallel }}" {{ $course_setting->level }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="course_setting_id-error" class="text-danger"></div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
