@extends('layouts.master')
@section('content')
    @include('partials.navigation')
    <div class="container">
        <div class="col-md-3">
            @include('angel.partials.side-menu')

        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">An Angel investor Edit</div>
                <div class="panel-body">


                    <form class="form-horizontal" role="form" method="POST"
                          action="{{ url('angel/project/change') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="project_id" value="{{$data->investment_id}}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">I like to invest in</label>

                            <div class="col-md-6">
                                <select class="form-control" name="location_id" id="brand_id">

                                    @foreach($location as $brand)
                                        <option value="{{ $brand->id }}"
                                                @if ( old('location_id') == $brand->id)
                                                selected="selected"
                                                @endif >
                                            {{ $brand->location_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">I like to invest in</label>

                            <div class="col-md-6">
                                <select class="form-control" name="invest_id" id="brand_id">

                                    @foreach($invest as $brand)
                                        <option value="{{ $brand->id }}"
                                                @if ( old('invest_id') == $brand->id)
                                                selected="selected"
                                                @endif >
                                            {{ $brand->invest_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">I am Interested in</label>

                            <div class="col-md-6">
                                <select class="form-control" name="sector_id" id="brand_id">

                                    @foreach($sector as $brand)
                                        <option value="{{ $brand->id }}"
                                                @if ( old('sector_id') == $brand->id)
                                                selected="selected"
                                                @endif >
                                            {{ $brand->sector_name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">I am looking to invest($)
                            </label>

                            <div class="col-md-2">
                                <input id="name" type="number" class="form-control" name="usg" max="10000000" required autofocus
                                       value="{{$data->project_name}}">
                            </div>
                            <div class="col-md-2">
                                <label>to</label>
                            </div>
                            <div class="col-md-2">
                                <input id="name" type="number" class="form-control" name="usg1" max="10000000" required autofocus
                                value="{{$data->project_desc}}">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Type of capital I provide</label>

                            <div class="col-md-6">
                                <select class="form-control" name="capital_id" id="brand_id">

                                    @foreach($capital as $brand)
                                        <option value="{{ $brand->id }}"
                                                @if ( old('capital_id') == $brand->id)
                                                selected="selected"
                                                @endif >
                                            {{ $brand->capital_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Term of capital (Months)</label>
                            <div class="col-md-2">
                                <input id="name" type="number" class="form-control" name="cost"  max="10000000"
                                       required autofocus value="{{$data->project_looking}}" >
                            </div>
                            <div class="col-md-2">
                                <p>Months to</p>
                            </div>
                            <div class="col-md-2">
                                <input id="name" type="number" class="form-control" name="cost1" max="10000000" required autofocus
                                       value="{{$data->project_month}}">
                            </div>
                            <div class="col-md-2">
                                <p>Months</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">File uploads</label>
                            <div class="col-md-6">

                                <input type="file" id="exampleInputFile" name="file"  autofocus>
                                <p class="help-block">choose .pdf,.doc,.xlsl.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-danger">
                                    Submit Interest
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection