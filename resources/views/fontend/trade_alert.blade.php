<?php 
use App\Model\BdtdcProductImageNew;
?>
@extends('fontend.master-dashboard')
	@section('content')
	
<div class="container">
	 @if (Sentinel::check())
            <?php
              $role = App\Model\Role_user::where('user_id',Sentinel::getUser()->id)->first();
              $dashboard_route = ($role->role_id ==3) ? "company/dashboard" : 'buyer/dashbord';
            ?>
        @endif

    <div class="row" style="padding-bottom: 0.5%">

    </div>

<div class="row" style="padding-top: 1%;padding-bottom: 0.5%">
        <div class="col-lg-12 col-md-12 padding_0">
            <ul  style="margin-left: -2%;float: left;"><li style="float: left">
            <a itemprop="url" href="{{ URL::to($dashboard_route,null)}}" style="color: #000">
            My Dashboard
            </a> <i class="fa fa-angle-right"></i> </li>
            <li style="float: left">
            <a itemprop="url" href="" style="color: #000">
               <strong> Favorite Product</strong>
            </a> <i class="fa fa-angle-right"></i></li>
           
            </ul>
            <ul style="float:right;margin-left: -2%" itemscope itemtype="http://schema.org/BreadcrumbList">
        	<button class="goBack" onclick="goBack()" style="padding: 0;"><span>Go Back</span></button>
      	</ul>
        </div>
    </div>
	<div class="row" id="row" style="margin-bottom: 2%;background-color: #eceef2" >
		<div class="col-sm-12 padding_0">
			<div class="col-sm-2 padding_0">
					@include('fontend.layouts.dashboard-aside')


			</div>

			

			<div class="col-sm-10" style="padding-right: 0px">

				<div id="col-sm-12">
                    <h1 style="margin-top: 0; margin-bottom: 10px; padding: 10px 0;font-size: 15px;font-weight: bold;">Recommended product for you</h1>
					@if($main_product_search)
                        @if(count($main_product_search)>0)
                            <div class="col-sm-12 col-lg-12 col-md-12" style=" background-color: #fafafa; border-right: 1px solid #ddd; padding: 0; border-bottom: 1px solid #ddd; ">
                                @foreach($main_product_search as $data)
                                <div class="col-sm-3 col-md-3 col-lg-3 col-xs-6" style="border:1px solid #ddd; border-right:0 none; border-bottom:0 none;">
                                    <div class="product-box sup-head-col" onMouseOver="show_getquation_bar()" onMouseOut="hide_getquation_bar()" style="width: 100%; border: 0 none;background-color: #fff;" itemscope itemtype="http://schema.org/Product">
                                        <div class="cat-product-img-box">
                                            @if($data->proimages_new)
                                            <a itemprop="url" target="_blank" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$data->name).'='.mt_rand(100000000, 999999999).$data->product_id) }}"><img src="{{ URL::to($data->product_image_new->image,null)}}" title="{{$data->name}}" itemprop="image"  style="height: 225px;max-height: 220px;" class="product-fassion-img" alt="{{$data->name}}"></a>
                                            @endif
                                        </div>
                                        <a itemprop="url" target="_blank" href="">
                                            <div class="cat-item-title" itemprop="name" >{{$data->name}}</div>
                                        </a>
                                        <div class="dollar-price" style="text-align: center;"><span class="dollar">US $FOB</span> / Product unit</div>
                                          
                                        <a href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$data->name).'='.mt_rand(100000000, 999999999).$data->product_id) }}">
                                            <div id="btn-quet">
                                                <div class="ui2-button-primary">View Details</div>
                                            </div>  
                                        </a>                  
                                    </div>          
                                    

                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="col-sm-12 col-lg-12 col-md-12" style=" background-color: #fafafa; border-right: 1px solid #ddd; padding: 0; border-bottom: 1px solid #ddd; ">
                                <p style="color:#f30000;padding-left:1%;padding-top:1%;">There is no recommended product for you purpose of this product.</p>
                            </div>
                        @endif
                   
                    @endif
					
				</div>

                <div id="col-sm-12">
                    <h1 style="margin-top: 37%; margin-bottom: 10px; padding: 10px 0;font-size: 15px;font-weight: bold;">Recommended Buying Request for you</h1>
                    @if($buying_request)
                    @if(count($buying_request)>0)
                    <div class="col-sm-12 col-lg-12 col-md-12" style=" background-color: #fafafa; border-right: 1px solid #ddd; padding: 0; border-bottom: 1px solid #ddd; ">
                        @foreach($buying_request as $data)
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xs-6" style="border:1px solid #ddd; border-right:0 none; border-bottom:0 none;">
                            <div class="product-box sup-head-col" onMouseOver="show_getquation_bar()" onMouseOut="hide_getquation_bar()" style="width: 100%; border: 0 none;background-color: #fff;" itemscope itemtype="http://schema.org/Product">
                                @if($data->inq_products_description)
                                    <div class="cat-product-img-box">
                                        <a itemprop="url" target="_blank" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$data->inq_products_description->name).'='.mt_rand(100000000, 999999999).$data->product_id) }}"><img src="{{ URL::to($data->inq_products_description->product_image_new->image,null)}}" title="{{$data->inq_products_description->name}}" itemprop="image"  style="height: 225px;max-height: 220px;" class="product-fassion-img" alt="{{$data->inq_products_description->name}}"></a>
                                    </div>

                                    <a itemprop="url" target="_blank" href="">
                                        <div class="cat-item-title" itemprop="name" >{{$data->inq_products_description->name}}</div>
                                    </a>
                                    <div class="dollar-price" style="text-align: center;"><span class="dollar">US $FOB</span> / Product unit</div>
                                      
                                    <a href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$data->inq_products_description->name).'='.mt_rand(100000000, 999999999).$data->inq_products_description->product_id) }}">
                                        <div id="btn-quet">
                                            <div class="ui2-button-primary">View Details</div>
                                        </div>  
                                    </a> 
                                @endif 
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                        <div class="col-sm-12 col-lg-12 col-md-12" style=" background-color: #fafafa; border-right: 1px solid #ddd; padding: 0; border-bottom: 1px solid #ddd; ">
                            <p style="color:#f30000;padding-left:1%;padding-top:1%;">There is no recommended buying request for you purpose of this product.</p>
                        </div>
                    @endif
                    @endif
                </div>



		    </div>

		</div> 
	</div>

	@stop

@section('scripts')
@include('fontend.layouts.dashboard_aside_scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('ul.pagination').css('margin-top','15px');
	});

    $(document).on('click','.remote-favo',function(){
        var fav_id=$(this).attr('data-product_id');
        var _this=$(this);
        $.post(window.location.origin +'/remove-favorite',{
            '_token':'{{csrf_token()}}',
            'fav_id':fav_id,
           
        },function(result){
            if(parseInt(result)==1)
            {
               _this.parent().remove();
            }
          });
        
    })


    /*main product*/
  /*  $(document).on({click:function(e){
    e.preventDefault();
    
    var _this =$(this);
    var base_url='{{URL::to('/')}}';
   
    var data_name=_this.attr('data-name');

    var url=base_url+'/main-product-search?data_name='+data_name;
        
        $.get(url,{},function(result){
            $('#replace_area').html(result);
        });

    }},'.main_product');*/

    /*main product*/



</script>



@stop