<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Brains Science School</title>


    <link rel="shortcut icon" href="{{ asset('Images/logo.png') }}">

    {{-- Bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Boostrap bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    {{-- Bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>

<body class="gray-500">
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <div class="col-auto col-md-3 col-xl-2 px-sm px-0 sticky-top">
                    @if (Request::is('student/*'))
                    @include('inc.studentsidebar')
                    @else
                    @include('inc.sidebar')
                    @endif
                </div>
                <div class="col py-3">
                    <div class="container">
                        <main class="py-4">
                            @yield('content')
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
