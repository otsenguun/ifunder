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
            background-image: url('{{asset('pictures/partners.png')}}');
            background-size: 100% 100%;">
        <div class="container">
            <div class="row align-middle">
                <div class="col-sm-4">
                    <div style="background-color: #8d170e; opacity: 0.8; filter: alpha(opacity=80); min-height: 250px; min-width:100%; text-align: center; padding-top:10px;">
                        <h1>Partners</h1><br>
                        <div style="text-align: justify;margin-right:30px;margin-left:30px;"><h4 ">With hundreds of
                            companies invested in by iFund members,
                            this is a non-exhaustive display of our members’ impressive track record.</h4>
                            <br></br>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
    <div class="wrapper text-center">
        <div class="one-column-content-block__text-box">
            <h1>Partners</h1>
        </div>
    </div>
    <div class="main-content-box" style="padding-bottom: 60px;"><!-- Start Main Content Box -->
        <div class="wrapper">
            <div class="row">
                @foreach($data as $d)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 services-itemes__box">
                        <h3>{{$d->title}}</h3>
                        <div class="services-itemes__item">
                            <a href="https://{{$d->links}}">
                            <div class="services-itemes__item__overlay">
                                <img src="uploads/partners/news/{{$d->image}}" alt=""/>
                            </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div><!--/ End Main Content Box -->
    @include('partials/footer')
@endsection