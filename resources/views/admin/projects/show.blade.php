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
                    <div class="box">
                        @if(Session::has('project_delete'))
                            <p class="alert alert-success">{{ Session::get('project_delete') }}</p>
                        @endif
                        <div class="box-header">
                            <h3 class="box-title">Proposal</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">

                            <table class="table table-condensed">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Proposal name</th>
                                    <th>Company name</th>
                                    <th>Proposal descrption</th>

                                    <th style="width: 40px">More</th>
                                </tr>

                                @foreach($data as $d)
                                    {{--{{dump($d)}}--}}
                                    <tr>
                                        <td>{{$d->project_id}}</td>
                                        <td>{{$d->project_name}}</td>
                                        <td>{{$d->company}}</td>
                                        <td>{{dazo_substr_small($d->project_desc,100)}}</td>

                                        <td style="width: 200px;">
                                            <div class="btn-group">
                                                <a href="{{url('admin/projects/view',[$d->project_id])}}" class="btn btn-success"><i class="fa fa-pencil-square"></i></a>
                                                <form method="POST" action="{{ url('admin/project/delete', $d->project_id) }}" class="delete_form">
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