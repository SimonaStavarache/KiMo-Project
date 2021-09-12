<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <title>
            KiMo
        </title>

    </meta>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    </link>

    <style>
        body {
            background-image: url('http://i.imgur.com/lvwDiYv.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            background-position:center;
            background-attachment: fixed;
            height: 100%;
            margin: 0;
            padding: 0;

        }
        html {
            height: 100%;
        }
    </style>
</head>
<body>


<div class="">

    @include('layouts.navmap')
    @yield('content')

</div>
{{-- @yield('content')--}}
  <script crossorigin="anonymous" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>

  {{-- Google map api --}}
    <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRNhZC1QXdUNlgd5WSlrLWV5XIEK39zvw&libraries=places"></script>

<script src="{{asset ('/js/script.js') }}"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>
</html>
