<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HRMS</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('font-end/css/font-end-style.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="front-end-header">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{ url('/') }}">Organization Preview</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link active" href="{{ route('career') }}">Career</a>
                            <a class="nav-item nav-link" href="#">FAQ</a>
                            <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @yield('body')
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="front-end-footer">
                <p class="text-center">All Right reserved @Vk-Group</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
