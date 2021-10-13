@extends('fontend.master_dynamic') 

@section('page_css')
<link property='stylesheet' href="{!! asset('css/footer-bottom/supplier-products.css') !!}" rel="stylesheet">
<link property='stylesheet' href="{!! asset('css/mega-menu.css') !!}" rel="stylesheet"> 
@endsection 

@section('content')
<div class="row">
    <div class="col-md-12 " style="padding-top: 1%">
        <ul style="float: left; margin-bottom: 0; padding-left: 0;" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li style="float: left;" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" href="{{ URL::to('/',null) }}" style="color: #000"> Home &nbsp;</a></li>
            <li style="float: left" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                @if($country)
                <a itemprop="url" href="" style="color: #000; font-weight: 600;"> <i class="fa fa-angle-right"></i> {{ $country->name}} Products <i class="fa fa-angle-right"></i>
                </a>
                @endif
            </li>
        </ul>
        <div style="float:right;margin-left: -2%" itemscope itemtype="http://schema.org/BreadcrumbList">
            <button class="goBack" onclick="goBack()" style="padding: 0;"><a href="{{URL::to('/',null)}}"><span>Go Back</span></a></button>
        </div>
    </div>
</div>
</div>
</div>
<div style="clear: both;"></div>
<section style="background: #ddd;">
    <div class="container-fluid padding_0">
        <div class="container" style="position: relative;">
            <div class="col-sm-12 col-md-12 padding_0" style="position: absolute;left: 15px; z-index: 9;">
                <div class="col-sm-3 mobo-categories hr-gap all-cate-pro" style="padding-left: 10px;padding-bottom: 6px; position: absolute; top: 0; left: 0; background: rgba(255, 255, 255, 0.64); z-index: 1;">
                    <h3 style="padding-top: 12px"><a itemprop="url" style="height: 8px;" href="{{ URL::to('online-marketplace',null)}}"><i class="fa fa-list-ul"></i> CATEGORIES</a></h3> 
                    @if($cat_products) 
                    @foreach($cat_products as $category)
                    <ul class="pull-left bazar-list" itemscope itemtype="http://data-vocabulary.org/Product">
                        <li data-id="market-{{ $category['parent_id'] }}" style="border-color: transparent;">
                            @if($category->pro_parent_cat) 
                                @if($category->pro_parent_cat->name)
                                <a style="color: black" itemprop="url" rel="category" href="{{ URL::to(strtolower($country->name).'-'.strtolower(preg_replace('/[^A-Za-z0-9\.-]/','',preg_replace('/[^A-Za-z0-9\.,&-]/','-',$category->pro_parent_cat->slug))),$category['parent_id']) }}">
                                {{ $category->pro_parent_cat->name  }} </a>
                                <div style="padding:0;" class="pull-right"><i class="fa fa-angle-right"></i></div>
                                @endif 
                            @endif
                        </li>
                    </ul>

                    @if($category->pro_parent)

                    <div style="padding-top:0px; margin-top: -38px;margin-left: 88%;" class="col-lg-offset-12 col-md-offset-12 col-sm-offset-12 cacostos util-clearfix" id="market-<?php echo $category['parent_id']; ?>">
                        <ul class="cacostos-list" itemscope itemtype="http://data-vocabulary.org/Product">
                            <li>
                                <div class="prothom-cacostos">
                                    {{ $category->pro_parent_cat->name }}</div>
                                <div style="margin-top:10px" class="ditio-cacostos">

                                    @foreach($category->pro_parent as $cat) @if($cat->column==1)
                                    <a itemprop="url" rel="category" href="{{URL::to(strtolower($country->name.'-'.preg_replace('/[^A-Za-z0-9\.-]/','',preg_replace('/[^A-Za-z0-9\.,&-]/','-',$cat->slug))).'/'.$country->id,$cat['id']) }}">
                                        <span itemprop="name">{{ $cat->name }}</span>
                                    </a>
                                    @endif @endforeach

                                </div>
                            </li>
                        </ul>
                        <ul class="cacostos-list" style="margin-top:30px" itemscope itemtype="http://data-vocabulary.org/Product">
                            <li>
                                <a itemprop="url" href="#" class="prothom-cacostos"></a>
                                <div class="ditio-cacostos">
                                    @php $stop_loop = 0; @endphp
                                    @foreach ($category->pro_parent as $cat) 
                                        @if($cat->column==2)
                                            @if($stop_loop <= 15)
                                                <a itemprop="url" rel="category" 
                                                href="{{URL::to(strtolower($country->name.'-'.preg_replace('/[^A-Za-z0-9\.-]/','',preg_replace('/[^A-Za-z0-9\.,&-]/','-',$cat->slug))).'/'.$country->id,$cat['id']) }}">
                                                    <span itemprop="name"> {{ $cat->name }}</span>
                                                </a>
                                            @else
                                                break;
                                            @endif

                                            @php
                                                $stop_loop++;
                                            @endphp
                                        @endif
                                    @endforeach
                                </div>

                            </li>
                        </ul>
                    </div>

                    @endif 
                    @endforeach 
                    @endif

                    <div id="bazar-list" class="pull-left" style="padding-left: 1.3%;padding-top: 1% ;padding-right: 8%;font-weight: 600;">
                        <a itemprop="url" href="{{ URL::to('online-marketplace',null) }}">
                   All Categories </a>
                        <div class="pull-right"><i style="margin-left: 5px" class="fa fa-angle-right"></i></div>
                    </div>
                </div>

            </div>
        </div>

        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="background-color:#fff; height: 320px">

            <ol class="carousel-indicators" style="z-index: 1;">
                <li data-target="#myCarousel" data-slide-to="0" class="active" style="border-radius:10px !important; border:0 none;"></li>
                <li data-target="#myCarousel" data-slide-to="1" style="border-radius:10px !important; border:0 none;"></li>
                <li data-target="#myCarousel" data-slide-to="2" style="border-radius:10px !important; border:0 none;"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                @if($country->country_image_one)
                <div class="item active">
                    <img itemprop="image" style="width:100%; height: 320px;" src="{!! asset('assets/country-images/'.$country->country_image_one->image) !!}" alt="bdtdc" class=""> @if($country->id==18)
                    <!--  <div class="carousel-caption" style="top:18%; left:24%;">
            <div class="business-tit">
       </div></div> -->

                    @else

                    <!--  <div class="carousel-caption" style="top:18%; left:24%;">
            <div class="business-tit">
                     <div class="wel-bd">Loads of Global Brands</div>
                    <div class="china-1">EVERYTHING in One Spot</div>
                    <p><i class="fa fa-circle" aria-hidden="true" style="color:#333;font-size:8px;padding-right:10px;"></i>Universal choices</p>
                    <p><i class="fa fa-circle" aria-hidden="true" style="color:#333;font-size:8px;padding-right:10px;"></i>Featured global wares</p>                
          </div> 

        </div> -->
                    @endif
                </div>
                @endif @if($country->country_for_image) @foreach($country->country_for_image as $data)

                <div class="item">
                    <img itemprop="image" style="width:100%; height: 320px;" src="{!! asset('assets/country-images/'.$data->image) !!}" alt="supplier" class=""> @if($country->id==18)
                    <!--   <div class="carousel-caption" style="top:18%; left:24%;">
            <div class="business-tit">
       </div></div> -->

                    @else

                    <!--   <div class="carousel-caption" style="top:18%; left:24%;">
            <div class="business-tit">
                     <div class="wel-bd">Loads of Global Brands</div>
                    <div class="china-1">EVERYTHING in One Spot</div>
                    <p><i class="fa fa-circle" aria-hidden="true" style="color:#333;font-size:8px;padding-right:10px;"></i>Universal choices</p>
                    <p><i class="fa fa-circle" aria-hidden="true" style="color:#333;font-size:8px;padding-right:10px;"></i>Featured global wares</p>

          </div> 

        </div> -->
                    @endif
                </div>
                @endforeach @endif
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid padding_0">
        <div class="slideover" style="padding-top: 0%;">
            <div class="count-trad-item" style="position: absolute;left: 47%;bottom: -55px; z-index: 1;">
            </div>
        </div>
    </div>
