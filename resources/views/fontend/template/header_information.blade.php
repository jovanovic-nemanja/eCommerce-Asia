@php
   $ul_li_color = false;
   $background_img_found = false;
   $header_img_found = false;
   $header_logo_title_show = false;
   $header_logo_title_id = 1;
   $header_background_color_show = false;
   $header_image_show = false;
@endphp
   @foreach($template_setting_data as $ts_databg)
      @if($ts_databg->template_section)
         @if($ts_databg->template_section->slug == "Templatebackground")
            @if($ts_databg->back_image != '')
               @php
               $background_img_found = true;
               $ul_li_color = true;
               break;
               @endphp
            @endif
         @endif
      @endif
   @endforeach


   @foreach($template_setting_data as $ts_dataltshow)
      @if($ts_dataltshow->template_section)
         @if($ts_dataltshow->template_section->slug == "header")
            @if($ts_dataltshow->is_show_color == '1')
               @php
               $header_background_color_show = true;
               break;
               @endphp
            @endif
         @endif
      @endif
   @endforeach

   @foreach($template_setting_data as $ts_datahbcshow)
      @if($ts_datahbcshow->template_section)
         @if($ts_datahbcshow->template_section->slug == "header")
            @php $header_logo_title_id = $ts_datahbcshow->title_logo; @endphp
            @if($ts_datahbcshow->title_logo == '1' || $ts_datahbcshow->title_logo == '2' || $ts_datahbcshow->title_logo == '3')
               @php
               $header_logo_title_show = true;
               break;
               @endphp
            @endif
         @endif
      @endif
   @endforeach

   @foreach($template_setting_data as $ts_datahimgshow)
      @if($ts_datahimgshow->template_section)
         @if($ts_datahimgshow->template_section->slug == "header")
            @if($ts_datahimgshow->is_show_image == '1')
               @php
               $header_image_show = true;
               break;
               @endphp
            @endif
         @endif
      @endif
   @endforeach

   @foreach($template_setting_data as $ts_datahf)
      @if($ts_datahf->template_section)
         @if($ts_datahf->template_section->slug == "header")
            @if($ts_datahf->back_image != '')
               @php
               $header_img_found = true;
               break;
               @endphp
            @endif
         @endif
      @endif
   @endforeach

<div style="background-color:
   @if(empty($template_setting_data))
        #fff
   @else
      @foreach($template_setting_data as $ts_databgcol)
         @if($ts_databgcol->template_section)
            @if($ts_databgcol->template_section->slug == 'Templatebackground')
               @if($ts_databgcol->is_show_color == 1)
                  {{$ts_databgcol->back_color}}
                  @php break; @endphp
               @endif
            @endif
         @endif
      @endforeach
   @endif
   ;background-image:
   @if(!empty($template_setting_data))
      @foreach($template_setting_data as $ts_databgimg)
         @if($ts_databgimg->template_section)
            @if($ts_databgimg->template_section->slug == 'Templatebackground')
               @if($ts_databgimg->is_show_image == 1)
                  {{ 'url('.URL::to('uploads', $ts_databgimg->back_image).')' }}
                  @php break; @endphp
               @endif
            @endif
         @endif
      @endforeach
   @endif

   ;background-position: center top;background-repeat:no-repeat;">

