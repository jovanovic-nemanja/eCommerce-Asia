@extends('fontend.master_m')
	@section('content')
<section>
 <div class="container">
<div class="row" style="clear: both;">
			<div style="padding:0;">
				    <img itemprop="image" style="min-height:565px;width:90%;padding-left:0;" src="{{ URL::to('uploads',$header->cat_name->single_image) }}" alt="" />
			</div>
</div>
<div class="row" style=" background: #fff; clear: both;">
			<div  style="padding:0;">

        @foreach($most_views as $data)
					<div  class="visit-product_m" style="background-color:#fff;">
          <a itemprop="url"   href="{{URL::to('category/product',$data->category_id) }}">
					    <div class="hhh">
    					    <div class="no-1" style="background-color: #255E98">No.1</div>
    					        <div class="no-cont">Customer viewed</div>
    					 
    					    <div  class="mmm-title_m">
    					          <div class="mp-a-tt">{{ $data->cat_name->name or '' }}</div>
    					    </div>
    					    <div  class="cost-img" style="margin-left: 0px">
        @if($data->pro_images_new)
        <img itemprop="image img-responsive" title="{{ $data->parent_cat->name or '' }}" style="height: 100%;" class="img-thumbnail" src="{{ URL::to('bdtdc-product-image/'.trim($data->parent_cats->name).'/'.trim($data->cat_name->name),(isset($data->pro_images_new)) ? $data->pro_images_new->image : 'no_image.jpg') }}" alt="{{ $data->cat_name->name or '' }}" />
        @else
        <img itemprop="image img-responsive"  title="{{ $data->cat_name->name or '' }}" style="height: 100%;"  class="img-thumbnail" src="{{ URL::to('uploads/no_image.jpg',null) }}" alt="{{ $data->cat_name->name or '' }}" />
        @endif

                  </div>
    					    <div class="m-p-view"><div class="m-p-view-h3" style="padding-left: 5%;"><div style="font-size:16px; font-weight:400; padding-bottom:0%;">Visit Now ›</div></div></div>
					   </div>
             </a>
    					   
					</div>
        @endforeach

				</div>
				
		
</div>
</div>
</section>
{!! csrf_field() !!}
<section>
<div class="container">
<div class="row" style="padding-top:2%;background-color:#fff; margin-top:2%">
        <div class="col-sm-12" style="border:solid 1px #dae2ed; border-top:0 none;">
             <h3 class="product-cat-title">Popular Products</h3>
        </div>
        <div class="col-md-12" style="border-right:solid 1px #dae2ed; padding:0;">
            @foreach($products as $p)
            @if($p->bdtdcProduct)
            
                <div class="product-box">
                       <div class="cat-product-img-box">

                       @if($p->bdtdcProduct)
                              <a itemprop="url"   title="{{ $p->pro_to_cat_name->name or ''}}" target="_blank" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/','',$p->bdtdcProduct->product_name->name).'='.mt_rand(100000000, 999999999).$p->product_id) }}">
                        @endif


                              @if($p->pro_images_new)

                                <img   itemprop="image" style="height: 225px;max-height: 220px;" class="product-fassion-img" src="{{ URL::to((isset($p->pro_images_new)) ? $p->pro_images_new->image : 'no_image.jpg') }}" alt="{{ $p->bdtdcProduct->product_name->name or '' }}">



                            

                            @else
                                   <img  itemprop="image" style="height: 225px;max-height: 220px;" class="product-fassion-img" src="{{ URL::to('uploads/no_image.jpg',null) }}" alt="{{ $p->bdtdcProduct->product_name->name or '' }}">

                            @endif
                           <!--  </a> -->
                             
                       </div>
                       

                       <!-- <a itemprop="url"   target="_blank" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/','',$p->bdtdcProduct->product_name->name).'=232942253'.$p->product_id) }}">
 -->
                             <div class="cat-item-title"> {{ $p->bdtdcProduct->product_name->name or '' }} </div>

                    

                       <div class="dollar-price"><span class="dollar">US $ {{ $p->cat_pro_price->product_FOB or ''}}</span> /
                       <?php if($p->bdtdcProduct->product_unit){
                        echo $p->bdtdcProduct->product_unit->name;
                       }

                       ?>
                       </div>
                       <div class="item-views"><span class="online-view">1000+ </span>views 
                        
                       </div>
                      </a>
                       <div style="padding-left: 10px;padding-bottom: 1%" class="product-view-extend">
                            <div   data-product_id="{{ $p->bdtdcProduct->id or ''}}" data-supplier_id="{{ $p->supp_pro_company->user_id or ''}}" class="btn btn-primary btn-join contact_supplier"><i class="fa fa-envelope-o"></i> Contact Supplier</div>
                       </div> 
                                         
                </div>
                 @endif  

                
            @endforeach
              
            
        </div>