</section>
<section>
    <div style="min-height: 396px;background-color: #1686cc;display: block;">
        <div class="container">
            <div class="row padding_0">
                <div class="col-sm-12 col-md-12 padding_0">
                    <h2 style="margin-top: 7%;margin-left: 14px;" class="country-trade-title">Effective sourcing from {{ $country->name }}.</h2>
                </div>
                <div class="col-sm-12 col-md-12 padding_0">

                    <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">
                        <div>
                            <!--  <a itemprop="url" href="{{ URL::to('Bdtdc/popular-brand',$country->id) }}"> -->
                            <div class="count-trad-item simple">
                                <div class="sub-title">
                                    Simple
                                </div>

                            </div>
                            <div class="trade-description">
                                Post a Buying Request in just 1 minute
                            </div>
                            <!--  </a> -->
                        </div>

                    </div>

                    <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">
                        <div>
                            <!-- <a itemprop="url" href="{{ URL::to('Bdtdc/popular-brand',$country->id) }}"> -->
                            <div class="count-trad-item efficinet">
                                <div class="sub-title">
                                    Efficient
                                </div>

                            </div>
                            <div class="trade-description">
                                Get multiple quotations within 24 hours

                            </div>
                            <!-- </a> -->
                        </div>

                    </div>
                    <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">
                        <div>
                            <!-- <a itemprop="url" href="{{ URL::to('Bdtdc/popular-brand',$country->id) }}"> -->
                            <div class="count-trad-item allin">
                                <div class="sub-title">
                                    All-In-One
                                </div>
                            </div>
                            <div class="trade-description">
                                Comparison, samples and deals
                            </div>
                            <!-- </a> -->
                        </div>
                    </div>
                </div>
            </div>

            <p class="text-center" style="padding-top: 3%;color: #f1f1f1;padding-bottom: 1%;">{{$country->name}} Products are filled with quality and so long lasting that billions of people all around the world are now using it in their daily lives. The best {{$country->name}} product suppliers do ensure that these quality products reaches every corners of the world. So, don't think twice! Get quotations NOW!</p>

            <div class="row" style="padding: 0;padding-left: 39%;">
                <a itemprop="url" href="{{URL::to('get-quotations',null)}}" target="_blank" class="btn btn-primary btn-join" style="height:47px;border-radius:5px;font-size:18px;color:#fff!important;padding-top: 4px;">Get Quotations Now</a>
            </div>

        </div>
    </div>
