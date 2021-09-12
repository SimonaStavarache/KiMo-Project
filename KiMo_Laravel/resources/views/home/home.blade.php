@extends('layouts.master')
@section('content')
<div style="background:#D5F2F7 !important" class="jumbotron text-center">
    <p> </p>
    <img alt="Logo" src="img/KiMo Logo.png" height="80" />
    <h2>Best Kid Tracker</h2>
    <div class="input-group center-block" style="width:30%">
        <input type="email" class="form-control" size="50" placeholder="Email Address" required>
        <div class="input-group-btn">
            <p> </p>
            <button type="button" class="btn btn-danger">Subscribe</button>
        </div>
    </div>
</div>
<!---Information--->
<div class="container">
    <div class="row ">
        <div class="col-sm-6">

            <p>Parenting comes with a wide range of challenges—but perhaps the toughest challenge of all is ensuring your kids are safe even when they’re out of sight. As kids grow, they’ll want to explore, push boundaries, and make their own rules.</p><br>
            <h4> DO YOU KNOW WHAT YOUR KIDS ARE DOING?</h4><br>
            <p> We’ve created an useful free app to help you get to know! KiMo – is a parental control compatible with the most used OS in the world.  With wearable GPS trackers the challenge of parenthood just got a little easier. Whether your child is on a family outing, at an amusement park, or on a school trip, these devices give you one less thing to worry about.  </p>
            <br><button class="btn btn-default btn-lg">Get started</button>
            <p> </p>
        </div>
        <div class="col-sm-6">
            <br />

            <img class="img-responsive " src="img/kid.png " /><br />

        </div>
    </div>
</div>
<!--Opinion-->
<div class="jumbotron text-center">
    <p> </p>
    <h2 class="text-center">What our customers say</h2>
    <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <h4 class="text-center">"Love it!! I know where my children are at all times. I feel very secure with this app."<br><span>Li Park</span></h4>
            </div>
            <div class="item">
                <h4>"One word... WOW!!"<br><span>John Doe</span></h4>
            </div>
            <div class="item">
                <h4>"Easy to use and did provide basically what you need."<br><span>Chandler Bing</span></h4>
            </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>




@endsection