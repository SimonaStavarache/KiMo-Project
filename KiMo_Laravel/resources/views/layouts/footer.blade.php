

<footer class="site-footer">
    <div>

        @if(! auth()->check())
        <p class="pull-left">&copy; 2017 KiMo.com &middot; <a href="home">Home</a> &middot;   <a href="contact">Contact</a> &middot;  <a href="login">Log In</a> &middot;  <a href="signup">Sign Up</a> </p>

        @else
            <p class="pull-left">&copy; 2017 KiMo.com &middot; <a href="main">KiMo</a> &middot;   <a href="logout">Log Out</a>  </p>

        @endif
    </div>
</footer>