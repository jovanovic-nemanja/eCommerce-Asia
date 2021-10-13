@extends('fontend.master3')
@section('content')
<div class="row" style="margin-top:20px;">
    <div class="col-sm-6">
       <p><a href="#">Home </a> <i class="fa fa-angle-double-right"></i> Easy Sourcing</p>
        
    </div>
    <div class="col-sm-6">
        <a href="{{URL::to('Sourcing/Requests/info/buyer',null)}}"  style="float:right;color: #246bb3;font-size: 14px;font: 12px/1.5 Arial,sans-serif;font-weight: bold;">
        I am Buyer</a>
    </div>
</div>

<div class="row" style="margin-top:10px;">
       <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active" style="border-radius:10px !important; border:0 none;"></li>
                <li data-target="#carousel" data-slide-to="1" style="border-radius:10px !important; border:0 none;"></li>
                <li data-target="#carousel" data-slide-to="2" style="border-radius:10px !important; border:0 none;"></li>
            </ol>
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="active item"><img src="{!! asset('assets/fontend/bdtdc-images/buyer1-big-pic2.jpg') !!}" alt="seller1" style="width=100%; max-height:370px;"></div>
                
                <div class="item"><img src="{!! asset('assets/fontend/bdtdc-images/buyer-big-pic2.jpg') !!}" alt="seller2" style="width:100%; max-height:370px;"></div>
                <div class="item"><img src="{!! asset('assets/fontend/bdtdc-images/buyer-big-pic3.jpg') !!}" alt="seller3" style="width:100%; max-height:370px;"></div>
            
            </div>
            <!-- Carousel nav -->
            <!--<a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>-->
            <!--<a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>-->
</div>

</div>
<div class="row parent" style="background-color:#fff; padding-bottom:20px;">
        <div class="title-h3">
            <p style="margin-top: 30px;margin-bottom: 5px;font-size: 16px;color: #222;font-weight: 700;text-align: left;padding-left:10px;">
                Urgent Sourcing Requests
            </p>
        </div>
        <div class="product-title">
            <ul class="title-name">
                <li style="margin-left:5%;">Product Name</li>
                <li>Purchase Quantity</li>
                <li>Country/Region</li>
                <li>Quote Left</li>
            </ul>
        </div>

        @foreach($quotations as $data)
        <div class="product-des chield">
            <ul class="title-name">
                <li class="product-des-li" style="margin-left:5%;font-size:12px; color:#000; cursor:pointer;"><a target="_blank" href="{{ URL::to('sourceing/view',$data->id) }}">{{ $data->product_name }}</a></li>
                <li class="product-des-li">{{ $data->pro_quantity }}</li>
                <li class="product-des-li"><img class="li-img" src="{!! asset('assets/fontend/bdtdc-images/bangladesh.jpg') !!}" alt="trade answer">{{ $data->country_name}}</li>
                <li class="product-des-li">20</li>
            </ul>
            
        </div>
        @endforeach
       
       
        
</div>
 <a href="#" style="float:right  ;">View More></a>


@stop

@section('scripts')
    <script>
        (function(){
            setInterval(function(){
    	    	$(".parent .chield:first").slideUp(200, function () {
    	            $(this).appendTo($(".parent")).slideDown();
    	        });
    	    },2000);
            
        })()
    </script>
@stop