<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Project management</title>

    <!-- Fontfaces CSS-->
{{--    <link href="css/font-face.css" rel="stylesheet" media="all">--}}
{{--    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">--}}
{{--    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">--}}
{{--    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">--}}
    <link  rel="stylesheet"href="{{ asset('css/font-face.css') }}"   media="all">
    <link  rel="stylesheet"href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}"  media="all">
    <link  rel="stylesheet"href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }}"  media="all">
    <link  rel="stylesheet"href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}"  media="all">

    <!-- Bootstrap CSS-->
{{--    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">--}}
    <link  rel="stylesheet"href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}"  media="all">

    <!-- Vendor CSS-->
{{--    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">--}}
{{--    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">--}}
{{--    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">--}}
{{--    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">--}}
{{--    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">--}}
{{--    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">--}}
{{--    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">--}}
{{--    <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">--}}
    <link  rel="stylesheet"href="{{ asset('vendor/animsition/animsition.min.css') }}" media="all" >
    <link  rel="stylesheet"href="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}"  media="all">
    <link  rel="stylesheet"href="{{ asset('vendor/wow/animate.css') }}"  media="all">
    <link  rel="stylesheet"href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}"  media="all">
    <link  rel="stylesheet"href="{{ asset('vendor/slick/slick.css') }}" >
    <link  rel="stylesheet"href="{{ asset('vendor/select2/select2.min.css') }}"  media="all">
    <link  rel="stylesheet"href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}" media="all" >
    <link  rel="stylesheet"href="{{ asset('vendor/vector-map/jqvmap.min.css') }}"  media="all">

    <!-- FullCalendar -->
    {{--    <link href='vendor/fullcalendar-3.10.0/fullcalendar.css' rel='stylesheet' media="all" />--}}
    <link  rel="stylesheet"href="{{ asset('vendor/fullcalendar-3.10.0/fullcalendar.css') }}"  >

    @stack('scripts_header')
@stack('style')



    <!-- Main CSS-->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" media="all">
{{--    <link rel="stylesheet" href="assets/css/w3.css">--}}
{{--    <link rel="stylesheet" href="assets/css/custom.css">--}}
    <link  rel="stylesheet"href="{{ asset('assets/css/custom.css') }}" >
{{--    <link  rel="stylesheet"href="{{ asset('') }}" >--}}
    <link  rel="stylesheet"href="{{ asset('assets/css/w3.css') }}" >


</head>

<body class="animsition">
<div class="page-wrapper">
    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar2 w3-light-gray">
        <div class="logo">
            <a href="\">
                <img src="{{asset('images/icon/logo.png')}}" alt="Cool Admin" />
            </a>
        </div>

        @auth
            @include('include.menu_slidebar')
            @endauth
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container2 p-b-250 ">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop2">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap2">
                        <div class="logo d-block d-lg-none">
                            <a href="#">
                                <img src="{{asset('images/icon/logo-white.png')}}" alt="CoolAdmin" />
                            </a>
                        </div>
                        @auth
                        <div class="header-button2">

{{--
                            <a href="#" onclick="task_show('')" style="width: 100%">
                                <div class="header-button-item has-noti  ">
                                <i class="zmdi zmdi-account-box  "></i>
                            </div>
                            </a>
--}}
                            <div class="header-button-item has-noti js-item-menu ">
                                <i class="zmdi zmdi-notifications "></i>
                                <div class="notifi-dropdown js-dropdown"style="padding-bottom: 20px;max-height: 400px;overflow-y: auto">
                                    <div class="notifi__title" >
                                        <p>You have <span class="not_count"></span> Notifications</p>
                                    </div>
                                    <div class="mynotic">

                                    </div>

                                    {{--<a data-id="ddd" style="width: 100%;background-color: #00a2e3"onclick="task_show2()">
                                    <div class="notifi__item"id=""  style="margin: 0px">
                                        <div class="bg-c1 img-cir img-40">
                                            <i class="zmdi zmdi-account"></i>
                                        </div>
                                        <div class="content">
                                            <p class="">You got a email notificatddddion</p>
                                            <span class="date">April 12, 2018 06:50</span>
                                        </div>
                                    </div>
                                    </a>

                                    <div class="notifi__footer">
                                        <a href="#">All notifications</a>
                                    </div>
                                    --}}

                                </div>
                            </div>

                            <div class="header-button-item mr-0 js-sidebar-btn">
                                <i class="zmdi zmdi-menu"></i>

                            </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block w3-" style="width: 250px">
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">

                                        <div class="p-t-10 p-l-15" style="">
                                            <h2 style="color: blue;">Teams Members</h2>


                                            <ul class="w3-ul w3--4">
                                                @foreach(\App\Team::where('captain_id',Auth::user()->id)->get() as $uss)
                                                    <li class="w3-bar">
                                                        {{--                                                    <span onclick="this.parentElement.style.display='none'" class="w3-bar-item w3-button w3-white w3-xlarge w3-right">×</span>--}}
                                                        <div class="w3-bar-item">
                                                            <div class="image img-cir img-40 border">
                                                                <img src="{{asset($uss->user->image!="" ?$uss->user->image:'images/icon/user2.png')}}" style="height: 100%;width: 100%"  alt="not" />

                                                            </div>
                                                        </div>
                                                        <div class="w3-bar-item">
                                                            <span class="w3-large">{{$uss->user->name}}</span><br>
                                                            <span>{{$uss->user->email}}</span>
                                                        </div>
                                                    </li>


                                                @endforeach

                                            </ul>

{{--                                            <div class="row p-l-15 p-b-10">--}}

{{--                                                <div class="image img-cir img-60 m-r-10 m-t-10">--}}
{{--                                                    <img src="{{asset('images/icon/avatar-big-01.jpg')}}" alt="John Doe" />--}}

{{--                                                </div>--}}
{{--                                            --}}
{{--                                            </div>--}}


                                        </div>

                                    </div>

                                </div>
                                    <div class="container" style="padding-top: 10px;">
                                        <button class="au-btn  btn-primary"data-dismiss="modal" data-toggle="modal"  data-target="#smallmodal"><a  href="\team" style="color:white"  >Add more</a></button>
{{--                                        <a data-toggle="modal" href="#myModal" class="btn btn-primary">Launch modal</a>--}}

                                    </div>


                                </div>





                        </div>

                        @else

                            <div class="header__navbar op_header__navbar">
                                <ul class="list-unstyled m-r-100" >
                                    <li>
                                        <a href="{{url('register')}}">
                                            <i class="fas fa-user-plus"></i>
                                            <span class="bot-line"></span>Sign Up</a>
                                    </li>
                                    <li>
                                        <a href="{{url('login')}}">
                                            <i class="fas fa-sign-in-alt"></i>
                                            <span class="bot-line"></span>Login</a>
                                    </li>

                                </ul>
                            </div>

                        @endauth

                    </div>
                </div>
            </div>
        </header>
         <!-- END HEADER DESKTOP-->

        @yield('content')


        <!-- END PAGE CONTAINER-->
    </div>


       <div class="modal fade"  id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true" style="display: none;top: 140px;width: 500px;left: 400px;z-index: 9999999999999999">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header w3-light-gray" >
                    <h5 class="modal-title m-l-150" id="smallmodalLabel" style="font-weight: bold">Invite users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-t-25">
                    <form action="{{url('team/add')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf

                        <div class="row form-group">
                            <div class="col col-md-1">
                            </div>
                            <div class="col col-md-4">
                                <label for="text-input" class=" form-control-label">User name</label>
                            </div>
                            <div class="col-12 col-md-6">
                                <select class="js-example-basic-multiple" name="members[]" multiple="multiple" required>
                                    {{--                                    @foreach($users as $usr)--}}
                                    {{--                                        <option value="{{$usr->id}}">{{$usr->name}}</option>--}}
                                    {{--                                       @endforeach--}}
                                </select>
                                <small class="help-block form-text">you can choice multi members</small>

                            </div>

                            <div class="col col-md-1">
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

</div>
<div class="modal fade"  id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true" style="display: none;top: 140px;width: 500px;left: 400px;z-index: 0">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header w3-light-gray" >
                <h5 class="modal-title m-l-150" id="smallmodalLabel" style="font-weight: bold">Invite users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-t-25">
                <form action="{{url('team/add')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf

                    <div class="row form-group">
                        <div class="col col-md-1">
                        </div>
                        <div class="col col-md-4">
                            <label for="text-input" class=" form-control-label">User name</label>
                        </div>
                        <div class="col-12 col-md-6">
                            <select class="js-example-basic-multiple" name="members[]" multiple="multiple" required>
                                {{--                                    @foreach($users as $usr)--}}
                                {{--                                        <option value="{{$usr->id}}">{{$usr->name}}</option>--}}
                                {{--                                       @endforeach--}}
                            </select>
                            <small class="help-block form-text">you can choice multi members</small>

                        </div>

                        <div class="col col-md-1">
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

<!-- Jquery JS-->
<script src="{{asset('vendor/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap JS-->
<script src="{{asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>

<!-- Vendor JS       -->
<script src="{{asset('vendor/slick/slick.min.js')}}"></script>
<script src="{{asset('vendor/wow/wow.min.js')}}"></script>
<script src="{{asset('vendor/animsition/animsition.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<script src="{{asset('vendor/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('vendor/counter-up/jquery.counterup.min.js')}}"></script>


<script src="{{asset('vendor/vendor/circle-progress/circle-progress.min.js')}}"></script>
<script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('vendor/chartjs/Chart.bundle.min.js')}}"></script>
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>



<script src="{{asset('vendor/vector-map/jquery.vmap.js')}}"></script>
<script src="{{asset('vendor/vector-map/jquery.vmap.min.js')}}"></script>
<script src="{{asset('vendor/vector-map/jquery.vmap.sampledata.js')}}"></script>
<script src="{{asset('vendor/vector-map/jquery.vmap.world.js')}}"></script>

<!-- full calendar requires moment along jquery which is included above -->
{{--    <script src="vendor/fullcalendar-3.10.0/lib/moment.min.js"></script>--}}
{{--    <script src="vendor/fullcalendar-3.10.0/fullcalendar.js"></script>--}}
<script src="{{asset('vendor/fullcalendar-3.10.0/lib/moment.min.js')}}"></script>
<script src="{{asset('vendor/fullcalendar-3.10.0/fullcalendar.js')}}"></script>


<!-- Main JS-->
<script src="{{asset('js/main.js')}}"></script>

@stack('scripts_body')
<script>



</script>
<script>

    function task_show(ev,task){


        ev.preventDefault();

        // alert(newParent);
        // var  task="";
        // alert(task[0].id);
        if (task.length>0){
            // var url2 = new URL("http://127.0.0.1:8000/project_task/1"); //(location.href);
            window.location=new URL("http://127.0.0.1:8000/"+ev.target.id+task[0].id);
            if (url2.hash!=""){}
            location.reload();
            // window.location.hash = '#fooddddd';
        }
        else {
            // $(this).css("display",'none');
            // alert(task.length);
            ev.target.title="nothing to view ,please add task first";

        }
        // alert("qqqqqqq");


    }
    function task_show2(){
        setTimeout(function () {
            const url2 = new URL(window.location.href); //(location.href);
            window.location.href=url2;
            // alert(url2);
            if (url2.hash!="") 
            location.reload();
        }, 500);

    }

</script>

<script>




    $(document).ready(function(){
        var type = window.location.hash.substr(1);
        // var url =  window.location.href;
        const url = new URL(window.location.href); //(location.href);

        var id='';
        url.hash="";
        // window.location.href=url;
        if (url=="http://127.0.0.1:8000/Posts"){
            if (type!="" ){
                id=type;

            }
            else {
                id='all';

            }

            // e.preventDefault();
            $.post("/post_notic",
                {
                    _token: '{{ csrf_token() }}',id:id
                } )

                .done(
                    function(response){


                        // alert("dddd "+response.data);


                    })
                .fail(function(xhr, status, error) {
                    // error handling
                    alert("error");
                });

        }


        // e.preventDefault();
        $.post("/show_notic",
            {
                _token: '{{ csrf_token() }}',
            } )

            .done(
                function(response){



                    // var xxd2=$(xxd3);
                    // alert(Object.keys(response.data).length);
                    // alert(response.data1);inbox-num
                    var mynotic=".mynotic";
                    var not_count=".not_count";
                    var not_count1=".not_count1";
                    var image="{{asset('images/')}}/";

                    $(mynotic).text("");
                    $(not_count).text("");
                    $(not_count1).text("");

                    // alert(response.data2);
                    // $(not_count).text(response.data);
                    $(not_count).text(Object.keys(response.data).length == 0? "":Object.keys(response.data).length);
                    $(not_count1).text(Object.keys(response.data2).length == 0? "":Object.keys(response.data2).length);

                    if (Object.keys(response.data2).length != 0)
                    {
                        $(not_count1).addClass('inbox-num');
                    }
                    // $(cart_count).text(Object.keys(response.data).length);
                    if (Object.keys(response.data).length != 0)
                    {
                        $.each(response.data,function (i,value) {
                                // alert(value.url);

                            $(mynotic).append('<a href="'+value.url+'"style="width: 100%"onclick="task_show2()">' +
                                    '<div class="notifi__item notifi__item2" >\n' +
                                    '                                        <div class="bg-c1 img-cir img-40">\n' +
                                    '                                            <i class="zmdi zmdi-email-open " ></i>\n' +
                                    '                                        </div>\n' +
                                    '                                        <div class="content">\n' +
                                    '                                            <p><span style="color: #2a62bc;font-weight: bold">' +value.message+ '</span> </p>\n' +
                                    '                                            <span class="date">'+value.created_at+'</span>\n' +
                                    '                                        </div>\n' +
                                    '                                    </div></a>');

                            }

                        )

                    }
                    else {

                        $(mynotic).append('<div class="notifi__footer">\n' +
                            '                                        <a href="#">you don\'t have any yet</a>\n' +
                            '                                    </div>');

                    }





                })
            .fail(function(xhr, status, error) {
                // error handling
                // alert("error");
            });



    });




</script>

</body>

</html>
<!-- end document-->
