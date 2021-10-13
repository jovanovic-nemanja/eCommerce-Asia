@extends('fontend.master_dynamic')
@section('content')

<div class="row" style="margin-top:20px;margin-bottom:20px;background-color:#fff!important;">
    <div class="col-sm-12 padding_0" style="background-color:#19446F;">
        <div class="col-sm-6">
            <a itemprop="url"  href="{{URL::to('limited/offers',null)}}">
                <p style="font-size: 33px; font-weight: bold; color: white;padding-top:10px;padding-bottom:10px;">
                    Limited Time Offers
                </p>
            </a>
        </div>
        <div class="col-sm-4">
            
        </div>
        <div class="col-sm-2">
            <p style="padding-top:25px;font-size: 17px;color:#fff!important;">
                <i class="fa fa-calendar"></i>
                <a itemprop="url"  href="#" style="color:#fff!important;">Upcoming Deals</a>
            </p>
        </div>
        
    </div>
    
    @foreach($outdoors as $outdoor)
    <div class="col-sm-12 styling padding_0">
        <div class="col-sm-4 padding_0" style="background-color:#19446F;padding-bottom: 0.4%;">
            <div class="col-sm-12 padding_0" style="padding-bottom:13%;margin-left:20px;margin-top:20px;margin-bottom:20px;margin-right:30px;">
                <p style="padding-top:20px;font-size: 24px;color: #fff!important;text-align: center;">
                     Est. Resale Profit Upto
                </p>
                <p style="text-align:center;font-size: 25px;line-height: 52px;color:#fff!important;margin-left: -10%;;padding-top: 11px;">
                        {{$outdoor->profit_percentage}}%
                </p>
                <p style="font-size: 21px;color: #fff!important;text-align: center;padding-bottom:20px;">
                    {{$outdoor->category_name}}
                </p>
            </div>
        </div>
        <div class="col-sm-8 padding_0">
            <a itemprop="url"  href="{{URL::to('limited/offers',null)}}">
            <img itemprop="image"  style="height:293px;width:100%;" src="{{URL::to('uploads',$outdoor->image)}}" alt="{{$outdoor->product_name}}" />
            </a>
        </div>
    </div>
    
    <div class="col-sm-12 padding_0" style="margin-top:20px;">
       
        
        <div class="col-sm-3 outdoor" style="padding-bottom:20px;border: 1px solid #DAE2ED;">
            <img itemprop="image"  style="height:293px;width:100%;padding-top:20px;" src="{{URL::to('uploads',$outdoor->image)}}" alt="{{$outdoor->product_name}}" />
            <p style="color: #696763;font: inherit;padding-top:10px;font-size: 16px;">{{$outdoor->product_name}}</p>
            <button type="button" class="btn btn-default" style="padding-left:20px;padding-right:20px;margin-left:12%;text-align:center;border: 1px solid #DAE2ED;color: #666;font-size: 18px;">
                Contact Supplier
            </button>
        </div>
    </div>
    @endforeach
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