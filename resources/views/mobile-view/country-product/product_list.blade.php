@extends('mobile-view.layout.master-profile-m')
	@section('content')
@include('mobile-view.country-product.template-header')
<?php 
      $product_groups=DB::table('bdtdc_supplier_product_groups')->where('company_id',Route::current()->parameters()['profile_id'])->get();
      $profile_id=Route::current()->parameters()['profile_id'];
      // echo $profile_id;
      //print_r(Route::current()->parameters());
?>
<div class="row padding_0" style="background: #fff;">
  <div id="comp_product">
  			<div class="col-xs-8 padding_0">
						<div style="padding-left:2%;">
						
             <!-- <form class="form" method="get" action="{{ URL::to('template-profile/product-search_',Route::current()->parameters()['profile_id'],null) }}"> -->
                <div class="input-group">
                  <input id="product_search_m" type="text" class="form-control product_key" placeholder="Search products on Ministe"  name="key">
                  <span class="input-group-btn search_from_template">
                    <button class="btn btn-primary template_product" type="submit" data-profile-id="{{Route::current()->parameters()['profile_id']}}"><i class="fa fa-search-plus"></i></button>
                  </span>
                </div>
           <!--  </form>
 -->
						</div>
				</div>
				<div class="col-xs-4" style="margin-top:-2%;">
        <nav class="navbar navbar-inverse" style="background: #fff; border:0 none; padding-top: 5px;float: left;">
                <div class="navbar-header">
                  <button type="button " class="navbar-toggle btn-primary" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="background: #3379B5; border:0 none;" id="nv-mnu-lst">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                  </button>
                </div>
            </nav>
        </div>
  </div>
 </div>
 <div class="row padding_0" style="background:#fff;">
 <div class="collapse navbar-collapse " style="background: #fff;" id="cat-lst-pro-bd">
      <ul class="nav navbar-nav cate-com-pro">
         @foreach($product_groups as $product_group)
                        <li class="cate-com-pro-li active"><a style="color: #000;" href="{{ URL::to('profile/template_'.'/'.$profile_id.'/'.$product_group->name,null) }}">{{ $product_group->name }}</a></li>
                       
                  @endforeach
       
      </ul>
  </div>
  </div>
<div class="row padding_0" style="background: #fff; margin-bottom: 20px;border-bottom: 1px solid #ddd;">
@if($products_results)  				
            @foreach($products_results as $p)
    		<div class="product-list-m-view">
                @if($p)
                   <a title="" target="_blank" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $p->product_name).'='.mt_rand(100000000, 999999999).$p->product_id,null) }}">
                @else
                    <a title="" target="_blank" href="{{ URL::to('product-details/'.'='.mt_rand(100000000, 999999999).$p->product_id,null) }}">
                    </a>
                @endif
                <div class="wrap-img">
                    @if($p->product_images != null && trim($p->product_images) != '')
                          <span class="wrap-img-span"><img class="wrap-img-img" alt="" src="{{ URL::asset($p->product_images) }}">
                    @else
                          <img alt="" class="wrap-img-img" src="{{ URL::asset('uploads/no_image.jpg') }}">
                    @endif
                </div>

    			   <div class="rap-text">
                        <h4 class="rap-text-h4">{{ substr($p->product_name, 0, 20) }}...</h4>
                
    			   	<ul class="params" style="padding: 0;"> 
                          
    		        	<li class="param">
                	      <label class="param-label">Min. Order:</label>
                             <span class="param-span">{{ $p->product_MOQ }}</span>
                        </li>
                        
    		            <li class="param">
                            <label>FOB Price:</label>
                            <span>US $ {{ $p->product_FOB }}</span>
                        </li>
                	</ul>
                  
    			   </div>
             </a>
      	</div>
        @endforeach
    @endif
</div>
@stop
@section('scripts')
<script src="{!! asset('assets/fontend/jquery.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/fontend/bootstrap.min.js') !!}"></script>
    <!--ANIMATED POP UP SCRIPT-->
    <script src="{{URL::asset('assets/fontend/js/animatedModal.min.js')}}"></script>
    <!--SWEET ALERT POP-UP SCRIPT-->
    <script src="{{ URL::asset('assets/fontend/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{!! asset('assets/ga.js') !!}"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script src="{{ URL::asset('assets/fontend/js/jquery-te-1.4.0.min.js') }}" charset="utf-8"></script>
    <script type="text/javascript" src="{!! asset('assets/fontend/js/slick.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/fontend/js/smallworld.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/fontend/js/smallworld.jquery.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('assets/fontend/js/template_custom.js') !!}"></script>
      
    <script type="text/javascript">
    $(document).ready(function(){
        $('#nv-mnu-lst').click(function(){
              $('#cat-lst-pro-bd').toggle('slow');
        });
      }); 

    /*product template search*/
    $(document).on({click:function(e){
    e.preventDefault();

    var base_url='{{URL::to("/")}}';
    alert(base_url);
    var name_search= $('.product_key').val();
    alert(name_search);
    var profile_id= $(this).attr('data-profile-id');
    alert(profile_id);

    var url=base_url+'/template-profile/product-search?name_search='+name_search+'&profile_id='+profile_id;
    window.location.href=url;
   }},'.template_product');
    /*product template search*/

    </script>
@stop