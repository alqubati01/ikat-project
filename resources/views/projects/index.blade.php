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
                                        <a href="/">Home</a>
                                    </li>
                                    <li class="list-inline-item seprate">
                                        <span>/</span>
                                    </li>
                                    <li class="list-inline-item">Projects</li>
                                </ul>
                            </div>
                            <button class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#mediumModal">
                                <i class="zmdi zmdi-plus"></i>add  a new project</button>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- END BREADCRUMB-->



    <section class="">

        <div class="container">
                        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
                        @endif
        </div>
        <div class="container">
            <br>
            <br>
            <br>

            <!-- Nav tabs -->
            <ul class="nav nav-pills justify-content-center op_nav_pills" role="tablist">
                <li class="nav-item  ">
                    <a class="nav-link active w3-card-4 w3-margin-right" data-toggle="tab" href="#home">my Projects</a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link  w3-card-4 w3-margin-right" data-toggle="tab" href="#belong">Projects belong to</a>
                </li>


            </ul>


            <br>
            <br>


            <!-- Tab panes -->
            <div class="tab-content">


                <div id="home" class="container tab-pane active"><br>

                    <div class="container">
                        <div class="row op_card">

                          @foreach($data as $project)
                                <div class="col-md-4 col-xs-6">
                                    <div class="card w3-card-2">
                                        <div class="card-block">

                                            <div class="media  p-3">

                                                <div class="image img-cir img-50 mr-3 mt-3">
                                                    <img src="{{asset('images/proj/proj2.png')}}" style="height:100%"  alt="John Doe" />
                                                </div>
                                                <div class="media-body">
                                                    <h4>{{$project->name}}  <br>
                                                        <small><i>
                                                                {{ Carbon\Carbon::parse($project->created_at)->diffForHumans()}}

                                                            </i></small></h4>

                                                </div>
                                                <div>
                                                    <div class="w3-dropdown-hover">
                                                        <button class="w3-button w3-white w3-hover-white">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="w3-dropdown-content w3-bar-block w3-border">
                                                            <a href="{{url('/project/'.$project->id)}}" class="w3-bar-item w3-button">show</a>

                                                            @if($project->owner_id == Auth::id())

                                                            <a href="{{url('/project/edit/'.$project->id)}}" class="w3-bar-item w3-button">Edit</a>
                                                            <a href="{{url('/project/delete/'.$project->id)}}" class="w3-bar-item w3-button">Delete</a>

                                                                @endif
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                              @endforeach


                        </div>
                    </div>


                    <br>
                    <br>
                    <br>
                    <br>



                </div>


                <div id="belong" class="container tab-pane "><br>

                    <div class="container">
                        <div class="row op_card">

                          @foreach($belong as $project2)
                                <div class="col-md-4 col-xs-6">
                                    <div class="card w3-card-2">
                                        <div class="card-block">

                                            <div class="media  p-3">
                                                <div class="image img-cir img-50 mr-3 mt-3">
                                                    <img src="{{asset('images/proj/proj2.png')}}" style="height:100%"  alt="John Doe" />
                                                </div>
                                                <div class="media-body">
                                                    <h4>{{$project2->name}}  <br>
                                                        <small><i>
                                                                {{ Carbon\Carbon::parse($project2->created_at)->diffForHumans()}}

                                                            </i></small></h4>

                                                </div>
                                                <div>
                                                    <div class="w3-dropdown-hover">
                                                        <button class="w3-button w3-white w3-hover-white">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="w3-dropdown-content w3-bar-block w3-border">
                                                            <a href="{{url('/project/'.$project2->id)}}" class="w3-bar-item w3-button">show</a>

                                                            @if($project2->owner_id == Auth::id())

                                                                <a href="{{url('/project/edit/'.$project2->id)}}" class="w3-bar-item w3-button">Edit</a>
                                                                <a href="{{url('/project/delete/'.$project2->id)}}" class="w3-bar-item w3-button">Delete</a>

                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                              @endforeach


                        </div>
                    </div>


                    <br>
                    <br>
                    <br>
                    <br>



                </div>




            </div>
        </div>

    </section>

    <!-- modal medium -->
    <div class="modal fade" style="" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header card-header">
                    <h4 class="heading m-l-250 " style="font-weight: bold">Creating  A new Project</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body ">

                    <div class="row ">
                        <div class="col-4 ">
                            <img src="{{asset('images/proj/proj2.jpg')}}"
                                 class="img-fluid " alt="">
                        </div>

                        <div class="col-8 p-b-30">
                            <div class="container op_form">

                                <form  action="{{url('/projects')}}" method="post" class="w3-container">
                                    @csrf

                                    <label>Project Name</label>
                                    <input class="w3-input mb-3" name="p_name" type="text" required>


                                    <label for="multiple-select" class="form-control-label m-t-10">Members</label>

                                    <select class="js-example-basic-multiple" name="members[]" multiple="multiple" >
                                        @foreach($members as $memb)
                                            <option value="{{$memb->id}}">{{$memb->user->email}}</option>
                                        @endforeach
                                    </select>
                                    <small class="help-block form-text">you can choice multi members</small>

                                    <label class="m-t-20">Description</label>
                                    <textarea name="p_desc" class="w3-input mb-3 w3-border" rows="5" id="comment" required></textarea>

                                    <button type="submit" class="btn btn-primary ">
                                        <i class="fa fa-dot-circle-o"></i> Creat
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


    <script>


        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush