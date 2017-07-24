@extends('admin.layouts.app')

@section('content')
    @include('admin.partials.header')
    @include('admin.partials.side-menu')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Status of Start-ups</h3>
                        </div>
                        <form role="form" action="{{url('admin/status/update')}}" method="post">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status of Start-ups</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="status"
                                           placeholder="Enter location">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('admin.partials.footer')
@endsection