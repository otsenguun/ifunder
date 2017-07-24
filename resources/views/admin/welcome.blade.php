@extends('admin.layouts.app')
@section('content')
    @include('admin.partials.header')
    @include('admin.partials.side-menu')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="{{url('admin/users/show')}}"><div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php
                                $startup = DB::table('role_users')
                                ->join('roles','roles.id','=','role_users.role_id')
                                ->join('users','users.id','=','role_users.user_id')
                                ->select('*')
                                ->where('roles.slug','=','startup')
                                //->where('role_users.role_id','=','roles.id')
                                ->get();
                                
                            ?>
                            {!! count($startup); !!}
                            </h3>

                            <p>Total Start-Ups</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{url('admin/users/show')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div></a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="{{url('admin/users/show')}}"><div class="small-box bg-green">
                        <div class="inner">
                            <h3>
                            <?php
                                $startup = DB::table('role_users')
                                ->join('roles','roles.id','=','role_users.role_id')
                                ->join('users','users.id','=','role_users.user_id')
                                ->select('*')
                                ->where('roles.slug','=','angel')
                                //->where('role_users.role_id','=','roles.id')
                                ->get();
                                
                            ?>
                            {!! count($startup); !!}
                            </h3>

                            <p>Total Angels</p>
                        </div></a>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{url('admin/users/show-angel')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="{{url('admin/users/show')}}"><div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                                <?php
                                $startup = DB::table('role_users')
                                ->join('roles','roles.id','=','role_users.role_id')
                                ->join('users','users.id','=','role_users.user_id')
                                ->select('*')
                                ->where('roles.slug','=','startup')
                                ->where('users.success',1)
                                //->where('role_users.role_id','=','roles.id')
                                ->get();
                                
                            ?>
                            {!! count($startup); !!}
                            </h3>

                            <p>Approved Start-Ups</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div></a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="{{url('admin/users/show')}}"><div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                            <?php
                                $startup = DB::table('role_users')
                                ->join('roles','roles.id','=','role_users.role_id')
                                ->join('users','users.id','=','role_users.user_id')
                                ->select('*')
                                ->where('roles.slug','=','angel')
                                ->where('users.success',1)
                                //->where('role_users.role_id','=','roles.id')
                                ->get();
                                
                            ?>
                            {!! count($startup); !!}
                                
                            </h3>

                            <p>Approved Angels</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div></a>
                </div>
                <!-- ./col -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('admin.partials.footer')

@endsection