  <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
            <ol class="carousel-indicators">
            <?php $li_counter = 0; ?>
            @if(empty($template_setting_data))
            @else
              @foreach($template_setting_data as $navuslider)
                @if($navuslider->template_section->slug == "homebanner")
                  @if($navuslider->back_image != "" || $navuslider->back_image != null)
                  <li data-target="#myCarousel" data-slide-to="{{$li_counter}}" style="border-radius:10px !important; border:0 none;" class="<?php if($li_counter == 0){echo 'active';}else{} $li_counter++; ?>"></li>
                  @endif
                  @if($navuslider->back_color != "" || $navuslider->back_color != null)
                  <li data-target="#myCarousel" data-slide-to="{{$li_counter}}" style="border-radius:10px !important; border:0 none;" class="<?php if($li_counter == 0){echo 'active';}else{} $li_counter++; ?>"></li>
                  @endif
                  @if($navuslider->font_color != "" || $navuslider->font_color != null)
                  <li data-target="#myCarousel" data-slide-to="{{$li_counter}}" style="border-radius:10px !important; border:0 none;" class="<?php if($li_counter == 0){echo 'active';}else{} $li_counter++; ?>"></li>
                  @endif
                @endif
              @endforeach
            @endif

                
             </ol>
             <div class="carousel-inner" role="listbox">
            <?php $item_counter = 0; ?>
            @if(empty($template_setting_data))
            @else
              @foreach($template_setting_data as $navuslider)
                @if($navuslider->template_section->slug == "homebanner")
                  @if($navuslider->back_image != "" || $navuslider->back_image != null)
                  <div class="item<?php if($item_counter == 0){echo ' active';$item_counter++;}else{} ?>" style="padding-left:0px;transform: translate3d(10,10,10);">
                       @if($navuslider->back_image)
                        <img itemprop="image" style="height:345px;max-height:350px;width:100%;margin-left: -1px;" src="{{ asset('banner-images/'.$navuslider->back_image) }}" alt="buyer protection">
                        @else
                        <img src="{{ URL::to('uploads/no_image.jpg',null) }}" style="height:345px;max-height:350px;width:100%;margin-left: -1px;" alt="{{ $navuslider->back_image ?? '' }}" />
                        @endif
                   <!--<img itemprop="image" style="height:345px;max-height:350px;width:100%;margin-left: -1px;" src="{{ asset('banner-images/'.$navuslider->back_image) }}" alt="buyer protection">-->
                           <div class="carousel-caption" style="width: 24%;left: 44%;padding: 10px 18px;top: 8.2%;right: 0 !important;bottom: inherit;zoom: 1; margin-left: 38%;">
                           
                          
                          </div>
                  </div>
                  @endif
                  @if($navuslider->back_color != "" || $navuslider->back_color != null)
                  <div class="item<?php if($item_counter == 0){echo ' active';$item_counter++;}else{} ?>" style="padding-left:0px;transform: translate3d(10,10,10);">
                      @if($navuslider->back_color)
                        <img itemprop="image" style="height:345px;max-height:350px;width:100%;margin-left: -1px;" src="{{ asset('banner-images/'.$navuslider->back_color) }}" alt="dispatching systems">
                        @else
                        <img src="{{ URL::to('uploads/no_image.jpg',null) }}" style="height:345px;max-height:350px;width:100%;margin-left: -1px;" alt="{{ $navuslider->back_color ?? '' }}" />
                        @endif
                    <!--<img itemprop="image" style="height:345px;max-height:350px;width:100%;margin-left: -1px;" src="{{ asset('banner-images/'.$navuslider->back_color) }}" alt="dispatching systems">-->
                     <div class="carousel-caption" style="width: 24%;left: 44%;padding: 10px 18px;top: 8.2%;right: 0 !important;bottom: inherit;zoom: 1;margin-left: 38%;">
                          
                            
                          </div>
                  </div>
                  @endif
                  @if($navuslider->font_color != "" || $navuslider->font_color != null)
                  <div class="item<?php if($item_counter == 0){echo ' active';$item_counter++;}else{} ?>" style="padding-left:0px;transform: translate3d(10,10,10);">
                      @if($navuslider->font_color)
                        <img itemprop="image" style="height:345px;max-height:350px;width:100%;margin-left: -1px;" src="{{ asset('banner-images/'.$navuslider->font_color) }}" alt="dispatching systems">
                        @else
                        <img src="{{ URL::to('uploads/no_image.jpg',null) }}" style="height:345px;max-height:350px;width:100%;margin-left: -1px;" alt="{{ $navuslider->font_color ?? '' }}" />
                        @endif
                    <!--<img itemprop="image" style="height:345px;max-height:350px;width:100%;margin-left: -1px;" src="{{ asset('banner-images/'.$navuslider->font_color) }}" alt="dispatching systems">-->
                     <div class="carousel-caption" style="width: 24%;left: 44%;padding: 10px 18px;top: 8.2%;right: 0 !important;bottom: inherit;zoom: 1;margin-left: 38%;">
                          
                            
                          </div>
                  </div>
                  @endif
                @endif
              @endforeach
            @endif
                
            
            </div>
                <span class="sr-only">Previous</span>
            
                <span class="sr-only">Next</span>
            
            </div>

<script type="text/javascript">
      (function() {
            $('.product_slide_area .item:eq(0)').addClass('active');
          if($('.parent .chield').length>1){
            
          }
          setInterval(function(){
            $(".parent .chield:first").slideUp(200, function () {
                  $(this).appendTo($(".parent")).slideDown();
              });
          },2000);
          
            
      })()
</script>
