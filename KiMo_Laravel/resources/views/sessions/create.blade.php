@extends('layouts.master')

@section('content')

    <div class="container" >
        <div class="row main">
            <div class="">
                <div class="panel-title text-center">
                    <h1 class="title">KiMo</h1>
                    <hr/>
                </div>
            </div>
            <div class="main-login main-center">
                <form class="form-horizontal" method="POST" action="login">
                    {{csrf_field()}}


                    <div class="form-group">
                        <label for="email" class="cols-sm-2 control-label">Your Email</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email" required/>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Password</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="password" id="name"  placeholder="Enter your Password" required/>
                            </div>
                        </div>
                    </div>



                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Log In</button>
                    </div>
                    <div class="login-register">
                        <a href="signup">Sign Up</a>
                    </div>

                    <div class="form-group">
                        @include('layouts.errors')
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection