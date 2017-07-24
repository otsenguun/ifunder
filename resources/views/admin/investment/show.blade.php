@extends('admin.layouts.app')

@section('content')
    @include('admin.partials.header')
    @include('admin.partials.side-menu')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                 @if(Session::has('investment_delete'))
                            <p class="alert alert-success">{{ Session::get('investment_delete') }}</p>
                        @endif
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Investment</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">

                            <table class="table table-condensed">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Term of capital</th>
                                    {{--<th></th>--}}
                                    <th style="width: 40px">More</th>
                                </tr>

                                @foreach($data as $d)
                                    <tr>
                                        <td>{{$d->investment_id}}</td>
                                        <td>{{$d->project_month}}</td>
                                        {{--<td>{{$d->project_desc}}</td>--}}

                                        <td style="width: 200px;">
                                            <div class="btn-group">
                                                <a href="{{url('admin/investment/view',[$d->investment_id])}}" class="btn btn-success"><i class="fa fa-pencil-square"></i></a>
                                                
                                                 <form method="POST" action="{{ url('admin/investment/delete', $d->investment_id) }}" class="delete_form">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                
                                                <button id="delete-btn1" class="btn btn-danger btn-md">
                                                    <i class="fa fa-trash delete-white"></i>
                                                </button>
                                            </form>
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