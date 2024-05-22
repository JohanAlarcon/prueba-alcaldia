<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Alcaldia | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
    <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('js/general.js') }}"></script>

    <style>
        .card-header {
            background-color: #007bff;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>

</head>

<body>

    <img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="Responsive image"
        style="margin-left: 45%; margin-top: 2%;">

    <div class="container" style="margin-top: 2%;">

        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <br>

                            <div class="d-flex justify-content-center">
                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-success"
                                            href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
