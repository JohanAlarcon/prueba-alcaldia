@extends('layouts.app')


@section('content')

    <div class="container">

        <div class="alert alert-dark" role="alert" align="center">

            <h3 class="modal-title mx-auto"><i class="fas fa-user-circle"></i>&emsp;Mi perfil</h3>

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

        <form action="{{ route('user' . (isset($user) ? '.update' : '.store'), isset($user) ? $user->id : '') }}" method="POST" enctype="multipart/form-data" id="form-user" autocomplete="off">

            @if (isset($user))
                @method('PATCH')
            @endif

            @csrf

            <div class="row">

                <div class="form-group col-md-6">

                    <label>Nombre (*)</label>

                    <input type="text" name="name" class="form-control"
                        value="@if (isset($user)){{ $user->name }}@endif" placeholder="Nombre"
                        required>

                </div>

                <div class="form-group col-md-6">

                    <label>Correo (*)</label>

                    <input type="email" name="email" class="form-control"
                        value="@if (isset($user)){{ $user->email }}@endif" placeholder="Correo"
                        required>

                </div>

            </div>

            <div class="row">

                <div class="form-group col-md-6">

                    <label>Actualizar contraseña</label>
                    <input type="text" style="display:none">
                    <input type="password" style="display:none">
                    <input type="text" name="password" class="form-control" placeholder="Contraseña" onkeydown="this.type='password'" autocomplete="new-password" pattern=".{6,}" title="Minimo 6 caracteres">
                    <p><small class="text-muted">Minimo 6 caracteres</small></p>
                </div>

                <div class="form-group col-md-6">

                    <label>Foto</label>
                    <input type="file" name="imagen" class="form-control" accept=".jpg, .jpeg, .png">
    
                    @if (isset($user))
    
                        @if ($user->imagen != '')
    
                            <img src={{ asset('img/usuarios/' . $user->imagen) }} alt="{{ $user->imagen }}" height="50px"
                                width="50px">
    
                        @endif
    
                    @endif
    
                </div>

            </div>

            <br>

            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="btn-group">
                        <button type="submit" id="actualizar" class="btn btn-primary"><i
                            class="far fa-edit"></i>&emsp;Actualizar datos</button>

                    </div>
                </div>
            </div>

        </form>

    </div>

@endsection
