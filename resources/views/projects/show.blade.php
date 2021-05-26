@extends('layouts.app')


@push('style')
    <link  rel="stylesheet"href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css') }}"  media="all">

    <link  rel="stylesheet"href="{{ asset('https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css') }}"  media="all">

    <style>

        * {
            outline: 0;
            font-family: sans-serif
        }
        body {
            background-color: #fafafa
        }
        span.msg,
        span.choose {
            color: #555;
            padding: 5px 0 10px;
            display: inherit
        }
        .container2 {
            width: 500px;
            margin: 50px auto 0;
            /*text-align: center*/
        }

        /*Styling Selectbox*/
        .dropdown2 {
            width: 300px;
            display: inline-block;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 2px rgb(204, 204, 204);
            transition: all .5s ease;
            position: relative;
            font-size: 14px;
            color: #474747;
            height: 100%;
            text-align: left
        }
        .dropdown2 .select {
            cursor: pointer;
            display: block;
            padding: 10px
        }
        .dropdown2 .select > i {
            font-size: 13px;
            color: #888;
            cursor: pointer;
            transition: all .3s ease-in-out;
            float: right;
            line-height: 20px
        }
        .dropdown2:hover {
            box-shadow: 0 0 4px rgb(204, 204, 204)
        }
        .dropdown2:active {
            background-color: #f8f8f8
        }
        .dropdown2.active:hover,
        .dropdown2.active {
            box-shadow: 0 0 4px rgb(204, 204, 204);
            border-radius: 5px 5px 0 0;
            background-color: #f8f8f8
        }
        .dropdown2.active .select > i {
            transform: rotate(-90deg)
        }
        .dropdown2 .dropdown-menu {
            position: absolute;
            background-color: #fff;
            width: 100%;
            left: 0;
            margin-top: 1px;
            box-shadow: 0 1px 2px rgb(204, 204, 204);
            border-radius: 0 1px 5px 5px;
            overflow: hidden;
            display: none;
            max-height: 144px;
            overflow-y: auto;
            z-index: 9
        }
        .dropdown2 .dropdown-menu li {
            padding: 10px;
            transition: all .2s ease-in-out;
            cursor: pointer
        }
        .dropdown2 .dropdown-menu {
            padding: 0;
            list-style: none
        }
        .dropdown2 .dropdown-menu li:hover {
            background-color: #f2f2f2
        }
        .dropdown2 .dropdown-menu li:active {
            background-color: #e2e2e2
        }
    </style>

@endpush
@push('scripts_header')


@endpush


