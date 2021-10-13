@extends('mobile-view.layout.master_m')
	@section('content')
<section>
    <div class="row"> 
        <div style="max-height: 200px;background-color: #1686cc;display: block;">
            <div class="row ">
                <div class="col-sm-12 col-md-12" style="padding: 0 30px;">
                    <h1 style="margin-top: 2.5%;margin-left: 14px;text-align: center;font-size: 16px; margin-bottom: 0;" class="country-trade-title">Effective sourcing from {{ $page_name or 'selected'}} suppliers.</h1>
                </div> 
            </div>
            <div class="row get-q">
                <a itemprop="url" href="{{ URL::to('get-quotations') }}" target="_blank" class="btn btn-primary btn-join" style="height:47px;border-radius:5px;font-size:18px;color:#fff!important;padding-top: 4px; margin-bottom: 15px;">Get Quotations Now</a>
            </div>
    </div>
                    
</div>
</section>
<section>
    <div class="row">
        <div class="col-md-12 padding_0" style="padding-bottom: 1%;padding-left: 2%">
            <ul style="margin-left: -2%" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li style="float: left;" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" href="{{ URL::to('/') }}" style="color: #000"> Home &nbsp;</a></li>
            <li style="float: left" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" href="" style="color: #000"> <i class="fa fa-angle-right"></i> {{ $page_name }} products <i class="fa fa-angle-right"></i></a></li></ul>
        </div>
    </div>
<div class="row" style="margin-top: 20px;">
<div class="col-md-12 padding_0">
   
    <a class="more" itemprop="url" href="#" style="padding-left: 25px; margin-top: 10px; margin-bottom: 10px; display: block;"><i class="fa fa-list-ul"></i> Premium Rated Products</a>
    

     @foreach($primium as $p)
            <?php
                    $pname = 'not available';
                    if($p->pro_to_cat_name){
                        $pname = $p->pro_to_cat_name->name or 'Unknown';
                    }
                ?>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding: 25px 0;background: white; margin-bottom: 2px">
       <div class="bdpro-hovereffect2">
           <a href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pname).'='.mt_rand(100000000, 999999999).$p->product_id) }}">
       
                @if($p->pro_images_new)
                    <img itemprop="image"  title="{{ $pname }}" style="width:100%;height: 232px;;min-height: 232px;padding: 0" class="img-thumbnail pro-imges" src="{!! asset($p->pro_images_new->image) !!}" alt="{{ $pname }}" />
                   
                @else
                <img itemprop="image" title="{{ $pname }}" style="width:100%;height: 222px;min-height: 232px;padding: 0" class="img-thumbnail pro-imges" src="{!! asset('uploads/no-image.jpg') !!}" alt="{{ $pname }}" />
                @endif

               </a>
        </div>
        <div style="padding: 5%;background-color: #fff">
         <div class="fea-info-tit" style="padding: 1%;    height: auto;font-size: 12px;margin: 0px;padding-top: 4%;">
            
            <h4 style="font-size: 16px;margin: 0px">
            <a href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pname).'='.mt_rand(100000000, 999999999).$p->product_id) }}">
                {{ substr($pname,0,18) }}..
            </a>
            </h4>
          
            <div class="fea-info-tit" style="line-height: 20px;    height: auto;font-size: 11px;opacity: .7">
                <?php 
                             ?>
                             <?php
                             if ($p->supp_pro_company) {
                                echo '<a itemprop="url" target="_blank" href="'.URL::to('Home/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$p->supp_pro_company_name->name)).'/'.$p->company_id.'">';
                             }else{echo "company not available";}
                             ?>
                              
                                    
                                    <?php
                                    if ($p->supp_pro_company_name) {
                                        echo substr($p->supp_pro_company_name->name,0,20);
                                     }else{echo "company not available";}
                                    /*if($p->bdtdcProduct->supplier_product->sup_companies->name_string->name != null){
                                        echo $p->bdtdcProduct->supplier_product->sup_companies->name_string->name;
                                    }else{
                                        echo "no data";
                                    }*/
                                    ?>
                    </a>
            </div>
                   <?php
                            if ($p->bdtdcProduct) {
                                if ($p->bdtdcProduct->product_prices) {
                                    if($p->bdtdcProduct->product_prices->product_FOB){
                                        if($p->bdtdcProduct->product_prices->product_FOB=='N/A')
                                        {
                                            echo "ask current price";
                                        }
                                        else{
                                    echo "<strong>  US $</strong>".$p->bdtdcProduct->product_prices->product_FOB;
                                    }
                                    }

                                }else{echo "Price not available";}
                            }else{echo "product not available";}
                         /*if($p->bdtdcProduct->product_prices != null){
                                if($p->bdtdcProduct->product_prices->product_FOB != null){
                                    echo $p->bdtdcProduct->product_prices->product_FOB;
                                }else{}
                            }else{}*/ ?>/<?php
                            if ($p->bdtdcProduct) {
                                if ($p->bdtdcProduct->ProductUnit) {
                                    echo $p->bdtdcProduct->ProductUnit->name;
                                }else{echo "pieces";}
                            }else{echo "price not available";}
                             /*if($p->bdtdcProduct->ProductUnit != null){
                                    echo $p->bdtdcProduct->ProductUnit->name;
                                }else{echo "pieces"; }*/ ?>
                           
                            <p style="width:100%; text-align: center;margin: 0px;line-height: 21px;"><?php 
                            if ($p->bdtdcProduct) {
                                if ($p->bdtdcProduct->product_prices) {
                                    echo $p->bdtdcProduct->product_prices->product_MOQ;
                                }else{echo "none";}
                            }else{echo "product not available";}
                            /*if($p->bdtdcProduct->product_prices != null){
                                if($p->bdtdcProduct->product_prices->product_MOQ != null){
                                    echo $p->bdtdcProduct->product_prices->product_MOQ;
                                }else{}
                            }else{}*/ ?>(Min. Order)</p>
                </div>
             <div class="fea-info-tit" style="padding: 2%;    height: auto;">
                   <a href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pname).'='.mt_rand(100000000, 999999999).$p->product_id) }}" type="button" class="btn btn-primary" style="border-radius: 4px !important;padding: 6px 10px;"><h2 class="summery"><span itemprop="name" style="color: #fbf4f4;font-size: 14px;"> Contact Supplier</span></h2>
                   </a>
                </div>
            </div>
            </div>
        @endforeach
