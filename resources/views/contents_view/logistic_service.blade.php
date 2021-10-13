@extends('fontend.master_dynamic')
	@section('content')

<div class="row" style="padding-top: 1%;">
        <div class="col-lg-12 col-md-12 padding_0">
            <ul  style="margin-left: -2%;float: left;">
            <li style="float: left">
              <a itemprop="url" href="{{ URL::to('/',null)}}" style="color: #000">
              Home
              </a> <i class="fa fa-angle-right"></i> 
            </li>
            <li style="float: left">
              <a itemprop="url" href="{{ URL::to('/ServiceChannel/pages/for_buyer',35)}}" style="color: #000">
              Help Center
              </a> <i class="fa fa-angle-right"></i> 
            </li>
            
            <li style="float: left">
            <a itemprop="url" href="#" style="color: #000">
               <strong> Logistic Service</strong>
            </a> <i class="fa fa-angle-right"></i></li>
            </ul>
            <ul style="float:right;margin-left: -2%" itemscope itemtype="http://schema.org/BreadcrumbList">
        <button class="goBack" onclick="goBack()" style="padding: 0;"><span>Go Back</span></button>
      </ul>
        </div>
    </div>

	<div class="row" style="background-color:#fff!important;padding-bottom:20px;">
	    <div class="col-sm-12 padding_0">
	        <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active" style="border-radius:10px !important; border:0 none;"></li>
                <li data-target="#myCarousel" data-slide-to="1" style="border-radius:10px !important; border:0 none;"></li>
                <li data-target="#myCarousel" data-slide-to="2" style="border-radius:10px !important; border:0 none;"></li>
                <li data-target="#myCarousel" data-slide-to="3" style="border-radius:10px !important; border:0 none;"></li>
             </ol>
	         <div class="carousel-inner" role="listbox">
                <div class="item active">
                 <img itemprop="image" style="max-height:300px;width:100%;margin-left: -1px;" src="{!! asset('assets/fontend/bdtdc-images/global-shipping-services.jpg') !!}" alt="global shipping services" />
                </div>
            
                 <div class="item">
                  <img itemprop="image" style="max-height:300px;width:100%;margin-left: -1px;" src="{!! asset('assets/fontend/bdtdc-images/roadway-shipping.jpg') !!}" alt="roadway shipping" />
                </div>
            
                <div class="item">
                  <img itemprop="image" style="max-height:300px;width:100%;margin-left: -1px;" src="{!! asset('assets/fontend/bdtdc-images/air-freight-services.jpg') !!}" alt="air freight services" />
                </div>
            
                <div class="item">
                  <img itemprop="image" style="max-height:300px;width:100%;margin-left: -1px;" src="{!! asset('assets/fontend/bdtdc-images/sea-freight.jpg') !!}" alt="sea freight" />
                </div> 
            </div>
            
            </div>
        </div>

        <div class="col-sm-12 padding_0 tab-content" style="padding-top:5%;padding-bottom:10px;" aria-label="Navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">

            <div class="col-sm-1"></div>
            <div class="nav nav-tabs" style="padding-bottom: 15px;">
            <div   class="col-sm-2 logic active">
                <a itemprop="url" href="#sea_lcl" data-toggle="tab" >Sea-LCL</a>
            </div>
            <div class="col-sm-2 logic">
                <a itemprop="url" href="#sea_fcl" data-toggle="tab">Sea-FCL</a>
            </div>
            <div class="col-sm-2 logic">
                <a itemprop="url" href="#air" data-toggle="tab">Air</a>
            </div>
            <div class="col-sm-2 logic">
                <a itemprop="url" href="#express" data-toggle="tab">Express</a>
            </div>
            <div class="col-sm-2 logic">
                <a itemprop="url" href="#railway" data-toggle="tab">Railway</a>
            </div>
            </div>
            <div class="col-sm-1">
                <a itemprop="url" href="#"></a>
            </div>
            
        </div> 
 </div>
    <div class="row padding_0" style="background: #fff;">
      <div  class="tab-content">
        <div id="sea_lcl" class="tab-pane fade in active">
        <div class="col-sm-12 padding_0" style="padding-top:2%;margin-left: 3%;">
            <div class="col-sm-4">
                 
                    <div class="input-group">
                      <input type="text" class="form-control" aria-label="..." Value="Departure">
                      <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DALIAN CHINA</button>
                        <ul class="dropdown-menu" aria-label="Navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                          <li><a itemprop="url" href="#">Action</a></li>
                          <li><a itemprop="url" href="#">Another action</a></li>
                          <li><a itemprop="url" href="#">Something else here</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a itemprop="url" href="#">Separated link</a></li>
                        </ul>
                      </div><!-- /btn-group -->
                     
                    </div><!-- /input-group -->
                  
              </div>
              
              <div class="col-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control" aria-label="..." Value="Destination">
                  <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DALIAN CHINA</button>
                        <ul class="dropdown-menu" aria-label="Navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                          <li><a itemprop="url" href="#">Action</a></li>
                          <li><a itemprop="url" href="#">Another action</a></li>
                          <li><a itemprop="url" href="#">Something else here</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a itemprop="url" href="#">Separated link</a></li>
                        </ul>
                      </div><!-- /btn-group -->
                </div>
              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2">
                  <button class="btn btn-primary" type="button" style="background: #073252;height: 40px;font-size: 18px;line-height: 40px;padding-bottom: 44px;padding-top: 0px;border-radius: 3px!important;">
                      Calculate</button> 
              </div>

        </div>
       
        <div class="col-sm-12 col-md-12 padding_0" style="min-height:60px;"> 
                <div class="col-sm-6 col-md-6" style="height: 30px;width: 60%; padding-left: 50px;">
                      <div class="col-sm-6 col-md-6 gb" style="border: 1px solid #DAE2ED !important; height: 38px; padding: 0 10px; width: 40%;">
                             <div style="width: 120px; float: left;border-right: 1px solid #DAE2ED; text-align: center; padding-top: 8px; height: 100%; ">Gross Weight</div>
                              
                               <div style="width: 50px; float: left;text-align: center;padding-top: 8px; height: 100%;">KG</div>
                               
                      </div>
                      <div class="col-sm-6 col-md-6 gp" style="border: 1px solid #DAE2ED !important; height: 38px; padding: 0 10px; width: 40%; margin-left: 10px;">
                                <div style="width: 130px; float: left;border-right: 1px solid #DAE2ED; text-align: center; padding-top: 8px; height: 100%; ">Gross Volume(m³)</div>
                              
                               <div style="width: 50px; float: left;text-align: center;padding-top: 8px; height: 100%;">1</div>
                              
                      </div>
                </div>
                <div class="col-sm-6 col-md-6">
                  
                </div>
              </div>
        <div class="col-sm-12 padding_0" style="padding-top:2%;margin-left: 1px;">
            <div class="col-sm-12 padding_0" style="background-color: #e9eef5;padding-top:10px;border-bottom: 1px solid #dae3ed;">
                    <div class="col-sm-3">
                        <p>Shipping Company</p>
                    </div>
                    <div class="col-sm-2">
                        <p>Shipping Time</p>
                    </div>
                    <div class="col-sm-2">
                        <p>Freight Cost</p>
                    </div>
                    <div class="col-sm-3">
                        <p>Destination Cost</p>
                    </div>
                    <div class="col-sm-2">
                        <p>Total Cost</p>
                    </div>
            </div>
            <div class="col-sm-12" style="padding-top:20px;padding-bottom:20px;border-bottom: 1px solid #dae3ed;">
                <div class="col-sm-3">
                    <p>DHL</p>
                </div>
                <div class="col-sm-2">
                    <p>33 Days</p>
                </div>
                <div class="col-sm-2">
                    <p>USD 1.00</p>
                </div>
                <div class="col-sm-3">
                    <p>USD7.45</p>
                </div>
                <div class="col-sm-2">
                    <p>USD 88.45</p>
                </div>
            </div>
            <div class="col-sm-12" style="padding-top:20px;padding-bottom:20px;border-bottom: 1px solid #dae3ed;">
                <div class="col-sm-3">
                    <p>JIYIDA</p>
                </div>
                <div class="col-sm-2">
                    <p>28 Days</p>
                </div>
                <div class="col-sm-2">
                    <p>USD 0.00</p>
                </div>
                <div class="col-sm-3">
                    <p>USD 134.64</p>
                </div>
                <div class="col-sm-2">
                    <p>USD 134.64</p>
                </div>
            </div>
            <div class="col-sm-12" style="padding-top:20px;padding-bottom:20px;border-bottom: 1px solid #dae3ed;">
                <div class="col-sm-3">
                    <p>SHANGHAI AMASS</p>
                </div>
                <div class="col-sm-2">
                    <p>35 Days</p>
                </div>
                <div class="col-sm-2">
                    <p>USD 0.00</p>
                </div>
                <div class="col-sm-3">
                    <p>USD 188.92</p>
                </div>
                <div class="col-sm-2">
                    <p>USD 188.92</p>
                </div>
            </div>
            <div class="col-sm-12" style="padding-top:20px;padding-bottom:20px;border-bottom: 1px solid #dae3ed;">
                <div class="col-sm-3">
                    <p>ECU LINE</p>
                </div>
                <div class="col-sm-2">
                    <p>28 Days</p>
                </div>
                <div class="col-sm-2">
                    <p>USD 2.00</p>
                </div>
                <div class="col-sm-3">
                    <p>USD 188.98</p>
                </div>
                <div class="col-sm-2">
                    <p>USD 190.98</p>
                </div>
            </div>
            <div class="col-sm-12" style="padding-top:10px;padding-bottom:20px;">
                <p style="color: #666;font-size: 12px;">
                Note: The shipping time and cost will vary over time. The shipping cost does not include
                taxes and other fees. USD $1 = 6.50CNY .
                </p>
           
            </div>
  </div>
  </div>
  <div id="sea_fcl" class="tab-pane fade">
       <div class="col-sm-12 col-md-12">
                <div class="col-sm-12 padding_0" style="padding-top:2%;padding-left: 20px;">
               <div class="col-sm-4">
                 
                    <div class="input-group">
                      <input type="text" class="form-control" aria-label="..." Value="Departure">
                      <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DALIAN CHINA</button>
                        <ul class="dropdown-menu">
                          <li><a itemprop="url" href="#">Action</a></li>
                          <li><a itemprop="url" href="#">Another action</a></li>
                          <li><a itemprop="url" href="#">Something else here</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a itemprop="url" href="#">Separated link</a></li>
                        </ul>
                      </div><!-- /btn-group -->
                     
                    </div><!-- /input-group -->
                  
              </div>
              
              <div class="col-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control" aria-label="..." Value="Destination">
                  <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DALIAN CHINA</button>
                        <ul class="dropdown-menu">
                          <li><a itemprop="url" href="#">Action</a></li>
                          <li><a itemprop="url" href="#">Another action</a></li>
                          <li><a itemprop="url" href="#">Something else here</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a itemprop="url" href="#">Separated link</a></li>
                        </ul>
                      </div><!-- /btn-group -->
                </div>
              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2">
                  <button class="btn btn-primary" type="button" style="background: #073252;height: 40px;font-size: 18px;line-height: 40px;padding-bottom: 44px;padding-top: 0px;border-radius: 3px!important;">
                      Calculate</button> 
              </div>

        </div>
       </div>
       <div class="col-sm-12 col-md-12 padding_0" style="min-height:60px;"> 
                <div class="col-sm-6 col-md-6" style="height: 30px;width: 60%; padding-left: 50px;">
                      <div class="col-sm-4 col-md-4 gb" style="border: 1px solid #DAE2ED !important; height: 38px; padding: 0 10px; width: 30%;">
                             <div style="width: 60px; float: left;border-right: 1px solid #DAE2ED; text-align: center; ">20 GB</div>
                              <div style="width: 30px; float: left;border-right: 1px solid #DAE2ED;text-align: center;cursor: pointer;"  onclick="decrement()">-</div>
                               <div style="width: 50px; float: left;border-right: 1px solid #DAE2ED;text-align: center;"><input type="text" id="number_value" style="width: 40px; border: 0 none; text-align: center;color: #333; height:20px;" value="3"></div>
                                <div style="width: 20px; float: left;text-align: center; cursor: pointer;" id="incre" onclick="increment()">+</div>
                      </div>
                      <div class="col-sm-4 col-md-4 gp" style="border: 1px solid #DAE2ED !important; height: 38px; padding: 0 10px; width: 30%; margin-left: 10px;">
                              <div style="width: 60px; float: left;border-right: 1px solid #DAE2ED; text-align: center; margin-top: 8px; ">40 GB</div>
                              <div style="width: 30px; float: left;border-right: 1px solid #DAE2ED;text-align: center;margin-top: 8px; cursor: pointer;"  onclick="bd_decrement()">-</div>
                               <div style="width: 50px; float: left;border-right: 1px solid #DAE2ED;text-align: center;margin-top: 8px;">
                                 <input type="text" id="bd_number" style="width: 40px; border: 0 none; text-align: center;color: #333;" value="0">
                               </div>
                                <div style="width: 20px; float: left;text-align: center;margin-top: 8px; cursor: pointer;" onclick="bd_increment()">+</div>
                      </div>
                      <div class="col-sm-4 col-md-4 gp" style="border: 1px solid #DAE2ED !important; height: 38px; padding: 0 10px; width: 30%; margin-left: 10px;">
                                <div style="width: 60px; float: left;border-right: 1px solid #DAE2ED; text-align: center; margin-top: 8px; ">40 HQ</div>
                              <div style="width: 30px; float: left;border-right: 1px solid #DAE2ED;text-align: center;margin-top: 8px; cursor: pointer;" onclick="hq_decrement()">-</div>
                               <div style="width: 50px; float: left;border-right: 1px solid #DAE2ED;text-align: center;margin-top: 8px;"><input type="text" id="hq_number" style="width: 40px; border: 0 none; text-align: center;color: #333;" value="0"></div>
                                <div style="width: 20px; float: left;text-align: center;margin-top: 8px; cursor: pointer;" onclick="hq_increment()">+</div>
                      </div>
                </div>
                <div class="col-sm-6 col-md-6">
                  
                </div>
                
       </div>

 </div>
  <div id="air" class="tab-pane fade">
        
        <div class="col-sm-12 col-md-12 padding_0" style="min-height:60px;"> 
              <div class="col-sm-12 col-md-12">
                <div class="col-sm-12 padding_0" style="padding-top:2%;margin-left: 3%;">
               <div class="col-sm-4">
                 
                    <div class="input-group">
                      <input type="text" class="form-control" aria-label="..." Value="Departure">
                      <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DALIAN CHINA</button>
                        <ul class="dropdown-menu">
                          <li><a itemprop="url" href="#">Action</a></li>
                          <li><a itemprop="url" href="#">Another action</a></li>
                          <li><a itemprop="url" href="#">Something else here</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a itemprop="url" href="#">Separated link</a></li>
                        </ul>
                      </div><!-- /btn-group -->
                     
                    </div><!-- /input-group -->
                  
              </div>
              
              <div class="col-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control" aria-label="..." Value="Destination">
                  <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DALIAN CHINA</button>
                        <ul class="dropdown-menu">
                          <li><a itemprop="url" href="#">Action</a></li>
                          <li><a itemprop="url" href="#">Another action</a></li>
                          <li><a itemprop="url" href="#">Something else here</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a itemprop="url" href="#">Separated link</a></li>
                        </ul>
                      </div><!-- /btn-group -->
                </div>
              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2">
                  <button class="btn btn-primary" type="button" style="background: #073252;height: 40px;font-size: 18px;line-height: 40px;padding-bottom: 44px;padding-top: 0px;border-radius: 3px!important;">
                      Calculate</button> 
              </div>

        </div>
       </div>
       <div class="col-sm-12 col-md-12" style="min-height:60px;"> 
                <div class="col-sm-6 col-md-6" style="height: 30px;width: 60%; padding-left: 50px;">
                      <div class="col-sm-6 col-md-6 gb" style="border: 1px solid #DAE2ED !important; height: 38px; padding: 0 10px; width: 40%;">
                             <div style="width: 120px; float: left;border-right: 1px solid #DAE2ED; text-align: center; padding-top: 8px; height: 100%; ">Gross Weight</div>
                              
                               <div style="width: 50px; float: left;text-align: center;padding-top: 8px; height: 100%;">KG</div>
                               
                      </div>
                      <div class="col-sm-6 col-md-6 gp" style="border: 1px solid #DAE2ED !important; height: 38px; padding: 0 10px; width: 40%; margin-left: 10px;">
                                <div style="width: 130px; float: left;border-right: 1px solid #DAE2ED; text-align: center; padding-top: 8px; height: 100%; ">Gross Volume(m³)</div>
                              
                               <div style="width: 50px; float: left;text-align: center;padding-top: 8px; height: 100%;">m3</div>
                              
                      </div>
                </div>
                <div class="col-sm-6 col-md-6">
                  
                </div>
                <div  class="col-sm-12 col-md-12" style="min-height:60px; padding-left: 60px; margin-top: 30px;">
                        <div style="width: 25%; float: left;">
                                <input type="checkbox" style="margin-right: 10px; position: absolute; left: 42px;">Door to door pick-up
                        </div>
                        <div style="width: 25%; float: left;">
                                <input type="checkbox" style="margin-right: 10px; position: absolute;left: 26%;">Delivery to door
                        </div>
              </div>
                
       </div>
 </div>
 </div>
  <div id="express" class="tab-pane fade">
        <div class="col-sm-12" style="padding-top:2%; padding-left: 3%;">
            <div class="col-sm-4">
                 
                    <div class="input-group">
                      <input type="text" class="form-control" aria-label="..." Value="Departure">
                      <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DALIAN CHINA</button>
                        <ul class="dropdown-menu">
                          <li><a itemprop="url" href="#">Action</a></li>
                          <li><a itemprop="url" href="#">Another action</a></li>
                          <li><a itemprop="url" href="#">Something else here</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a itemprop="url" href="#">Separated link</a></li>
                        </ul>
                      </div><!-- /btn-group -->
                     
                    </div><!-- /input-group -->
                  
              </div>
              
              <div class="col-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control" aria-label="..." Value="Destination">
                  <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DALIAN CHINA</button>
                        <ul class="dropdown-menu">
                          <li><a itemprop="url" href="#">Action</a></li>
                          <li><a itemprop="url" href="#">Another action</a></li>
                          <li><a itemprop="url" href="#">Something else here</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a itemprop="url" href="#">Separated link</a></li>
                        </ul>
                      </div><!-- /btn-group -->
                </div>
              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2">
                  <button class="btn btn-primary" type="button" style="background: #073252;height: 40px;font-size: 18px;line-height: 40px;padding-bottom: 44px;padding-top: 0px;border-radius: 3px!important;">
                      Calculate</button> 
              </div>

        </div>
         <div class="col-sm-12 col-md-12 padding_0" style="min-height:60px;"> 
                <div class="col-sm-6 col-md-6" style="height: 30px;width: 60%; padding-left: 50px;">
                      <div class="col-sm-6 col-md-6 gb" style="border: 1px solid #DAE2ED !important; height: 38px; padding: 0 10px; width: 40%;">
                             <div style="width: 120px; float: left;border-right: 1px solid #DAE2ED; text-align: center; padding-top: 8px; height: 100%; ">Gross Weight</div>
                              
                               <div style="width: 50px; float: left;text-align: center;padding-top: 8px; height: 100%;">KG</div>
                               
                      </div>
                      <div class="col-sm-6 col-md-6 gp" style="border: 1px solid #DAE2ED !important; height: 38px; padding: 0 10px; width: 40%; margin-left: 10px;">
                                <div style="width: 130px; float: left;border-right: 1px solid #DAE2ED; text-align: center; padding-top: 8px; height: 100%; ">Gross Volume(m³)</div>
                              
                               <div style="width: 50px; float: left;text-align: center;padding-top: 8px; height: 100%;">1</div>
                              
                      </div>
                </div>
                <div class="col-sm-6 col-md-6">
                  
                </div>
              </div>
              <div  class="col-sm-12 col-md-12" style="min-height:60px; padding-left: 60px;">
                        <div style="width: 25%; float: left;">
                                <input type="checkbox" style="margin-right: 10px; position: absolute; left: 42px;">Filter by Receiving point
                        </div>
                        <div style="width: 25%; float: left;">
                                <input type="checkbox" style="margin-right: 10px; position: absolute; left: 26%;">Filter by Departure station
                        </div>
              </div>
 </div>

  <div id="railway" class="tab-pane fade">
        <div class="col-sm-12 padding_0" style="padding-top:2%;margin-left: 3%;">
            <div class="col-sm-4">
                 
                    <div class="input-group">
                      <input type="text" class="form-control" aria-label="..." Value="Departure">
                      <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DALIAN CHINA</button>
                        <ul class="dropdown-menu">
                          <li><a itemprop="url" href="#">Action</a></li>
                          <li><a itemprop="url" href="#">Another action</a></li>
                          <li><a itemprop="url" href="#">Something else here</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a itemprop="url" href="#">Separated link</a></li>
                        </ul>
                      </div><!-- /btn-group -->
                     
                    </div><!-- /input-group -->
                  
              </div>
              
              <div class="col-sm-4">

              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-2">
                  <button class="btn btn-primary" type="button" style="background: #073252;height: 40px;font-size: 18px;line-height: 40px;padding-bottom: 44px;padding-top: 0px;border-radius: 3px!important;">
                      Calculate</button> 
              </div>

        </div>
  </div>