@section('content')
    <?php
    use App\Http\Controllers\ProjectController;
    ?>

    <!-- BREADCRUMB-->
    <section class="au-breadcrumb m-t-75">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="au-breadcrumb-content ">
                            <div class="au-breadcrumb-left">
                                <span class="au-breadcrumb-span">You are here:</span>
                                <ul class="list-unstyled list-inline au-breadcrumb__list">
                                    <li class="list-inline-item active">
                                        <a href="/">Home</a>
                                    </li>
                                    <li class="list-inline-item seprate">
                                        <span>/</span>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="/">All Projects</a>

                                    </li>
                                    <li class="list-inline-item seprate">
                                        <span>/</span>
                                    </li>
                                    <li class="list-inline-item">
                                        {{$data->name}}
                                    </li>
                                </ul>
                            </div>

                            <button class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#mediumModal">
                                <i class="zmdi zmdi-plus"></i>Add  a New Task</button>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END BREADCRUMB-->


    <section>
        <div class="">
            <div class="container">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="container   ">

                <br>
                <br>
                <br>
                <!-- Nav tabs -->
                <ul class="nav nav-pills justify-content-center op_nav_pills" role="tablist">
                    <li class="nav-item  ">
                        <a class="nav-link active w3-card-4 w3-margin-right" data-toggle="tab" href="#home"> Tasks</a>
                    </li>
                    @if($data->owner_id == Auth::id() || ProjectController::find_role($data->id)->role=="1")

                    <li class="nav-item  ">
                        <a class="nav-link  w3-card-4 w3-margin-right" data-toggle="tab" href="#team"> Teams</a>
                    </li>

                    @endif

                    <li class="nav-item ">
                        <a class="nav-link w3-card-4" data-toggle="tab" href="#menu1">Activities</a>
                    </li>
                </ul>




                <!-- Tab panes -->
                <div class="tab-content">


                    <div id="home" class="container tab-pane active"><br>

                        <div class="container">
                            <br>
                            <br>

                            <div class="w3--2 p-b-30 p-l-25">
                                <div class="col-md-4 col-xs-6">
                                    <div class="container  container2">

                                        <div class="dropdown dropdown2">
                                            {{--                        {{dd($project22)}}--}}



                                            <div class="select">
                                                <span id="{{$data->name}}">{{$data->name}}</span>
                                                <i class="fa fa-chevron-down"></i>
                                            </div>
                                            <input type="hidden" name="gender">


                                            <ul class="dropdown-menu op_drop">
                                                @foreach($project22 as $pr)
                                                    <li data-id="{{$pr->id}}" id="{{$pr->name}}" style="padding: 0px">
                                                        <a style="width: 100%;height: 100%" href="{{ url('/project/' . $pr->id ) }}" class="p-2">{{$pr->name}}</a>
                                                    </li>
                                                    {{--                                <li data-id="" id=""></li>--}}
                                                @endforeach
                                            </ul>



                                        </div>

                                    </div>

                                </div>


                                <br>
                                <br>




                            </div>

                            <div class="container">
                                <div class="row ">


                                    @foreach($task as $key=>$tk)
                                        @if($key =='0')
                                            <div class="col-md-4 col-xs-6">
                                                <div class="card w3-card-2 w3-light-gray">
                                                    <div class="card-block">

                                                        <h4 class="m-3 ">To do  <span class="badge badge-warning w3-circle" id="count">{{count($tk)}}</span> </h4>

                                                        <div class="p-3 task_dropable" data-id="{{++$key}}" ondrop="drop(event)" ondragover="allowDrop(event)" >

                                                            @foreach($tk as  $t)
                                                                <div draggable="{{ProjectController::find_role($t->project->id)->role=="1" || $t->project_team->team->user->id==\Illuminate\Support\Facades\Auth::id() ?"true":""}}" ondragstart="drag(event)" id="{{$t->id}}" class="card">
                                                                    <div class="card-block m-1">



                                                                        <div class="media">
                                                                            <div class="media-body m-l-20">
                                                                                <label class="">
{{--                                                                                    <input type="checkbox" class="form-check-input" value="">--}}

                                                                                    <a href="/task/{{$t->id}}">
                                                                                        {{$t->body}}
                                                                                    </a>
                                                                                </label>

                                                                            </div>
                                                                            <div class="ml-3 mr-2">
                                                                                <i class="fas fa-ellipsis-h  "></i>

                                                                            </div>
                                                                        </div>
                                                                        <div class="media">

                                                                            <div class="p-1 mr-1"  style="cursor: pointer" onclick="javascript:window.location.href='/task/{{$t->id}}'; return false;">
                                                                                <i class="fas fa-comment-alt mt-3 mr-3 "></i>
                                                                                <i class="fas fa-file-alt mt-3  "></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @endforeach


                                                            <div class="task_dropable2"></div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        @elseif($key =='1')

                                            <div class="col-md-4 col-xs-6">
                                                <div class="card w3-card-2 w3-light-gray">
                                                    <div class="card-block">

                                                        <h4 class="m-3 ">Review  <span class="badge badge-warning w3-circle" id="count">{{count($tk)}}</span> </h4>

                                                        <div class="p-3 task_dropable" data-id="{{++$key}}" ondrop="drop(event)" ondragover="allowDrop(event)" >

                                                            @foreach($tk as  $t)
                                                                <div draggable="{{ProjectController::find_role($t->project->id)->role=="1" || $t->project_team->team->user->id==\Illuminate\Support\Facades\Auth::id() ?"true":""}}" ondragstart="drag(event)" id="{{$t->id}}" class="card">
                                                                    <div class="card-block m-1">



                                                                        <div class="media">
                                                                            <div class="media-body m-l-20">
                                                                                <label class="">
{{--                                                                                    <input type="checkbox" class="form-check-input" value="">--}}

                                                                                    <a href="/task/{{$t->id}}">
                                                                                        {{$t->body}}
                                                                                    </a>
                                                                                </label>

                                                                            </div>
                                                                            <div class="ml-3 mr-2">
                                                                                <i class="fas fa-ellipsis-h  "></i>

                                                                            </div>
                                                                        </div>
                                                                        <div class="media">

                                                                            <div class="p-1 mr-1"  style="cursor: pointer" onclick="javascript:window.location.href='/task/{{$t->id}}'; return false;">
                                                                                <i class="fas fa-comment-alt mt-3 mr-3 "></i>
                                                                                <i class="fas fa-file-alt mt-3  "></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @endforeach

                                                            <div class="task_dropable2"></div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @elseif($key =='2')
                                            <div class="col-md-4 col-xs-6">
                                                <div class="card w3-card-2 w3-light-gray">
                                                    <div class="card-block">

                                                        <h4 class="m-3 ">Done  <span class="badge badge-warning w3-circle"id="count">{{count($tk)}}</span> </h4>

                                                        <div class="p-3 task_dropable" data-id="{{++$key}}"ondrop="drop(event)" ondragover="allowDrop(event)" >

                                                            @foreach($tk as  $t)
                                                                <div draggable="{{ProjectController::find_role($t->project->id)->role=="1" || $t->project_team->team->user->id==\Illuminate\Support\Facades\Auth::id() ?"true":""}}" ondragstart="drag(event)" id="{{$t->id}}" class="card">
                                                                    <div class="card-block m-1">



                                                                        <div class="media">
                                                                            <div class="media-body m-l-20">
                                                                                <label class="">
{{--                                                                                    <input type="checkbox" class="form-check-input" value="">--}}

                                                                                    <a href="/task/{{$t->id}}">
                                                                                        {{$t->body}}
                                                                                    </a>
                                                                                </label>

                                                                            </div>
                                                                            <div class="ml-3 mr-2">
                                                                                <i class="fas fa-ellipsis-h  "></i>

                                                                            </div>
                                                                        </div>
                                                                        <div class="media">

                                                                            <div class="p-1 mr-1"  style="cursor: pointer" onclick="javascript:window.location.href='/task/{{$t->id}}'; return false;">
                                                                                <i class="fas fa-comment-alt mt-3 mr-3 "></i>
                                                                                <i class="fas fa-file-alt mt-3  "></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @endforeach


                                                            <div class="task_dropable2"></div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif

                                    @endforeach



                                </div>
                            </div>

                        </div>


                        <br>
                        <br>
                        <br>
                        <br>



                    </div>

                    <div id="team" class="container tab-pane "><br>

                        <div class="container">

                            <div class="container">
                                <div class="m-t-20 p-3 ">
                                    <!-- USER DATA-->
                                    <div class="user-data m-b-30 w3-card-2">
                                        <h3 class="title-3 m-b-30">
                                            <i class="zmdi zmdi-account-calendar"></i>Team data</h3>
                                        <div class="table-responsive table-data p-b-40" style="height: auto;">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <td>
                                                        image
                                                    </td>
                                                    <td>Name</td>
                                                    <td>Role</td>
                                                    <td></td>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($data->project_team as $member)
                                                    <tr>
                                                        <td>
                                                            <div class="image img-cir img-60 border">
                                                                <img src="{{asset($member->team->user->image==""?'images/icon/user2.png':$member->team->user->image)}}" style="height: 100%;width: 100%"  alt="image" />

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="table-data__info">
                                                                <h6>{{$member->team->user->name}}</h6>
                                                                <span>
                                    <a href="#">{{$member->team->user->email}}</a>
                                </span>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <span class="role {{$member->role==0?"member":"admin"}}"><a href="#" style="color: white">{{$member->role==0? "Member":"Admin"}}</a></span>
                                                        </td>
                                                        <td>
                                                            <div class="w3-dropdown-hover">
                                                                <button class="w3-button w3-white w3-hover-white">
                                                   <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                                                </button>
                                                                <div class="w3-dropdown-content w3-bar-block w3-border w3-card-2" style="width: 220px;right: -40px">
                                                                    <a href="{{url('project_team/edit/'.$member->id)}}" class="w3-bar-item w3-button">{{$member->role==0?"Change Role To Admin":"Change Role To Member"}}</a>
                                                                    <a href="{{url('project_team/delete/'.$member->id)}}" class="w3-bar-item w3-button">Delete</a>
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>


                                                @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="user-data__footer ">
                                            <button class="au-btn  btn-primary " data-toggle="modal" data-target="#smallmodal">Add more</button>
                                            {{--{{dd($users)}}--}}
                                        </div>
                                    </div>
                                    <!-- END USER DATA-->
                                </div>

                            </div>


                        </div>


                        <br>
                        <br>
                        <br>
                        <br>



                    </div>


                    <div id="menu1" class="container tab-pane fade" style=""><br>

                        <div class="w3-container p-5 ">
                            <ul class="w3-ul w3-card-4 w3-white ">
                               @foreach($data->activity->reverse() as $ac)
                                    <li class="w3-bar">
                                        <div class="w3-bar-item">
                                            <div class="image img-cir img-60 border">
                                                <img src="{{asset('images/proj/proj2.png')}}" style="height: 100%;width: 100%"  alt="not" />

                                            </div>
                                        </div>
                                        <div class="w3-bar-item">
                                            <span class="w3-large">{{$ac->act}}</span><br>
                                            <span class="op_acv"> <a href="{{url('/project/'.$data->id)}}"> {{$data->name}} </a>,
                                                <small>
                                                   {{ Carbon\Carbon::parse($ac->created_at)->diffForHumans()}}
                                                </small>
                                            </span>
                                        </div>
                                    </li>

                                @endforeach

                            </ul>
                        </div>


                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>


                </div>


        </div>
{{--            @include('welcome')--}}


        </div>


    </section>

    <div class="modal fade"  id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true" style="display: none;top: 140px;width: 500px;left: 400px">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header w3-light-gray" >
                    <h5 class="modal-title m-l-150" id="smallmodalLabel" style="font-weight: bold">Add Members</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-t-25">
                    <form action="{{url('project_team/add/'.$data->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf

                        <div class="row form-group">
                            <div class="col col-md-1">
                            </div>
                            <div class="col col-md-4">
                                <label for="text-input" class=" form-control-label">User name</label>
                            </div>
                            <div class="col-12 col-md-6">
                                <select class="js-example-basic-multiple" name="members[]" multiple="multiple" required>
                                    @foreach($team_project as $usr)
                                        <option value="{{$usr->id}}">{{$usr->user->email}}</option>
                                    @endforeach
                                </select>
                                <small class="help-block form-text">you can choice multi members</small>

                            </div>

                            <div class="col col-md-1">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-1">
                            </div>
                            <div class="col col-md-4">
                                <label for="text-input" class=" form-control-label"> Member Role</label>
                            </div>
                            <div class="col-12 col-md-6">
                                <select class="" name="role" style="height: 35px;width: 100%" required>
                                    <option disabled>choice role for member</option>
                                    <option value="0">Member</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>

                            <div class="col col-md-1 m-t-20">
                            </div>
                        </div>

                        <div class="row form-group m-l-250 m-t-20 ">
                            <div class="col col-md-4  ">
                                <button type="submit" class="btn btn-primary ">
                                    <i class="fa fa-dot-circle-o"></i>
                                    Add
                                </button>
                            </div>

                            <div class="col col-md-2">
                            </div>

                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal medium -->
    <div class="modal fade" style="" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header card-header">
                    <h4 class="heading m-l-250 " style="font-weight: bold">Creating  A new Task</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body ">

                    <div class="row ">
                        <div class="col-4 ">
                            <img src="{{asset('images/proj/proj1.jpg')}}"
                                 class="img-fluid " alt="">
                        </div>

                        <div class="col-8 p-b-30">
                            <div class="container">
                                <form  action="{{url('/task/create/'.$data->id)}}" method="post" class="w3-container">
                                    @csrf

                                    <label>Things you need to do</label>
                                    <textarea name="t_desc" class="w3-input mb-3 w3-border" rows="3" id="comment" required></textarea>



                                    <div class="row form-group">
                                        <div class="col col-md-5">
                                            <label for="multiple-select" class="form-control-label p-t-5">Assign this task  To</label>
                                        </div>
                                        <div class="col-12 col-md-7">


                                            <select class="js-example-basic-single" name="assign_to" >
                                                <option ></option>
{{--                                                <option>opad</option>--}}

                                                @foreach($data->project_team as $usr)
                                                    <option value="{{$usr->id}}">{{$usr->team->user->name}}</option>
                                                @endforeach
                                            </select>
                                            <small class="help-block form-text">you can choice multi members</small>

                                        </div>
                                    </div>
                                    <label>due date</label>
                                    <input class="w3-input mb-3" type="date" name="t_date" required>

                                    <button type="submit" class="btn btn-primary ">
                                        Creat <i class="fa fa-dot-circle-o"></i>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">

                    <button type="button"  data-dismiss="modal" aria-label="Close" class="btn btn-danger btn-sm ">
                        <i class="fa fa-ban"></i> Cancel
                    </button>
                </div>

            </div>
        </div>
    </div>
    <!-- end modal medium -->

