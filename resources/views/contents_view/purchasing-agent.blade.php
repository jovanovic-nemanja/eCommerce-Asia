@extends('fontend.master3')
	@section('content')
		</div>
	<div class="container-fluid padding_0" style="background-color: #D8F3FB;">
	<div class="container">
				<div id="baner-img">
					<img style="width: 100%; height: auto;"   src="{!! asset('assets/fontend/bdtdc-images/buyer-agent-banner.jpg') !!}" alt="" />
				</div>
				
	</div>
	
			
</div>
<div class="body-container" style="">
	<div class="header-nav">
	    <div class="nav-wrap">
	        <div class="nav-container">
                <a href="#" class="item-menu my-active">Purchasing Agent</a>
	            <a href="" class="item-menu">Successful Transactions</a>
                <div class="help util-right">
	                <a href="#" target="_blank" class="ui2-button ui2-button-link link-secondary">
	                Know More about Purchasing Agent
	                    <i class="fa fa-angle-right" aria-hidden="true" style="width: 0;"></i>
	                </a>
	            </div>
        	</div>
	    </div>
	</div>

	<div>
		<div id="banner_toggle" class="banner-toggle" onclick="banner_img_toggle('baner-img')">
  			Click<br>
		</div>
	</div>
</div>
<div class="container">

<div class="row padding_0" style="background-color: #fff; box-shadow: 0 1px 2px 2px #e5e5e5;margin-top:2%;">
		
	
	<div class="col-sm-12 col-md-12 col-lg-12">
		  	<div class="form-group" style="padding: 20px;width: 56%;">
		    <label for="zone">I’m looking for purchasing agent by:</label>

			    <a href="javascript:unhide('p_product')">
				<p style="border:1px solid #333;height:30px;padding-left: 10px;font-size: 14px;color: #666;">Please select a category<span><i style="padding-left: 68%;padding-top: 7px;" class="fa fa-caret-down" aria-hidden="true"></i></span>
				</p></a>
				<div class="category_shown hidden"  id="p_product" style="">
					<p style="border-bottom:1px solid #AAA;">Please select category（Maximum 3）</p>
					<div class="" style="width: 193%;padding-left: 23px;">
					 <div class="col-sm-3 checkbox">
					  <label><input type="checkbox" value="">Agriculture</label>
					 </div>
					 <div class="col-sm-3 checkbox" style="padding-top: 1.5%;">
					  <label><input type="checkbox" value="">Apparel</label>
					 </div>
					 <div class="col-sm-3 checkbox" style="padding-top: 1.5%;">
					  <label><input type="checkbox" value="">Automobiles & Motorcycles</label>
					 </div>
					 <div class="col-sm-3 checkbox" style="padding-top: 1.5%;">
					  <label><input type="checkbox" value="">Beauty &Personal Care</label>
					 </div>

					</div>
					<a href="{{URL::to('/')}}" class="btn btn-primary">Confirm</a>
				</div>
				
			</div>


		    <div class="" id="filter-more-trigger" onclick="box_visibility('more-info-box');" style="margin-left: -102%;">
	  			<p>More filter</p>
		 	 </div>
		  		  
  </div>
 <div class="col-sm-12 col-md-12 col-lg-12 padding_0"  style="padding-bottom: 20px;">
 		<div id="more-info-box" style="display: none;">
 			<div class="col-sm-5 padding_0">
			 		<div class="form-group" style="padding: 20px; padding-top: 0; width: 100%;">
					  	<div style="width: 115px; float: left;">
					  		 <label for="market">Export Market:</label>
					  	</div>
					   	<div style="display: block;float: left;">
					   		<select style="background-color:#fff !important;border:1px solid #333;">
					   			<option value="">Please select market</option>
								<option value="" style="margin-top: 6%;">Asia</option>
								<option value="" style="margin-top: 6%;">Europe</option>
								<option value="" style="margin-top: 6%;">South America</option>
								<option value="" style="margin-top: 6%;">North America</option>
								<option value="" style="margin-top: 6%;">Pacific</option>
								<option value="" style="margin-top: 6%;">Middle East</option>
								<option value="" style="margin-top: 6%;margin-bottom:5%;">Africa</option>
							</select> 
