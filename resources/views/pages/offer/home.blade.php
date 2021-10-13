@extends('fontend.master3')
@section('content')

<div class="row" style="margin-top:20px;margin-bottom:20px;background-color:#fff!important;">
    <div class="col-sm-12 padding_0" style="background-color:#19446F;">
        <div class="col-sm-6">
            <a href="{{URL::to('limited/offers',null)}}">
                <p style="font-size: 30px; font-weight: normal;font-family: verdana; color: white;padding-top:5px;padding-bottom:0px; padding-left: 15px;">
                    Limited Time Offers
                </p>
            </a>
        </div>
        <div class="col-sm-4">
            
        </div>
        <div class="col-sm-2">
            <p style="padding-top:16px;font-size: 17px;color:#fff!important;">
                <i class="fa fa-calendar"></i>
                <a href="#" style="color:#fff!important;">Upcoming Deals</a>
            </p>
        </div>
        
    </div>
   
    <section>
    @foreach($products as $product)
    <div class="col-sm-12 styling padding_0">
        <div class="col-sm-5 padding_0">
            <p style="padding-top:18px;font-size: 20px;color: #333;text-align: center; line-height: 17px;">
                {{$product->product_name}} 
            </p>
            <p style="font-size: 18px;color: #333;text-align: center; line-height: 17px;">
                Est. Resale Profit
            </p>
            <div class="col-sm-12 padding_0">
                <div class="col-sm-6">
                    <p style="color: #999;font-size: 18px;line-height: 45px;color:black;padding-left:81%;color: #999;">
                        UP
                    </p>
                    <p style="color: #999;font-size: 18px;line-height: 45px;padding-left:81%;margin-top: -36px;">
                        TO
                    </p>
                </div>
                <div class="col-sm-6">
                    <p style="font-size: 18px;line-height: 45px;color:#19446F;margin-left: -10%;padding-top: 3px;">
                        {{$product->profit_percentage}}%
                    </p>
                </div>
            </div>
            <p style="font-size: 17px;color: #333;text-align: center;padding-bottom:0px;">
                Top Deals on {{$product->category_name}}
            </p>
            <a href="{{URL::to('outdoor',$product->category_id)}}" type="button" class="btn btn-default" style="margin-left:32%;text-align:center;border: 1px solid #DAE2ED;color: #fff;font-size: 18px; border-radius: 5px !important; background-color: #255E98;">
                View Details
            </a>
        </div>
        <div class="col-sm-7 padding_0">
            <a href="{{URL::to('outdoor',$product->category_id)}}">
            <img style="height:293px;width:100%;" src="{{ URL::to('uploads',$product->image) }}" alt="" />
            </a>
        </div>
    </div>
