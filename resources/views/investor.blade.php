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
            background-image: url('{{asset('pictures/investidor-anjo.jpg')}}');
            background-size: 100% 100%;">
        <div class="container">
            <div class="row align-middle">
                <div class="col-sm-4">
                    <div style="background-color: #8d170e; opacity: 0.8; filter: alpha(opacity=80); min-height: 250px; min-width:100%; text-align: center; padding-top:10px;">
                        <h1>Angels</h1><br>
                        <div style="text-align: justify;margin-right:30px;margin-left:30px;"><h4 ">With hundreds of
                            companies invested in by iFund members,
                            this is a non-exhaustive display of our members’ impressive track record.</h4>
                            <br></br>
                        </div>

                    </div>
                </div>
                <div class="col-sm-3 ">

                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </div>

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
                                    <img src="uploads/user/profile/angel/image/{{$d->image}}" alt=""/>
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
            </div>
        </div><!--/ End Main Content Box -->
    </div>


    @include('partials/footer')
@endsection