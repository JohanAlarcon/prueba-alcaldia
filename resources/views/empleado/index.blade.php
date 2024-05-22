@extends('layouts.app')


@section('content')

    <div class="container">

        <div class="alert alert-dark" role="alert" align="center">

            <h3 class="modal-title mx-auto"><i class="fas fa-users fa-th"></i>&emsp;Empleados</h3>

        </div>

        <div class="row">

            @if (session('message'))
                <div class="col-sm-12">

                    <div class="alert alert-success" align="center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i
                            class="fas fa-check-circle"></i>&emsp;{{ session('message') }}
                    </div>

                </div>
            @endif

            @if ($errors->any())
                <div class="col-sm-12">

                    <div class="alert alert-danger" align="center">

                        <ul>

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                </div>
            @endif


        </div>

        <form action="{{ route('empleado' . (isset($empleado) ? '.update' : '.store'), isset($empleado) ? $empleado->id : '') }}" method="POST" enctype="multipart/form-data" id="form-empleado" autocomplete="off">

            @if (isset($empleado))
                @method('PATCH')
            @endif

            @csrf

            <div class="row">

                <div class="form-group col-md-4">

                    <label>Nombre (*)</label>

                    <input type="text" name="nombre" class="form-control"
                        value="@if (isset($empleado)){{ $empleado->nombre }}@endif" placeholder="Nombre"
                        required>

                </div>

                <div class="form-group col-md-4">

                    <label>Apellido (*)</label>

                    <input type="text" name="apellido" class="form-control"
                        value="@if (isset($empleado)){{ $empleado->apellido }}@endif" placeholder="Apellido"
                        required>

                </div>

                <div class="form-group col-md-4">

                    <label>Email (*)</label>
                    <input type="email" name="email" class="form-control"
                        value="@if (isset($empleado)){{ $empleado->email }}@endif" placeholder="Email"
                        required>

                </div>


            </div>

            <div class="row">

                <div class="form-group col-md-4">

                    <label>Telefono (*)</label>

                    <input type="text" name="telefono" class="form-control"
                        value="@if (isset($empleado)){{ $empleado->telefono }}@endif" placeholder="Telefono"
                        required pattern="^[0-9]+$" title="Por favor, ingrese solo números.">

                </div>

                <div class="form-group col-md-4">

                    <label>Departamentos (*)</label>

                    <select class="form-control" name="departamento_id" id="departamento_id" required>

                        <option value="" selected disabled>Elige un departamento para este empleado</option>
                        @foreach ($departamentos as $departamento)
                            @if (isset($empleado))
                                @if ($empleado->departamento_id == $departamento->id)
                                    <option value="{{ $departamento->id }}" selected>{{ $departamento->nombre }}</option>
                                @else
                                    <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                                @endif
                            @else
                                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                            @endif
                        @endforeach

                    </select>


                </div>

            </div>

            <br>

            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="btn-group">

                        @if (isset($empleado))
                            <button type="submit" id="actualizar" class="btn btn-primary"><i
                                    class="far fa-edit"></i>&emsp;Actualizar</button>

                            <button type="button" id="eliminar" class="btn btn-danger"
                                data-target="#delete-{{ $empleado->id }}" data-toggle="modal" data-toggle="tooltip"><i
                                    class="far fa-trash-alt"></i>&emsp;Eliminar</button>
                           
                        @else
                            <button type="submit" id="guardar" class="btn btn-success"><i
                                    class="fas fa-save"></i>&emsp;Guardar</button>
                        @endif

                        <button type="button" class="btn btn-secondary reset"><i
                                class="fas fa-sync"></i>&emsp;Limpiar</button>

                    </div>
                </div>
            </div>

            <br>

        </form>

        @if (isset($empleado))
            @php
                $controlador = 'EmpleadoController';
                $id = $empleado->id;
                $route = 'empleado.destroy';

            @endphp

            @include('modal-delete')
        @endif

    </div>

    <br>

    <div class="container">

        <div class="alert alert-dark" role="alert" align="center">

            <h5 class="modal-title mx-auto"><i class="fas fa-list"></i>&emsp;Lista de empleados registrados </h5>

        </div>

        <table class="table table-border data-table display responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Departamento</th>
                    <th>Ver/Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->apellido }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->departamento->nombre }}</td>
                        <td>
                            <a href="{{ route('empleado' . '.edit', $empleado->id) }}">

                                <button type="button" data-toggle="tooltip" title="Editar" class="btn btn-primary btn-sm"><i
                                        class="far fa-edit"></i></button>
                            
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script src="{{ asset('js/empleado.js') }}"></script>

@endsection
