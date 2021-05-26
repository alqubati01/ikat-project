@extends('layouts.app')


@push('scripts_header')
    <!-- FullCalendar -->
{{--    <link  rel="stylesheet"href="{{ asset('assets/css/custom2.scss') }}"  >--}}
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
                        <div class="au-breadcrumb-content">
                            <div class="au-breadcrumb-left">
                                <span class="au-breadcrumb-span">You are here:</span>
                                <ul class="list-unstyled list-inline au-breadcrumb__list">
                                    <li class="list-inline-item active">
                                        <a href="/">Home</a>
                                    </li>
                                    <li class="list-inline-item seprate">
                                        <span>/</span>
                                    </li>
                                    <li class="list-inline-item">Project task</li>
                                </ul>
                            </div>
                            {{--                            <button class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#mediumModal">--}}
                            {{--                                <i class="zmdi zmdi-plus"></i>add  a new project</button>--}}
                            {{----}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- END BREADCRUMB-->


    <section>

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
                                        <a style="width: 100%;height: 100%" href="{{ url('/project_task/' . $pr->id ) }}" class="p-2">{{$pr->name}}</a>
                                    </li>
                                    {{--                                <li data-id="" id=""></li>--}}
                                @endforeach
                            </ul>



                        </div>

                    </div>

                </div>


                <br>
                <br>

                @if(count($data->task)>0)

                    <div class="container">
                        {{--                                        @include('table.index',$data->task)--}}

                        <table id="example" class="table table-striped  w3-card-2 w3-round-large " style="width:100%">
                            <thead class="w3-orange ">
                            <tr>
                                <th>#</th>
                                <th>Task name</th>
                                <th>Create At</th>
                                <th>Due Data</th>
                                <th>Owner</th>
                                <th>Assigned To</th>
                                <th>State</th>
                                <th>Setting</th>
                            </tr>
                            </thead>

                            <tbody class="op_table">

                            @foreach($data->task as $key=>$tsk)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$tsk->body}}</td>
                                    <td>{{$tsk->created_at}}</td>
                                    <td>{{$tsk->delivery_date}}</td>
                                    <td>{{$tsk->project_team->team->user->name}}</td>
                                    <td>{{$tsk->assignation != null ?$tsk->assignation->project_team->team->user->name:"not yet"}}</td>
                                    <td>
                                        @if($tsk->state == 0)

                                            ToDo
                                        @elseif($tsk->state == 2)

                                            Done
                                        @else

                                            Review
                                        @endif
                                    </td>
                                    <td>

                                        <div class="w3-dropdown-hover">
                                            <button class="w3-button w3-light-gray w3-hover-light-gray">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="w3-dropdown-content w3-bar-block w3-border w3-card-2" style="right: 0px;top: 30px;z-index: 9">
                                                <a href="{{url('/task/'.$tsk->id)}}" class="w3-bar-item w3-button">show </a>
                                                @if(ProjectController::find_role($tsk->project->id)->role=="1" || $tsk->project_team->team->user->id==\Illuminate\Support\Facades\Auth::id())
                                                    <a href="{{url('/task/delete/'.$tsk->id)}}" class="w3-bar-item w3-button">Delete</a>
                                                @endif
                                            </div>
                                        </div>


                                    </td>
                                </tr>


                            @endforeach


                            </tbody>

                        </table>

                        <br>
                        <br>

                        <br>
                        <br>
                        <br>

                    </div>



                @else

                    <div class="container p-4">
                        <h4> This project doesn't have a task yet
                            {{--                            <span class="badge badge-success m-l-10" data-toggle="modal" data-target="#mediumModal" style="cursor: pointer">--}}
                            {{--                                <i class="zmdi zmdi-plus"></i>Add  now</span>--}}
                        </h4>
                    </div>
                @endif


                <br>
                <br>


            </div>


        </div>


    </section>
@endsection

@push('scripts_body')




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

@endpush