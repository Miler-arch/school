<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
   <i class="fas fa-plus-circle"></i> Registrar Asignatura
</button>
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar Asignatura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('courses.store') }}" method="POST" id="form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <x-adminlte-input name="name" label="Nombre" label-class="required" class="form-control" value="{{ old('name') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div id="name-error">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <x-adminlte-input name="code" label="Codigo" label-class="required" class="form-control" value="{{ old('code') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-barcode"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div id="code-error">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <x-adminlte-input name="knowledge" label="Campo de saberes" label-class="required" class="form-control" value="{{ old('knowledge') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div id="knowledge-error">
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
