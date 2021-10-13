@extends('mobile-view.layout.master_m')
    @section('content')
    <div class="row padding_0" style="background: #fff;">
    <div class="col-xs-12 padding_0" style="padding-right:0px; padding-bottom:0px; ">
                    <a href="{{URL::to('product/name')}}" style="text-decoration: none;cursor: context-menu;color: #666; display: block;">
                    <div id="search-inner" style="position: relative;"><i class="fa fa-search" aria-hidden="true" style="font-size: 20px;"></i>Search Products</div>
                    </a>
    </div>
      <div class="cat-pr-list"><span id="one" style="width: 50%; float: left;font-size: 16px;">All Category<i class="fa fa-angle-down" aria-hidden="true"></i></span><span style="width: 50%; float: left; font-size: 16px;"><a style="color: #333; text-decoration: none;" href="{{URL::to('product-by-region')}}"> More Region</a></span></div>
        <div class="col-xs-12 padding_0" id="two" style="display:none;">
          <div class="sb_pd_list"><a href="{{URL::to('subcategory-product-view')}}" class="pp-list-an"> Apparel & Textile</a></div>
          <div class="sb_pd_list" ><a href="{{URL::to('subcategory-product-view')}}" class="pp-list-an">Leather Products</a></div>
          <div class="sb_pd_list"><a href="{{URL::to('subcategory-product-view')}}" class="pp-list-an">Luggage, Bags & Cases</a></div>
          <div class="sb_pd_list"><a href="{{URL::to('subcategory-product-view')}}" class="pp-list-an">Footwear & Accessories</a></div>
          <div class="sb_pd_list"><a href="{{URL::to('subcategory-product-view')}}" class="pp-list-an">Software & Computer</a>
          </div>
      </div>
    		<div class="col-xs-12 padding_0" style="margin-top: 12px;">
    				<a href="{{URL::to('product-details/ladies-chiffon-blouse-designs-2013-=1639128431250')}}">
    					<div class="cat_pro_list">
    						<img class="cat_pro_list_img img-responsive" src="{!! asset('assets/images/nav_img1.jpg') !!}">
    					</div>
    					<div class="cat_pro_list_des">
    						<div style="width: 100%; display: block;position: relative;">
                                  <div class="det_list" style="font-size: 13px; line-height: 20px; padding-bottom: 10px; font-weight: normal; color: #666; padding-top: 0px;">
       
                                 	 CYG-horsehair braid crinoline tubular trim crin 
       								</div>
       								<div class="det_list">
       										US $0.1-0.6
       								</div>
       								<div class="det_list">
       										MOQ: 50 Pieces
       								</div>
       						</div>
       								<div style="display: block;width: 100%; margin:0; padding: 0; clear: both; padding-top: 10px;">
       									<div>
       										<div class="pro_sur"><img style="height:18px;width:18px; float: left;" src="{!! asset('assets/images/Buyer-protection-home.png') !!}">
       										</div>
       										<div class="pro_sur_gld"><img style="height:18px;width:18px; float: left;" src="{!! asset('assets/helpcenter/Gold-membership.png') !!}">
       										 <span style="float: left;font-weight: bold;font-size: 11px;margin-left: 4px;">
       											2 YR
       										 </span>
       										</div>
       										
       										<div class="pro_sur_cnt"><img style="height:16px;width:24px; float: left;" src="{!! asset('assets/global/img/flags/bd.png') !!}">
       										<span style="float:left;font-weight: bold;font-size: 11px; margin-left: 4px;">BD</span>
       										</div>

       									</div>
       								</div>
       							<div style="clear: both;float: left; padding-top: 10px;">
		       							<a itemprop="url" href="#" data-product_id="3969" data-supplier_id="1063" class="btn btn-primary btn-sm contact_supplier"><i class="fa fa-envelope-o"></i>Contact Supplier</a>
		       						</div>
       						</div>
       						</a>
    					</div>
    </div>
@stop
@section('scripts')
<script type="text/javascript">
  
    var a = document.getElementById('one');
      var b = document.getElementById('two');

    a.addEventListener('click',showhide);

    function showhide () {
        if (b.style.display == 'none') {
        b.style.display = 'block';
        }
        else {
            b.style.display = 'none';
        }}
</script>
@stop