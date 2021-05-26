@extends('layouts.app')


@push('scripts_header')
    <!-- FullCalendar -->
    {{--    <link  rel="stylesheet"href="{{ asset('assets/css/custom2.scss') }}"  >--}}
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
                                        <a href="\">Home</a>
                                    </li>
                                    <li class="list-inline-item seprate">
                                        <span>/</span>
                                    </li>
                                    <li class="list-inline-item">task</li>
                                </ul>
                            </div>
{{--                            <button class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#mediumModal">--}}
{{--                                <i class="zmdi zmdi-plus"></i>add  a new post</button>--}}


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- END BREADCRUMB-->
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="m-t-50 p-5">

        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40 au-card--border">
            <div class="au-card-title op_au-card-title" style="">
                <div class="bg-overlay bg-overlay--blue"></div>
                <h3>
                    <i class="zmdi zmdi-account-calendar"></i>
{{--                    26 April, 2018--}}
                    {{$task->delivery_date}}</h3>
{{--                <button class="au-btn-plus">--}}
{{--                    <i class="zmdi zmdi-plus"></i>--}}
{{--                </button>--}}
            </div>
            <div class="au-inbox-wrap">
                <div class="au-chat au-chat--border">
                    <div class="au-task__title">
{{--                        {{dd($task->body)}}--}}
                        <p style="font-weight: bold">
                            Tasks for  <span style="color: #2a62bc">{{$task->project_team->team->user->name}}</span>
                            Assigned TO <span style="color: #2a62bc">{{$task->assignation==""?"not assigned yet": $task->assignation->project_team->team->user->name}}</span></p><br>
                        <p>
                        {{$task->body}}
                        </p>
                    </div>
                    <div class="au-chat__content au-chat__content2 js-scrollbar5" id="multiple-select">

                        @foreach($task->task_comment as $comm)
                            @if($comm->project_team->team->user->id != Auth::id())
                                <div class="recei-mess-wrap">
                                    <span class="mess-time">
                                        <span style="font-weight: bold;  font-size: 18px;margin-right:5px ">
                                           {{$comm->project_team->team->user->name}}
                                       </span>
                                        commented
                                         {{ Carbon\Carbon::parse($comm->created_at)->diffForHumans()}}
                                    </span>
                                    <div class="recei-mess__inner">
                                        <div class="avatar avatar--tiny">
{{--                                            <img src="{{asset('images/icon/avatar-02.jpg')}}" alt="image">--}}
                                        </div>
                                        <div class="recei-mess-list">
                                            <div class="recei-mess">
                                                @if($comm->type==0)
                                                    {{$comm->comment}}
                                                    @else
                                                    <a href="{{asset($comm->file)}}" download>

                                                        file...click to download
                                                    </a>
                                                    @endif
{{--                                                {{$comm->project_team->team->user->id}}--{{Auth::id()}}--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @else
                                <div class="send-mess-wrap">
                                    <span class="mess-time">
                                       <span style="font-weight: bold;  font-size: 18px;margin-right:5px ">
                                           {{$comm->project_team->team->user->name}}
                                       </span>
                                        commented
                                        {{ Carbon\Carbon::parse($comm->created_at)->diffForHumans()}}

                                    </span>
                                    <div class="send-mess__inner">
                                        <div class="send-mess-list">
                                            <div class="send-mess">
                                                @if($comm->type==0)
                                                    {{$comm->comment}}
                                                @else
                                                    <a href="{{asset($comm->file)}}" download>

                                                        file...click to download
                                                    </a>
                                                @endif

{{--                                                    <img src="/images/myw3schoolsimage.jpg" alt="W3Schools" width="104" height="142">--}}
{{--                                                {{$comm->project_team->team->user->id}}--{{Auth::id()}}--}}

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif

                        @endforeach

                    </div>
                    <div class="au-chat-textfield">
                        <form action="{{url('taskcom/'.$task->id)}}" method="post" enctype="multipart/form-data" class="au-form-icon" >
                         @csrf
                            <input class="au-input-icon2" style="display: none" name="file" id='fileid' type='file'>
                            <input class="au-input au-input--full au-input--h65" name="comment" id="comment" type="text" placeholder="Type a message" autocomplete="off">

                            <button  class="au-input-icon  ">
                                <i class="fas fa-paper-plane m-r-35"></i>
                            </button>
                            @if($task->assignation !="")
                            @if($task->assignation->project_team->team->user->id == Auth::id())

                            <button id='buttonid' type='button' class="au-input-icon m-r-50">
                                <i class="zmdi zmdi-file"></i>
                            </button>
                            @endif

                            @endif
{{--                            {{$task->assignation->project_team->team->user->id}}--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@push('scripts_body')

<script>


    $("#multiple-select").animate({ scrollTop: $('#multiple-select')[0].scrollHeight }, 1000);

    document.getElementById('buttonid').addEventListener('click', openDialog);

    function openDialog() {
        document.getElementById('fileid').click();

        document.getElementById('fileid').style.display = "inline-block";
        // document.getElementById('comment').readOnly=true;
        document.getElementById('comment').placeholder="";
    }
</script>
@endpush