</div>

</div>
 <div class="row padding_0" style="background: #fff; padding-bottom:5%; margin-bottom:28px; border-bottom: 1px solid rgba(0,0,0,.1);">
          <div class="col-sm-12 col-md-12">
                           <div class="col-sm-12 col-md-12" style="padding-bottom: 6%;">
                          <div class="wm-guide guide-box">
                           <div class="uii-detail">Bdtdc.com partners major logistics providers covering LCL &amp; FCL sea shipments across the globe. <br> Cargoes are shipped from 3 main ports (Dhaka, Chittagong, Khulna) in Bangladesh to more than 30 popular destination ports.</div>
                           </div>
                           <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-3 padding_0">
                                           <i class="fa fa-circle" aria-hidden="true" style="font-size: 10px; color: #A7C2DD; padding: 20px 5px; float: left;"></i>
                                           <div style="border-top: 1px solid #A7C2DD; width:92%; float: left; margin-top: 25px;">
                                             
                                           </div>

                                    </div>
                                    <div class="col-sm-3 padding_0">
                                      <i class="fa fa-circle" aria-hidden="true" style="font-size: 10px;color: #A7C2DD; padding: 20px 5px; float: left;"></i>
                                       <div style="border-top: 1px solid #A7C2DD; width:92%; float: left; margin-top: 25px;">
                                             
                                           </div>
                                    </div>
                                    <div class="col-sm-3 padding_0">
                                       <i class="fa fa-circle" aria-hidden="true" style="font-size: 10px; color: #A7C2DD; padding: 20px 5px; float: left;"></i>
                                        <div style="border-top: 1px solid #A7C2DD; width:92%; float: left; margin-top: 25px;">
                                             
                                           </div>
                                    </div>
                                    <div class="col-sm-3 padding_0">
                                          <i class="fa fa-circle" aria-hidden="true" style="font-size: 10px; color: #A7C2DD; padding: 20px 5px; float: left;"></i>
                                           <div style="border-top: 1px solid #A7C2DD; width:80%; float: left; margin-top: 25px;">
                                             
                                           </div>
                                           <i class="fa fa-circle" aria-hidden="true" style="font-size: 10px; color: #A7C2DD; padding: 20px 5px; float:left;"></i>
                                    </div>
                           </div>
                           <div class="col-sm-12 col-md-12">
                             <div class="ui2-process-item">
                              
                               <div class="ui2-process-text">Select Shipping Method</div>
                             </div>
                             <div class="ui2-process-item">
                               
                               <div class="ui2-process-text">Inform Supplier</div>
                             </div>
                             <div class="ui2-process-item">
                             
                               <div class="ui2-process-text">Shipping</div>
                             </div>
                             <div class="ui2-process-item">
                             
                               <div class="ui2-process-text">Payment</div>
                             </div>
                             <div class="ui2-process-item ui2-process-item-last">
                             
                               <div class="ui2-process-text">Completed</div>
                             </div>
                           </div>
                    </div>
                </div>
            <div class="col-sm-12" style="padding-top:20px;padding-bottom:20px;background-color:#F5F7FA;">
                <div class="col-sm-6">
                    <img itemprop="image" style="height:100%;width:100%;" src="{!! asset('assets/fontend/bdtdc-images/explore-bangladesh.jpg') !!}" alt="explore bangladesh