<!-- <input type="" class="form-control" placeholder="" id="" style="height: 40px; line-height: 40px; float: left;"><div class="select" style="left: 74%; top: 0;"><span style="display: block;position: relative;"><i class="fa fa-chevron-down" aria-hidden="true" style="position: absolute;font-size: 18px; color: #666; left: 15px; top: 10px;"></i></span></div> -->
					   	</div>
					    
					  </div>
 			</div>
 			<div class="col-sm-7">
 							<div class="form-group" style="padding: 20px; padding-top: 0; width: 100%;">
					  	<div style="width: 140px; float: left;">
					  		 <label for="market">Agent’s Language:</label>
					  	</div>
					   	<div style="display: block;float: left;">
				   		 <div class="dropdown">
						    <p class="btn btn-default dropdown-toggle" type="" data-toggle="dropdown" style="width: 100%;text-align: left;height: 31px;margin-top: 3%;margin-top: 3%;">Please select language
						    <span class="caret"></span></p>
						    <div class="dropdown-menu">  
							    <p style="border-bottom:1px dotted #DDD;padding-top: 3%;padding-left: 3%;padding-bottom: 3%;">
							    	Max 3</p>
							    <div class="col-sm-12" style="margin-top:3%;margin-bottom:5%;padding-bottom:5%;border:1px dotted #333;">
							    	<div class="col-sm-6">
							    		<input type="checkbox" name="" value="">English<br>
										<input type="checkbox" name="" value="">Korean<br>
										<input type="checkbox" name="" value="">German<br>
										<input type="checkbox" name="" value="">Spanish<br>
										<input type="checkbox" name="" value="">Indian<br>
							    	</div>
							    	<div class="col-sm-6">
							    		<input type="checkbox" name="" value="">French<br>
										<input type="checkbox" name="" value="">Arabic<br>
										<input type="checkbox" name="" value="">Russian<br>
										<input type="checkbox" name="" value="">Portuguese<br>
										<input type="checkbox" name="" value="">Italian<br>

							    	</div>
							    </div>
				            
							
						    </div>
						  </div>

					   	</div>
					    
					  </div>
 				
 			</div>
		  </div>	
</div>

</form>
</div>
<div class="row padding_0" style="border-bottom: 1px solid #EFF2F7;">
<div class="col-sm-12 col-md-12" style="padding: 0; min-height: 30px; padding-top: 15px;padding-left: 15px;">
			<div class="sort-by">
				<span style="float: left;font-size: 14px;color: #000;font-family: Arial;line-height: 1.28571;">Sort by:</span>
				<ul style="padding: 0; display: block; float: left;">
				<li style="float: left; padding-left: 10px;"><a href="#" style="color: #666; font-size: 13px; color: #EB650C;">All</a></li>
				<li style="float: left; padding-left: 10px;"><a href="#" style="font-size: 14px;color: #000;font-family: Arial;line-height: 1.28571;">Responsiveness</a></li>
				<li style="float: left; padding-left: 10px;"><a href="#" style="font-size: 14px;color: #000;font-family: Arial;line-height: 1.28571;">Response time</a></li>
				
			</ul>
			</div> 
		<div style="float: right; display: block;vertical-align: baseline;overflow: hidden; color: #666; font-size: 13px; cursor: pointer;"> 
		<a href="#" style="color: #666; font-size: 13px;"><span style="color: #5BBD56; font-weight: 700;">145</span> purchasing agent(s) can provide you service</a>
			
		</div>
			

</div>

