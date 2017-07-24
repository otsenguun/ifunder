@extends('admin.layouts.app')

@section('content')
    @include('admin.partials.header')
    @include('admin.partials.side-menu')
    <div class="content-wrapper">
        <section class="content">
            <div class="col-md-2">
                <div class="form-group">
                    <a href="{{url('admin/capital/show')}}">
                        <button type="button" class="btn btn-block btn-primary">back</button></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Location Add</h3>
                        </div>
                        <form role="form" action="{{url('admin/capital/update')}}" method="post">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Location</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="capital"
                                           placeholder="Enter location">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('admin.partials.footer')
@endsection