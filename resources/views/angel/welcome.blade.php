@extends('layouts.master')
@section('content')
@include('partials.navigation')
<div class="container">
    <div class="col-md-3">
        @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif
            @if(Session::has('project'))
                <p class="alert alert-success">{{ Session::get('project') }}</p>
            @endif

         @include('angel.partials.side-menu')

    </div>

    <div class="col-md-9">
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="home-r">

                <h3>Profile</h3>

                <div class="row">
                    <div class="col-lg-4">

                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        @if($data->image != null)
                            <img class="img-circle" src="uploads/user/profile/angel/image/{{$data->image}}"
                                 alt="Generic placeholder image" width="140" height="140">
                        @else
                            <img class="img-circle" src="pictures/logo.jpg"
                                 alt="Generic placeholder image" width="140" height="140">
                        @endif
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">

                    </div><!-- /.col-lg-4 -->
                </div>
                <form class="form-horizontal" role="form"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Firstname</label>
                        <div class="col-lg-8">
                            <div class="col-lg-3  control-label" style="text-align: left;">
                                {{ Sentinel::getUser()->first_name }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Lastname</label>
                        <div class="col-lg-8">
                            <div class="col-lg-3  control-label" style="text-align: left;">
                                {{ Sentinel::getUser()->last_name }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Email</label>
                        <div class="col-lg-3  control-label" style="text-align: left;">
                            {{ Sentinel::getUser()->email }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Phone</label>
                        <div class="col-md-8">
                            <div class="col-lg-3  control-label" style="text-align: left;">
                               {{$data->phone}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Company Name</label>
                        <div class="col-lg-3  control-label" style="text-align: left;">
                            {{$data->company}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Web</label>
                        <div class="col-lg-3  control-label" style="text-align: left;">
                            {{$data->web}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Address</label>
                        <div class="col-lg-3  control-label" style="text-align: left;">
                            {{$data->address}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <div class="col-md-6 col-md-offset-4">

                                <a class="btn btn-danger" href="{{url('angel/profile/edit',[$data->id])}}">Edit</a>
                            </div>

                            <span></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('partials.footer')
@endsection
