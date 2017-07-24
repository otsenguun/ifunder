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
                            <h3 class="box-title">Invest Add</h3>
                        </div>
                        <form role="form" action="{{url('admin/invest/update')}}" method="post">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Invest</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="invest"
                                           placeholder="Enter invest">
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