</div>
@if($users)
@foreach($users as $data)
<div class="row padding_0 list-item-agent" style="background-color: #fff;">
	<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12 padding_0">
	<div class="col-sm-12 col-md-12 col-lg-12 padding_0">
		<div  class="col-sm-3 col-md-3 col-lg-3" >
			<a href="#" class="avatar" >
				<img src="{!! asset('assets/no_photo.gif') !!}" class="img-responsive" alt="">
			</a>
			
		</div>
		<div  class="col-sm-9 col-md-9 col-lg-9 agent-intro ">
				<p class="basic-intro"><a href="{{URL::to('purchasing-agent/details',$data->user->id)}}" class="agent-name">{{$data->user->first_name}} {{$data->user->last_name}}</a>  
					@if($data)
					@if($data->user)
					@if($data->user->company)
					@if($data->user->company->name_string)
					{{$data->user->company->name_string->name}}
					@endif
					@endif
					@endif
					@endif
				</p>
				<p class="service"><span>Responded to:</span> <b style="color: #EB650C;">354</b> queries</p>
				<p class="service"><span>Response time:</span>  0~8 Hours</p>
		</div>
		
	</div>

	</div>
	<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12 padding_0">
			<div class="col-sm-12 col-md-12 col-lg-12 padding_0">
					<div class="col-sm-8 col-md-8 padding_0">
							<div class="agent-other-info">
	   							 <p class="main-product">
	      						<span class="info-title">Main Products:</span>{{$data->user->main_products->product_name_1}} ,
	     				 		{{$data->user->main_products->product_name_2}} , {{$data->user->main_products->product_name_3}}
	            				</p>
					            <p class="language" title="English,French">
					              <span class="info-title">Language:</span>
					              English,French
					            </p>
					            @if($data)
					            @if($data->user)
					            @if($data->user->company)
					            @if($data->user->company->companymainmarket)
					            @if($data->user->company->companymainmarket->main_market)
					            <p class="markets" title="Europe,Middle East">
					              <span class="info-title">Main Market:</span>
					              Europe,Middle East
					              {{$data->user->company->companymainmarket->main_market->name}}
					            </p>
					            @endif
					            @endif
					            @endif
					            @endif
					            @endif
				 			</div>
					</div>
					<div class="col-sm-4 col-md-4 padding_0">
								<div class="buyer-action">
							            <a href="{{URL::to('contact_supplier', $data->user_id)}}" class="btn btn-primary" style="border-radius: 4px !important;">
							                <i class="fa fa-envelope-o" aria-hidden="true" style="padding-right: 5px; font-size: 16px;"></i>Contact Agent
							            </a>
						          </div>
						
					</div>
					
			</div>

	</div>

				
</div>
@endforeach
@endif
<!-- <div class="row padding_0 list-item-agent" style="background-color: #fff;margin-bottom:2%;">
	<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12 padding_0">
		<div class="col-sm-12 col-md-12 col-lg-12 padding_0">
			<div  class="col-sm-3 col-md-3 col-lg-3" >
				<a href="#" class="avatar" >
					<img src="{!! asset('assets/fontend/bdtdc-images/purs-agent-1.jpg_80x80.jpg') !!}" class="img-responsive" alt="">
				</a>
				
			</div>
			<div  class="col-sm-9 col-md-9 col-lg-9 agent-intro ">
				<p class="basic-intro"><a href="#" class="agent-name">May Han</a>  Foshan Hanbang Furniture Co., Ltd.</p>
				<p class="service"><span>Responded to:</span> <b style="color: #EB650C;">354</b> queries</p>
				<p class="service"><span>Response time:</span>  0~8 Hours</p>
			</div>
			
		</div>

	</div>
	<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12 padding_0">
		<div class="col-sm-12 col-md-12 col-lg-12 padding_0">
			<div class="col-sm-8 col-md-8 padding_0">
				<div class="agent-other-info">
					<p class="main-product">
					<span class="info-title">Main Products:</span>
			 		Home Furniture,Commercial 
    				</p>
		            <p class="language" title="English,French">
		              <span class="info-title">Language:</span>
		              English,French
		            </p>
		            <p class="markets" title="Europe,Middle East">
		              <span class="info-title">Main Market:</span>
		              Europe,Middle East
		            </p>
	 			</div>
			</div>
			<div class="col-sm-4 col-md-4 padding_0">
				<div class="buyer-action">
		            <a href="#" class="btn btn-primary" style="border-radius: 4px !important;">
		                <i class="fa fa-envelope-o" aria-hidden="true" style="padding-right: 5px; font-size: 16px;"></i>Contact Agent
		            </a>
	            </div>
				
			</div>
				
		</div>

	</div>
	
</div> -->
@stop
@section('scripts')
<script type="text/javascript">
		$(window).load(function(){
			setTimeout(function(){
					$('#baner-img').fadeOut() },5000);
		});
  
		function box_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
       {
          e.style.display = 'none';
      	document.getElementById("filter-more-trigger").innerHTML = "More filter";
      	}
       else{
          e.style.display = 'block';
       
     document.getElementById("filter-more-trigger").innerHTML = "Less filter";
  }
    }
    function banner_img_toggle(my_banner) {
       var ban = document.getElementById(my_banner);
       if(ban.style.display == 'block')
       {
          ban.style.display = 'none';
      	}
       else{
          ban.style.display = 'block';
       

  		}
    }

    function unhide(divID) {
    var item = document.getElementById(divID);
    if (item) {
    item.className=(item.className=='hidden')?'unhidden':'hidden';
    }}

</script>
@stop