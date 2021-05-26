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

                                    <li class="list-inline-item seprate">
                                        <span>my profile</span>
                                    </li>

                                </ul>
                            </div>



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

    <div class="page-wrapper m-b-100 p-b-30 p-t-100">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content w3-card-2">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{asset('images/icon/logo.png')}}" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
{{--                            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data" class="au-form-icon" >--}}
                             <form action="{{url('/profile/'.$user->id)}}" method="post" enctype="multipart/form-data" class="au-form-icon" >

                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <div class="">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <div class="">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>image</label>
                                    <div class="">
                                        <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" value="{{ $user->file }}"  autocomplete="file" autofocus>

                                        @error('file')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>description</label>
                                    <div class="">

                                        <textarea id="desc" class="form-control @error('imdescage') is-invalid @enderror" name="desc"  autofocus>{{ $user->desc }}</textarea>
                                        @error('desc')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">update</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
@push('scripts_body')


@endpush