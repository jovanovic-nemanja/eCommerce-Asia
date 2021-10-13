@extends('protected.admin.master')
@section('page_css')
    <link property='stylesheet' href="{!! asset('assets/fontend/css/select2.min.css') !!}" rel="stylesheet">
    @endsection
@section('title', 'List Users')

@section('content')

<style>
    .select2-container{
        width: 260px !important;
    }
    
    .removecheckbox div.checker span.checked {
        background-position:0 -260px;
    }
    .removecheckbox div.checker.focus span.checked {
        background-position:-76px -260px;
    }    
</style>
<!-- BEGIN PAGE CONTENT-->
<!-- ---LOADING ANIMATION TRIGERED TO THIS LOADER CLASS;----- -->
<div class="mkn_loader" style="position: fixed;left:0px;top: 0px;width: 100%;height:100%;z-index: 99999999;background: url(/uploads/page-loader.gif) 50% 50% no-repeat rgb(249,249,249);background-size: 45px;"></div>
<?php $total_hp = $home_product->total(); ?>
<div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box grey-cascade">
                            <div class="portlet-title" style="background-color:#082154;color:white;">
                                <div class="caption">
                                    <i class="fa fa-globe"></i>Manage Home Product
                                </div>
<!--                                <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                   
                                    <a href="javascript:;" class="remove">
                                    </a>
                                </div>-->
<a href="{{URL('admin/dashboard/Menu')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;margin-top: 5px;"><i class="fa fa-backward"></i> Back</a>
                            </div>
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                @if (Session::has('success'))
                                   <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                @if (Session::has('error'))
                                   <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                @endif
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="btn-group">
                                            	<button type="button" class="btn green" data-toggle="modal" data-target="#homepageModal">Add New <i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- <div class="btn-group pull-right">
                                                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="javascript:;">
                                                        Print </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                        Save as PDF </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                        Export to Excel </a>
                                                    </li>
                                                </ul>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover th-bg" id="sample_1">
                                <thead>
                           

                                <tr>
                                    <th>
                                    	ID
                                    </th>
                                    <th>
                                    	Product ID
                                    </th>
                                    <th>
                                        Product Image
                                    </th>
                                    <th>
                                    	Product Name
                                    </th>
                                    <th>
                                        Wholesale
                                    </th>
                                    <th>
                                        Hot Product
                                    </th>
                                    <th>
                                        Bangladeshi Product
                                    </th>
                                    <th>
                                        Sort
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                @if($home_product)
                                @foreach($home_product as $h_pro)
                                <tr class="homepro_table_body">
                                	<td class="homepro_id">
                                        {{ $h_pro->id }}
                                    </td>
                                    <td class="homeproduct_id">
                                        {{ $h_pro->product_id }}
                                    </td>
                                    <td class="homeproduct_img text-center">
                                    @if($h_pro->images != '' && is_file('bdtdc-product-image/home-page/'.$h_pro->images))
                                        <img style="width:50px;height:50px;" src="{{ URL::to('/bdtdc-product-image/home-page/'.$h_pro->images,null) }}">
                                    @else
                                        @if($h_pro->bdtdcProduct)
                                            @if($h_pro->bdtdcProduct->product_image_new)
                                                <img style="width:50px;height:50px;" src="{{ URL::to(''.$h_pro->bdtdcProduct->product_image_new->image,null) }}">
                                            @else
                                                <img style="width:50px;height:50px;" src="{{ URL::to('uploads/no_image.jpg') }}">
                                            @endif
                                        @else
                                            <img style="width:50px;height:50px;" src="{{ URL::to('uploads/no_image.jpg') }}">
                                        @endif
                                    @endif
                                    <!-- <div class="text-center" style="margin-top: 4px;">
                                        <button style="width: 50px;margin-left: 5px;" type="button" title="Remove" class="btn btn-xs red remove_image" data-imgdeleteid="{{ $h_pro->id }}"><i style="padding-left: 4px;" class="fa fa-minus"></i></button>
                                    </div> -->
                                    </td> 
                                    <td class="homeproduct_name">
                                    	@if($h_pro->bdtdcProduct)
                                    		@if($h_pro->bdtdcProduct->product_name)
                                    		<a target="_blank" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',trim($h_pro->bdtdcProduct->product_name->name)).'='.mt_rand(100000000, 999999999).$h_pro->product_id,null) }}">{{ $h_pro->bdtdcProduct->product_name->name }}</a>
                                    		@else
                                    		<span>Name not available</span>
                                    		@endif
                                    	@else
                                    		<span>Name not available</span>
                                    	@endif
                                    </td>
                                    <td class="homeproduct_wholesale_td text-center">
                                    	@if($h_pro->whole_sale == 1)
                                    	<input type="checkbox" value="1" class="change_check" data-id="{{ $h_pro->id }}" name="homeproduct_wholesale_check" title="Make Wholesale Product" checked />
                                    	@else
                                    	<input type="checkbox" value="1" class="change_check" data-id="{{ $h_pro->id }}" title="Make Wholesale Product" name="homeproduct_wholesale_check" />
                                    	@endif
                                    </td>

                                    <td class="hotproduct_td text-center">
                                        @if($h_pro->hot_product == 1)
                                    	<input type="checkbox" value="1" title="Make Hot Product" class="change_check" data-id="{{ $h_pro->id }}" name="homeproduct_hot_check" checked />
                                    	@else
                                    	<input type="checkbox" value="1" title="Make Hot Product" class="change_check" data-id="{{ $h_pro->id }}" name="homeproduct_hot_check" />
                                    	@endif
                                    </td>

                                    <td class="bdproduct_td text-center">
                                        @if($h_pro->bangladesh_products == 1)
                                    	<input type="checkbox" value="1" title="Make Bangladeshi Product" class="change_check" name="bangladesh_products_check" data-id="{{ $h_pro->id }}" checked />
                                    	@else
                                    	<input type="checkbox" value="1" title="Make Bangladeshi Product" class="change_check" data-id="{{ $h_pro->id }}" name="bangladesh_products_check" />
                                    	@endif
                                    </td>

                                    <td class="sortproduct_td text-center">
                                        <select name="sortproduct_option" data-id="{{ $h_pro->id }}" class="sortproduct_option">
                                            @if($total_hp > 0)
                                                <?php
                                                // echo $h_pro->sort;
                                                for ($hi=0; $hi < $total_hp; $hi++) {
                                                    if ($hi == trim($h_pro->sort)) {
                                                        echo '<option value="'.$hi.'" selected>'.$hi.'</option>';
                                                    }else{
                                                        echo '<option value="'.$hi.'">'.$hi.'</option>';
                                                    }
                                                }
                                                ?>
                                            @endif
                                        </select>
                                    </td>

                                    <td class="port_td text-center">
                                        <!-- <i class="fa fa-pencil-square-o" title="Edit" style="color:green;cursor:pointer;font-size: 20px;"></i> -->
                                        <!-- <a href="{{'/edit_home_product/'.$h_pro->id}}"><i class="fa fa-edit"></i></a> -->
                                        <i class="fa fa-times delete_home_product" data-deleteid="{{ $h_pro->id }}" title="Remove" style="color:red;cursor:pointer;font-size: 20px;"></i>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                
                                
                                
                                
                                </tbody>
                                </table>
                                <div class="text-right">
                                @if($home_product)
                                    {!! $home_product->render() !!}
                                @endif
                                </div>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>

