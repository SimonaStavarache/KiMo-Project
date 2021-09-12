<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<style>


    .background {
        <!--background-image: url('public/img/bck.jpg');-->
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 740px;
    }



</style>

</head>


<body >
<div class="background">
    @include('layouts.nav')
    @yield('content')
    @include('layouts.footer')
</div>

</body>
</html>