@endforeach
</section>
   <!-- <div class="col-sm-12 padding_0" style="margin-top:20px;border: 1px solid #DAE2ED;">
        <div class="col-sm-4 padding_0">
            <p style="padding-top:20px;font-size: 24px;color: #333;text-align: center;">
                Est. Resale Profit
            </p>
            <div class="col-sm-12 padding_0">
                <div class="col-sm-6">
                    <p style="color: #999;font-size: 22px;line-height: 52px;color:black;padding-left:81%;">
                        UP
                    </p>
                    <p style="color: #999;font-size: 22px;line-height: 52px;color:black;padding-left:81%;margin-top: -36px;">
                        TO
                    </p>
                </div>
                <div class="col-sm-6">
                    <p style="font-size: 25px;line-height: 52px;color: #F33;margin-left: -10%;;padding-top: 11px;">
                        493%
                    </p>
                </div>
            </div>
            <p style="font-size: 22px;color: #333;text-align: center;padding-bottom:10px;">
                Tools of the Trade:Essential cooking tools 
            </p>
            <button type="button" class="btn btn-default" style="margin-left:32%;text-align:center;border: 1px solid #DAE2ED;color: #666;font-size: 18px;">
                Shop Now
            </button>
        </div>
        <div class="col-sm-8 padding_0">
            <img style="height:70%;width:100%;" src="{!! asset('resources/assets/service/mug.jpg') !!}" alt="" />
        </div>
    </div>
    <div class="col-sm-12 padding_0" style="margin-top:20px;border: 1px solid #DAE2ED;">
        <div class="col-sm-4 padding_0">
            <P style="padding-top:20px;font-size: 21px;color: #333;text-align: center;">
                Made with Swarovski Elements 
            </P>
            <p style="font-size: 24px;color: #333;text-align: center;">
                Est. Resale Profit
            </p>
           <div class="col-sm-12 padding_0">
                <div class="col-sm-6">
                    <p style="color: #999;font-size: 22px;line-height: 52px;color:black;padding-left:81%;">
                        UP
                    </p>
                    <p style="color: #999;font-size: 22px;line-height: 52px;color:black;padding-left:81%;margin-top: -36px;">
                        TO
                    </p>
                </div>
                <div class="col-sm-6">
                    <p style="font-size: 25px;line-height: 52px;color: #F33;margin-left: -10%;;padding-top: 11px;">
                        493%
                    </p>
                </div>
            </div>
            <p style="font-size: 21px;color: #333;text-align: center;padding-bottom:10px;">
               Fine Jewelry
            </p>
            <button type="button" class="btn btn-default" style="margin-left:32%;text-align:center;border: 1px solid #DAE2ED;color: #666;font-size: 18px;">
                Shop Now
            </button>
        </div>
        <div class="col-sm-8 padding_0">
            <img style="height:70%;width:100%;" src="{!! asset('resources/assets/service/jwellary.jpg') !!}" alt="" />
        </div>
    </div>
    <div class="col-sm-12 padding_0" style="margin-top:20px;border: 1px solid #DAE2ED;">
        <div class="col-sm-4 padding_0">
            <P style="padding-top:20px;font-size: 21px;color: #333;text-align: center;">
               Latest Tech Gadgets & Hardware  
            </P>
            <p style="font-size: 24px;color: #333;text-align: center;">
                Est. Resale Profit
            </p>
            <div class="col-sm-12 padding_0">
                <div class="col-sm-6">
                    <p style="color: #999;font-size: 22px;line-height: 52px;color:black;padding-left:81%;">
                        UP
                    </p>
                    <p style="color: #999;font-size: 22px;line-height: 52px;color:black;padding-left:81%;margin-top: -36px;">
                        TO
                    </p>
                </div>
                <div class="col-sm-6">
                    <p style="font-size: 25px;line-height: 52px;color: #F33;margin-left: -10%;;padding-top: 11px;">
                        493%
                    </p>
                </div>
            </div>
            <p style="font-size: 21px;color: #333;text-align: center;padding-bottom:10px;">
                Smart Gadgets 
            </p>
            <button type="button" class="btn btn-default" style="margin-left:32%;text-align:center;border: 1px solid #DAE2ED;color: #666;font-size: 18px;">
                Shop Now
            </button>
        </div>
        <div class="col-sm-8 padding_0">
            <img style="height:70%;width:100%;" src="{!! asset('resources/assets/service/headphone.jpg') !!}" alt="" />
        </div>
    </div>-->
   
