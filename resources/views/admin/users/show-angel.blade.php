@extends('admin.layouts.app')

@section('content')
    @include('admin.partials.header')
    @include('admin.partials.side-menu')
    <style>

    </style>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
			@if(Session::has('user_delete'))
                            <p class="alert alert-success">{{ Session::get('user_delete') }}</p>
                        @endif

                        <div class="box-header">
                            <h3 class="box-title">Angels users</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">

                            <table class="table table-condensed">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th style="width: 40px">More</th>
                                </tr>
                                @foreach($investor as $d)
                                    <tr>
                                        <td>{{$d->id}}</td>
                                        <td>{{$d->first_name}}</td>
                                        <td>{{$d->last_name}}</td>
                                        <td>{{$d->email}}</td>
                                        <td style="width: 300px;">
                                            <form  style="width: 40%;float: left;" role="form" method="POST" action="{{url('admin/user/investor/success/add',[$d->id])}}">
                                                {{ csrf_field() }}
                                                @if($d->success == 1)
                                                    <input type="submit" class="btn btn-warning" name="success1" value="Unapprove">
                                                @else
                                                    <input type="submit" class="btn btn-success"  name="success" value="Approve">
                                                @endif
                                               
                                            </form>
                                             <form style="width: 60%;float: right;" method="POST" action="{{ url('admin/users/delete', $d->id) }}" class="delete_form">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                
                                                <button id="delete-btn1" class="btn btn-danger btn-md">
                                                    <i class="fa fa-trash delete-white"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('admin.partials.footer')
@endsection

