{{-- Extiende el layout principal para tener el mismo estilo y barra de navegación --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- Usamos un componente "jumbotron" (de Bootstrap) para el mensaje principal --}}
                <div class="p-5 mb-4 bg-light rounded-3 text-center">
                    <div class="container-fluid py-5">
                        <h1 class="display-5 fw-bold">Bienvenido a Mi Aplicación</h1>
                        <p class="fs-4">
                            Para acceder a todo el contenido, por favor, inicia sesión usando tu cuenta.
                        </p>

                        {{-- Este es el botón principal que inicia el flujo de Cognito --}}
                        <a class="btn btn-primary btn-lg" href="{{ route('cognito.redirect') }}" role="button">
                            Iniciar sesión con Cognito
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
