
@extends('layouts.masterlogged')

@section('content')
    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
        <script>
            $(function() {
                $('#addgroup-modal').modal('show');
            });
        </script>
    @endif

    <section class="main container-fluid">

        <ul class="ch-grid">
            <li>
                <div class="ch-item">
                    <div class="ch-info">
                        <h2>Add Kid</h2>
                        <p><a href="#" data-toggle="modal" data-target="#addkid-modal">ADD</a></p>
                    </div>
                    <div class="ch-thumb ch-img-1"><h1>KIDS</h1></div>
                </div>
            </li>
            <li>
                <div class="ch-item">
                    <div class="ch-info">
                        <h2>Add Group</h2>
                        <p><a href="#" data-toggle="modal" data-target="#addgroup-modal">CREATE</a></p>
                    </div>
                    <div class="ch-thumb ch-img-2"><h1>GROUPS</h1></div>
                </div>
            </li>
            <li>
                <div class="ch-item">
                    <div class="ch-info">
                        <h2>Tracking</h2>
                        <p><a href="#" data-toggle="modal" data-target="#start-modal">START</a></p>
                    </div>
                    <div class="ch-thumb ch-img-3"><h1>TRACK</h1></div>
                </div>
            </li>
        </ul>


    </section>
    <form class="form-horizontal" method="POST" action="addkid">
        {{csrf_field()}}
    <div class="modal fade" id="addkid-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Add a new Kid</h1><br>
                <form>
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="text" pattern="[3-9]|10|11|12" name="age" placeholder="Age (between 3 and 12)" required >
                    <input type="submit" name="add" class="login loginmodal-submit" value="Add">
                </form>


            </div>
        </div>
    </div>
    </form>

    <div class="modal fade" id="addgroup-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Create a new Group</h1><br>

                    <form method="POST" action="addgroup" data-toggle="validator" data-disable="false">
                        {{csrf_field()}}
                        <input type="text" name="name" placeholder="Name" required>
                        @foreach($kids as $kid)

                            <input title="kid{{ $loop->iteration }}" tabindex="1" type="checkbox" name="kid{{$loop->iteration}}" id="kid{{ $loop->iteration }}" value="{{ $kid->id_kid }}" >{{ $kid->name }} ({{ $kid->age }} years old) <br>

                       @endforeach
                        <hr>
                        <input type="submit" name="add" class="login loginmodal-submit" value="Create" id="addGroup">
                        <input type="hidden" name="kidNumber" value="{{ count($kids) }}">
                    </form>
                <div class="form-group">
                    @include('layouts.errors')
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="start-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>START</h1><br>
                <form method="POST" action="start" data-toggle="validator" data-disable="false">
                    {{csrf_field()}}

                    <h5>GROUPS</h5>
                    @foreach($groups as $group)

                        <input type="radio" name="selected" value="g{{ $group->id_group }}" required="required">{{ $group->name }}  <br>


                    @endforeach
                    <br>
                    <h5>KIDS</h5>
                    @foreach($kids as $kid)

                        <input type="radio" name="selected" value="k{{ $kid->id_kid }}" required="required">{{ $kid->name }} ({{ $kid->age }} years old) <br>

                    @endforeach
                    <hr>
                    <input type="submit" name="start" class="login loginmodal-submit" value="Start">

                </form>


            </div>
        </div>
    </div>



@endsection