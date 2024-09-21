<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Nexus POS</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('back-end/assets/icons/favicon.svg')}}" type="image/x-icon" />

    <!-- Bootstrap Css -->
    <link href="{{asset('back-end/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Fontawesome link -->
    <link href="{{asset('back-end/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- CSS Link-->
    <link href="{{asset('back-end/assets/css/sign-in.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back-end/assets/css/toastify.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('back-end/assets/js/toastify-js.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/config.js') }}"></script>
</head>

<body>

    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>

    <div>
        @yield('content')
    </div>
    <script></script>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</body>

</html>
