@extends('layouts.master')
@section('content')
@include('partials.navigation')
<div class="container">
    <div class="col-md-3">
        @include('startup.partials.side-menu')
    </div>


    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">Add Proposal</div>
            <div class="panel-body">


                <form class="form-horizontal" role="form" method="POST"
                      action="{{ url('startup/profile/addproject/update') }}"  enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Proposal Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="project_name" >
                        </div>
                        @if($errors->has('project_name'))
                            <span class="help-block">
                                {{$errors->first('project_name')}}
                            </span>
                        @endif
                    </div>


                    <div class="form-group{{ $errors->has('project_desc') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Brief Description</label>

                        <div class="col-md-6">

                            <textarea class="form-control" id="exampleTextarea" rows="5" name="project_desc" maxlength="3000">

                            </textarea>


                        </div>
                        @if($errors->has('project_desc'))
                            <span class="help-block">
                                {{$errors->first('project_desc')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Location of Startup</label>

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
                        <label for="name" class="col-md-4 control-label">Select a industry</label>

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
                        <label for="name" class="col-md-4 control-label">Status of start-up</label>

                        <div class="col-md-6">
                            <select class="form-control" name="status_id" id="brand_id">
                                
                                @foreach($status as $brand)
                                    <option value="{{ $brand->id }}"
                                            @if ( old('status_id') == $brand->id)
                                            selected="selected"
                                            @endif >
                                        {{ $brand->status_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Year of expected revenue generation</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="year">


                        </div>
                         @if($errors->has('year'))
                            <span class="help-block">
                                {{$errors->first('year')}}
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Total investment($)</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="cost" >


                        </div>
                        @if($errors->has('cost'))
                            <span class="help-block">
                                {{$errors->first('cost')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('own') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Own investment ($)</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="own">


                        </div>
                        @if($errors->has('own'))
                            <span class="help-block">
                                {{$errors->first('own')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('looking') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Capital needed($)</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="looking" >

                        </div>
                        @if($errors->has('looking'))
                            <span class="help-block">
                                {{$errors->first('looking')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Type of capital</label>

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
                     <div class="form-group">
                        <label for="name" class="col-md-4 control-label">File uploads</label>
                       <div class="col-md-6">

                           <input type="file" id="exampleInputFile" name="file">
                           <p class="help-block">choose .pdf,.doc,.xlsl.</p>
                       </div>
                        @if($errors->has('file'))
                            <span class="help-block">
                                {{$errors->first('file')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-danger">
                                Add Proposal
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