@extends('layouts.master')

@include('partials/navigation')

<div class="container" style="padding-top: 50px;">
<h1>Events</h1>
 @foreach($event as $v)
  
   
  
    <div class="col-md-5 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6" style="padding-top:20px;">
                            <img class="lib-img-show" style="width:220px;height:300px;" src="/public/uploads/event/news/{{$v->image}}" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                              <a href="{{url('readmore',[$v->id])}}"><h3> {!! $v->title !!} </h3></a>
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-desc">{!! $v->body !!}
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                        @endforeach
</div>
   @include('partials/footer')