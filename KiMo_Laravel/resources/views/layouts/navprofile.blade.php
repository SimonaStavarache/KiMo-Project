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
                    @foreach($user as $userProfile)
                    <li><a href="profile">{{ $userProfile->name }}</a></li>
                    <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    @endforeach
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

