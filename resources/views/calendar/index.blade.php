
@extends('layouts.app')
@push('scripts_header')
    <!-- FullCalendar -->
{{--    <link href='vendor/fullcalendar-3.10.0/fullcalendar.css' rel='stylesheet' media="all" />--}}
{{--    <link  rel="stylesheet"href="{{ asset('vendor/fullcalendar-3.10.0/fullcalendar.css') }}"  >--}}

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
                                    <li class="list-inline-item">Calendar</li>
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

    <!-- FullCalendar -->
    <div class="container">
        <div class="">


            <div class="">
                <br>
                <br>
                <div class="w3--2  p-l-25">
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
                                            <a style="width: 100%;height: 100%" href="{{ url('/calendar/' . $pr->id ) }}" class="p-2">{{$pr->name}}</a>
                                        </li>
                                        {{--                                <li data-id="" id=""></li>--}}
                                    @endforeach
                                </ul>



                            </div>

                        </div>

                    </div>



                </div>
                <br>
                <br>
                <br>
                <br>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="au-card">
                                    <div id="calendar"></div>
                                </div>
                            </div><!-- .col -->
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
        @push('scripts_body')



            <script src="{{asset('https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js')}}"></script>



            <script type="text/javascript">
                $(function() {
                    // for now, there is something adding a click handler to 'a'
                    var tues = moment().day(2).hour(19);
                    var tues2 = JSON.parse('<?= json_encode($data->task) ?>');
                    var date =[];
                    var events = [];
                    for(var i = 0; i < tues2.length; i++){

                        events[i]= {
                            title: tues2[i]['body'].substring(0,10)+"...",
                            start: new Date(tues2[i]['delivery_date']).toISOString(),
                            url: '#'
                        };
                    }
                    // date= date.getFullYear()+'-' + (date.getMonth()+1) + '-'+date.getDate();//prints expected format.
                    // alert(date[1]);


                    // build trival night events for example data


                    /* var trivia_nights = [];

                     for(var i = 1; i <= 4; i++) {
                         var n = tues.clone().add(i, 'weeks');
                         console.log("isoString: " + n.toISOString());
                         trivia_nights.push({
                             title: 'Trival Night @ Pub XYZ',
                             start: n.toISOString(),
                             allDay: false,
                             url: '#'
                         });
                     }
         */
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