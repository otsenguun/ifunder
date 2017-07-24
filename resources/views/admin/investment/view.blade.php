@extends('admin.layouts.app')

@section('content')
    @include('admin.partials.header')
    @include('admin.partials.side-menu')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <ul class="timeline">
                        <li class="time-label">
                          <span class="bg-red">
                           Investment
                          </span>
                        </li>

                        {{--<li>--}}
                            {{--<i class="fa fa-envelope bg-blue"></i>--}}

                            {{--<div class="timeline-item">--}}
                                {{--<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>--}}

                                {{--<h3 class="timeline-header">project name:   <a>{{$data->project_name}}</a></h3>--}}

                            {{--</div>--}}
                        {{--</li>--}}
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-user bg-aqua"></i>

                            <div class="timeline-item">
                                <h3 class="timeline-header no-border">
                                    <a>{{$data->first_name}}, {{$data->last_name}}</a>
                                </h3>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-comments bg-yellow"></i>



                            <div class="timeline-item">
                                <div class="timeline-body">
                                    <p>Location: {{$data->location_name}}</p>
                                    <p>Where would you like to invest: {{$data->invest_name}}</p>
                                    <p>In which sector would you like to invest: {{$data->sector_name}}</p>
                                    <p>How much are you looking to invest (Million SGD): {{$data->project_name}}&nbsp;From &nbsp;{{$data->project_desc}}</p>
                                    <p>Type of capital you provide: {{$data->capital_name}}</p>
                                    <p>Term of capital (Months): {{$data->project_looking}}&nbsp; Months to &nbsp; {{$data->project_month}}&nbsp; Months</p>
                                </div>
                            </div>
                        </li>
<li>
                            <i class="fa fa-download bg-yellow"></i>
                            <div class="timeline-item">
                                <div class="timeline-body">
                                    <p>File Download: <span class="bg-green"> {{$data->file}} </span></p>
                                    <a href="/uploads/angel/user/project/file/{{$data->file}}" download="{{$data->file}}" class="btn btn-success"><i class="fa fa-download"></i>&nbsp;Download</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    @include('admin.partials.footer')
@endsection