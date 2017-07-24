@extends('layouts.master')

@section('content')
    <div class="container"style="padding-top: 60px;padding-bottom:60px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">iFund</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <p>click on the link to reset your password
                                <a href="{{env('APP_URL')}}/reset/{{$user->email}}/{{$code}}">
                                    reset password
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