</div>
</div>
<div class="col-sm-12 padding_0">

<div class="" style="padding-bottom: 2%; padding-left: 7.5px; padding-right: 7.5px; overflow: hidden;">
            <div class="row" style=" background: #fff; margin: 0; padding-top: 10px;">
                <input type="hidden" name="categoryid" value="{{ $categoryid }}">
                <input type="hidden" name="countery" value="{{ $countryid }}">
                <input type="hidden" name="buyer_protection_input_data" value="{{ $buyer_protection }}">
                <input type="hidden" name="gold_supplier_input" value="{{ $gold_supplier }}">
                <input type="hidden" name="assessed_supplier_input" value="{{ $assessed_supplier }}">

               <div style="font-size:12px;padding-top: 6px;padding-left: 10px; float: left;" class="col-sm-2 col-md-2  title_home padding_0">
                Supplier Location:
                </div>
                <div class="col-sm-10 col-md-10  padding_0 ">
                 <div class="col-md-3 padding_0">
                    <div style="background-color:#fff;border: 1px solid #dae2ed;cursor: pointer;    display: inline-block;height: 25px;    line-height: 22px;padding: 0 0 0 5px;    width: 92%;    vertical-align: middle;color: #333;margin-top: 8px;" class="country_tab">
                        <span class="replace_name"><?php if($countryid != 0){foreach ($bdtdc_country_list as $value) {
                            if($countryid == $value->id){
                                echo $value->name. " Selected";
                            }
                        }}else{ echo "All Countries &amp; Regions";} ?></span>
                        <i style="padding-left:0px;" class="fa fa-angle-down fa_down_show" aria-hidden="true"></i>
                        <i style="padding-left:0px;display:none;" class="fa fa-angle-up fa_up_show" aria-hidden="true"></i>

                    </div>
                    <div class="container country_tab_show" style="display: none;">
                    <div style="position:absolute;border: 1px solid #dae2ed;box-shadow: 2px 2px 3px rgba(0,0,0,.13);background-color: #fff;top: 29px;left: -120px;padding: 10px;overflow: auto;height: 250px;width: 325%;z-index: 1;" class="">
                      <div style="border-bottom: 1px dotted #dae2ed;    padding-bottom: 10px;">
                        <div class="replace_name" style="cursor: pointer;background: #7d8ca1;color: #fff;font-size: 12px;    line-height: 26px;width: 162px;padding-left: 7px;    border-radius: 5px !important;"><?php if($countryid != 0){foreach ($bdtdc_country_list as $value) {
                            if($countryid == $value->id){
                                echo $value->name. " Selected";
                            }
                        }}else{ echo "All Countries &amp; Regions";} ?></div>
                      </div>
                      <select style="box-sizing: border-box;border: 1px solid #dae2ed;color: #333;box-shadow: inset 0 1px 2px rgba(0,0,0,.1);height: 29px;font-size: 12px;width: 29%;padding-left: 24px;margin-top: 10px;margin-bottom: 10px;" class="form-control filter_by_cat_pro_input" name="country_id_data">
                            <option value="0">Select Country</option>
                            <?php
                                foreach($bdtdc_country_list as $bdtdc_country_list_data){
                                    if($countryid == $bdtdc_country_list_data->id){
                                    echo '<option value="'.$bdtdc_country_list_data->id.'" selected>'.$bdtdc_country_list_data->name.'</option>';
                                    }else{
                                    echo '<option value="'.$bdtdc_country_list_data->id.'">'.$bdtdc_country_list_data->name.'</option>';
                                    }
                                }
                            ?>
                        </select>
                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#all-con">All Countries</a></li>
                            <?php
                                foreach ($country as $Countries) {
                                    echo '<li><a data-toggle="tab" href="#'.explode(' ', $Countries->name)[0].'">'.$Countries->name.'</a></li>';

                                }
                            ?>
                          </ul>

                          <div class="tab-content">
                            <div id="all-con" class="tab-pane fade in active">
                              <div class="col-md-3 padding_0">
                                <label class="country_select" style="cursor:pointer;"> All</label>
                              </div>
                              <?php
                                foreach ($country as $Countries) {
                                        foreach($Countries->country_region as $p){
                                            echo '<div class="col-md-3 padding_0"><span class="country_select" style="cursor:pointer;" data-countryid="'.$p->id.'">'.$p->name.'</span></div>';
                                        }
                                    }
                                ?>
                            </div>
                            <?php
                            foreach ($country as $Countries) {
                                echo '<div id="'.explode(' ', $Countries->name)[0].'" class="tab-pane fade">';
                                foreach($Countries->country_region as $p){
                                    echo '<div class="col-md-3 padding_0"><span class="country_select" style="cursor:pointer;" data-countryid="'.$p->id.'">'.$p->name.'</span></div>';
                                }
                                echo "</div>";
                            }
                            ?>
                          </div>
                       </div>
                    </div>
                </div>
                <div class="col-md-9 col-xs-12 padding_0">
                <label style="font-size:12px; float: left;" class="ui2-checkbox-customize-label">
                    <span style="position: relative; top: 2px;" class="ui2-checkbox-customize-txt sptp">Supplier Types: </span>
                </label>
                <label title="Buyer Protection: Ensures on-time shipment and pre-shipment product quality" style="padding: 5px;font-size:12px;float: left; cursor: pointer;" class="ui2-checkbox-customize-label">
                    <input style="position: relative; top: 2px; cursor: pointer;" type="checkbox" class="ui2-checkbox-customize-val cat_filter_check_box" name="buyer_protection" value="false" <?php if($buyer_protection == 'true'){echo 'checked';} ?>>
                    <span class="ui2-checkbox-customize-txt"><img style="height: 29px;
