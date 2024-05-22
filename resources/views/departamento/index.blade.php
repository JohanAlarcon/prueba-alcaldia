@extends('layouts.app')


@section('content')

    <div class="container">

        <div class="alert alert-dark" role="alert" align="center">

            <h3 class="modal-title mx-auto"><i class="fas fa-sitemap"></i>&emsp;Departamentos</h3>

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

        <form
            action="{{ route('departamento' . (isset($departamento) ? '.update' : '.store'), isset($departamento) ? $departamento->id : '') }}"
            method="POST" enctype="multipart/form-data" id="form-departamento" autocomplete="off">

            @if (isset($departamento))
                @method('PATCH')
            @endif

            @csrf

            <div class="row">

                <div class="form-group col-md-6">

                    <label>Nombre (*)</label>

                    <input type="text" name="nombre" class="form-control"
                        value="@if (isset($departamento)) {{ $departamento->nombre }} @endif"
                        placeholder="Nombre del departamento" required>

                </div>

                <div class="form-group col-md-6">

                    <label>Estado</label>

                    <select name="estado" class="form-control" required>

                        <option value="A" @if (isset($departamento) && $departamento->estado == 'A') selected @endif>Activo
                        </option>
                        <option value="I" @if (isset($departamento) && $departamento->estado == 'I') selected @endif>Inactivo
                        </option>

                    </select>

                </div>


            </div>

            <br>

            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="btn-group">

                        @if (isset($departamento))
                            <button type="submit" id="actualizar" class="btn btn-primary"><i
                                    class="far fa-edit"></i>&emsp;Actualizar</button>

                            <button type="button" id="eliminar" class="btn btn-danger"
                                data-target="#delete-{{ $departamento->id }}" data-toggle="modal" data-toggle="tooltip"><i
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

        @if (isset($departamento))
            @php
                $controlador = 'DepartamentoController';
                $id = $departamento->id;
                $route = 'departamento.destroy';

            @endphp

            @include('modal-delete')
        @endif

    </div>

    <br>

    <div class="container">

        <div class="alert alert-dark" role="alert" align="center">

            <h5 class="modal-title mx-auto"><i class="fas fa-list"></i>&emsp;Lista de departamentos registrados </h5>

        </div>

        <table class="table table-border data-table display responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Ver/Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departamentos as $departamento)
                    <tr>
                        <td>{{ $departamento->nombre }}</td>
                        <td>
                            @if ($departamento->estado == 'A')
                                <span class="badge badge-success">Activo</span>
                            @else
                                <span class="badge badge-danger">Inactivo</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('departamento' . '.edit', $departamento->id) }}">

                                <button type="button" data-toggle="tooltip" title="Editar"
                                    class="btn btn-primary btn-sm"><i class="far fa-edit"></i></button>

                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script src="{{ asset('js/departamento.js') }}"></script>

@endsection
