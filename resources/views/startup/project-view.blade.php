@extends('layouts.master')
@section('content')
    @include('partials.navigation')
    <div class="container">
        <div class="col-md-2">
            @include('startup.partials.side-menu')
        </div>
        <div class="col-md-10">
        @if(Session::has('article_delete'))
                            <p class="alert alert-success">{{ Session::get('article_delete') }}</p>
                        @endif
            <h3>My proposal</h3>
            <div class="table-responsive">
            	<table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th><div style="width:70px; overflow:hidden">Proposal Name</div></th>
                    <th><div style="width:90px; height:40px; overflow:hidden">Brief Description</div></th>
                    <th>Location of Startup</th>
                    <th>Select a industry</th>
                    <th>Status of start-up</th>
                    <th>Year of expected revenue generation</th>
                    <th>Total investment($)</th>
                    <th>Own investment ($)</th>
                    <th>Capital needed($)</th>
                    <th>Type of Capital</th>
                </tr>
                </thead>
                <tbody>
                <?php  $i=1;?>
                @foreach($data as $d)

                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><div style="width:70px; overflow:hidden">{{$d->project_name}}</div></td>
                        <td><div style="width:90px; height:40px; overflow:hidden">{{$d->project_desc}}</div></td>
                        <td>{{$d->location_name}}</td>
                        <td>{{$d->sector_name}}</td>
                        <td>{{$d->status_name}}</td>
                        <td>{{$d->project_generation}}</td>
                        <td>{{$d->project_cost}}</td>
                        <td>{{$d->project_own}}</td>
                        <td>{{$d->project_looking}}</td>
                        <td>{{$d->capital_name}}</td>
			<td class ="btn btn-danger">
                            <a href="{{url('/startup/project/edit',[$d->project_id])}}">edit
                            </a>
                             <form method="POST" action="{{ url('startup/project/delete', $d->project_id) }}" class="delete_form">
                                                  {{ csrf_field() }}
                                                  <input type="hidden" name="_method" value="DELETE">
                                                  
                                                  <button class="btn btn-danger btn-md" id="delete-btn">
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
    @include('partials.footer')
@endsection
