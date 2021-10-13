@php
	use App\Model\BdtdcCountry;
	function get_market_distribution($zone_id){
		$string =[];
		$market = DB::table('bdtdc_company_main_markets as main_market')
			->join('bdtdc_form_values as fv','fv.id','=','main_market.main_market_zone')
			->where('company_id',$zone_id)
			->get(['fv.value as market_zone','distribution_value']);
		$f = 0;

		foreach($market as $m){
			$string[$f] = ' ' . $m->market_zone . ' '. $m->distribution_value.'% ';
			$f++;
		}
		return implode(',',$string);
	}
	$country = BdtdcCountry::get();
@endphp
@extends('fontend.master_dynamic')
	@section('content')
	<br><br>
		@include('fontend.layouts.search_result_aside')

	<div  class="col-sm-9 col-md-10 col-xs-12 padding-right item_sha" style="padding-bottom: 0.5%">
		<form action="{{ URL::to('others_filter',null) }}" class="form others_filter_form" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="searched_on">
			<input type="hidden" name="search_str">
			<div class="col-sm-4 col-md-4 col-xs-12">
				<div style="font-size:12px;line-height: 32px;padding-right:4%; text-align:right;"  class="col-sm-6 col-md-6 col-xs-12 title_home padding_0">Supplier Location: </div>
				<div style="margin-bottom:2%" class="col-sm-6 col-md-6 col-xs-12 padding_0 ">
					
					<select style="width: 150%;" name="countery" class="form-control padding_0 others_filter_select">
						<option value="0">-Please Select-</option>
						@foreach($country as $c)
							<option value="{{ $c->id }}">{{ $c->name }}</option>
						@endforeach
						
					</select>
				</div>
			</div>
			<div class="col-sm-8 col-md-8 col-xs-12" style="padding-top:0px;text-align: right;">
				<label style="font-size:12px" class="ui2-checkbox-customize-label">
					<span class="ui2-checkbox-customize-txt">Supplier Types: </span>
				</label>
				<label style="font-size:12px" class="ui2-checkbox-customize-label">
					<input name="trade_assurence" type="checkbox" class="ui2-checkbox-customize-val others_filter_form_input" value="0">
					<span class="ui2-checkbox-customize-txt"><i class="fa fa-thumbs-up"></i>Trade Assurance</span>
				</label>
				<label style="font-size:12px" class="ui2-checkbox-customize-label">
					<input name="gold_supplier" type="checkbox" class="ui2-checkbox-customize-val others_filter_form_input" value="0">
					<span class="ui2-checkbox-customize-txt"><i class="fa fa-users"></i>Gold Supplier</span>
				</label>
				
				<label style="font-size:12px" class="ui2-checkbox-customize-label">
					<input name="assessed_supplier" type="checkbox" class="ui2-checkbox-customize-val others_filter_form_input" value="0">
					<span class="ui2-checkbox-customize-txt"><i class="fa fa-check-square-o"></i>Assessed Supplier</span>
				</label>
			</div>
		</form>
	</div>
	<br>
		<div id="pro_view" class="col-sm-9 col-md-10 col-xs-12 padding-right" data-spm="57">
			<div class="col-sm-4 col-md-4">
				<div class="view-label" style="padding: 8px;">View @if(isset($supplier_arr)>=1)
					<strong><?php echo count($supplier_arr); ?></strong> @else
					<strong>0</strong> @endif Supplier(s) below
				</div>
			</div>
		</div>
	<br>
	<div class="col-sm-9 col-md-10 col-xs-12 padding-right">
	<input type="hidden" name="base_url" value="{{ URL::to('/',null) }}">
	
		@foreach($supplier_arr as $s)
		<div  class="col-xs-12 list_product" style="border:0 none;">
			<div class="col-sm-12 padding_0">
			  <div class="col-sm-1 padding_0">
			  	<img src="{{ asset('assets/helpcenter/gs_icon.png')}}"  alt="gold supplier icon" />
			  </div>
			  <div class="col-sm-8 padding_0">
			  	<p class="comp_title">
			  		 <a itemprop="url" href="{{ URL::to('profile/template_',$s['company_id']) }}">{{ $s['name'] }} - {{ $s['company_name'] }}</a>
			  	</p>
			  </div>
			  <div class="col-sm-3">
			  	<div class="padding_0">
			  		<ul class="nav nav-pills nav-justified padding_0">
			  			<li class="padding_0"> <a itemprop="url" style="float: right;padding:0;" href=""><i class="fa fa-plus-square"></i>Favorites</a></li>
			  			<li class="padding_0"> <a itemprop="url" style="float: right;padding:0;" href=""><i class="fa fa-plus-square"></i>Compare</a></li>
			  		</ul>
			  	</div>
			  </div>
			  <div class="col-xs-12 col-md-12 col-sm-12 padding_0">
			  	<div style="padding-bottom:10px" class="col-xs-3 col-md-3 col-sm-4 padding_0">
			  		 <a itemprop="url" href="#" data-ca_id="{{ $s['id'] }}">
			  			<i class="fa fa-arrow-circle-right"></i>Contact details
			  		</a>
			  	</div>
			  </div>
			</div>
			<?php $stop_loop = 0; ?>
			@foreach($s['product'] as $p)
				@if($stop_loop <= 2){
						?>
						<div class="col-xs-7 col-md-2 col-sm-4 padding_0" itemscope itemtype="http://schema.org/Product">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<?php $img = ($p['product_image'] == "") ? "no_image.jpg" : $p['product_image'];  ?>
										<img itemprop="image" title="{{ $p['product_name'] }}"  style="width:100%;height:120px;margin-left:0" src="{{ asset('uploads/'.$img.'')}}" alt="{{ $p['product_name'] }}" class="img-responsive">
										 <a itemprop="url" class="pro_name" href="{{ URL::to('product_details',$p['product_id']) }}" style="display: block; font-size: 12px;line-height: 13px;margin-top:0%"><p itemprop="name">{{ substr($p['product_name'],0,25) }}...</p></a>
									</div>
								</div>
							</div>			
						</div>
						@else
						@php
						break;
						@endphp
					@endif
					@php
					$stop_loop++
					@endphp
			@endforeach
			
			<div class="col-xs-7 col-md-6 col-sm-12 padding_0">
				<div  style="padding-left: 15px;border-left: 1px solid #e8e8e8;"  class="col-xs-12 padding_0">
					<div class="col-sm-12 col-md-12 padding_0">
						<p class="summary">Main Product:
							 <a itemprop="url" style="padding-left:28px" class="margin_supp" href="#" target="_blank">
								<i class="fa fa-product-hunt"></i> Men Tshirt
							</a>,
							 <a itemprop="url" href="#" target="_blank">
								<i class="fa fa-product-hunt"></i> Girl's tshirt
							</a>
						</p>
						<p class="summary">Country/Region:
							 <a itemprop="url" style="padding-left:12px" href="#" target="_blank">{{ $s['country'] }}</a>
						</p>
						<p class="summary">Total Revenue:
							 <a itemprop="url" class="margin_supp" href="#" target="_blank">{{ $s['revanue'] }}</a>
						</p>
						<p class="summary">Top 3 Markets:
							
							<span class="margin_supp"> <a itemprop="url"  href="#" target="_blank">{{ get_market_distribution($s['company_id']) }}</a></span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm-12 padding_0">
				<div style="float:right" class="col-sm-4 padding_0">
					<ul style="float:left" class="list-inline">
						<li> <a itemprop="url" href="#animatedModal" data-product_id="#" data-supplier_id="{{ $s['id'] }}" class="btn btn-primary btn-sm contact_supplier"><i class="fa fa-envelope-o"></i>Contact Supplier</a></li>
						<li><i class="fa fa-weixin"></i> <a itemprop="url" href="#">Talk to me</a></li>
					</ul>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	
	<br>
	<br>
	<!--/recommended_items-->
	
	<div id="animatedModal">
		<div class="close-animatedModal text-center">
			 <a itemprop="url" class="btn btn-primary btn-md close_portfolio_model" href=""><i class="fa fa-times fa-3x"></i></a>
		</div>
		<div class="container">
			<div class="row">
				<div style="padding:2%" class="modal-content col-xs-10 col-xs-offset-1">
					
					<!---DATA WILL BE LOADED VIA AJAX-->
				</div>
			</div>
	
		</div>
	</div>
	</div>
	
	<br>
@stop
@section('scripts')

<script type="text/javascript">
			var other_filter_search_func,call_from="";
			
			other_filter_search_func=function(call_from){
				$('.loader').fadeIn('slow');
				var count_checked_box = $('.others_filter_form_input:checked')
				var form = $('.others_filter_form');
				if(call_from == "select_box"){
					$.post(form.attr('action'), form.serialize(), function(r) {
						$('.features_items').html(r);
						$('.loader').fadeOut('slow');
					});
				}else{
					
					$.post(form.attr('action'), form.serialize(), function(r) {
						$('.features_items').html(r);
						$('.loader').fadeOut('slow');
					})
				}
				
			}
            $(function() {
            	$('.button_holder').hide();
            	$(".loader").fadeOut("slow");
            	/*$('.contact_supplier').animatedModal({
            		color: "rgba(102, 102, 100, .9)",
            		animatedIn: "lightSpeedIn",
            	});*/
            	var $ui = $('#ui_element');
            	$ui.find('.sb_input').bind('focus click', function() {
            		$ui.find('.sb_down')
            			.addClass('sb_up')
            			.removeClass('sb_down')
            			.andSelf()
            			.find('.sb_dropdown')
            			.show();
            	});
            	$ui.bind('mouseleave', function() {
            		$ui.find('.sb_up')
            			.addClass('sb_down')
            			.removeClass('sb_up')
            			.andSelf()
            			.find('.sb_dropdown')
            			.hide();
            	});
            	$ui.find('.sb_dropdown').find('label[for="all"]').prev().bind('click', function() {
            		$(this).parent().siblings().find(':checkbox').attr('checked', this.checked).attr('disabled', this.checked);
            	});
            	$('[name="key"]').val($('[name="search_str"]').val());
            	
            	$(document).on({
            		click: function(e) {
            			e.preventDefault();
            			var url,base_url,supplier_id,product_id;
            			$('.modal-content').html('<span class="btn btn-block btn-lg"><i class="fa fa-spinner fa-pulse loading_icon text-primary"></i></span>');
            			base_url = $('[name="base_url"]').val();
            			supplier_id = $(this).data('supplier_id');
            			product_id = $(this).data('product_id');
            			
            			url = (product_id =="#") ? base_url+"/contact_supplier/"+supplier_id : base_url + "/byer/contact_supplier/" + supplier_id + "/" + product_id;
            			// $.get(url, function(r) {
            			// 	$('.modal-content').html(r)
            			// })
            			window.Location.href = url;
            		}
            	}, '.contact_supplier');
            
            	/*$(document).on({
            		click: function(e) {
            			e.preventDefault();
            			var url = $('[name="base_url"]').val() + '/buyer/contact_supplier';
            			swal({
            					title: "Are you sure?",
            					text: "You are going to confirm adding your product !",
            					type: "warning",
            					showCancelButton: true,
            					confirmButtonColor: "#DD6B55",
            					timer: 6000,
            					confirmButtonText: "Yes!",
            					cancelButtonText: "No, Stay hare!",
            					closeOnConfirm: false,
            					closeOnCancel: false,
            					showLoaderOnConfirm: true
            				},
            				function(isConfirm) {
            					if (isConfirm) {
            						
            						$.post(url, $('.query_form').serialize(), function(r) {
            							(parseInt(r) == 1) ? swal("Thank You!!", "Query has been sent successfully!!!", "success"): false;
            							(parseInt(r) == 0) ? swal({title: "<h2 class='text-danger'>Please Login<h2>",text: "<p class='text-primary'>Login first to send the query</p>",html: true,type:'error'}) : false;
            							(parseInt(r) !=1 && parseInt(r) !=0) ? swal("Fail!!", "Query Could Not Sent", "error") : false;
            						})
            					}
            					else {
            						swal("Cancelled", "Sending request is canceled :)", "error");
            					}
            				});
            		}
            	}, '.query_form_submit_btn');*/
            	
            	$(document).on({click:function(e){
				  var count_checked_box = $('input[name="filter_by_main_market[]"]:checked')
				  if(count_checked_box.length>0){
				    $('.button_holder').show(300)
				  }else{
				    $('.button_holder').hide(300)
				  }
				}},'input[name="filter_by_main_market[]"]')
				
				/****************MAIN MARKET SEARCH;************************/				
				$(document).on({
					click: function(e) {
						e.preventDefault();
						$('.loader').fadeIn('slow');
						var url = $('#search_by_main_market_form').attr('action');
						$.post(url, $('#search_by_main_market_form').serialize(), function(r,status,xhr) {
							$('.features_items').html(r);
							$('.loader').fadeOut('slow');
						})
					}
				}, '.search_by_main_market_btn');
				
				/****************TOTAL REVANUE && NO OF EMPLOYE SEARCH;************************/		
				$(document).on({
					click: function(e) {
						e.preventDefault();
						var search_str
						//id=$(this).attr('ca_id');
						$('.loader').fadeIn('slow');
						var url = $(this).attr('href')+'/'+$('[name="search_str"]').val();
						$.get(url, function(r) {
							$('.features_items').html(r);
							$('.loader').fadeOut('slow');
						})
					}
				}, '.filter_by_total_revanue_btn,.filter_by_total_employe_btn');
				
				/****************OTHERS FILTER SEARCH;************************/	
				$(document).on({
					click: function(e) {
						other_filter_search_func();
					}
				}, '.others_filter_form_input');
				$(document).on({
					change: function(e) {
						other_filter_search_func("select_box");
					}
				}, '.others_filter_select');

            });
        </script>	


@stop