" />
                </div>
                <div class="col-sm-6" style="background-color:#fff!important;padding-top:20px;padding-left:20px;padding-bottom:11.5%;">
                    <p style="color: #333;font-size:18px;">FAQ</p>
                    <ul>
                        <li><a itemprop="url" href="#" style="color: inherit;padding-top:20px;padding-bottom:20px;">What services does BuyerSeller Logistics provide?</a></li>
                        <li><a itemprop="url" href="#" style="color: inherit;padding-top:10px;padding-bottom:10px;">How do I search for logistics solutions?</a></li>
                        <li><a itemprop="url" href="#" style="color: inherit;padding-top:10px;padding-bottom:10px;">How do I place an order?</a></li>
                        <li><a itemprop="url" href="#" style="color: inherit;padding-top:10px;padding-bottom:10px;">How do I settle the payment for shipping?</a></li>
                        
                    </ul>
                </div>
            </div>

        </div> 
        
	@stop
   @section('scripts')
        <script type="text/javascript">
                $(document).ready(function(){
             $(".nav-tabs a").click(function(){
                    $(this).tab('show');
                });
            });
        function increment()
          {
            var gb_num=document.getElementById('number_value').value;
            ++gb_num;
              document.getElementById('number_value').value =gb_num;
          }
          function decrement()
          {
            var dec_num=document.getElementById('number_value').value;
            --dec_num;
            if(dec_num >= 0)
             document.getElementById('number_value').value =dec_num;
          }
           function bd_increment()
          {
            var gb_num=document.getElementById('bd_number').value;
            ++gb_num;
              document.getElementById('bd_number').value =gb_num;
          }
          function bd_decrement()
          {
            var dec_num=document.getElementById('bd_number').value;
            --dec_num;
            if(dec_num >= 0)
             document.getElementById('bd_number').value =dec_num;
          }
          function hq_increment()
          {
            var gb_num=document.getElementById('hq_number').value;
            ++gb_num;
              document.getElementById('hq_number').value =gb_num;
          }
          function hq_decrement()
          {
            var dec_num=document.getElementById('hq_number').value;
            --dec_num;
            if(dec_num >= 0)
             document.getElementById('hq_number').value =dec_num;
          }
         </script>

 @stop