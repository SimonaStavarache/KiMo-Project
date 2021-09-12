@extends('layouts.mastermap')

@section('content')


    <div >
        <div id="map" style= "height:650px ;
                             width: 90%;
                              margin: auto;">


        </div>
    </div>

    <script>
        $(document).ready(function(){

            function update_kids_location(view = '')
            {
                $.ajax({
                    url:"updateKidsLocation.php",
                    method:"POST",
                    data:{view:view,
                        userID:{{ \Illuminate\Support\Facades\Auth::user()->id }} },
                    dataType:"json"

                });
            }


           setInterval(function(){
                update_kids_location();
            }, 500);

        });


    </script>

@endsection