@extends('layouts.master')

@section('content')
    @include('partials/navigation')
    <div class="container"style="padding-top: 60px;padding-bottom:60px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Reset Password</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                {{--@if(count($errors) > 0)--}}
                                    {{--<div class="alert alert-danger">--}}
                                        {{--<ul>--}}
                                            {{--@foreach($errors->all() as $error)--}}
                                                {{--<li>--}}
                                                    {{--{{$error}}--}}
                                                {{--</li>--}}
                                            {{--@endforeach--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--@endif--}}

                                <label for="email" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" placeholder="enter password" name="password" value="{{ old('password') }}" required autofocus>

                                    @if ($errors->has('possword'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                @endif
                                <label for="email" class="col-md-4 control-label">Password Confirmation</label>

                                <div class="col-md-6">
                                    <input  type="password" class="form-control" placeholder="enter confirmation password" name="password_confirmation" value="{{ old('password') }}" required autofocus>

                                    @if ($errors->has('possword'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input type="submit" value="update password reset" class="btn btn-danger ">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials/footer')
@endsection