@endsection

@push('scripts_body')


    <script src="{{asset('https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js')}}"></script>



<script type="text/javascript">
        $(function() {
            // for now, there is something adding a click handler to 'a'
            var tues = moment().day(2).hour(19);
            var tues2 = JSON.parse('<?= json_encode($data->task->pluck('delivery_date')) ?>');
            var date =[];
            var events = [];
            for(var i = 0; i < tues2.length; i++){

                events[i]= {
                    title: "task",
                    start: new Date(tues2[i]).toISOString(),
                    url: '#'
                };
            }
            // date= date.getFullYear()+'-' + (date.getMonth()+1) + '-'+date.getDate();//prints expected format.
            // alert(date[1]);


            // build trival night events for example data



            // setup a few events
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                events: events
            });
        });
    </script>

<script>
    // In your Javascript (external .js resource or <script> tag)
    // In your Javascript (external .js resource or <script> tag)

    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });

    $(document).ready(function() {
        $('.js-example-basic-single').select2(
            {
                tags: true,
                dropdownParent: $("#mediumModal")
            }
        );

    });

    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>




<script>
    // *Dropdown Menu*/
    $('.dropdown').click(function () {
        $(this).attr('tabindex', 1).focus();
        $(this).toggleClass('active');
        $(this).find('.dropdown-menu').slideToggle(300);
    });
    $('.dropdown').focusout(function () {
        $(this).removeClass('active');
        // $(this).find('.dropdown-menu').slideUp(300);
    });
    // $('.dropdown .dropdown-menu li').click(function () {
    //     // $(this).parents('.dropdown').find('span').text($(this).text());
    //     // $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
    // });
    /*End Dropdown Menu*/



    //
    // $('.dropdown-menu li').click(function () {
    //
    //
    // });
</script>
    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {

            ev.dataTransfer.setData("text", ev.target.id);

        }

        function drop(ev) {
            ev.preventDefault();
            var newParent = ev.target;
            if(!newParent.classList.contains('task_dropable')){
                newParent = newParent.closest('.task_dropable');
                if(!newParent) return;
            }
            var data = ev.dataTransfer.getData("text");
            newParent.appendChild(document.getElementById(data));
            // var ele = $(this);
            // var state = newParent.getAttribute('state');
            var state = newParent.dataset.id;

            // alert(data2);
            // console.log('dd '+state);
            $.post("/change_state",
                {
                    _token: '{{ csrf_token() }}',id: data ,state:state
                })

                .done(
                    function(response){


                        // alert(response.data);




                    })

                .fail(function(xhr, status, error) {
                    // error handling
                    alert("error : "+error+" "+xhr);
                });


        }


    </script>

@endpush
