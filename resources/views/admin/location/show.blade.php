@extends('admin.layouts.app')

@section('content')
    @include('admin.partials.header')
    @include('admin.partials.side-menu')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <a href="{{url('admin/location/add')}}">
                            <button type="button" class="btn btn-block btn-primary">Add</button></a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box">

                        <div class="box-header">
                            <h3 class="box-title">Locations</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">

                            <table class="table table-condensed">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Location name</th>

                                        <th style="width: 40px">More</th>
                                    </tr>
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$d->id}}</td>
                                        <td>{{$d->location_name}}</td>
                                        <td style="width: 200px;">
                                            <div class="btn-group">
                                                <a href="" class="btn btn-success"><i class="fa fa-pencil-square"></i></a>
                                                <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                               </tbody>
                            </table>

                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>

@include('admin.partials.footer')
@endsection