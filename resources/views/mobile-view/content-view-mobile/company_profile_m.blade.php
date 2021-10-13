@extends('mobile-view.layout.master_m')
    @section('content')
    <?php $id = Route::current()->parameters()['profile_id'];?>
    <div class="row padding_0" style="background: #fff; margin-bottom: 28px; padding-bottom: 3%;">
    <div class="col-xs-12">
    		<p class="com_p_des" style="line-height: 25px; text-align: left;padding-top: 20px;"> 
                <?php
                    $c_description = DB::table('bdtdc_company_descriptions')->where('company_id',Route::current()->parameters()['profile_id'])->first();
                    //dd($c_description);
                    echo (isset($c_description)) ? $c_description->description : "";
                ?>
                <span class="pull-right more" style="cursor: pointer;">More &nbsp;<i class="fa fa-caret-right"></i></span></p>
    </div>
    <div class="col-xs-12 padding_0">
    		

    				<div style="width: 100%; font-weight: bold;font-size:20px;color: #333; padding:20px 0; margin: 0; padding-left: 15px;">Basic Information</div>

    				<div class="col-xs-5">
    					<p class="com_p_des">Business Type:</p>
    					<p class="com_p_des">Main Products:</p>
    				</div>
    				<div class="col-xs-7">
						<p class="com_p_des">{{ ($company) ? $company->busines_type_id : ""}} </p>
						<p class="com_p_des">
                            <?php
                              echo ($main_products) ?  $main_products->product_name_1 . ", " . $main_products->product_name_2.", ". $main_products->product_name_3 : "";
                             ?>
                        </p>
    				</div>
    		</div>
    <div class="col-xs-12 padding_0">
                <?php
                    $data = DB::table('bdtdc_company_factory_info as fi')
                      ->join('bdtdc_form_values as fv','fv.id','=','fi.factory_size')
                      ->where('fi.company_id',Route::current()->parameters('profile_id'))
                      ->first(['fi.no_of_production_line','fv.value']);
                ?>
    		<div style="width: 100%; font-weight: bold;font-size:20px;color: #333; padding:20px 0; margin: 0; padding-left: 15px; ">Factory Information</div>
    		
    				<div class="col-xs-5">
    					<p class="com_p_des">Factory Size (Sq.meters):</p>
    					<p class="com_p_des">Factory Location:</p>
    					<p class="com_p_des">No. of Production Lines:</p>
    					<p class="com_p_des">Number of R&D Staff:</p>
    					<p class="com_p_des">Number of QC Staff:</p>
    					<p class="com_p_des">Contract Manufacturing:</p>
                      
    				</div>
    				<div class="col-xs-7">
                       
    						<p class="com_p_des">{{ ($product_capacity) ? $product_capacity->factory_size : "" }} </p>
                       
    						<p class="com_p_des">{{ ($product_capacity) ? $product_capacity->factory_location : ""  }} </p>
                       
    						<p class="com_p_des"> {{ ($product_capacity) ? $product_capacity->no_of_production_line : ""  }}</p>
                      
    						<p class="com_p_des">{{ ($r_d) ? $r_d->r_d : "" }}</p>
    						<p class="com_p_des">11 - 20 People</p>
    						<p class="com_p_des">{{ ($product_capacity) ? $product_capacity->contact_manufacturing : ""  }}  </p>
    				</div>
    </div>
    <div class="col-xs-12 padding_0">
    		<div style="width: 100%; font-weight: bold;font-size:20px;color: #333; padding:20px 0; margin: 0; padding-left: 15px; ">Trade & Market</div>
    		
    				<div class="col-xs-5">
    					<p class="com_p_des">Main Markets:</p>
    					<p class="com_p_des">Total Annual Sales Volume:</p>
    					<p class="com_p_des">Export Percentage:</p>
    				</div>
    				<div class="col-xs-7">
                            <p class="com_p_des">
                                @foreach($market_destribution as $v)
            						{{ $v->value }},
                                @endforeach
                            </p>
    						<p class="com_p_des">{{ ($trade_data) ? $trade_data->anual_sales_volume : "" }}</p>
    						<p class="com_p_des">{{ ($trade_data) ? $trade_data->export_percentage : "" }}</p>
    				</div>
    </div>
    <div class="col-xs-12 padding_0">
    		<div style="width: 100%; font-weight: bold;font-size:16px;color: #333; padding:20px 0; margin: 0; padding-left: 15px; ">Supplier Assessment Report</div>
    		
    				<div class="col-xs-12">
    				<p class="com_p_des" style="padding-bottom: 40px;">Supplier Assessment Reports are detailed on-line reports about the supplier's capabilities. It helps you get all the information you need to trade confidently with suppliers.</p>
    				</div>
    </div>
    @include('fontend.template.contact_supplier_form')

   </div>
 @stop
@section('scripts')
<script type="text/javascript">
url = window.location.origin + "/template/get_header_info/"+"{{$id}}";
    $.get(url, function(r) {
        var img_name = (r.company_header_info == null || r.company_header_info.company_logo == null || r.company_header_info.company_logo == "") ? "no_image.jpg" : r.company_header_info.company_logo;
        $('.header_user_name').html(r.company_header_info.user_name);
        $('.header_company_name').html(r.company_header_info.company_name);
        $('.header_logo_img').attr('src', window.location.origin + '/uploads/' + img_name);
        $('[data-supplier_id]').attr('data-supplier_id',r.company_header_info.user_id);
        $('[name="product_owner_id"]').val("{{$profile_owner_id}}");
        $('[data-target-id]').attr('data-target-id',r.company_header_info.user_id+'548569857');
        $('.header_first_name').html(r.company_header_info.user_name);
        $('.header_last_name').html(r.company_header_info.last_name);
    })
</script>   
@stop