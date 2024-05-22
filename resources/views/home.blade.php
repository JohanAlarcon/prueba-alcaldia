@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido a la Aplicación de Gestión de Empleados') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <p>¡Hola! <b>{{ Auth::user()->name }}</b></p>
                        <p>Nos complace darte la bienvenida a nuestro sistema de gestión de empleados. Este sistema está diseñado para facilitar la administración de empleados y departamentos en tu organización.</p>
                        <p>Con nuestra aplicación, puedes:</p>
                        <ul>
                            <li>Registrar nuevos empleados y departamentos.</li>
                            <li>Actualizar la información de los empleados existentes.</li>
                            <li>Consultar la lista de empleados y sus departamentos asociados.</li>
                            <li>Eliminar registros de empleados y departamentos cuando sea necesario.</li>
                        </ul>
                        <p>Esperamos que esta herramienta te sea de gran ayuda en la gestión eficiente de tu personal. Si tienes alguna duda o necesitas asistencia, no dudes en contactarnos.</p>
                        <p>¡Gracias por elegir nuestra aplicación!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
