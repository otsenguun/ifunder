@extends('layouts.master')
@section('content')
    @include('partials.navigation')
    <div class="container">
<div class="col-md-3">
        @include('startup.partials.side-menu')
    </div>


    <div class="col-md-9">
        <h3>Profile</h3>


        <form action="{{url('startup/profile/update')}}" method="post" class="form-horizontal" role="form"  enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{ $data->id }}">
            <div class="kv-avatar center-block text-center" style="width:200px">
                <input id="avatar-1" name="file" type="file" class="file-loading">
                    <div class="help-block"><small>Select file < 1500 KB</small></div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Firstname</label>
                <div class="col-lg-8">
                    <input class="form-control" name="first_name" value= "{{$data->first_name}}" type="text">
                </div>
                 @if($errors->has('first_name'))
                            <span class="help-block">
                                {{$errors->first('first_name')}}
                            </span>
                        @endif
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Lastname</label>
                <div class="col-lg-8">
                    <input class="form-control" name="last_name" value="{{$data->last_name}}" type="text">
                </div>
                 @if($errors->has('last_name'))
                            <span class="help-block">
                                {{$errors->first('last_name')}}
                            </span>
                        @endif
            </div>

    <!--         <div class="form-group">
                <label class="col-md-3 control-label">Email</label>
                <div class="col-lg-3  control-label">
                    <input class="form-control" name="email" value="{{$data->email}}" type="text">
                </div>
            </div> -->
            <div class="form-group">
                <label class="col-md-3 control-label">Phone</label>
                    <div class="col-lg-3  control-label">
                        <input class="form-control" name="phone" value="{{$data->phone}}" type="text">
                    </div>
                     @if($errors->has('phone'))
                            <span class="help-block">
                                {{$errors->first('phone')}}
                            </span>
                        @endif
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Company Name</label>
                <div class="col-lg-3  control-label">
                    <input class="form-control" name="company" value="{{$data->company}}" type="text">
                </div>
                 @if($errors->has('company'))
                            <span class="help-block">
                                {{$errors->first('company')}}
                            </span>
                        @endif
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Web</label>
                <div class="col-lg-3  control-label">
                    <input class="form-control" name="web" value="{{$data->web}}" type="text">

                </div>
                 @if($errors->has('web'))
                            <span class="help-block">
                                {{$errors->first('web')}}
                            </span>
                        @endif
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Address</label>
                <div class="col-lg-3  control-label">
                    <input class="form-control" name="address" value="{{$data->address}}" type="text">
                </div>
                @if($errors->has('address'))
                            <span class="help-block">
                                {{$errors->first('address')}}
                            </span>
                        @endif
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                    <input class="btn btn-primary" value="Save Changes" type="submit">
                    <span></span>
                    <input class="btn btn-default" value="Cancel" type="reset">
                </div>
            </div>
        </form>
</div>
    </div>
    @include('partials.footer')
@endsection