width: 31px;
padding: 0px 5px 5px 5px;
" src="{!! asset('resources/assets/gold/Buyer-protection-home.png') !!}" alt="Buyer protection home">Buyer Protection</span>
                </label>
                <label title="Gold Suppliers:pre-qualified suppliers typr" style="padding: 5px;font-size:12px;float: left; cursor: pointer;" class="ui2-checkbox-customize-label">
                    <input style="position: relative; top: 2px; cursor: pointer;" type="checkbox" class="ui2-checkbox-customize-val cat_filter_check_box" name="gold_supplier" value="false" <?php if($gold_supplier == 'true'){echo 'checked';} ?>>
                    <span class="ui2-checkbox-customize-txt"><img style="height: 29px;
width: 31px;
padding: 0px 5px 5px 5px;
" src="{!! asset('resources/assets/helpcenter/Gold-membership.png') !!}" alt="Gold membership">Gold Supplier</span>
                </label>
                <label title="Assessed Supplier: Supplier assessed by a world-leading inspection company (i.e SGS, Bureau Veritas)." style="padding: 5px;font-size:12px;float: left; cursor: pointer;" class="ui2-checkbox-customize-label">
                    <input style="position: relative; top: 2px; cursor: pointer;" type="checkbox" class="ui2-checkbox-customize-val cat_filter_check_box" name="assessed_supplier" value="false" <?php if($assessed_supplier == 'true'){echo 'checked';} ?>>
                    <span class="ui2-checkbox-customize-txt"><img style="height: 29px;