<!-- Modal -->
<div id="homepageModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      {!! Form::open(['url' => 'admin/add-home-product', 'method' => 'post', 'id'=>'add_home_product','files'=>true]) !!}
      <div class="modal-header" style="background-color:#44b6ae;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Add Home Product</h4>
      </div>
      <div class="modal-body">
      		<input type="hidden" name="Search_Product_By_Name_or_ID" value="0">
      		@if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
      		<div class="form-group">
			  <label for="supplier_list">Search Supplier By Name Or ID:</label>
			  <select class="form-control" name="supplier_list" id="supplier_list" style="width: 185px !important">
			    <option value="all" selected>From Any Supplier</option>
			    @if($bdtdc_supplier)
			    	@foreach($bdtdc_supplier as $bdtdc_user)
			    		@if($bdtdc_user->user)
			    			<option value="{{ $bdtdc_user->user_id }}">{{ $bdtdc_user->user->first_name }} {{ $bdtdc_user->user->last_name }} - (ID {{ $bdtdc_user->user_id }})</option>
			    		@endif
			    	@endforeach
			    @endif
			  </select>
			</div>
  			<div class="form-group">
			    <label for="product_name_search">Search Product By Name or ID:</label>
			    <input type="text" class="form-control" id="product_name_search" placeholder="Search product by using product name or product id">
			</div>
			<div class="row removecheckbox">
				<div class="col-md-8">
                    <label><input type="file" name="home_image" id="home_image"></label><br>
                    <label>Sort: <select name="sortproduct_opt">
                        @if($total_hp > 0)
                            <?php
                            // echo $h_pro->sort;
                            for ($hi=0; $hi < $total_hp; $hi++) {
                                if($hi == 0){
                                    echo '<option value="'.$hi.'" selected>'.$hi.'</option>';
                                }else{
                                    echo '<option value="'.$hi.'">'.$hi.'</option>';
                                }
                            }
                            ?>
                        @endif
                    </select></label>
					<div class="checkbox">
					  <label><input type="checkbox" name="make_wholesale" class="removecheckbox">Make Wholesale Product</label>
					</div>
					<div class="checkboxl">
					  <label><input type="checkbox" name="make_hot" class="removecheckbox">Make Hot Product</label>
					</div>
					<div class="checkbox">
					  <label><input type="checkbox" name="make_bangladeshi" class="removecheckbox">Make Bangladeshi Product</label>
					</div>
				</div>
				<div class="col-md-4 text-right">
					<img class="product_preview" style="width:100px;height:100px;" src="{{ URL::to('uploads/no_image.jpg') }}">
				</div>
			</div>
			
      </div>
      <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left: 125px;">Close</button>
        <button type="reset" class="btn btn-warning resetvalue">Reset</button>
        <button type="submit" class="btn btn-success add_home_p">Submit</button>
       
      </div>
      {!! Form::close() !!}
    </div>

  </div>