<div class="container" style="background-color:transparent;">
   <div class="row">
      <div class="col-md-1 hidden_collum"></div>
      <div  style="height:
         @if(!empty($template_setting_data))
            @foreach($template_setting_data as $ts_datahh)
               @if($ts_datahh->template_section)
                  @if($ts_datahh->template_section->slug == 'header')
                     @if($ts_datahh->height != '' || $ts_datahh->height != 0)
                        22
                        @php break; @endphp
                     @else
                        0
                     @endif
                  @endif
               @endif
            @endforeach
         @endif
         px;background-image:
         @if(!empty($template_setting_data))
            @if($header_image_show == 1)
               @foreach($template_setting_data as $ts_datah)
                  @if($ts_datah->template_section)
                     @if($ts_datah->template_section->slug == 'header')
                        {{ 'url('.URL::to('uploads', $ts_datah->back_image).');'}}
                        @php break; @endphp
                     @endif
                  @endif
               @endforeach
            @else
               
            @endif
         @endif
         ;background-color:
            @if(empty($template_setting_data))
               #E4E4E4
            @else
               @if($header_background_color_show == 1)
                  @foreach($template_setting_data as $ts_datahbcshowf)
                     @if($ts_datahbcshowf->template_section)
                        @if($ts_datahbcshowf->template_section->slug == 'header')
                           {{ $ts_datahbcshowf->back_color }}
                           @php break; @endphp
                        @endif
                     @endif
                  @endforeach
               @else
                  transparent
               @endif
            @endif
            ;background-size:100% 100%; background-repeat: no-repeat; padding-bottom: 3.6%;" class="col-md-10">
         @if($header_logo_title_id == 1 || $header_logo_title_id == 3)
         <div class="col-md-1" style="padding-left: 1%; padding-top: 3.5%;">
            @if(empty($template_setting_data))
               <img class="header_logo_img img-responsive col-md-4 pull-right" style="height:55px;width:80px;margin-top:20px;" src="{{ URL::to('uploads/no_image.jpg',null) }}"/>
            @else
               @if($header_logo_title_id == 1 || $header_logo_title_id == 3)
                  <img class="header_logo_img" style="height:55px;width:80px;margin-top:20px;" src="{{ URL::to('uploads/no_image.jpg',null) }}" class="img-responsive  col-md-4 pull-right" />
               @else
                  ''
               @endif
            @endif
         </div>
         @endif
         <div class="col-md-@if($header_logo_title_id == 1 || $header_logo_title_id == 3)10 @else 11 @endif col-xs-12 padding_0" style="padding-top: 5%" >
            <h1 style="color:
               @if(empty($template_setting_data))
                  #06c
               @else
                  @foreach($template_setting_data as $ts_datahfc)
                     @if($ts_datahfc->template_section)
                        @if($ts_datahfc->template_section->slug == 'header')
                           @if($ts_datahfc->font_color != '')
                              {{ $ts_datahfc->font_color }}
                              @php break; @endphp
                           @endif
                        @endif
                     @endif
                  @endforeach
               @endif
               ;"> 
               @if(empty($template_setting_data))
                    echo '<span style="color: #06c;font-family: verdana;" class="header_company_name header-company-title"></span>';
               @else
                  @if($header_logo_title_id == 1 || $header_logo_title_id == 2)
                     @if($header_logo_title_id == 2)
                        <span style="color:inherit;font-family: verdana;padding:0;" class="header_company_name header-company-title"></span>
                     @else
                        <span style="color:inherit;font-family: verdana;" class="header_company_name header-company-title"></span>
                     @endif
                  @else
                     <span style="color:inherit;font-family:verdana;display:inline-block;margin-top:10px;" class="header-company-title">&nbsp;</span>
                  @endif
               @endif
            </h1>
         </div>
         <div class="col-md-1">
            
         </div>
      </div>
      <div class="col-md-1 hidden_collum"></div>
   </div>
   <div class="row" style="margin-top:
      @if(empty($template_setting_data))
        ''
      @else
         @foreach($template_setting_data as $ts_datahight)
            @if($ts_datahight->template_section)
               @if($ts_datahight->template_section->slug == 'navbar')
                  @if($ts_datahight->height == '' || $ts_datahight->height != 0)
                     {{ $ts_datahight->height }}
                     @php break; @endphp
                  @endif
               @endif
            @endif
         @endforeach
      @endif
      px;background-image:
      @if(!empty($template_setting_data))
         @foreach($template_setting_data as $ts_datanavbg)
            @if($ts_datanavbg->template_section)
               @if($ts_datanavbg->template_section->slug == 'navbar')
                  @if($ts_datanavbg->is_show_image == 1)
                     {{ 'url('.URL::to('uploads', $ts_datanavbg->back_image).');' }}
                     @php break; @endphp
                  @endif
               @endif
            @endif
         @endforeach
      @endif
      ;clear:both;float:none;">
      <div class="col-md-1 hidden_collum"></div>
      <!-- <div style="background-color:#28a4c9;height:40px" class="col-md-10 padding_0"> -->
      <div style="background-color:
         @if(empty($template_setting_data))
            #cecece;
         @else
            @foreach($template_setting_data as $ts_datanvc)
               @if($ts_datanvc->template_section)
                  @if($ts_datanvc->template_section->slug == 'navbar')
                     @if($ts_datanvc->is_show_color == 1)
                        {{ $ts_datanvc->back_color }}
                        @php break; @endphp
                     @else
                        transparent
                        @php break; @endphp
                     @endif
                  @endif
               @endif
            @endforeach
         @endif
         ;margin-top: -1px;" class="col-md-10 padding_0">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
         </div>
         <div class="mainmenu color_changer pull-left" style="width: 100%;" data-color_changer="
            @if($background_img_found == true)
               1
            @else
               0
            @endif">
            @php
               $nav_color_data = '#363432';
               $nav_back_color_data = '#ddd';
            @endphp
            @if(empty($template_setting_data))
               @php 
                  $nav_color_data = '#363432';
                  $nav_back_color_data = '#ddd';
               @endphp
            @else
               @foreach($template_setting_data as $ts_datanavfcolor)
                  @if($ts_datanavfcolor->template_section)
                     @if($ts_datanavfcolor->template_section->slug == "navbar")
                        @if($ts_datanavfcolor->font_color != "")
                           @php
                              $nav_color_data = $ts_datanavfcolor->font_color;
                              $nav_back_color_data = $ts_datanavfcolor->back_color;
                              break;
                           @endphp
                        @endif
                     @endif
                  @endif
               @endforeach
            @endif
            <ul class="nav comp-pro-menu navbar-nav collapse navbar-collapse pull-right" style="width: 100%; padding-left: 0; background: {{$nav_back_color_data}};margin:0;">
               <li style="background: rgba(0, 0, 0, 0); padding: 0 15px;"><a style="font-size: 18px;padding: 1%;font-size: 14px;height: 33px;_height: auto;line-height: 33px;_line-height: 32px;border: none;color:@php $nav_color_data; @endphp;font-weight: 700;padding: 0 15px;position: relative;cursor: pointer;display: block;text-decoration: none;" href="{{ URL::to('Home/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$company_no_name),Route::current()->parameters()['profile_id']) }}">Home</a></li>
               <li class="dropdown" style="z-index: 999 !important;background: rgba(0, 0, 0, 0); padding: 0 15px;">
                  <span style="font-size: 18px;padding: 1%;font-size: 14px;height: 33px;_height: auto;line-height: 33px;border: none;color: @php $nav_color_data; @endphp;font-weight: 700;padding: 0 1px;position: relative;cursor: pointer;display: block;text-decoration: none;">Product Category<i class="fa fa-angle-down"></i></span>
                  <ul role="menu" class="sub-menu">
                     @foreach($product_groups as $product_group)
                     @if($product_group->active == 1)
                     <li style="padding: 5px 10px"><a style="color: #000;" href="{{ URL::to('profile/template_/'.Route::current()->parameters()['profile_id'].'/'.$product_group->name,null) }}">{{ $product_group->name }}</a></li>
                     @endif
                     @endforeach
                  </ul>
               </li>
               <li class="dropdown" style="background: rgba(0, 0, 0, 0); padding: 0 15px;">
                  <span style="font-size: 18px;padding: 1%;font-size: 14px;height: 33px; height: auto;line-height: 33px;border: none;color:@php $nav_color_data; @endphp;font-weight: 700;padding: 0 1px;position: relative;cursor: pointer;display: block;text-decoration: none;">Company Profile<i class="fa fa-angle-down"></i></span>
                  <ul role="menu" class="sub-menu">
                     <li style="padding: 5px 10px"><a style="color: #000;" href="{{ URL::to(preg_replace('/[^A-Za-z0-9\-]/', '-',$company_no_name).'/company-overview',Route::current()->parameters()['profile_id']) }}">Company Overview</a></li>
                     <li style="padding: 5px 10px"><a style="color: #000;" href="{{ URL::to('trade-capacity/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$company_no_name),Route::current()->parameters()['profile_id']) }}">Trade Capacity</a></li>
                     <li style="padding: 5px 10px"><a style="color: #000;" href="{{ URL::to('production-capacity/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$company_no_name),Route::current()->parameters()['profile_id']) }}">Company Capability</a></li>
                     <li style="padding: 5px 10px"><a style="color: #000;" href="{{ URL::to('industrial-certification/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$company_no_name),Route::current()->parameters()['profile_id']) }}">Industrial Certification</a></li>
                  </ul>
               </li>
               <li style="background: rgba(0, 0, 0, 0); padding: 0 15px;" ><a style="font-size: 18px;padding: 1%;font-size: 14px;height: 33px;_height: auto;line-height: 33px;_line-height: 32px;border: none;color:@php $nav_color_data; @endphp;font-weight: 700;padding: 0 1px;position: relative;cursor: pointer;display: block;text-decoration: none;" href="{{ URL::to('contact/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$company_no_name),Route::current()->parameters()['profile_id']) }}" >Contact</a></li>
            </ul>
         </div>
      </div>
      <div class="col-md-1 hidden_collum"></div>
   </div>
</div>