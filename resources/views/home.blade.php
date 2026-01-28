@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <img src="{{ asset('images/new-php-logo.png') }}"
                             width="20%" alt="Home photo"/>


                        <h2><strong>Welcome: {{ __('Hi there !! You are logged in !!') }}</strong></h2>
                        <h4>AWS Cognito authentication with PHP and Laravel</h4>

                        <br/>
                        <h2><strong>Session Parameters:</strong></h2>
                            @if ($sessionData = session()->all())
                                <table class="table table-bordered table-striped">
                                    <thead class="dark">
                                    <tr>
                                        <td style="width: 30%;">Key</td>
                                        <td>Value</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sessionData as $key=>$value)
                                        @if($key !== 'cognito_user_object')
                                            <tr>
                                                <td style="word-break: break-word;">{{ $key }}</td>
                                                <td style="word-break: break-word;">{{ json_encode($value, JSON_UNESCAPED_UNICODE)}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>

                                @php
                                    $cognito = session('cognito_user_object');
                                @endphp

                                <br>
                                <h2><strong>"cognito_user_object" Parameters</strong></h2>

                                <table class="table table-bordered table-striped">
                                    <thead class="dark">
                                    <tr>
                                        <td style="width: 30%;">Key</td>
                                        <td>Value</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cognito as $key=>$value)
                                        <tr>
                                            <td style="word-break: break-word;">{{ $key }}</td>
                                            <td style="word-break: break-word;">{{ json_encode($value, JSON_UNESCAPED_UNICODE)}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

