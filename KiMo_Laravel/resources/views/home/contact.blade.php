@extends('layouts.master')

@section('content')

    <div id="Contact" class="container"><br />
        <div style="background:#D5F2F7 !important" class="jumbotron ">
            <h2 class="text-center"> Got questions? </h2> <br />
            <p class="text-center"> Email us with any questions or inquiries or call us at +40 72311234. We would be happy to help you.</p>
            <div style="text-align: center;"> <img class="img-responsive center-block " style="max-width: 40%;  " src="img/contact.png" height="100" /></div><br />
        </div> <br />
        <div class="row">
            <div class="col-sm-5 col-lg-offset-1 col">
                <p>Contact us and we'll get back to you within 24 hours.</p>
                <p><span class="glyphicon glyphicon-map-marker"></span> Iasi, RO</p>
                <p><span class="glyphicon glyphicon-phone"></span> +40 723 111 234</p>
                <p><span class="glyphicon glyphicon-envelope"></span> KiMo@gmail.com</p>
            </div>
            <div class="col-sm-5 slideanim">

                <div class="row">
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                    </div>
                </div>
                <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>

                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button class="btn btn-default pull-right" type="submit">Send</button>
                    </div>
                </div>
            </div>
        </div><br />

    </div>
@endsection

