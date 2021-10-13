<div style="clear:both;"></div>

<div id="topbar_sha"   class="row cate-list-pro">
        <div class="col-sm-3 col-xs-12 mobo-categories hr-gap no-padding" style=" padding-left: 1.5% !important ">
            <h3 style="padding:0px"><a target="_blank" itemprop="url" href="{{ URL::to('online-marketplace',null)}}"><i class="fa fa-list-ul"></i> CATEGORIES</a></h3>
            <?php if ($categorys) { ?>
            <?php foreach ($categorys as $category) { ?>
            <ul  class="pull-left bazar-list" itemscope itemtype="http://schema.org/SiteNavigationElement">
                <li itemscope itemtype="http://data-vocabulary.org/Product" class="" data-id="market-<?php echo $category['category_id']; ?>">
                    <a target="_blank" itemprop="url"  rel="category" href="{{ URL::to($category['slug'],$category['category_id']) }}">
                        <span style="padding:0; font-size:13px;"  itemprop="name"><?php echo $category[ 'name']; ?></span> </a>
                    <span class="pull-right"><i class="fa fa-angle-right"></i></span>
                </li>
            </ul>
            <?php if ($category[ 'category_childrens']) { 

                ?>
            <?php foreach (array_chunk($category[ 'category_childrens'], ceil(count($category[ 'category_childrens']))) as $category_childrens) { ?>
            <div style="padding-top:0px;margin-left:94%;" class="col-lg-offset-12 col-md-offset-12 col-sm-offset-12 cacostos util-clearfix" id="market-<?php echo $category['category_id']; ?>">
                <ul class="cacostos-list" itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <li itemscope itemtype="http://data-vocabulary.org/Product"> 
                        <a target="_blank" itemprop="url"   class="prothom-cacostos" style="font-weight:700;line-height:20px;margin-bottom:10px" href="{{ URL::to($category['slug'],$category['category_id']) }}">
                     <span style="padding:0; font-size:13px;"  itemprop="name"><?php echo $category['name']; ?> </span></a>
                        <div style="margin-top:10px" class="ditio-cacostos">

                            <?php 
                            //sort($category_childrens);

                            foreach (array_slice($category_childrens,0,15) as $category_children) { ?>
                             <a target="_blank" itemprop="url"  rel="category"  href="{{URL::to('category/product',$category_children['categories_id']) }}">
                                <span style="padding:0; font-size:13px;" itemprop="name"> <?php echo $category_children[ 'child_name']; ?></span>
                             </a>
                            <?php } ?>
                        </div>
                    </li>
                </ul>
                 <ul class="cacostos-list" style="margin-top:30px" itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <li itemscope itemtype="http://data-vocabulary.org/Product">
                       <!-- <a itemprop="url"  href="#" class="prothom-cacostos"></a> -->
                        <div class="ditio-cacostos">
                            <?php

                             foreach (array_slice($category_childrens,15,12) as $category_children) { ?>
                            <a target="_blank" itemprop="url"  rel="category"  href="{{URL::to('category/product',$category_children['categories_id']) }}">
                                 <span style="padding:0; font-size:13px;"  itemprop="name"><?php echo $category_children[ 'child_name']; ?></span>
                            </a>
                            <?php } ?>
                        </div>

                    </li>
                </ul>
            </div>

            <?php } ?>

            <?php } ?>

            <?php } ?>

            <?php } ?>

            <ul id="bazar-list" class="pull-left" style="padding-left: 1.3%;;padding-right: 8%;padding-top: 6%;font-weight: 600;" itemscope itemtype="http://schema.org/SiteNavigationElement">

                
                    <li>
                    <a target="_blank" itemprop="url"  href="{{ URL::to('online-marketplace',null) }}">

                       All Categories </a>
                         <span class="pull-right"><i class="fa fa-angle-right"></i></span>
                       </li>
                  

                

                

            </ul>

        </div>

        <div class="col-xs-12 col-sm-9 padding_0" style="padding-top: 1px;padding-right: 6px;">


