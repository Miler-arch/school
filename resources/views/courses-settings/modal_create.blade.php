<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
   <i class="fas fa-plus-circle"></i> Registrar Configuración Curso
</button>
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar Configuración Curso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('courses_settings.store') }}" method="POST" id="form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <x-adminlte-select name="degree" label="Grado" igroup-size="md" label-class="required" class="form-select">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-sort-alpha-up"></i>
                                    </div>
                                </x-slot>
                                <option selected disabled>Seccione una opción</option>
                                <option value="Prekinder">Prekinder</option>
                                <option value="Kinder">Kinder</option>
                                <option value="1°">1°</option>
                                <option value="2°">2°</option>
                                <option value="3°">3°</option>
                                <option value="4°">4°</option>
                                <option value="5°">5°</option>
                                <option value="6°">6°</option>
                            </x-adminlte-select>
                            <div id="degree-error">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <x-adminlte-select name="parallel" label="Paralelo" igroup-size="md" label-class="required" class="form-select">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-sort-alpha-up"></i>
                                    </div>
                                </x-slot>
                                <option selected disabled>Seccione una opción</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                                <option value="H">H</option>
                                <option value="I">I</option>
                                <option value="J">J</option>
                                <option value="K">K</option>
                                <option value="L">L</option>
                                <option value="M">M</option>
                                <option value="N">N</option>
                                <option value="O">O</option>
                                <option value="P">P</option>
                                <option value="Q">Q</option>
                                <option value="R">R</option>
                                <option value="S">S</option>
                                <option value="T">T</option>
                                <option value="U">U</option>
                                <option value="V">V</option>
                                <option value="W">W</option>
                                <option value="X">X</option>
                                <option value="Y">Y</option>
                                <option value="Z">Z</option>
                            </x-adminlte-select>
                            <div id="parallel-error">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <x-adminlte-select name="level" label="Nivel" igroup-size="md" label-class="required" class="form-select">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-sort-numeric-up"></i>
                                    </div>
                                </x-slot>
                                <option selected disabled>Seccione una opción</option>
                                <option value="Inicial">Inicial</option>
                                <option value="Primaria">Primaria</option>
                                <option value="Secundaria">Secundaria</option>
                                <option value="Técnico">Técnico</option>
                            </x-adminlte-select>
                            <div id="level-error">
                            </div>
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
