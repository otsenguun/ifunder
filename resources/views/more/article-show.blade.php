@extends('layouts.master')

@include('partials/navigation')

<div class="container" style="padding-top: 50px;">
<h1>Articles</h1>
 @foreach($article as $a)
                        <div class="col-md-5 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6" style="padding-top:20px;">
                            <img class="lib-img-show" style="width:220px;height:300px;" src="/public/uploads/article/news/{{$a->image}}">
                        </div>
                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                               <h3> {!! $a->title !!} </h3>
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-desc">{!! $a->body !!}
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    @endforeach

</div>
   @include('partials/footer')