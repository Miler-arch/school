@extends('adminlte::page')
@section('title', 'Estudiantes')

@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Estudiantes</h1>
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
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->user->name }}</td>
                <td>{{ $student->user->paternal_lastname }} {{ $student->user->maternal_lastname }}</td>
                <td>{{ $student->user->birthdate }}</td>
                <td>{{ $student->user->gender }}</td>
                <td>{{ $student->user->address }}</td>
                <td>{{ $student->user->phone }}</td>
                <td>{{ $student->user->email }}</td>
                <td>
                    <div class="d-flex">
                        <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#showModal{{$student->id}}">
                            <i class="fas fa-eye"></i>
                        </button>
                        @include('students.modal_show')
                        <button type="button" class="btn btn-info mr-1" data-toggle="modal" data-target="#editModal{{$student->id}}">
                                <i class="fas fa-plus-circle text-white"></i>
                        </button>
                        @include('students.modal_edit')
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop

@section('js')

@stop
