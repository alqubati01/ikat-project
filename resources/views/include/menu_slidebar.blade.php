<?php
use App\Http\Controllers\ProjectController;
?>
<div class="menu-sidebar2__content js-scrollbar1 w3-white">

    @php

        use Illuminate\Support\Facades\Auth;

        $proo=ProjectController::findpro2(Auth::id());
        $tasko=ProjectController::find_task();
    @endphp

    <div class="account2">
        <div class="image img-cir img-120 border">
            <img src="{{asset(Auth::user()->image !="" ?Auth::user()->image:'images/icon/user2.png')}}" style="height: 100%;width: 100%" alt="" />

        </div>
        <div class="w3-dropdown-hover">
{{--            <button class="w3-button w3-white w3-hover-white">--}}
{{--                <i class="fas fa-ellipsis-v"></i>--}}
{{--            </button>--}}
            <h4 class="name text-center"style="color: #2a62bc">{{Auth::user()->name}}</h4>

            <div class="w3-dropdown-content w3-bar-block w3-border w3-card-2" style="right: 60px;top: 0px;min-width: 80px">
                <a href="{{url('/profile/'.Auth::user()->id)}}" class="w3-bar-item w3-button" >Edit</a>
            </div>
        </div>

        <a href="{{ url('logout') }}">
            Sign out
        </a>


    </div>
       <nav class="navbar-sidebar2">
        <ul class="list-unstyled navbar__list">
            <li class="active has-sub">
                <a class="js-arrow" href="/projects">
                    <i class="fas fa-bar-chart-o"></i>Projects
                    <span class="{{count($proo)>0 ?'inbox-num':''}}">

                        {{count($proo)>0 ?count($proo):''}}
                    </span>
                </a>
            </li>

            <li>
                <a href="/team">
                    <i class="fas fa-users fa-sm"></i>My Team</a>
            </li>
            <li class=" has-sub">
                <a class="js-arrow" href="{{count($tasko)>0 ?'/project_task/'.$tasko[0]->id:'#'}}">
{{--                <a href="#" class="js-arrow" id="project_task/" onclick="task_show(event,{{$tasko}})">--}}
                    <i class="fas fa-bar-chart-o"></i>Task
{{--                    <span class="{{count($tasko)>0 ?'inbox-num':''}}">--}}

{{--                        {{count($tasko)>0 ?count($tasko):''}}--}}
{{--                    </span>--}}
                </a>
            </li>

            <li class=" has-sub">
                <a class="js-arrow" href="{{count($tasko)>0 ?'/calendar/'.$tasko[0]->id:'#'}}">
                    <i class="fas fa-bar-chart-o"></i>Calendar
                    {{--                    <span class="{{count($tasko)>0 ?'inbox-num':''}}">--}}

                    {{--                        {{count($tasko)>0 ?count($tasko):''}}--}}
                    {{--                    </span>--}}
                </a>
            </li>


            <li>
                <a href="/Posts">
                    <i class="zmdi zmdi-notifications"></i>Posts</a>
                <span class="not_count1"></span>
            </li>


        </ul>
    </nav>
</div>
