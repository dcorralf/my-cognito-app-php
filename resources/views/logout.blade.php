{{-- Extiende el layout principal para tener el mismo estilo y barra de navegación --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- Usamos un componente "jumbotron" (de Bootstrap) para el mensaje principal --}}
                <div class="p-5 mb-4 bg-light rounded-3 text-center">
                    <div class="container-fluid py-5">
                        <h1 class="display-5 fw-bold">Bienvenido a la página de logout !!</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