</div>
<div class="row" style="margin-top:20px;">
     <div class="col-sm-12 padding_0" style="border: 1px solid #DAE2ED;padding-bottom:20px;background-color:#fff!important;">
        <div class="col-sm-4">
            <p style="padding-top:20px;padding-bottom: 10px;padding-left:5%;font-size: 22px;color: #161616;">
                <i class="fa fa-circle"></i>
                How Does It Work?
            </p>
            <p style="padding-left:12%;">
                <a href="#" style="color: #999;font-size:12px;">
                    Its same for all small and midsize business buyers with low MOQs at wholesale prices  ,
                    you can easily make deals and complete secure online transactions.
                </a>
            </p>
        </div>
        <div class="col-sm-4">
             <p style="padding-top:20px;padding-bottom: 10px;padding-left:5%;font-size: 22px;color: #161616;">
                <i class="fa fa-circle"></i>
                Secure Payment
            </p>
            <p style="padding-left:12%;">
                <a href="#" style="color: #999;font-size:12px;">
                    Its same for all small and midsize business buyers with low MOQs at wholesale prices  ,
                    you can easily make deals and complete secure online transactions.
                </a>
            </p>
        </div>
        <div class="col-sm-4">
             <p style="padding-top:20px;padding-bottom: 10px;padding-left:5%;font-size: 22px;color: #161616;">
                <i class="fa fa-circle"></i>
                Help Center
            </p>
            <p style="padding-left:12%;">
                <a href="#" style="color: #999;font-size:12px;">
                    Its same for all small and midsize business buyers with low MOQs at wholesale prices  ,
                    you can easily make deals and complete secure online transactions.
                </a>
            </p>
        </div>
    </div>
     <div class="col-sm-12" style="border-bottom: 1px solid #DAE2ED;padding-bottom:20px;">
         <div class="col-sm-2" style="margin-top:20px;">
             <p style="margin: 0px;padding-bottom: 10px;font-size: 18px;color: #333;">
                 About Wholesale
             </p>
             <p>
                 <a href="#" style="color: #666;font: inherit;vertical-align: baseline;font-weight:bold;">How to buy</a>
             </p>
             <p>
                 <a href="#" style="color: #666;font: inherit;vertical-align: baseline;font-weight:bold;">Sitemap</a>
             </p>    
                            
         </div>
         <div class="col-sm-2" style="margin-top:20px;">
             <p style="margin: 0px;padding-bottom: 10px;font-size: 18px;color: #333;">
                 Ordering
             </p>
             <p>
                 <a href="#" style="color: #666;font: inherit;vertical-align: baseline;font-weight:bold;">Placing orders</a>
             </p>
             <p>
                 <a href="#" style="color: #666;font: inherit;vertical-align: baseline;font-weight:bold;">Managing orders</a>
             </p>
         </div>
         <div class="col-sm-2" style="margin-top:20px;">
             <p style="margin: 0px;padding-bottom: 10px;font-size: 18px;color: #333;">
                 Making Payment
             </p>
             <p>
                 <a href="#" style="color: #666;font: inherit;vertical-align: baseline;font-weight:bold;">Payment methods</a>
             </p>
             <p>
                 <a href="#" style="color: #666;font: inherit;vertical-align: baseline;font-weight:bold;">Payment failure</a>
             </p>
             
         </div>
         <div class="col-sm-3" style="margin-top:20px;">
             <p style="margin: 0px;padding-bottom: 10px;font-size: 18px;color: #333;">
                 Shipping & Delivery
             </p>
             <p>
                 <a href="#" style="color: #666;font: inherit;vertical-align: baseline;font-weight:bold;">Tracking orders</a>
             </p>
             <p>
                 <a href="#" style="color: #666;font: inherit;vertical-align: baseline;font-weight:bold;">Manage shipping addresses</a>
             </p>
         </div>
         <div class="col-sm-3" style="margin-top:20px;">
             <p style="margin: 0px;padding-bottom: 10px;font-size: 18px;color: #333;">
                 Refunds & Disputes
             </p>
             <p>
                 <a href="#" style="color: #666;font: inherit;vertical-align: baseline;font-weight:bold;">Goods not received</a>
             </p>
             <p>
                 <a href="#" style="color: #666;font: inherit;vertical-align: baseline;font-weight:bold;">Requesting a refund</a>
             </p>
         </div>
     </div>
     <div class="col-sm-12" style="border-bottom: 1px solid #DAE2ED;">
         <div class="col-sm-3">
             <p style="color: #333;font-size: 16px;padding-top:15px;margin-left: -24px;">
                 Our Preferred Partners:
             </p>
         </div>
         <div class="col-sm-9">
             <img style="height:100%;width:100%;margin-left:-98px;padding-top:10px;padding-bottom:10px;" src="{!! asset('resources/assets/service/all.png') !!}" alt="" />
         </div>
     </div>
     <div class="col-sm-12 padding_0">
         <P style="padding-top:20px;padding-bottom:20px;line-height: 18px;color: #999;">
             Wholesale brings you quality products at wholesale prices on even the smallest orders.
             Part of bdtdc.com, Wholesale offers minimum orders as low as 2 item, buyer protection and 
             express delivery with full tracking. Wholesale currently hosts more than 3 million products 
             from over 40 different industries, including the following: Apparel & Accessories, Automobiles
             & Motorcycles, Mobile Phones, Computer Hardware & Software, Electronics, Health & Beauty,
             Lights & Lighting, Luggage, Bags & Cases, Security & Protection, Shoes & Accessories,
             & Hobbies, Watches & Jewelry and Wedding Supplies. 
         </P>
     </div>
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