<div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" style="border-radius:10px !important; border:0 none;" class=""></li>
                <li data-target="#myCarousel" data-slide-to="1" style="border-radius:10px !important; border:0 none;" class=""></li>
                <li data-target="#myCarousel" data-slide-to="2" style="border-radius:10px !important; border:0 none;" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="3" style="border-radius:10px !important; border:0 none;" class=""></li>

                <li data-target="#myCarousel" data-slide-to="4" style="border-radius:10px !important; border:0 none;" class=""></li>

                
             </ol>
             <div class="carousel-inner" role="listbox">
                <div class="item" style="transform: translate3d(10,10,10);">
                 <img itemprop="image" style="height:345px;max-height:350px;width:100%;margin-left: -1px;" src="{{ asset('assets/slider/Deal967x352.jpg') }}" alt="buyer protection">
                         <div class="carousel-caption" style="width: 24%;left: 44%;padding: 10px 18px;top: 8.2%;right: 0 !important;bottom: inherit;zoom: 1; margin-left: 38%;">
                         
                        
                        </div>
                </div>

            
              <div class="item" style="transform: translate3d(10,10,10);">
                  <img itemprop="image" style="height:345px;max-height:350px;width:100%;margin-left: -1px;" src="{{ asset('assets/slider/International-Brand-967x352.jpg') }}" alt="dispatching systems">
                   <div class="carousel-caption" style="width: 24%;left: 44%;padding: 10px 18px;top: 8.2%;right: 0 !important;bottom: inherit;zoom: 1;margin-left: 38%;">
                        
                          
                        </div>
                </div>
            
                <div class="item active" style="transition: transform .6s ease-in-out;">
                  <img itemprop="image" style="height:345px;max-height:350px;width:100%;margin-left: -1px;" src="{{ asset('assets/slider/Popular  967 x 352.jpg') }}" alt="on time delivery">
                   <div class="carousel-caption" style="width: 24%;left: 44%;padding: 10px 18px;top: 8.2%;right: 0 !important;bottom: inherit;zoom: 1;margin-left: 38%;">
                          
                         
                        </div>
                </div>
                <div class="item" style="transition: transform .6s ease-in-out;">
                  <img itemprop="image" style="height:345px;max-height:350px;width:100%;margin-left: -1px;" src="{{ asset('assets/slider/Bag-Shoes-967x352.jpg') }}" alt="dispatching systems">
                   <div class="carousel-caption" style="width: 24%;left: 44%;padding: 10px 18px;top: 8.2%;right: 0 !important;bottom: inherit;zoom: 1;margin-left: 38%;">
                        
                          
                        </div>
                </div>
                <div class="item">
                  <img itemprop="image" style="height:345px;max-height:350px;width:100%;margin-left: -1px;" src="{{ asset('assets/slider/Seafood-967x352.jpg') }}" alt="dispatching systems">
                   <div class="carousel-caption" style="width: 24%;left: 44%;padding: 10px 18px;top: 8.2%;right: 0 !important;bottom: inherit;zoom: 1;margin-left: 38%;">
                        
                          
                        </div>
                </div>
            
            </div>
                <span class="sr-only">Previous</span>
            
                <span class="sr-only">Next</span>
            
            </div>
            

            

            <div class="col-sm-12 padding_0" style="padding-top:2%">

                <div class="col-sm-12 padding_0">
                    <div class="col-sm-8 padding_0">
                        <p class="title_home" style="font-size: 15px;font-weight: 700;color: #333;margin: 0px;"><a itemprop="url" href="{{ URL::to('VIP-buyer/One-stop-service')}}" target="_blank" style="color: #000;"> Connecting with VIP Buyers</a></p>
                    </div>
                    <div class="col-sm-4 padding_0 text-right">
                        <a itemprop="url" href="{{ URL::to('Sourcing/Requests/info') }}" target="_blank"> View More</a>
                    </div>

                </div>
        <div class="padding_0 col-sm-12">
        <div class="slidervip">
        @foreach($source as $s)
            <?php
                $inq_title = '';
                if($s->bdtdc_product){
                    if($s->bdtdc_product->product_name){
                        $inq_title = trim($s->bdtdc_product->product_name->name);
                    }else{
                        $inq_title = '';
                    }
                }else{
                    $inq_title = trim($s->inquery_title);
                }
            ?>
            @if($inq_title != '')
            <div class="col-sm-12 source slide" style="padding-bottom:1%; background-color: rgba(39, 119, 164, 0.04) !important;min-height:85px;">
            <div class="col-md-9 padding_0">
                <a itemprop="url" href="{{ URL::to('product-sourcing/view',$s->id )}}">
                    <p style="padding-top: 1%;font-size: 12px;font-weight: 600;color: #000;padding-left: 1%;">
                            {{substr($inq_title,0,60)}}
                    </p>
                </a>
                    <?php
                    $inq_pro_img_url_exits = URL::to('uploads/no-image.jpg');
                    if($s->inq_products_images){
                        
                        $inq_pro_img_url_exits = URL::to($s->inq_products_images->image);
                    }else if($s->inq_docs_one){
                        $inq_pro_img_url_exits = URL::to('buying-request-docs/'.$s->inq_docs_one->docs);
                        
                    }
                    ?>
                    <div class="col-sm-1" style="padding-right:0px;">
                        <img itemprop="image" style="height: 42px;width: 52px;" src="{!! $inq_pro_img_url_exits !!}" alt="
                            {{ $inq_title }}
                        ">
                    </div>
                   
                    <div class="col-sm-10">
                        <div class="col-sm-12 padding_0" style="">
                            
                            <div class="col-sm-2 padding_0" style="">    
                                From: @if($s->sender_company)
                                @if($s->sender_company->country)
                                    <img title="{{$s->sender_company->country->name }}" itemprop="image" style="height:20px;width:32px;" src="{{ asset('assets/global/img/flags/'.strtolower($s->sender_company->country->iso_code_2).'.png')}}" alt="{{ $s->sender_company->country->name }}">
                                @else
                                
                                @endif
                                @else
                                
                                @endif
                                    
                            </div>
                            <div class="col-sm-2 padding_0" style="">
                                @if($s->bdtdc_product)
                                    {{$s->bdtdc_product->brandname}}
                                @endif
                            </div>
                            <div class="col-sm-2" style="">
                                <p style="color: #999;font-size:14px;">Requesting:</p>
                            </div>
                            <div align="left" class="col-sm-4 padding_0" style="padding-left: 10px;">
                                <p style="padding-left: 10%;">
                                    <span style="color: #1DC11D;font-weight: 700;font-size: 17px;">
                                        {{$s->quantity}}
                                    </span>
                                    <span style="color: #333;font-size: 18px;">
                                        @if($s->inq_unit_id)
                                        {{$s->inq_unit_id->name}}
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>
                       
                    </div>

                </div>

                <div class="col-md-3 padding_0" style=" border-left: 1px solid #ddd;padding: 10px 0px 0px 10px;">
                <a target="_blank" href="{{ URL::to('product-sourcing/view',$s->id )}}" class="btn btn-default" style="color:#fff !important;background:rgb(25, 68, 111) none repeat scroll 0% 0%;border-color:#FF7519;border-radius:5px !important;">Quote Now</a>
                
                <p style="margin-top: 6px;color: #666;font-size: 12px;line-height: 1.28571;">Quotes Left:<span style="color: #FF7519;font-weight: 700;font-size: 13px;"><?php echo rand(20,50); ?></span></p>
                
                    
                </div>
            </div>
            @endif
        @endforeach
        </div>
        </div>
              



            </div>

            

            

        </div>

    

    </div>

