@extends('layouts.master')
@section('content')
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
    @include('partials/navigation')
    <div style="position: relative; color: #ffffff;min-height:
     calc( 100% - 50px ); display: flex; align-items: center;
     background-image: url('pictures/about.jpg');
     background-size: 100% 100%;">
        <div class="container">
            <div class="row align-middle">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 ">
                    <div style="background-color: #8d170e; opacity: 0.8; filter: alpha(opacity=80); min-height: 250px; min-width:100%; text-align: center; padding-top:10px;">
                        <h1>Southeast Asia’s leading angel investing network</h1><br>
                        <div style="text-transform: none ; text-align: justify;margin-right:100px;margin-left:100px;"><h4>
                                iFund is a leading angel investment network that aims to promote the
                                development of a vibrant angel investing community in Singapore and China.</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </div>
    <div style="background-color:#8d170e; min-width:100%; min-height:150px; color:#ffffff; font-family:Helvetica; font-size:16pt; font-weight:500;padding-top:50px; padding-bottom:50px; line-height:24pt;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6" style="text-align:right;text-align: justify;">
                    iFund was established by a group of Singapore-based angel investors who are keen to help start-ups achieve traction and to meet their goals of value-creation to the community. iFund investors have a close networks of angel groups in China, Indonesia and Vietnam predominantly and close links to other regions in Southeast Asia.
                </div>
                <div class="col-sm-6" style="text-align:left; text-align: justify;">
                    This is done through our networking events, educational workshops and conferences that we hold to facilitate an active angel networking ecosystem. Our niche lies in help Singapore start-ups have access to the China market as part of their developmental growth.
                </div>
            </div>
        </div>
    </div>

    {{--<div id="Specialties" class="common-content-panel bg-color-black panel-extra-padding panel-padding--left--right"><!-- Start Specialties Panel -->--}}
        {{--<div class="tow-column-content-block">--}}
            {{--<div class="wrapper">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-xs-12 col-sm-4 tow-column-content-block__image text-center">--}}
                        {{--<img src="images/icon-music-big.png" alt=""/>--}}
                    {{--</div>--}}
                    {{--<div class="col-xs-12 col-sm-8">--}}
                        {{--<div class="tow-column-content-block__text-box">--}}
                            {{--<h1>Our Specialties</h1>--}}
                            {{--<p>Express web app developers will morph your great ideas into workable web solutions. With top-talent web application development skills on board, our company will craft compelling web apps and jump-start your business. Our collaborative and principal activities include local, national and international web development and maintenance services.</p>--}}
                            {{--<p class="learn-more"><a href="#">Learn More</a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div><!--/ End Specialties Panel -->--}}

    <div id="common-content-panel" class="common-content-panel bg-color-gray panel-extra-padding panel-padding--left--right"
         style="padding-top: 60px;"><!-- Start Content Panel -->
        <div class="one-column-content-block"><!-- Start One Column Content Block -->
            <div class="wrapper text-center">
                <div class="one-column-content-block__text-box">
                    <h1>Start Ups</h1>
                    <p>
                        With hundreds of
                        companies invested in by iFund members,
                        this is a non-exhaustive display of our members’ impressive track record.
                    </p>
                </div>
            </div>
        </div><!-- Start One Column Content Block -->

        <div class="main-content-box" style="padding-bottom: 60px;"><!-- Start Main Content Box -->
            <div class="wrapper">
                <div class="row">
                    @foreach($data as $d)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 services-itemes__box">
                        <div class="services-itemes__item">
                            <div class="services-itemes__item__overlay">
                                <a href="https://{{$d->web}}"><img src="uploads/user/profile/image/{{$d->image}}" alt=""/></a>
                            </div>
                            <div class="services-itemes__item__hidden-item">
                                <div class="services-itemes__item__hidden-item__content">
                                    <a href="https://{{$d->web}}" class="more-item">Wordpress Theme</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <center><p class="btn btn-danger"><a href="{{url('/startup-show')}}" style="font-size:30px;">More</a></p></center>


        </div><!--/ End Main Content Box -->
    </div>

    <!-- Start Blog Content Panel -->
    <div class="main-content-box">
        <div class="wrapper">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h1>E V E N T S</h1>
                    @foreach($event as $v)
                    <div class="well"style="background-color: #fff;
    border: none;
    border-radius: 0;">
                        <div class="media">
                            <a class="pull-left" href="{{url('readmore',[$v->id])}}">
                                <img class="media-object" style="width:150px;height:150px;" src="uploads/event/news/{{$v->image}}">


                            </a>
                            <div class="media-body">
                                <h4 class="media-heading" style="max-height: 25px;">{!! $v->title !!}</h4>

                                <p style="max-height: 65px;">{!! dazo_substr_small($v->body,300) !!}   </p>

                            </div>
<p class="learn-more"><a href="{{url('readmore',[$v->id])}}" title="READ MORE" style="width: 120px;float:right;">READ MORE</a></p>

                        </div>
                    </div>
                        @endforeach
                    {{--@foreach($event as $v)--}}
                    {{--<div class="blog-post"><!-- Start blog Post -->--}}
                        {{--<h3><a class="post-title" href="">{!! $v->title !!}</a></h3>--}}
                        {{--@if($v->image != null)--}}
                            {{--<a href="" title="Big Ideas for Small Business" class="post-image">--}}
                                {{--<img src="uploads/event/news/{{$v->image}}" alt="">--}}
                            {{--</a>--}}
                        {{--@else--}}
                            {{--<a href="" title="Big Ideas for Small Business" class="post-image">--}}
                                {{--<img src="{{asset('assets/theme/images/portfolio-1.jpg')}}" alt="">--}}
                            {{--</a>--}}
                        {{--@endif--}}

                        {{--<p class="margin-0">{!! dazo_substr_small($v->body,300) !!}--}}
                        {{--</p>--}}
                        {{--<p class="learn-more"><a href="" title="READ MORE">READ MORE</a></p>--}}
                    {{--</div><!--/ End blog Post -->--}}
                    {{--@endforeach--}}
                </div>


                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h1>A R T I C L E S</h1>
                    @foreach($article as $a)
                        <div class="well"style="background-color: #fff;
    border: none;
    border-radius: 0;">
                            <div class="media">
                                <a class="pull-left" href="{{url('readmore1',[$a->id])}}">
                                    <img class="media-object" style="width:150px;height:150px;" src="uploads/article/news/{{$a->image}}">


                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading" style="max-height: 25px;" >{!! $a->title !!}</h4>

                                    <p style="max-height: 65px;">{!! dazo_substr_small($a->body,300) !!}</p>

                                </div>
<p class="learn-more"><a href="{{url('readmore1',[$a->id])}}" title="READ MORE" style="width: 120px;float:right;">READ MORE</a></p>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div><!--/ End Main Content Box -->
    <div id="common-content-panel" class="common-content-panel bg-color-gray panel-extra-padding panel-padding--left--right"
         style="margin-top: 60px;"><!-- Start Content Panel -->
        <div class="one-column-content-block" style="padding-top: 50px;"><!-- Start One Column Content Block -->
            <div class="wrapper text-center">
                <div class="one-column-content-block__text-box">
                    <h1>Angels</h1>
                </div>
            </div>
        </div><!-- Start One Column Content Block -->

        <div class="main-content-box" style="padding-bottom: 50px;"><!-- Start Main Content Box -->
            <div class="wrapper">
                <div class="row">
                    @foreach($data1 as $d)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 services-itemes__box">
                        <div class="services-itemes__item">
                            <div class="services-itemes__item__overlay">
                                <a href="https://{{$d->web}}"><img src="uploads/user/profile/angel/image/{{$d->image}}" alt=""/></a>
                            </div>
                            <div class="services-itemes__item__hidden-item">
                                <div class="services-itemes__item__hidden-item__content">
                                    <a href="https://{{$d->web}}" class="more-item"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <center><p class="btn btn-danger"><a href="{{url('/investor-show')}}" style="font-size:30px;">More</a></p></center>

            </div>
        </div><!--/ End Main Content Box -->
    </div>

 <div id="common-content-panel" class="common-content-panel bg-color-gray panel-extra-padding panel-padding--left--right"
         style="padding-top:0;background: #ddd;"><!-- Start Content Panel -->
        <div class="one-column-content-block" style="padding-top: 50px;"><!-- Start One Column Content Block -->
            <div class="wrapper text-center">
                <div class="one-column-content-block__text-box">
                    <h1>Partners</h1>
                </div>
            </div>
        </div><!-- Start One Column Content Block -->

        <div class="main-content-box" style="padding-bottom: 50px;"><!-- Start Main Content Box -->
            <div class="wrapper">
                <div class="row">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($partners as $p)
                                <div class="swiper-slide" style="width: 150px!important;">
                                    <img width="150" height="150" src="uploads/partners/news/{{$p->image}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/ End Main Content Box -->
    </div>
    @include('partials/footer')
@endsection