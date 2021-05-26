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
                                    <li class="list-inline-item">My team</li>
                                </ul>
                            </div>
                            <button class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#smallmodal">
                                <i class="zmdi zmdi-plus"></i>Add users</button>


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
        <!-- USER DATA-->
        <div class="user-data m-b-30">
            <h3 class="title-3 m-b-30">
                <i class="zmdi zmdi-account-calendar"></i>Team data</h3>
            <div class="table-responsive table-data" style="height: auto">
                <table class="table">
                    <thead>
                    <tr>
                        <td>
                            imgae
                        </td>
                        <td>name</td>
                        <td>action</td>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($data as $member)
                        <tr>
                            <td>
                                <div class="image img-cir img-60 border">
                                    <img src="{{asset($member->user->image==""?'images/icon/user2.png':$member->user->image)}}" style="height: 100%;width: 100%"  alt="image" />

                                </div>
                            </td>
                            <td>
                                <div class="table-data__info">
                                    <h6>{{$member->user->name}}</h6>
                                    <span>
                                    <a href="#">{{$member->user->email}}</a>
                                </span>
                                </div>
                            </td>

{{--                            <td>--}}
{{--                                <span class="role admin"><a href="{{url('team/delete/'.$member->id)}}" style="color: white">Remove</a></span>--}}
{{--                            </td>--}}
                            <td>
                                <div class="w3-dropdown-hover">
                                    <button class="w3-button w3-white w3-hover-white">
                                                   <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                    </button>
                                    <div class="w3-dropdown-content w3-bar-block w3-border w3-card-2" style="width: 220px;right: -40px">
                                        <a href="{{url('team/delete/'.$member->id)}}" class="w3-bar-item w3-button">Delete</a>
                                    </div>
                                </div>

                            </td>

                        </tr>

                        @endforeach


                    </tbody>
                </table>
            </div>
            <div class="user-data__footer">
                <button class="au-btn  btn-primary" data-toggle="modal" data-target="#smallmodal">Add more</button>
{{--{{dd($users)}}--}}
            </div>
        </div>
        <!-- END USER DATA-->
    </div>

    <div class="modal fade"  id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true" style="display: none;top: 140px;width: 500px;left: 400px">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header w3-light-gray" >
                    <h5 class="modal-title m-l-150" id="smallmodalLabel" style="font-weight: bold">Add users</h5>
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
                                        @foreach($users as $usr)
                                            <option value="{{$usr->id}}">{{$usr->email}}</option>
                                           @endforeach
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


@endsection

@push('scripts_body')


    <script>


        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush