<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
   <i class="fas fa-plus-circle"></i> Registrar Trimestre
</button>
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar Trimestre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('trimesters.store') }}" method="POST" id="form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <x-adminlte-input name="name" label="Trimestre" label-class="required" class="form-control" value="{{ old('name') }}">
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
                            <x-adminlte-input name="year" label="Año" type="number" label-class="required" class="form-control" value="{{ old('year') }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            <div id="year-error">
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