<div style="float: right">{!! $products->render() !!}</div>
     
        
</div>


	 <div id="animatedModal">
    <div class="close-animatedModal text-center">
      <a itemprop="url"   class="btn btn-primary btn-md close_portfolio_model" href=""><i class="fa fa-times fa-3x"></i></a>
    </div>
    <div class="container">
      <div class="row">
        <div style="padding:2%" class="modal-content col-xs-10 col-xs-offset-1">
          
        </div>
      </div>
  
    </div>
  </div>
</div>
</div>
</section>

@stop
@section('scripts')

<script type="text/javascript">


            $(function() {
              
              
              /*$('.contact_supplier').animatedModal({
                color: "rgba(102, 102, 100, .9)",
                animatedIn: "lightSpeedIn",
              });*/
              /**
               * the element
               */
              var $ui = $('#ui_element');
            
              /**
               * on focus and on click display the dropdown, 
               * and change the arrow image
               */
              $ui.find('.sb_input').bind('focus click', function() {
                $ui.find('.sb_down')
                  .addClass('sb_up')
                  .removeClass('sb_down')
                  .andSelf()
                  .find('.sb_dropdown')
                  .show();
              });
              /**
               * on mouse leave hide the dropdown, 
               * and change the arrow image
               */
              $ui.bind('mouseleave', function() {
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
              $ui.find('.sb_dropdown').find('label[for="all"]').prev().bind('click', function() {
                $(this).parent().siblings().find(':checkbox').attr('checked', this.checked).attr('disabled', this.checked);
              });
            
              $(document).on({
                click: function(e) {
                  e.preventDefault();
                  $('.modal-content').html('<span class="btn btn-block btn-lg"><i class="fa fa-spinner fa-pulse loading_icon text-primary"></i></span>');
                  // var base_url = $('[name="base_url"]').val();
                  var base_url = window.location.origin;
                  var supplier_id = $(this).data('supplier_id');
                  var product_id = $(this).data('product_id');
                  var url = base_url + "/byer/contact_supplier/" + supplier_id + "/" + product_id;
                  //$('.modal-content').html(" ");
                  // $.get(url, function(r) {
                  //   $('.modal-content').html(r)
                  // })
                  window.location.href = url;
                }
              }, '.contact_supplier');
            
              /*$(document).on({
                click: function(e) {
                  e.preventDefault();
                  var url = $('[name="base_url"]').val() + '/buyer/contact_supplier';
                  swal({
                      title: "Are you sure?",
                      text: "You are going to confirm adding your product !",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      timer: 6000,
                      confirmButtonText: "Yes!",
                      cancelButtonText: "No, Stay hare!",
                      closeOnConfirm: false,
                      closeOnCancel: false,
                      showLoaderOnConfirm: true
                    },
                    function(isConfirm) {
                      if (isConfirm) {
                        
                        $.post(url, $('.query_form').serialize(), function(r) {
                          (parseInt(r) == 1) ? swal("Thank You!!", "Query has been sent successfully!!!", "success"): false;
                          (parseInt(r) == 0) ? swal({title: "<h2 class='text-danger'>Please Login<h2>",text: "<p class='text-primary'>Login first to send the query</p>",html: true,type:'error'}) : false;
                          (parseInt(r) !=1 && parseInt(r) !=0) ? swal("Fail!!", "Query Could Not Sent", "error") : false;
                        })
                      }
                      else {
                        swal("Cancelled", "Sending request is canceled :)", "error");
                      }
                    });
                }
              }, '.query_form_submit_btn');*/
            });
        </script> 
    
        <script>

$(function(){
        $(".link").button({
            icons:{
            secondary:"ui-icon-carat-1-e"
            }
        });
        $(".next, input:submit").button({
            icons:{
            secondary:"ui-icon-circle-arrow-e"
            }
        });
       
        $("#country").change(function(){ 
         var value=$("#country").val();
            var _token = $("input[name='_token']").val();
                $("#product_view").show();
                $.ajax({
            type: "POST",
            url: "{{ URL::to('country/products',null) }}",
            data: "country="+this.value+"&option=product_view&_token="+_token,
            success:function(result){
            $("#product_view").html(result);
            $("#product_view").focus();
            }})
            
            
        
             if(value=="examRoutine"){
                $("#eRoutine").show();
                $.ajax({
            type: "POST",
            url: "{{ URL::to('category/products',null) }}",
            data: "type="+this.value+"&option=eRoutine&_token="+_token,
            success:function(result){
            $("#eRoutine").html(result);
            $("#eRoutine").focus();
            }})

            }
            else  { 
                $("#eRoutine").hide();
                 }
           
        });

   

    });
</script>

@stop