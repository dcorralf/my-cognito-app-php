@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('redirect') }}" class="btn btn-dark w-100">
                                    <i class="fab fa-aws me-2"></i> Iniciar sesión con AWS Cognito
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
