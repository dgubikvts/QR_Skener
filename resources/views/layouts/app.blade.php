<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" >

    <title>Vezba</title>
</head>
<body>
    @include('nav/navbar')
    <div class="container-fluid">
        @yield('content')
    </div>


    <script> var quicksearch = "{{route('quicksearch', ':id')}}"; </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.1.6/html5-qrcode.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>