@extends('admin.layouts.app')

@section('content')
    @include('admin.partials.header')
    @include('admin.partials.side-menu')
<?php function dazo_substr_small($txt='',$limit = 141){
        $buf = '';
        $k=0; //үсгийн байрлалыг тодорхойлоход ашиглагдана.

        for($i=0;$i<strlen($txt);$i++){

            $k++;

            $buf .= $txt{$i};
            if(ord($txt{$i})>207 && ord($txt{$i})<212){ //крилл үсэг үсэг байх тохиолдолд хийх үйлдэл
                $i++;
                $buf .= $txt{$i};
            }
            if($k>=$limit){ //авах үсгийн хязгаарт хүрмэгч зогсоно
                return $buf;
            }
        }
        return $buf;
    }

    ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <ul class="timeline">
                        <li class="time-label">
                          <span class="bg-red">
                           Proposal
                          </span>
                        </li>
                        <li>
                            <i class="fa fa-user bg-aqua"></i>

                            <div class="timeline-item">
                                <h3 class="timeline-header no-border">
                                    <a>{{$data->first_name}}, {{$data->last_name}}</a>
                                </h3>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-envelope bg-blue"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                <h3 class="timeline-header">Proposal name:   <a>{{$data->project_name}}</a></h3>

                            </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-file bg-aqua"></i>

                            <div class="timeline-item">
                                <h3 class="timeline-header no-border">
                                     <a>Proposal description:</a>
                                </h3>
                                <div class="timeline-body">
                                   {{$data->project_desc}}
                                </div>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-comments bg-yellow"></i>



                            <div class="timeline-item">
                                <div class="timeline-body">
                                    <p>Project Location:<span class="bg-green"> {{$data->location_name}} </span></p>
                                    <p>Sector: {{$data->sector_name}}</p>
                                    <p>Status of project: {{$data->status_name}}</p>
                                    <p>Year of expected revenue generation: {{$data->project_generation}}</p>
                                    <p>Project Cost: {{$data->project_cost}}</p>
                                    <p>Own Investment: {{$data->project_own}}</p>
                                    <p>how much capital are you looking: {{$data->project_looking}}</p>
                                    <p>type of the capital: {{$data->capital_name}}</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-download bg-yellow"></i>
                            <div class="timeline-item">
                                <div class="timeline-body">
                                    <p>File Download: <span class="bg-green"> {{$data->file}} </span></p>
                                    <a href="/uploads/startup/user/project/file/{{$data->file}}" download="{{$data->file}}" class="btn btn-success"><i class="fa fa-download"></i>&nbsp;Download</a>
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