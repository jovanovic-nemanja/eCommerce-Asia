@extends('fontend.master_dynamic')
	@section('content')
	<div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                    <ul class="top-path" style="padding-bottom: 8px;">
                        <li class="top-path-li"><a href="{{URL::to('/',null)}}" class="top-path-li-a">Home <i class="fa fa-angle-right top-path-icon"></i></a></li>
                        <li class="top-path-li"><a href="{{URL::to('Offer_board')}}" class="top-path-li-a">Offer Board<i class="fa fa-angle-right top-path-icon"></i></a></li>
                        
                    </ul>
            </div>
    
  </div>
	<div class="row" style="background-color:#fff!important;padding-bottom:20px;">
	    <div class="col-sm-12">
	        <p style="padding-top:10px;">The "Offer Board" classifies global trade offers listed on Bdtdc.com into 27 categories.
	        Please select the appropriate categories to narrow down your search (more accurate results but sourcing 
	        may take longer). You may also choose to use the "keyword search" function (faster sourcing but results
	        may be less accurate).</p>
	    </div>
	    <div class="col-sm-12" style="padding-top:10px;">
	        <div class="col-sm-10">
    	        <ul class="nav nav-tabs">
                  <li role="presentation" class="active"><a href="#">Categories</a></li>
                  <li role="presentation"><a href="#">New Offers</a></li>
                  <li role="presentation"><a href="#">Recommended Offers</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                
            </div>
	    </div>
	    <div class="col-sm-12" style="padding-top:10px;">
	        <div class="col-sm-10">
	            <div class="col-sm-12" id="offer" style="border: 1px solid #ddd;">
	                <div class="col-sm-8">
	                    
	                </div>
	                <div class="col-sm-4">
	                    <div class="col-sm-12">
	                       
	                        <div class="col-sm-3" style="border-left: 1px solid #ddd;">
	                            <p>Buy</p>
	                        </div>
	                        <div class="col-sm-3" style="border-left: 1px solid #ddd;">
	                            <p>Sell</p>
	                        </div>
	                        <div class="col-sm-3" style="border-left: 1px solid #ddd;">
	                            <p>Co-op</p>
	                        </div>
	                        <div class="col-sm-3" style="border-left: 1px solid #ddd;">
	                            <p>Total</p>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-12" style="padding-top:5px;">
	                <div class="col-sm-8">
	                    <a href="#">Agriculture & Food</a>
	                </div>
	                <div class="col-sm-4">
	                    <div class="col-sm-12">
	                       
	                        <div class="col-sm-3">
	                            <p>0</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>470</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>6</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>491</p>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-12" style="padding-top:5px;background: #f9f9f9;">
	                <div class="col-sm-8">
	                    <a href="#">Appreal & Accessories</a>
	                </div>
	                <div class="col-sm-4">
	                    <div class="col-sm-12">
	                       
	                        <div class="col-sm-3">
	                            <p>0</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1416</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>3</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1449</p>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-12" style="padding-top:5px;">
	                <div class="col-sm-8">
	                    <a href="#">Appreal & Accessories</a>
	                </div>
	                <div class="col-sm-4">
	                    <div class="col-sm-12">
	                       
	                        <div class="col-sm-3">
	                            <p>0</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1416</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>3</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1449</p>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-12" style="padding-top:5px;background: #f9f9f9;">
	                <div class="col-sm-8">
	                    <a href="#">Appreal & Accessories</a>
	                </div>
	                <div class="col-sm-4">
	                    <div class="col-sm-12">
	                       
	                        <div class="col-sm-3">
	                            <p>0</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1416</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>3</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1449</p>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-12" style="padding-top:5px;">
	                <div class="col-sm-8">
	                    <a href="#">Appreal & Accessories</a>
	                </div>
	                <div class="col-sm-4">
	                    <div class="col-sm-12">
	                       
	                        <div class="col-sm-3">
	                            <p>0</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1416</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>3</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1449</p>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-12" style="padding-top:5px;background: #f9f9f9;">
	                <div class="col-sm-8">
	                    <a href="#">Appreal & Accessories</a>
	                </div>
	                <div class="col-sm-4">
	                    <div class="col-sm-12">
	                       
	                        <div class="col-sm-3">
	                            <p>0</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1416</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>3</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1449</p>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-12" style="padding-top:5px;">
	                <div class="col-sm-8">
	                    <a href="#">Appreal & Accessories</a>
	                </div>
	                <div class="col-sm-4">
	                    <div class="col-sm-12">
	                       
	                        <div class="col-sm-3">
	                            <p>0</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1416</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>3</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1449</p>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-12" style="padding-top:5px;background: #f9f9f9;">
	                <div class="col-sm-8">
	                    <a href="#">Appreal & Accessories</a>
	                </div>
	                <div class="col-sm-4">
	                    <div class="col-sm-12">
	                       
	                        <div class="col-sm-3">
	                            <p>0</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1416</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>3</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1449</p>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-12" style="padding-top:5px">
	                <div class="col-sm-8">
	                    <a href="#">Appreal & Accessories</a>
	                </div>
	                <div class="col-sm-4">
	                    <div class="col-sm-12">
	                       
	                        <div class="col-sm-3">
	                            <p>0</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1416</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>3</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1449</p>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-12" style="padding-top:5px;background: #f9f9f9;">
	                <div class="col-sm-8">
	                    <a href="#">Appreal & Accessories</a>
	                </div>
	                <div class="col-sm-4">
	                    <div class="col-sm-12">
	                       
	                        <div class="col-sm-3">
	                            <p>0</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1416</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>3</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1449</p>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-12" style="padding-top:5px;">
	                <div class="col-sm-8">
	                    <a href="#">Appreal & Accessories</a>
	                </div>
	                <div class="col-sm-4">
	                    <div class="col-sm-12">
	                       
	                        <div class="col-sm-3">
	                            <p>0</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1416</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>3</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1449</p>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-12" style="padding-top:5px;background: #f9f9f9;">
	                <div class="col-sm-8">
	                    <a href="#">Appreal & Accessories</a>
	                </div>
	                <div class="col-sm-4">
	                    <div class="col-sm-12">
	                       
	                        <div class="col-sm-3">
	                            <p>0</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1416</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>3</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1449</p>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-12" style="padding-top:5px;">
	                <div class="col-sm-8">
	                    <a href="#">Appreal & Accessories</a>
	                </div>
	                <div class="col-sm-4">
	                    <div class="col-sm-12">
	                       
	                        <div class="col-sm-3">
	                            <p>0</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1416</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>3</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1449</p>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-12" style="padding-top:5px;background: #f9f9f9;">
	                <div class="col-sm-8">
	                    <a href="#">Appreal & Accessories</a>
	                </div>
	                <div class="col-sm-4">
	                    <div class="col-sm-12">
	                       
	                        <div class="col-sm-3">
	                            <p>0</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1416</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>3</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1449</p>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-12" style="padding-top:5px;">
	                <div class="col-sm-8">
	                    <a href="#">Appreal & Accessories</a>
	                </div>
	                <div class="col-sm-4">
	                    <div class="col-sm-12">
	                       
	                        <div class="col-sm-3">
	                            <p>0</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1416</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>3</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1449</p>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="col-sm-12" style="padding-top:5px;background: #f9f9f9;padding-bottom:10px;">
	                <div class="col-sm-8">
	                    <a href="#">Appreal & Accessories</a>
	                </div>
	                <div class="col-sm-4">
	                    <div class="col-sm-12">
	                       
	                        <div class="col-sm-3">
	                            <p>0</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1416</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>3</p>
	                        </div>
	                        <div class="col-sm-3">
	                            <p>1449</p>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
	            
	            </div>
	            
	                
        	        <div class="col-sm-2">
        	            <div class="col-sm-12">
        	                <img style="height:100px;width:180px;" src="{!! asset('resources/assets/service/sourcing_channel.jpg') !!}" alt="" />
        	            </div>
        	            <div class="col-sm-12 padding_0" style="margin-top:20px;border: 1px solid #D4D4D4;margin-left:20px;padding-right:0px;">
        	                <div class="col-sm-12 padding_0" style="background-color:#F4F4F4;">
        	                    <p style="border-bottom: 1px solid #D4D4D4;padding-left:8px;">Hot Searches</p>
        	                    
        	                </div>
        	                <div class"col-sm-12">
        	                    <ul>
        	                    <li><a href="#"  style="margin-left: -34px;">Bangladesh Cane</a></li>
        	                    <li><a href="#"  style="margin-left: -34px;">Cashing Part</a></li>
        	                    <li><a href="#"  style="margin-left: -34px;">Truck Part</a></li>
        	                    <li><a href="#"  style="margin-left: -34px;">Bangladesh Inverter</a></li>
        	                    <li><a href="#"  style="margin-left: -34px;">Package Machine</a></li>
        	                    <li><a href="#"  style="margin-left: -34px;">LED Screen</a></li>
        	                    <li><a href="#"  style="margin-left: -34px;">Lady Bag</a></li>
        	                    <li><a href="#"  style="margin-left: -34px;">Made In Bangladesh</a></li>
        	                    </ul>
        	                </div>
        	            </div>
        	        </div>
        	    
	    
	</div>
	</div>
	<br>
	
	@stop