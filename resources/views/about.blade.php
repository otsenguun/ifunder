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

<div style="position: relative; color: #ffffff;min-height: calc( 100% - 50px ); display: flex; align-items: center; background-image: url('pictures/about2.jpg'); background-size: 100% 100%;">
    <div class="container">
        <div class="row align-middle">
            <div class="col-sm-5">
                <div style="background-color: #8d170e; opacity: 0.8; filter: alpha(opacity=80); min-height: 250px; min-width:100%; text-align: center; padding-top:10px;">
                    <h1>About us</h1><br>
                    <div style="text-align: justify;margin-right:30px;margin-left:30px;"><h4 ">iFund is a subsidiary company of Breakthrough Resources Ptd, established since 2013. iFund is a leading angel investment network that aims to promote the development of a vibrant angel investing community in Singapore and China. This is done through our networking events, educational workshops and conferences that we hold to facilitate an active angel networking ecosystem. Our niche lies in help Singapore start-ups have access to the China market as part of their developmental growth.</h4>
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
<div style="background-color:#8d170e; min-width:100%; min-height:150px; color:#ffffff; font-family:Helvetica; font-size:16pt; font-weight:500;padding-top:50px; padding-bottom:50px; line-height:24pt;">
    <div class="container">
        <div class="row">

            <div class="col-sm-6" style="text-align:right;text-align: justify;">
                <h2 style="text-align: left;">OBJECTIVES</h2>
                iFund was established by a group of Singapore-based angel investors who are keen to help start-ups achieve traction and to meet their goals of value-creation to the community. iFund investors have a close networks of angel groups in China, Indonesia and Vietnam predominantly and close links to other regions in Southeast Asia.
            </div>


            <div class="col-sm-6" style="text-align:left; text-align: justify;">

                <p><strong>iFund is committed to achieving the following objectives:</strong></p>
                <ul>
                    <li>Provide a platform for entrepreneurs to articulate their investment proposal.</li>
                    <li>Strengthen the cohesion of the local angel community.</li>
                    <li>Generate quality deal flows for our members through a rigorous screening process.</li>
                    <li>Assist our members in deal syndication and limited due diligence.</li>
                    <li>Provide training and mentoring for rookie business angels and fresh entrepreneurs.</li>
                </ul>
            </div>


        </div>
    </div>
</div>
<hr style="margin: 0;">
    @include('partials/footer')
@endsection