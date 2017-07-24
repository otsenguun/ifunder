@extends('layouts.master')

@section('content')
    @include('partials/navigation')
    <div class="container"style="padding-top: 60px;padding-bottom:60px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(Session::has('startup'))
                    <p class="alert alert-warning">{{ Session::get('startup') }}</p>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Forgot Password</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{url('forget/password/post')}}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                @endif
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" placeholder="enter your email" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input type="submit" value="send code" class="btn btn-danger ">
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


