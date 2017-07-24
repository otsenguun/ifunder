@extends('layouts.master')
@section('content')


	@include('partials.navigation')


    <div class="container marketing" style="padding-top: 80px;padding-bottom: 150px;">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
          <a href="{{url('register/startup')}}" ><img class="img-circle" src="{{asset('pictures/startup2_reg.png')}}" alt="Generic placeholder image" width="300" height="100"></a>


        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <a href="{{url('register/investor')}}" ><img class="img-circle" src="{{asset('pictures/angel1_reg.png')}}" alt="Generic placeholder image" width="300" height="100"></a>

        </div><!-- /.col-lg-4 -->
        <div class="col-lg-2"></div>
      </div><!-- /.row -->
    </div>
@include('partials.footer')
@endsection