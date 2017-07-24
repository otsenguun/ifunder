@extends('layouts.master')
@section('content')
    @include('partials.navigation')
    <div class="container">
 <div class="col-md-3">
         @include('angel.partials.side-menu')

    </div>

    <div class="col-md-9">
        @if(Session::has('investment'))
            <p class="alert alert-success">{{ Session::get('investment') }}</p>
        @endif
        <h3>My interest</h3>
        <table class="table">
            <thead>
                <tr>
             
                    <th>Location interested</th>
                    <th>Ownership interested</th>
                    <th>Industry</th>
                    <th colspan="3">Investment($)</th>
                    <th>Type of capital</th>
                    <th colspan="3">Term of capital (Months)</th>

                </tr>
            </thead>
            <tbody>
            @foreach($data as $d)
                <tr>
                   
                    <td>{{$d->location_name}}</td>
                    <td>{{$d->invest_name}}</td>
                    
                    <td>{{$d->sector_name}}</td>
                    <td>{{$d->project_name}}</td>
                    <td> to </td>
                    <td>{{$d->project_desc}}</td>
                    <td>{{$d->capital_name}}</td>
                    <td>{{$d->project_looking}}</td>
                    <td> Months to </td>
                    <td>{{$d->project_month}}</td>
                     <td class ="btn btn-danger">
                        <a href="{{url('angel/project/edit',[$d->investment_id])}}">edit
                        </a>
                        <form method="POST" action="{{ url('angel/project/delete', $d->investment_id) }}" class="delete_form">
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
    @include('partials.footer')
@endsection
