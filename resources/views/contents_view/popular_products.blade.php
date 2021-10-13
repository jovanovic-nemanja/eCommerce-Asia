@extends('fontend.master3')
@section('content')

	
<div  id="popular" class="row" style="margin-top:30px;margin-bottom:30px;">
      <div class="col-sm-2"></div>
      <div class="col-sm-8" style="padding-bottom:60px;margin-top:9%;background-color:rgba(51, 52, 51, 0.56);">
            <p style="font-size: 32px;color: #FFF;letter-spacing: 1px;line-height: 36px;text-align: center;margin: 45px 0 12px 0;">
                  The Right Suppliers. Fast.
            </p>
            <div class="col-sm-12">
		<p class="col-sm-3" style="font-size: 14px;color: #FFF;letter-spacing: .4px;line-height: 24px;text-align: center;margin: 0 0 28px 0;">
		      <img style="height:20px;width:20px;" src="{!! asset('assets/helpcenter/images/Check.png') !!}" alt="" />
		      Easy to use
		</p>
		<p class="col-sm-4" style="font-size: 14px;color: #FFF;letter-spacing: .4px;line-height: 24px;text-align: center;margin: 0 0 28px 0;">
		      <img style="height:20px;width:20px;" src="{!! asset('assets/helpcenter/images/Check.png') !!}" alt="" />
		      Instant quotes ready</p>
		<p class="col-sm-5" style="font-size: 14px;color: #FFF;letter-spacing: .4px;line-height: 24px;text-align: center;margin: 0 0 28px 0;">
		      <img style="height:20px;width:20px;" src="{!! asset('assets/helpcenter/images/Check.png') !!}" alt="" />
		      Purchasing agents available</p>
	      </div>
       
            <div class="input-group" style="height: 45px;border-radius: 3px;border: 2px solid #1D4772;;margin-left: 35px;box-sizing: content-box;">
                <input type="text" style="height: 45px;" class="form-control" placeholder="What are you looking for..">
                      <span class="input-group-addon" id="basic-addon2"style="height:45px;background-color:#1D4772;color:#fff!important;">
                      <img style="height:15px;width:15px;" src="{!! asset('assets/helpcenter/images/icon-search.png') !!}" alt="" />
                       search
                    </span>
            </div>
       
	      
      </div>
      <div class="col-sm-2"></div>
    
</div>
<div class="row" style="margin-top:30px;background-color:#FFFFFF;margin-bottom:30px;padding-top:20px;padding-bottom:20px;">
      <div class="col-sm-3">
            <p style="float: left;display: inline;color: #999;margin: 0 0 1.5em;margin-bottom: 1.2857142em;vertical-align: baseline;font: inherit;">
                  Already know what you want?
            </p>
      </div>
      <div class="col-sm-2">
            <a href="{{ URL::to('get_qutations') }}" target="_blank"><button class="btn btn-default" type="button">Submit Buying Request</button></a>
      </div>
      <div class="col-sm-1">
            <img style="height:30px;width:30px;margin-left:20px;" src="{!! asset('assets/helpcenter/images/g.png') !!}" alt="" />
      </div>
      <div class="col-sm-3.5">
            <p style="float: left;display: inline;color: #999;margin: 0 0 1.5em;margin-bottom: 1.2857142em;vertical-align: baseline;font: inherit;">
                 Saw something you like from a website? 
            </p>
      </div>
      <div class="col-sm-2.5">
            <a href="{{URL::to('Sourcing/Requests/info') }}" target="_blank"  style="margin-left:80px;">Complete Buying Request</a>
      </div>
      
</div>
<div class="row" id="item_sha" style="margin-top:30px;margin-bottom:20px;">
      <div class="col-sm-12">
            <p style="font-size: 22px;margin-bottom: 18px; padding-top:20px;">All Categories</p>
      </div>
      
      <div class="col-sm-12" style="padding-bottom:30px;">
        
          <ul style="width: 100%; padding: 0;">
            @foreach($categories as $cate)
                        <li style="width: 18%;display: inline-block; line-height: 30px; padding-left: 10px;"><a href="{{ URL::to('category/product', $cate->id)}}" target="_blank" class="cate-product">{{$cate->name}}</a></li>
                  @endforeach
      
                  </ul>
            </div>
      
</div>
<div class="row">
      <img style="height:10%;width:100%;padding-right:0px;padding-left:0px;margin-top:20px;margin-bottom:20px;"  src="{!! asset('assets/fontend/img/TB1OJs150.jpg') !!}" alt="" />
</div>
	
	@stop
        @section('scripts')
            <script type="text/javascript">
                $(function() {
                    /**
                     * the element
                     */
                    var $ui 		= $('#ui_element');

                    /**
                     * on focus and on click display the dropdown,
                     * and change the arrow image
                     */
                    $ui.find('.sb_input').bind('focus click',function(){
                        $ui.find('.sb_down')
                                .addClass('sb_up')
                                .removeClass('sb_down')
                                .andSelf()
                                .find('.sb_dropdown')
                                .show();
                    });

                    /**
                     * on mouse leave hide the dropdown,
                     * and change the arrow imagek
                     */
                    $ui.bind('mouseleave',function(){
                        $ui.find('.sb_up')
                                .addClass('sb_down')
                                .removeClass('sb_up')
                                .andSelf()
                                .find('.sb_dropdown')
                                .hide();
                    });

                    /**
                     * selecting all checkboxes
                     */
                    $ui.find('.sb_dropdown').find('label[for="all"]').prev().bind('click',function(){
                        $(this).parent().siblings().find(':checkbox').attr('checked',this.checked).attr('disabled',this.checked);
                    });
                });
            </script>
@stop