</section>
<section>
    @if($country->id == 18)
    <div class="container" style="padding: 0;padding-top: 15px; font-weight: 600;font-size: 16px;">You may also like bangladesh products from many <a target="_blank" href="{{URL::to('bangladesh-suppliers',null)}}">{{ $country->name }} suppliers.</a></div>
    @endif
    <div class="container">
        @if ($cat_products) @foreach ($cat_products as $pro_category) @if($pro_category->pro_parent_cat)

        <div class="row" id="cat{{ $pro_category->pro_parent_cat->id }}" style="background-color: #f6f7fb; margin-top:20px;margin-bottom: 2%;padding-bottom: 3%">
            <div class="col-md-3 col-sm-3" style="padding:0; width:20%;">
                <div class="cate-details" style="background-color: #fff3fc;" itemscope itemtype="http://data-vocabulary.org/Product">
                    <div rel="category" class="cate-d-title" id="cat{{ $pro_category->pro_parent_cat->id }}" style="color: #fff;">
                        <span itemprop="name">{{ $pro_category->pro_parent_cat->name  }}</span>
                    </div>
                    <ul class="cate-ul-list">
                        @if ($pro_category->most_view_category) @foreach ($pro_category->most_view_category as $cat)

                        <li class="cat-li"><a rel="category" itemprop="url" href="{{URL::to(preg_replace('/[^A-Za-z0-9\.-]/', '-',strtolower ($country->name)).'-'.strtolower(preg_replace('/[^A-Za-z0-9\.-]/','',preg_replace('/[^A-Za-z0-9\.,&-]/','-',$cat->cat_name->slug))).'/'.$country->id,$cat['category_id']) }}"><span itemprop="name"><?php echo $cat->cat_name->name; ?></span></a></li>

                        @endforeach @endif

                    </ul>

                </div>
            </div>
            <div class="col-md-9 col-sm-9" style="padding-left:30px;padding-right:0;margin-left:5%;">

                @if($pro_category->selected_suppliers)
                <?php $stop_loop = 0; ?>

                    @foreach ($pro_category->selected_suppliers as $data)
                    <?php 
                                if($stop_loop <= 7){
                              ?>

                        <div class="col-sm-3 col-xs-6 padding_0  sup-head-col" style="margin-bottom: 1%;height:360px">
                            @if($data->pro_name_string)
                            <a itemprop="url" target="_blank" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$data->pro_name_string->name).'=232942253'.$data->product_id,null) }}" class="slidebox-item-list" style="box-shadow: none; border:0 none;">
        @endif
          <div class="img-hilight  product-hover single-products" itemscope itemtype="http://schema.org/Product" style="margin-top:5%;">

           @if($data->select_product_images)
            <img itemprop="image" title="" style="height: 200px;width: 200px;" class="img-thumbnail bd-prduct" src="{{ URL::to(''.$data->select_product_images->image,null) }}" alt="{{ $data->pro_name_string->name  }}" />
          @else
          <img style="height: 200px;width: 200px;" itemprop="image" title="{{ $data->pro_name_string->name ?? '' }}" class="img-responsive  col-sup-img" src="{{ URL::to('uploads/no_image.jpg',null) }}" alt="{{ $data->pro_name_string->name ?? '' }}" />
          @endif

          <div class="product-head-cont" style="height: 112px;">
          <div class="brand-year" style="padding-left:10px;padding-right:10px;padding-top: 10px;height:50px;">
            <div  class="brand-year16">

              @if($data->pro_name_string)
               <p itemprop="name">{{ substr($data->pro_name_string->name, 0, 30) }}</p>
               @else
               <p itemprop="name"> Unknown Product</p>
               @endif

             </div>
          </div>
          <p class="brand-favorable" style="text-align:left;padding-left:10px;padding-bottom:3px; height:32px;">
          @if($data->cat_pro_price)
            <span class="doller-product-price">US $ {{ $data->cat_pro_price->product_FOB  }} </span>{{ $data->BdtdcSelectedSupplier_products->ProductUnit->name  }}
          </p>
          <p class="brand-favorable" style="text-align:left;margin-left:10px; padding-top:0; padding-bottom:0;">
            MOQ: <span style="color:#333;">{{ $data->cat_pro_price->product_MOQ }} {{ $data->BdtdcSelectedSupplier_products->ProductUnit->name  }}</span> 
          </p>
          @endif
        </div>

        </div> 
                </a>
                        </div>

                        <?php
       }
                             else{
                              break;
                            }
                            $stop_loop++;
                            ?>
                            @endforeach @endif

            </div>

        </div>
        @endif @endforeach
</section>
<div class="container">
    {!! $cat_products->render() !!}
    <div class="" style="padding: 5% 6px; width: 100%;">
        <p><a target="_blank" href="{{URL::to('wholesale',null)}}">See More</a> {{$country->name}} Products at <a target="_blank" href="{{URL::to('wholesale')}}">Wholesale</a></p>
        <p>Couldn't find your preferred {{$country->name}} Products yet? <a class="" target="_blank" href="{{URL::to('get-quotations',null)}}">Get Quotations</a> for reliable {{$country->name}} Products today!</p>
        <p>Would you like to show {{$country->name}} products or other products of your own company? Then, don't wait! Simply <a class="" target="_blank" href="{{URL::to('join',null)}}">join FREE now!</a></p>
    </div>

    @endif @stop