width: 31px;
padding: 0px 5px 5px 5px;
" src="{!! asset('resources/assets/helpcenter/verified-supplier.png') !!}" alt="verified supplier">Assessed Supplier</span>
                </label>
                </div>

                </div>
               <div id="pro_view" class="col-sm-8 col-md-12 col-xs-12 padding-right" data-spm="57">
            <div class="col-sm-4 col-md-4 padding_0 padding-right">
                <div class="view-label" style="padding: 8px; float: left;">View  @if(count($products)>=1)
                <strong><?php echo count($products); ?></strong> 
            @else
                <strong>0</strong>
            @endif
                            Product(s) below
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="view-label text-center" style="padding: 8px;">Total @if(isset($products))
                    <strong>{{$products->total()}}</strong> @else
                    <strong>0</strong> @endif Result(s) found
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="view-label text-right" style="padding: 8px; float: left;">Page No @if(isset($products))
                    <strong>{{$products->currentPage()}}</strong> @if($products->lastPage() >0 )
                    of <strong>{{$products->lastPage()}}</strong> 
                    @endif | 
                    <a href="{{$products->previousPageUrl()}}">prev</a> | 
                    <a href="{{$products->nextPageUrl()}}">next</a>
                    @else
                    <strong>0</strong>
                    @endif
                </div>
            </div>
        </div> 
                          </div>
        </div>
    <div class="col-sm-12 padding_0">
    @foreach($products as $p)
    <?php
                    $pname = 'not available';
                    if($p->pro_to_cat_name){
                        $pname = $p->pro_to_cat_name->name or 'Unknown';
                    }
                ?>
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6" style="padding: 7.5px">
     <div class="bdpro-hovereffect">
            <a href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pname).'='.mt_rand(100000000, 999999999).$p->product_id) }}"> 

             
                
                
                @if($p->pro_images_new)
                    <img itemprop="image"  title="{{ $pname }}" style="width:100%;height: 232px;min-height: 232px" class="img-thumbnail pro-imges" src="{!! asset($p->pro_images_new->image) !!}" alt="{{ $pname }}" />
                  
                @else
                <img itemprop="image" title="{{ $pname }}" style="width:100%;height: 232px;min-height: 232px" class="img-thumbnail pro-imges" src="{!! asset('uploads/no-image.jpg') !!}" alt="{{ $pname }}" />
                @endif
            <div class="bdpro-overlay" style="padding: 5px">
            <a href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pname).'='.mt_rand(100000000, 999999999).$p->product_id) }}"> 
                <h2>{{ substr($p->pro_to_cat_name->name,0,50) }}</h2>
                </a>
				<p style="padding: 0px">
					<a style="color: white!important" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pname).'='.mt_rand(100000000, 999999999).$p->product_id) }}"> <?php
                            if ($p->bdtdcProduct) {
                                if ($p->bdtdcProduct->product_prices) {
                                    if($p->bdtdcProduct->product_prices->product_FOB){
                                        if($p->bdtdcProduct->product_prices->product_FOB=='N/A')
                                        {
                                            echo "ask current price";
                                        }
                                        else{
                                    echo "<strong>  US $</strong>".$p->bdtdcProduct->product_prices->product_FOB;
                                    }
                                    }

                                }else{echo "Price not available";}
                            }else{echo "product not available";}
                         /*if($p->bdtdcProduct->product_prices != null){
                                if($p->bdtdcProduct->product_prices->product_FOB != null){
                                    echo $p->bdtdcProduct->product_prices->product_FOB;
                                }else{}
                            }else{}*/ ?>/<?php
                            if ($p->bdtdcProduct) {
                                if ($p->bdtdcProduct->ProductUnit) {
                                    echo $p->bdtdcProduct->ProductUnit->name;
                                }else{echo "pieces";}
                            }else{echo "price not available";}
                             /*if($p->bdtdcProduct->ProductUnit != null){
                                    echo $p->bdtdcProduct->ProductUnit->name;
                                }else{echo "pieces"; }*/ ?>
                           
                            <span style="width:100%; text-align: center"><?php 
                            if ($p->bdtdcProduct) {
                                if ($p->bdtdcProduct->product_prices) {
                                    echo $p->bdtdcProduct->product_prices->product_MOQ;
                                }else{echo "none";}
                            }else{echo "product not available";}
                            /*if($p->bdtdcProduct->product_prices != null){
                                if($p->bdtdcProduct->product_prices->product_MOQ != null){
                                    echo $p->bdtdcProduct->product_prices->product_MOQ;
                                }else{}
                            }else{}*/ ?>(Min. Order)</span></a>
				</p>
				<a href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pname).'='.mt_rand(100000000, 999999999).$p->product_id) }}" type="button" class="btn btn-primary" style="border-radius: 4px !important;padding: 5%;">Source Now</a>
            </div>
            </a>
            </div>
            <div class="sp-l-t-j" style="padding: 5%;background-color: #fff">
            <div class="fea-info-tit" style="padding: 1%;    height: auto;font-size: 12px;margin: 0px;padding-top: 4%;">
            <a href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pname).'='.mt_rand(100000000, 999999999).$p->product_id) }}"> 
            <h4 style="font-size: 16px;margin: 0px;white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                {{$pname}}
            </h4>
        </a>
            <div class="fea-info-tit" style="line-height: 20px;    height: auto;font-size: 11px;opacity: .7">
                <?php 
                             ?>
                             <?php
                             if ($p->supp_pro_company) {
                                echo '<a itemprop="url" target="_blank" href="'.URL::to('Home/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$p->supp_pro_company_name->name)).'/'.$p->company_id.'">';
                             }else{echo "company not available";}
                             ?>
                              
                                    
                                    <?php
                                    if ($p->supp_pro_company_name) {
                                        echo substr($p->supp_pro_company_name->name,0,20);
                                     }else{echo "company not available";}
                                    
                                    ?>
                                    </a>
            </div>
                   <?php
                            if ($p->bdtdcProduct) {
                                if ($p->bdtdcProduct->product_prices) {
                                    if($p->bdtdcProduct->product_prices->product_FOB){
                                        if($p->bdtdcProduct->product_prices->product_FOB=='N/A')
                                        {
                                            echo "ask current price";
                                        }
                                        else{
                                    echo "<strong>  US $</strong>".$p->bdtdcProduct->product_prices->product_FOB;
                                    }
                                    }

                                }else{echo "Price not available";}
                            }else{echo "product not available";}
                         ?>/<?php
                            if ($p->bdtdcProduct) {
                                if ($p->bdtdcProduct->ProductUnit) {
                                    echo $p->bdtdcProduct->ProductUnit->name;
                                }else{echo "pieces";}
                            }else{echo "price not available";}
                             ?>
                           
                            <p style="width:100%; text-align: center;margin: 0px;line-height: 21px;"><?php 
                            if ($p->bdtdcProduct) {
                                if ($p->bdtdcProduct->product_prices) {
                                    echo $p->bdtdcProduct->product_prices->product_MOQ;
                                }else{echo "none";}
                            }else{echo "product not available";}
                             ?>(Min. Order)</p>
                </div>
             <div class="fea-info-tit" style="padding: 2%;    height: auto;">
                   <a href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $pname).'='.mt_rand(100000000, 999999999).$p->product_id) }}" type="button" class="btn btn-primary" style="border-radius: 4px !important;padding: 6px 10px;"><h2 class="summery"><span itemprop="name" style="color: #fbf4f4;font-size: 14px;"> Contact Supplier</span></h2>
                   </a>
                </div>
            
                
                
            </div>



            </div>
        @endforeach

        {!! $products->render() !!}
        </div>
        </div>


