@extends('layouts.masterloggedprofile')

@section('content')


    <script src="js/profile.js"></script>
    <script src="https://use.fontawesome.com/9bc7fc2951.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js" integrity="sha256-WyjlLy3rvVSitHOXMctYkMCOU6GAletPg+qniNKLCQM=" crossorigin="anonymous"></script>


    <div class="container">
        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/212110-200.png" class="img-responsive" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        @foreach($user as $userProfile)
                        <div class="profile-usertitle-name">
                            {{ $userProfile->name }}
                        </div>
                        @endforeach
                        <div class="profile-usertitle-job">
                            User
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->

                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu " >
                        <ul class="nav">

                            <li>
                                <a href="#"  id="toggleAccsettings">
                                    <i class="glyphicon glyphicon-user" ></i>
                                    Account Settings </a>
                            </li>
                            <li>
                                <a href="#" id="toggleKids">
                                    <i class="glyphicon glyphicon-baby-formula"></i>
                                    Kids </a>
                            </li>
                            <li>
                                <a href="#" id="toggleGroups">
                                    <i class="glyphicon glyphicon-folder-open"></i>
                                    Groups </a>
                            </li>
                            <li>
                                <a href="#" id="toggleNotifications">
                                    <i class="glyphicon glyphicon-list"></i>
                                    Notifications </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
            </div>




        <div  id="accsettings" >
            <div class= id="signupContainer">

                <form class="form-signin" method="post" action="updateProfile">
                    {{csrf_field()}}
                    <div class="container">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-6">
                                <div class=" panel-default">
                                    <div class="panel panel-primary">

                                        <h3 class="text-center">
                                            Update Account</h3>


                                        <div class="panel-body">
                          @foreach($user as $userProfile)
                                            <div class="form-group">
                                                <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                            </span>
                                                    <input name="userName" type="text" class="form-control" placeholder="Name" value="{{ $userProfile->name }}"/>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                                    <input name="userEmail" type="text" class="form-control" placeholder="Email" value="{{ $userProfile->email }}"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                                    <input name="userNewPassword" type="password" class="form-control" placeholder="New Password" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                                    <input name="userNewPasswordConfirm" type="password" class="form-control" placeholder="Confirm New Password" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
                                                    <input name="userAddress" type="text" class="form-control" placeholder="Address" value="{{ $userProfile->address }}"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    <input name="userAge" type="text" class="form-control" placeholder="Age" value="{{ $userProfile->age }}"/>
                                                </div>
                                            </div>

                                            <button class="btn btn-lg btn-primary btn-block" type="submit">
                                                Save
                                            </button>

                                            <div class="form-group">
                                                @include('layouts.errors')
                                            </div>

                                        </div>
                                @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>



            </div>
        </div>

            <div  id="kids" style="display: none;">
                <div class="row col-md-6 col-md-offset-1 panel-body panel  panel-primary" >
                       <div class="table-responsive">


                                    <table id="mytable" class="table panel-table ">
                                        <h3 class="text-center">
                                            Edit Your Kids</h3>

                                        <thead>

                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        </thead>

                                        <tbody>

                                        @foreach($kids as $kid)

                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kid->name }}</td>
                                            <td>{{ $kid->age }}</td>
                                            <td><p data-placement="top"  title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-id="{{ $kid->id_kid }} " data-name="{{ $kid->name }}" data-age="{{
                                            $kid->age }}"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                            <td><p data-placement="top"  title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-id="{{ $kid->id_kid }}"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                        </tr>

                                        @endforeach


                                        </tbody>

                                    </table>

                    </div>
                </div>
            </div>

            <div  id="groups" style="display: none;">
                        <div class="row col-md-6 col-md-offset-1 panel-body panel  panel-primary">

                            <div class="table-responsive">


                                <table id="mytable" class="table panel-table ">
                                    <h3 class="text-center">
                                        Edit Your Groups</h3>

                                    <thead>

                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    </thead>

                                    <tbody>

                                    @foreach($groups as $group)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $group->name }}
                                                    <div class="dropdown-user" data-for=".{{ $group->id_group }}">
                                                        <i class="glyphicon glyphicon-chevron-down text-muted"></i>
                                                    </div>
                                                    <div class="row user-infos {{ $group->id_group }}">
                                                        @foreach($group_kid as $gk)
                                                            @foreach($kids as $kid)
                                                                 @if($group->id_group==$gk->id_group and $gk->id_kid==$kid->id_kid)
                                                                    <h5 >- {{ $kid->name }} ({{ $kid->age }} yaers old)</h5>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                 </td>

                                                    <td><p data-placement="top"  title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#editGroup" data-id="{{ $group->id_group }}" data-name="{{ $group->name }}" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                                    <td><p data-placement="top"  title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#deleteGroup" data-id="{{ $group->id_group }}"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                            </tr>
                                    @endforeach

                                    </tbody>

                                </table>

                            </div>

                        </div>
            </div>

            <div  id="notifications" style="display: none;">
                <div class="row col-md-6 col-md-offset-1 panel-body panel  panel-primary" >

                    <div class="table-responsive">


                        <table id="mytable" class="table panel-table ">
                            <h3 class="text-center">
                                Edit Your Notifications</h3>

                            <thead>

                            <th>#</th>
                            <th>Kid</th>
                            <th>Message</th>
                            <th>Generate Time</th>
                            <th>Delete</th>
                            </thead>

                            <tbody>

                            @foreach($notifications as $notification)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $notification->name }}</td>
                                    <td>{{ $notification->message }}</td>
                                    <td>{{ $notification->generate_time }}</td>
                                    <td><p data-placement="top"  title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#deleteNotification" data-id="{{ $notification->id_notification }}"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                </tr>

                            @endforeach


                            </tbody>

                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edit Your Kid</h4>
                </div>
                <form class="form-signin" method="post" action="editKid">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control edit-name" name="kidName" type="text" placeholder="Name">
                        </div>
                        <div class="form-group">

                            <input class="form-control edit-age" type="text" placeholder="Age" name="kidAge">
                            <input type="hidden" class="form-control edit-id" name="kidID"/>
                        </div>

                    </div>

                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>


    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                </div>
                <form class="form-signin" method="post" action="deleteKid">
                    {{csrf_field()}}
                    <div class="modal-footer ">
                        <input type="hidden" class="delete-id" name="kidID"/>
                        <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal fade" id="editGroup" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edit Your Group</h4>
                </div>
                <form class="form-signin" method="post" action="editGroup">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control edit-name" name="groupName" type="text" placeholder="Name">
                        </div>
                        <div class="form-group">

                            <input type="hidden" class="form-control edit-id" name="groupID"/>
                        </div>

                    </div>

                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>


    <div class="modal fade" id="deleteGroup" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                </div>
                <form class="form-signin" method="post" action="deleteGroup">
                    {{csrf_field()}}
                    <div class="modal-footer ">
                        <input type="hidden" class="delete-id" name="groupID"/>
                        <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal fade" id="deleteNotification" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                </div>
                <form class="form-signin" method="post" action="deleteNotification">
                    {{csrf_field()}}
                    <div class="modal-footer ">
                        <input type="hidden" class="delete-id" name="notificationID"/>
                        <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>




    <script>
        $('#delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var v_id = button.data('id')
            var modal = $(this)
            modal.find('.delete-id').val(v_id)
        })

    </script>

    <script>
        $('#edit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var v_name = button.data('name') // Extract info from data-* attributes
            var v_age = button.data('age')
            var v_id = button.data('id')
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.edit-name').val(v_name)
            modal.find('.edit-age').val(v_age)
            modal.find('.edit-id').val(v_id)
        })

    </script>

    <script>
        $('#deleteGroup').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var v_id = button.data('id')
            var modal = $(this)
            modal.find('.delete-id').val(v_id)
        })

    </script>

    <script>
        $('#deleteNotification').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var v_id = button.data('id')
            var modal = $(this)
            modal.find('.delete-id').val(v_id)
        })

    </script>

    <script>
        $('#editGroup').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var v_name = button.data('name') // Extract info from data-* attributes
            var v_id = button.data('id')
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.edit-name').val(v_name)
            modal.find('.edit-id').val(v_id)
        })

    </script>

    <script>
        $(document).ready(function() {
            var panels = $('.user-infos');
            var panelsButton = $('.dropdown-user');
            panels.hide();

            //Click dropdown
            panelsButton.click(function() {
                //get data-for attribute
                var dataFor = $(this).attr('data-for');
                var idFor = $(dataFor);

                //current button
                var currentButton = $(this);
                idFor.slideToggle(400, function() {
                    //Completed slidetoggle
                    if(idFor.is(':visible'))
                    {
                        currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
                    }
                    else
                    {
                        currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
                    }
                })
            });




        });
    </script>


    <script>
        jQuery( function() {
            jQuery( "#accordion" ).accordion({ header: "h3", collapsible: true, active: false, heightStyle: "content", autoHeight: false });
        } );
        jQuery('.sectiondropdown').click(function() {
            jQuery("i", this).toggleClass("fa-caret-up fa-caret-down");
        });
    </script>



@endsection