@extends('adminlte::page')
@section('title', 'Profesores')

@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Profesores</h1>
@stop

@section('content')
<table id="data" class="table table-striped display responsive" style="width:100%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Fecha de Nacimiento</th>
            <th>Genero</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo Electronico</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>{{ $teacher->user->name }}</td>
                <td>{{ $teacher->user->paternal_lastname }} {{ $teacher->user->maternal_lastname }}</td>
                <td>{{ $teacher->user->birthdate }}</td>
                <td>{{ $teacher->user->gender }}</td>
                <td>{{ $teacher->user->address }}</td>
                <td>{{ $teacher->user->phone }}</td>
                <td>{{ $teacher->user->email }}</td>
                <td>
                    <div class="d-flex">
                        <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#showModal{{$teacher->id}}">
                            <i class="fas fa-eye"></i>
                        </button>
                        @include('teachers.modal_show')
                        <button type="button" class="btn btn-info mr-1" data-toggle="modal" data-target="#editModal{{$teacher->id}}">
                                <i class="fas fa-plus-circle text-white"></i>
                        </button>
                        @include('teachers.modal_edit')
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop

@section('js')

@stop
