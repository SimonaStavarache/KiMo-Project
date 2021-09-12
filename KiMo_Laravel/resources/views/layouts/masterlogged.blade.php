

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head >
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>KiMo</title>

    <!-- Bootstrap -->
    <script src="{{ asset('/js/addgroup.js') }}"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="css/addgroup.css" rel="stylesheet"/>
    <link href="css/signup.css" rel="stylesheet"/>
    <link href="css/footer.css" rel="stylesheet"/>
    <link href="css/buttons.css" rel="stylesheet"/>
    <link href="css/addkid_modal.css" rel="stylesheet"/>
    <link href="css/profile.css" rel="stylesheet"/>
    <script src="js/addgroup.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <!-- Flavicon-->
    <link rel="icon" type="image/ico" href="favicon.ico">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

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


<body >
<div class="site ">
    @include('layouts.nav')
    @yield('content')
    @include('layouts.footer')
</div>

</body>
</html>