</div>





@stop
@section('scripts')
<script type="text/javascript" src="{!! asset('assets/admin/pages/scripts/jquery.searchabledropdown-1.0.8.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/fontend/js/select2.min.js') !!}"></script>
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   Demo.init(); // init demo features 
   QuickSidebar.init(); // init quick sidebar
    // TableManaged.init(); 
   //Index.initDashboardDaterange();
  // Index.initJQVMAP(); // init index page's custom scripts
   //Index.initCalendar(); // init index page's custom scripts
   // Index.initCharts(); // init index page's custom scripts
   // Index.initChat();
   // Index.initMiniCharts();
   // Tasks.initDashboardWidget();
});
</script>
<script>
$('.resetvalue').click(function(){
    $('.checkbox').prop("checked", false);
    $('#supplier_list option[value="all"]').attr("selected", "selected").change();;
    $('.product_preview').attr('src', '/uploads/no_image.jpg');
    // $('#homepageModal').modal('show');
});
$(document).ready(function(){
    $("#supplier_list").select2({
            placeholder: "Please select your product",
            width: '235px'
        });
    $('.mkn_loader').css('display','none');
	$("#supplier_list").searchable({
		// maxListSize: 100,						// if list size are less than maxListSize, show them all
		//maxMultiMatch: 50,						// how many matching entries should be displayed
		exactMatch: false,						// Exact matching on search
		wildcards: true,						// Support for wildcard characters (*, ?)
		ignoreCase: true,						// Ignore case sensitivity
		latency: 200,							// how many millis to wait until starting search
		warnMultiMatch: 'top {0} matches ...',	// string to append to a list of entries cut short by maxMultiMatch 
		warnNoMatch: 'no matches ...',			// string to show in the list when no entries match
		zIndex: 'auto'							// zIndex for elements generated by this plugin
   	});

	// $("#supplier_list").parent('div').css('width','100% !important');
 //   	$("#supplier_list").parent('div').children('select').css('width','100% !important');
 
	$(document).on({

            keyup: function() {
                var preview_url = "";
                var supplier_id = $('#supplier_list').val();
                $(this).autocomplete({
                    source: window.location.origin + "/product_suggesion/" + $(this).val()+"/"+supplier_id,
                    select: function(event, ui) {
                    	$('[name="Search_Product_By_Name_or_ID"]').val(ui.item.id);
                        if(ui.item.image){
                            preview_url = window.location.origin+"/uploads/"+ui.item.image;
                        }else if(ui.item.images){
                            preview_url = window.location.origin+"/"+ui.item.images;
                        }else{
                            preview_url = window.location.origin+"/uploads/no_image.jpg";
                        }
                        $('.product_preview').attr('src',preview_url);
                    },
                    html: true,
                    open: function(event, ui) {
                        $('.ui-autocomplete').css('z-index', '9999999');
                    }
                });
            }
        }, '#product_name_search');

    var base_url = '<?php echo url('/') ?>';
    var active_url = window.location.href;
//    var base_url = window.location.origin;
//    var active_url = window.location.href;

    $(document).on({click:function(e){
        e.preventDefault();
        var product_id_data = $.trim($('[name="Search_Product_By_Name_or_ID"]').val());
        var make_wholesale = 0;
        var make_hot = 0;
        var make_bangladeshi = 0;
        var make_sort = $('[name="sortproduct_opt"]').val();
        if($('[name="make_wholesale"]').is(':checked')){
            make_wholesale = 1;
        }
        if($('[name="make_hot"]').is(':checked')){
            make_hot = 1;
        }
        if($('[name="make_bangladeshi"]').is(':checked')){
            make_bangladeshi = 1;
        }
        if(product_id_data == null || product_id_data == '' || product_id_data == 0){
            alert ('Please select a product from populated dropdown list.');
        }else{
            $('#add_home_product').submit();
            /*$('.mkn_loader').css('display','block');
            var file = document.getElementById('home_image').files[0];
            $.post(base_url+'/admin/add-home-product',{
                _token:'{{ csrf_token() }}',
                'product_id_data':product_id_data,
                'make_wholesale':make_wholesale,
                'home_image':file,
                'make_hot':make_hot,
                'make_bangladeshi':make_bangladeshi,
                'sortproduct_opt':make_sort,
            },function(result){
                if(parseInt(result) == 1){
                    window.location.href = active_url;
                }else if(parseInt(result) == 2){
                    window.location.href = active_url;
                }else{
                    alert ('Unkonwn Error Occured.');
                    $('.mkn_loader').css('display','none');
                }
            });*/
        }
    }},'.add_home_p');

	$(document).on({click:function(){
		var r = confirm("Are you sure, you want to delete?");
		if (r == true) {
            var _this = $(this);
            var delete_id = $(this).attr('data-deleteid');
            $('.mkn_loader').css('display','block');
        $.post(base_url+'/admin/delete-home-product/'+delete_id,{
                _token:'{{ csrf_token() }}',
                delete_id:delete_id,
            },function(result){
                alert('Product Deleted Successfully')
                if(parseInt(result) == 1){
                    $('.mkn_loader').css('display','none');
                    _this.parent().parent().remove();
                }else if(parseInt(result) == 2){
                    $('.mkn_loader').css('display','none');
                    alert ('Please Login First.');
                }else{
                    $('.mkn_loader').css('display','none');
                    alert ('Unkonwn Error Occured.');
                }
            });
		}
        
        else {$('.mkn_loader').css('display','none');}
	}},'.delete_home_product');

    $(document).on({click:function(){
        if (confirm("Are you sure!")) {
            var _this = $(this);
            var delete_id = $(this).attr('data-imgdeleteid');
            $('.mkn_loader').css('display','block');
            $.post(base_url+'/admin/delete-home-product-image/'+delete_id,{
                _token:'{{ csrf_token() }}',
                delete_id:delete_id,
            },function(result){
                if(parseInt(result) == 1){
                    $('.mkn_loader').css('display','none');
                    _this.parent().parent().children('img').attr('src','../uploads/no-image.jpg');
                }else if(parseInt(result) == 2){
                    $('.mkn_loader').css('display','none');
                    alert ('Please Login First.');
                }else{
                    $('.mkn_loader').css('display','none');
                    alert ('Unkonwn Error Occured.');
                }
            });
        }else {$('.mkn_loader').css('display','none');}
    }},'.remove_image');

	$(document).on({click:function(){
        var section = $(this).attr('name');
        var s_value = 0;
        var update_id = $(this).attr('data-id');
        $('.mkn_loader').css('display','block');
		if($(this).is(':checked')){
		    s_value = 1;
		}
		else{
		    s_value = 0;
		}
        $.post(base_url+'/admin/edit-home-product/'+section+'/'+s_value+'/'+update_id,{
                _token:'{{ csrf_token() }}',
                section:section,
                s_value:s_value,
                update_id:update_id,
            },function(result){
                if(parseInt(result) == 1){
                    $('.mkn_loader').css('display','none');
                }else{
                    alert ('Unkonwn Error Occured.');
                    $('.mkn_loader').css('display','none');
                }
        });
	}},'.change_check');

    $(document).on({change:function(){
            var _this = $(this);
            var s_value = _this.val();
            var update_id = _this.attr('data-id');
            // alert (update_id);
            $('.mkn_loader').css('display','block');
            $.post(base_url+'/admin/edit-home-product/sort_check/'+s_value+'/'+update_id,{
                _token:'{{ csrf_token() }}',
                section:'sort_check',
                s_value:s_value,
                update_id:update_id,
            },function(result){
                if(parseInt(result) == 1){
                    $('.mkn_loader').css('display','none');
                }else{
                    alert ('Unkonwn Error Occured.');
                    $('.mkn_loader').css('display','none');
                }
        });
    }},'.sortproduct_option');

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.product_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#home_image").change(function(){
        readURL(this);
    });


});
    
    
</script>
@stop