</div>

<div class="row padding_0">
                <div class="col-sm-12 col-md-12 padding_0">
                    <h1 style="margin-top: 3%;text-align: center;color: #000;font-size: 14px" class="country-trade-title">
                    </h1>
                </div>             
</div>
  <div class="row get-q" style="padding-bottom: 2%;text-align: center;padding-left: 0px">
                <a itemprop="url" href="{{ URL::to('get-quotations')}}" target="_blank" class="btn btn-primary btn-join" style="height:47px;border-radius:5px;font-size:18px;color:#fff!important;padding-top: 4px; /*background-color: #FF771C */">Get Quotations Now</a>
            </div>

 <div class="row padding_0" style="padding-bottom: 2%;text-align: center;font-size: 14px">
         Do you want to show<strong> {{ $page_name or '' }}</strong> or other products of your own company?        <a itemprop="url" href="http://apps.bditdc.com/get-quotations" target="_blank" class="" style="height:47px;border-radius:5px;font-size:14px;color:#000!important;padding-top: 4px; background-color: "><strong>Display your Products FREE now!</strong></a>
    </div>

  <div class="row" style="background-color: #ffffff;padding: 2%;margin-bottom: 2%">
      <div class="col-sm-12" style="padding: 0 0 0 5px;margin: 0 0 30px;font-size: 18px;line-height: 40px;color: #222;font-weight: bold;
