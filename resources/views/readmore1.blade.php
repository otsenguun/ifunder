@extends('layouts.master')
@section('content')
@include('partials/navigation')

<div class="container" style="padding-top: 50px;">
<div class="col-md-12" style="background-color: #fFF;">

<div class="col-md-2"></div>
<div class="col-md-8">
<div class="blog-post"><!-- Start blog Post -->
							<h3>{{$data->title}}</h3>
							<ul class="post-meta">
								<li>Published by <a href="#" title="27 May, 2017">27 May, 2017</a></li>
								<li>Posted by <a href="#" title="Mks Weltman">Mks Weltman</a></li>
								<li>In <a href="#" title="Business">Business</a>, <a href="#" title="Finance">Finance</a></li>
							</ul>
							
							<img src="/public/uploads/event/news/{{$data->image}}" alt="">
							<p>Express is set off to do the things our clients want in a Web Development company. Which is to provide the most reliable service, coupled with the most sophisticated and modern technology available.</p>

							<p>{{$data->body}}</p>
							<div class="btn btn-danger"> <a href="/public">Back</a></div>
							
 </div>
 <div class="col-md-2"></div>
</div>
</div>
</div>
   @include('partials/footer')
   @endsection