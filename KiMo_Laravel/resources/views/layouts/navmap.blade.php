
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />


{{--
 * Created by PhpStorm.
 * User: Andreea
 * Date: 6/3/2017
 * Time: 2:44 PM
 */
 --}}

<nav class="navbar navbar-inverse fixed-top">
    <div class="container-fluid">
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            @if(Auth::check())
                <a class="navbar-brand" href="main">KiMo</a>
            @else
                <a class="navbar-brand" href="home">KiMo</a>
            @endif
        </div >
        <div class="collapse navbar-collapse" id="myNavbar">

            @if(Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span></a>
                        <ul class="dropdown-menu"></ul>
                    </li>
                    <li><a href="profile">{{ Auth::user()->name }}</a></li>
                    <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

                </ul>
            @else

                <ul class="nav navbar-nav navbar-right">
                    <li class=><a href="home">Home</a></li>
                    <li class=><a href="contact">Contact</a></li>
                    <li><a href="signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>

            @endif
        </div>
    </div>
</nav>

<script>
    $(document).ready(function(){

        function load_unseen_notification(view = '')
        {
            $.ajax({
                url:"fetch.blade.php",
                method:"POST",
                data:{view:view,
                        userID:{{ \Illuminate\Support\Facades\Auth::user()->id }} },
                dataType:"json",
                success:function(data)
                {
                    $('.dropdown-menu').html(data.notification);
                    if(data.unseen_notification > 0)
                    {
                        $('.count').html(data.unseen_notification);
                    }
                }
            });
        }

        load_unseen_notification();


        $(document).on('click', '.dropdown-toggle', function(){
            $('.count').html('');
            load_unseen_notification('yes');
        });

        setInterval(function(){
            load_unseen_notification();
        }, 5000);

    });
</script>


