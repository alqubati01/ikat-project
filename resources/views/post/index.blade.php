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
                                    <li class="list-inline-item">Posts</li>
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

    <div class="m-t-20 p-5">


        <div class="container m-b-50 ">
            <div class="row " style="width: 100%">

            <form action="{{url('post/add')}}" method="post" class="form-inline " style="width: 100%">
                @csrf
                <div class="col-md-10  ">

                        <div class="form-group ">
{{--                            <input type="text" id="exampleInputName2" name="post" placeholder="write your post here" required  autocomplete="off" style="width: 100% ;">--}}

                            <textarea class="form-control"  name="post" placeholder="write your post here" rows="6"  required style="width: 100% ;"></textarea>
                        </div>

                    </div>
                    <div class="col-md-2  m-b-100" >
                        <div class="form-group">
                            <button class="w3-btn w3-blue btn-default" style="width: 100%">Post </button>
                        </div>
                    </div>

            </form>
        </div>


    </div>


        @foreach($post as $po)
            <div style="height: 100px"  id="{{$po->id}}"></div>

            <div  id="d{{$po->id}}" class="au-card au-card--no-shadow au-card--no-pad m-b-40 au-card--border w3-card-2">
                <div class="au-inbox-wrap">
                    <div class="au-chat au-chat--border">
                        <div class="au-chat__title">
                            <div class="au-chat-info">
                                <div class="avatar avatar--small">
                                    <img src="{{asset('images/icon/avatar-02.jpg')}}" alt="John Smith">
                                </div>
                                <span class="nick op_nick">
                                <h4>
                                    {{$po->user->name}}  <br>
{{--                                    {{$po->date}}  <br>--}}
                                    <small><i>
{{--                                            13 years ago --}}
                                            {{ Carbon\Carbon::parse($po->created_at)->diffForHumans()}}
                                        </i></small></h4>
                                                    </span>
                            </div>
                            <div class="au-chat-info">

                                <p class="" style="max-width: 80%">
                                    {{$po->text}}
                                </p>
                            </div>
                        </div>
                        <div class="au-chat__content au-chat__content2 js-scrollbar5">

                            @foreach($po->post_comment as $p_comm)
                                @if($p_comm->team->user->id != Auth::id())
                                <div class="recei-mess-wrap">
                                    <span class="mess-time">
                                {{ Carbon\Carbon::parse($p_comm->created_at)->diffForHumans()}}

                                    </span>
                                    <div class="recei-mess__inner">
                                        <div class="avatar avatar--tiny">
                                            <img src="images/icon/avatar-02.jpg" alt="John Smith">
                                        </div>
                                        <div class="recei-mess-list">
                                            <div class="recei-mess">
                                            {{$p_comm->text}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @else
                                    <div class="send-mess-wrap">
                                        <span class="mess-time">
                                {{ Carbon\Carbon::parse($p_comm->created_at)->diffForHumans()}}
                                        </span>
                                        <div class="send-mess__inner">
                                            <div class="send-mess-list">
                                                <div class="send-mess">
                                                    {{$p_comm->text}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            @endforeach
                        </div>
                        <div class="au-chat-textfield">
                            <form action="{{url('post/comment/'.$po->id)}}" method="post" enctype="multipart/form-data" class="au-form-icon" >
                                @csrf

                                <input class="au-input au-input--full au-input--h65" name="comment" type="text" placeholder="Type a comment" autocomplete="off" required>
                                <button class="au-input-icon">
                                    <i class="fas fa-paper-plane m-r-35"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

    </div>



@endsection

@push('scripts_body')


@endpush