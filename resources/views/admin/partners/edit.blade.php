@extends('admin.layouts.app')
@section('content')
    @include('admin.partials.header')
    @include('admin.partials.side-menu')
    <div class="content-wrapper">
        <div class="row">
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Event Edit</h4>
                    </div>
                    <div class="panel-body">
                        <form action="{{url('admin/event/update')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <label for="title"> title </label>
                                    <input type="text" name="title" id="title" class="form-control" required value="{{$data->title}}"/>
                                </div>
                                <label for="title">description </label>
                                <textarea id="summernote1" name="body" class="form-control" placeholder="enter image">
                                    {{$data->body}}
                            </textarea>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary pull-right" name="send" id="send" value="save">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
    @include('admin.partials.footer')

@endsection