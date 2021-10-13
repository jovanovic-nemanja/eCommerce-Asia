
<h3 style="margin-top:2%;font-weight:bold;font-size: 22px;padding-left:4%" class="page-title">
	Section Create <small>create &amp; edit section</small>
</h3>

<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div style="padding-bottom:2%;padding: 1% 5% 5% 5%;" class="col-md-12">
	 <?php
        $user_id = \Sentinel::getUser()->id;
        $company = App\Model\BdtdcCompany::where('user_id',$user_id)->first();
        $wholesale=$company->wholesale;
        //print_r($wholesale);
    ?>

		<form action="{{ URL::to('supplier/section_create',null) }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8" class="form-horizontal  form-row-seperated section_info_form">
			{!! csrf_field() !!}
			<ul class="nav nav-tabs product_create_tab" role="tablist">
				<li class="active"><a data-toggle="tab" href="#section_details_tab_content">Section Details</a></li>
				<li><a data-toggle="tab" href="#section_image_tab_content">Section Image</a></li>
			</ul>
			
			<div class="tab-content">
				<!-------------Section-DETAILS-TAB-CONTENT;------------------>
			    <div id="section_details_tab_content" class="tab-pane fade in active">
					<h4>Section-details</h4>
			      	<div class="row margin_top1">
			      		<div style="text-align:right;padding-right:0px" class="col-md-2">
			      			<span>Section Name:</span>
			      		</div>
			      		<div class="col-md-4">
			      			<input style="height:27px;padding-bottom:1%;font-size:12px" type="text" name="section[]" validation="validated_false" class="form-control validate" placeholder="Section Name">
			      		</div>
			      		<div class="col-xs-3 validation_status">
                            <i class="fa fa-check-square btn btn-sm btn-success hidden_icon validated_true"></i>
                            <i class="fa fa-exclamation-triangle btn btn-sm btn-danger hidden_icon validated_false"></i>
                            <span class="text-danger validation_message"></span>
                        </div>
			      	</div>
			      	<div class="row margin_top1">
			      		<div style="text-align:right;padding-right:0px" class="col-md-2">
			      			<label for="">Color: </label>
			      		</div>
			      		<div class="col-md-4">
			      			<input style="height:27px;padding-bottom:1%;font-size:12px" type="text" name="back_color[]" validation="validated_false" class="form-control validate" placeholder="#ABCDEF">
			      		</div>
			      		<div class="col-xs-3 validation_status">
                            <i class="fa fa-check-square btn btn-sm btn-success hidden_icon validated_true"></i>
                            <i class="fa fa-exclamation-triangle btn btn-sm btn-danger hidden_icon validated_false"></i>
                            <span class="text-danger validation_message"></span>
                        </div>
			      	</div>
			      	<div class="row margin_top1">
			      		<div style="text-align:right;padding-right:0px" class="col-md-2">
			      			<label for="">Height: </label>
			      		</div>
			      		<div class="col-md-4">
			      			<input style="height:27px;padding-bottom:1%;font-size:12px" type="text" name="height[]" validation="validated_false" class="form-control validate" placeholder="In Pixel">
			      		</div>
			      		<div class="col-xs-3 validation_status">
                            <i class="fa fa-check-square btn btn-sm btn-success hidden_icon validated_true"></i>
                            <i class="fa fa-exclamation-triangle btn btn-sm btn-danger hidden_icon validated_false"></i>
                            <span class="text-danger validation_message"></span>
                        </div>
			      	</div>
			      	<div class="row margin_top1">
			      		<div style="text-align:right;padding-right:0px" class="col-md-2">
			      			<label for="">Width: </label>
			      		</div>
			      		<div class="col-md-4">
			      			<input style="height:27px;padding-bottom:1%;font-size:12px" type="text" name="width[]" validation="validated_false" class="form-control validate" placeholder="In Pixel">
			      		</div>
			      		<div class="col-xs-3 validation_status">
                            <i class="fa fa-check-square btn btn-sm btn-success hidden_icon validated_true"></i>
                            <i class="fa fa-exclamation-triangle btn btn-sm btn-danger hidden_icon validated_false"></i>
                            <span class="text-danger validation_message"></span>
                        </div>
			      	</div> 	
			    </div>
			    </form>
			    
			    <!-------------Section-IMAGE-TAB-CONTENT;------------------>
			    <div id="section_image_tab_content" class="tab-pane fade">
			      	<h4>Background Image</h4>
			      	<input style="height:27px;padding-bottom:3.8%;padding-top:.5% ; font-size:12px;width:86px" type="file" name="back_image" class="btn btn-danger btn-xs" id="p_img">
					<div class="loading">
					  	
					 </div>
					 <div class="hidden_img_name_field">
					  	
					 </div>	
					<div class="col-xs-12 img_preview" style="border:1px solid #ddd;margin-top:1%;padding:1%">
						<!-- --PREVIEW IMAGE HANDELED BY JAVASCRIPT--------- -->
						
					</div>
			    </div>
			</div>
			<div class="col-xs-12 bg-info text-center" style="padding:1%;margin-bottom:2%;margin-top:4%">
				<input type="submit" class="btn btn-primary btn-lg btn-join Section_create_submit_btn" value="Save">
			</div>
			
		</form>
	</div>
</div>





<script type="text/javascript">
	(function(){
	
		$('.hidden_icon').hide();
		$('.add_group_name_form_area').hide();
		$('.Section_desc').jqte();
		// settings of status
		var jqteStatus = true;
		$(".status").click(function(){
			jqteStatus = jqteStatus ? false : true;
			$('.jqte-test').jqte({"status" : jqteStatus})
		});
		
	})()
</script>