border-bottom: 2px solid #999;">
      <h5 style="font-size: 16px"><b>Determined channel for genuine Suppliers</b></h5>
      </div>
        <hr>
    <div class="col-sm-12 col-md-12 col-lg-12">
    <p style="font-size: 14px; text-align: left;font-weight: normal; padding:0; margin: 0;opacity: .7">BDTDC.com works with the world's most renowned brands and creates the golden opportunity for you to have the most  profitable deal in<strong> {{ $page_name or '' }}</strong> Products Sector.
    </p>
</div>
</section>
	@stop
@section('scripts')

    <script type="text/javascript">
            $(document).ready(function(){
                $("#ct-btn").click(function(){
                    $(".sb-ct-lst").toggle();
                });
            });
        function search_data(){
            var categoryid = $('input[name="categoryid"]').val();
            var country = $('input[name="countery"]').val();
            var buyer_protection = $('input[name="buyer_protection_input_data"]').val();
            var gold_supplier = $('input[name="gold_supplier_input"]').val();
            var assessed_supplier = $('input[name="assessed_supplier_input"]').val();
            var url = window.location.origin+'/wholesale/category/product/category=='+categoryid+'+..+country=='+country+'+..+buyer_protection=='+buyer_protection+'+..+gold_supplier=='+gold_supplier+'+..+assessed_supplier=='+assessed_supplier;
            window.location.href = url;
        }

        $(document).on({change:function(){
            $('input[name="countery"]').val($(this).val());
            $('.fa_down_show').show();
            $('.fa_up_show').hide();
            $('.country_tab_show').hide();
            search_data();
        }},'.filter_by_cat_pro_input');

        $(document).on({click:function(){
            var countryid = $(this).attr('countryid');
            $('[name="countery"]').val(countryid);
            $('.fa_down_show').show();
            $('.fa_up_show').hide();
            $('.country_tab_show').hide();
            search_data();
        }},'.country_select');

        /* ******** Country search ********** */
        $(document).on({click:function(){
            $('.fa_down_show').toggle();
            $('.fa_up_show').toggle();
            $('.country_tab_show').toggle();
        }}, '.country_tab');

        $(document).on({
                click: function(e) {
                e.preventDefault();
                $('.fa_down_show').show();
                $('.fa_up_show').hide();
                $('.country_tab_show').hide();
                var selected = $(this).val();
                var selected_name = $(this).attr('name');
                if(selected_name == 'buyer_protection'){
                    if ($('input[name="buyer_protection"]').is(':checked')) {
                        $('input[name="buyer_protection_input_data"]').val('true');
                    }else{
                        $('input[name="buyer_protection_input_data"]').val('false');
                    }
                }else if(selected_name == 'gold_supplier'){
                    if ($('input[name="gold_supplier"]').is(':checked')) {
                        $('input[name="gold_supplier_input"]').val('true');
                    }else{
                        $('input[name="gold_supplier_input"]').val('false');
                    }
                }else if(selected_name == 'assessed_supplier'){
                    if ($('input[name="assessed_supplier"]').is(':checked')) {
                        $('input[name="assessed_supplier_input"]').val('true');
                    }else{
                        $('input[name="assessed_supplier_input"]').val('false');
                    }
                }
                search_data();
            }
        }, '.cat_filter_check_box');

        $('ul.pagination').css('margin-top','15px');
        $('ul.pagination').css('margin-right','25px');

    </script>

    <script type="text/javascript">
        
        $(document).ready(function()
{
    $('img').bind('contextmenu', function(e){
        return false;
    }); 
});
    </script>

@stop