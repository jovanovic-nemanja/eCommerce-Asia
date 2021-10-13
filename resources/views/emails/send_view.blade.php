@extends('fontend.master2')
@section('content')



<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row" style="background: #fff;border: 1px solid #ddd;">
	<div style="padding-bottom:2%;padding: 1% 5% 5% 5%;" class="col-md-12">
	 
	
			{!! Form::open(array('url' => 'supplier/product_create', 'method' => 'post', 'enctype'=>'multipart/form-data', 'accept-charset'=>'UTF-8', 'class'=>'form-horizontal form-row-seperated product_info_form')) !!}
			
		
			
			<div class="">
				<!-------------PRODUCT-DETAILS-TAB-CONTENT;------------------>
			    <div id="product_details_tab_content" class="">
					<h4 class="text-center" style="margin-bottom: 23px;">Product-details</h4>
			      	
			      
			     
			     
			      	
			      	<div class="row attribute_area margin_top1">
			      		<div style="text-align:right;padding-right:0px;margin-top:2%" class="col-md-2">
			      			<label for="">Attributes: </label>
			      		</div>
			      		<div class="col-md-8" style="padding-top: 1%;">
			      			<table class="table">
			      				<tbody class="copied_template">
			      					<tr>
			      						<td>Name:</td>
			      						<td><input style="height:27px;padding-bottom:1%;font-size:12px" type="text" name="product_att_name[]" class="form-control"></td>
			      						<td>Value:</td>
			      						<td><input style="height:27px;padding-bottom:1%;font-size:12px" type="text" name="product_att_value[]" class="form-control"></td>
			      						<td> <button class="btn btn-primary btn-xs add_more_attribute_btn"><i class="fa fa-plus"></i></button> </td>
			      					</tr>
			      				</tbody>
			      			</table>
			      		</div>
			      	</div>




			 

			      	

			      	

			      	

			      	
			      	
			    </div>


			</div>
			<br>
			<br>
			<br>
			<div class="col-xs-12 bg-info" style="padding:1%;padding-left:18%;margin-bottom:2%;margin-top:4%">
				<div style="margin-top:-57px;margin-bottom:23px;"><label><input type="checkbox" name="terms_condition" value="terms" checked> I accept with the <a target="_blank" href="{{ URL::to('product_listing_policy',null) }}">terms and conditions.</a></div>
				<input type="submit" class="btn btn-primary btn-lg btn-join product_create_submit_btn" value="Save">
				<a class="btn btn-primary btn-lg btn-join" href="{!! URL::to('dashboard/product') !!}">Cancel</a>
			</div>
			
		{!! Form::close() !!}
	</div>
</div>


@stop
@section('scripts')


<script type="text/javascript">
	(function(){
		function ajax_success_message(str){
            $('#ajax_status').html(str).fadeOut(1500,function(){
                $('#ajax_status').addClass('hide_this');
            });
        }

		/************* CHANGE SUB-CATEGORY *************/
        $(document).on({change:function(){
          var id = $(this).val();
          if(parseInt(id) == 0){
          	$('.parent_cat_error').show();
		    $('.sub_cat_error').show();
          }else{
          	$('.parent_cat_error').hide();
          }
          var url = $('[name="base_url"]').val()+"/get_sub_category/"+id;
          var template = "<option value='0'>Select a sub category</option>";
          $.get(url).done(function(r){
            $.each(r,function(i,v){
              if(id == 0){
              	template += '';
              }else{
              	template+="<option value="+v.id+">"+$.trim(v.name)+"</option>";
              }
            });
            $('[name="sub_category"]').html(template);
          })
        }},'[name="parent_category"]');

        $(document).on({change:function(){
          var id = $(this).val();
          if(parseInt(id) == 0){
		    $('.sub_cat_error').show();
          }else{
          	$('.sub_cat_error').hide();
          }
        }},'[name="sub_category"]');
        /************* CHANGE SUB-CATEGORY END *************/

        /*************PRODUCT ATTRIBUTES ADD *************/
                $(document).on({click:function(e){
                	e.preventDefault();
                    var target_area,data_template,prev_name,prev_value;
                    prev_name = $(this).closest('tr').find('[name="product_att_name[]"]').val();
                    prev_value = $(this).closest('tr').find('[name="product_att_value[]"]').val();
                    data_template = '<tr>\
                                        <td>Name:</td>\
                                        <td><input style="height:27px;padding-bottom:1%;font-size:12px" type="text" name="product_att_name[]" class="form-control"></td>\
                                        <td>Value:</td>\
                                        <td><input style="height:27px;padding-bottom:1%;font-size:12px" type="text" name="product_att_value[]" class="form-control"></td>\
                                        <td> <button class="btn btn-danger btn-xs remove_attributes"><i class="fa fa-minus"></i></button> </td>\
                                    </tr>';
                    (prev_name.length>0 && prev_value.length>0)?$('.copied_template').append(data_template) : false;
                }},'.add_more_attribute_btn');
        /*************PRODUCT ATTRIBUTES ADD end*************/

        /*************ADD PRICE MOQ && FOB *************/
                $(document).on({
                    click: function(e) {
                        template = '<tr>\
                                        <input type="hidden" name="product_price_id[]" value="0">\
                                        <td>MOQ: <span></span></td>\
                                        <td>\
                                            <input style="height:27px;padding-bottom:1%;font-size:12px" type="text" name="product_MOQ[]" value="" class="form-control">\
                                        </td>\
                                         <td> FOB Price: </td>\
                                         <td>\
                                            <input style="height:27px;padding-bottom:1%;font-size:12px;width:100px;" type="text" name="product_FOB_from[]" placeholder="From" class="form-control check_number">\
                                        </td>\
                                        <td style="text-align:center;">-</td>\
                                        <td>\
                                            <input style="height:27px;padding-bottom:1%;font-size:12px;width:100px;" type="text" name="product_FOB_to[]" class="form-control check_number" placeholder="To">\
                                        </td>\
                                        <td><i class="fa fa-plus btn btn-xs btn-primary add_price_btn"></i> <i class="fa fa-minus btn btn-xs btn-danger remove_attributes"></i></td>\
                                    </tr>';
                        $(this).closest('tbody').append(template);
        
                    }
                }, '.add_price_btn');
        /*************ADD PRICE MOQ && FOB *************/

        $(document).on({click:function(e){
            e.preventDefault();
            var deleted_attr_id = $(this).attr('deleted_attr_id');
            // alert (deleted_attr_id);
            if(deleted_attr_id != 'undefined'){
                if($(this).attr('check_btn') == 'attribute'){
                    $(this).parent().parent().parent().parent().append('<input type="hidden" name="deleted_attr_id[]" value="'+deleted_attr_id+'">');
                }else if($(this).attr('check_btn') == 'trade'){
                    $(this).parent().parent().parent().parent().append('<input type="hidden" name="deleted_trade_id[]" value="'+deleted_attr_id+'">');
                }
            }
            $(this).closest('tr').remove();
        }},'.remove_attributes');

        /*************PRODUCT GROUP FORM OPENER*************/
        $(document).on({
            click: function() {
                $('.add_group_name_form_area').show(300)
            }
        }, '.group_name_form_opener');
        
        /*************PRODUCT GROUP FORM REMOVER*************/
        $(document).on({
            click: function(e) {
                e.preventDefault();
                $('.add_group_name_form_area').hide(300)
            }
        }, '.group_name_from_remover');
        
        /*************PRODUCT GROUP FORM SUBMIT*************/
        $(document).on({
            click: function(e) {
                e.preventDefault();
                var url = window.location.origin + "/add_product_group/" + $("[name='add_group_name[]']:first").val();
                $('.group_name_from_remover').click();
                $.get(url, function(r) {
                    $('.table select[name="product_groups"]:first').append("<option value='"+r.id+"'>"+r.name+"</option>");
                });
            }
        }, '.product_group_submit_btn');


        /*************FORM VALIDATION *************/
        $(document).on({blur:function(){
            var relative_row = $(this).parent().parent();
            if(!$.trim(this.value).length){
                $(this).attr('validation','validated_false');
                relative_row.find('.validated_true').hide(500);
                relative_row.find('.validated_false').show(500);
                relative_row.find('.empty_error').show(500);
            }else{
                $(this).attr('validation','validated_true');
                relative_row.find('.empty_error').hide(500);
                relative_row.find('.validated_false').hide(500);
                relative_row.find('.validated_true').show(500);
                $(this).attr('style',"border:1px solid #e5e5e5");
            }
            return;
        }},'.validate');

        $(document).on({click:function(e){
            if ($('[name="terms_condition"]').prop('checked')==true){
                $('[name="terms_condition"]').css('box-shadow','');
            }else{
                $('[name="terms_condition"]').focus();
                $('[name="terms_condition"]').css('box-shadow','0px 0px 3px 1px red');
            }
        }},'[name="terms_condition"]');

        $(document).on({keyup:function(event){
        	// Allow: backspace, delete, tab, escape, and enter
		        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
		                // Allow: Ctrl+V
		                (event.ctrlKey == true && (event.which == '118' || event.which == '86')) ||  
		                // Allow: Ctrl+c
		                (event.ctrlKey == true && (event.which == '99' || event.which == '67')) || 
		                // Allow: Ctrl+A
		            (event.keyCode == 65 && event.ctrlKey === true) || 
		             // Allow: home, end, left, right
		            (event.keyCode >= 35 && event.keyCode <= 39)) {
		                 // let it happen, don't do anything
		                 return;
		        }

			  var currentEl = $(this);
			  var value = $(currentEl).val();

			  // remove letters...
			  value = value.replace(/[^0-9.-]/g, "");

			  var hasDecPlace = value.match(/\./);

			  // separate integer from decimal places:
			  var pieces = value.split('.');
			  var integer = pieces[0].replace('-', '');
			  var decPlaces = ""
			  if (pieces.length > 1)
			  {
				  pieces.shift();
				  decPlaces = pieces.join('').replace('-', '');
			  }

			  // handle numbers greater than 12.00... :
			  if (parseInt(integer) > 100000 || parseInt(integer) === 100000 && parseInt(decPlaces) > 0)
			  {
				  integer = "100000";
				  decPlaces = getZeroedDecPlaces(decPlaces);
				  alert("number must be between 0.00 and 100000.00");
			  } // ...and less than 0:
			  else if (parseInt(integer) < 0)
			  {
				  integer = "0";
				  decPlaces = getZeroedDecPlaces(decPlaces);
				  alert("number must be between 0.00 and 100000.00");
			  }

			  // handle more than two decimal places:
			  if (decPlaces.length > 2)
			  {
				  decPlaces = decPlaces.substr(0, 2);
				  alert("number cannot have more than two decimal places");
			  }

			  var newVal = hasDecPlace ? integer + '.' + decPlaces : integer;

			  $(currentEl).val(newVal);
        }},'.check_number');

  		function getZeroedDecPlaces(decPlaces) {
		  	if (decPlaces === '') return '';
		  	else if (decPlaces.length === 1) return '0';
		  	else if (decPlaces.length >= 2) return '00';
	  	}
	    
	    $(document).on({keyup:function(event){
	    	// Allow: backspace, delete, tab, escape, and enter
	        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
	                // Allow: Ctrl+V
	                (event.ctrlKey == true && (event.which == '118' || event.which == '86')) ||  
	                // Allow: Ctrl+c
	                (event.ctrlKey == true && (event.which == '99' || event.which == '67')) || 
	                // Allow: Ctrl+A
	            (event.keyCode == 65 && event.ctrlKey === true) || 
	             // Allow: home, end, left, right
	            (event.keyCode >= 35 && event.keyCode <= 39)) {
	                 // let it happen, don't do anything
	                 return;
	        }
	    	var o=$(this);
  			o.val(o.val().replace(/[^\d]/g,""));
  			if (o.val().length > o.maxLength){
		      o.val(o.value.slice(0, o.maxLength))
  			}
	    }},'.check_integer');



        /*************PRODUCT IMAGE UPLOAD *************/
        $(document).on({change:function(){
            
            var template,size="",name="",type="",src="",reader,data,animation,animation_end,base_url=window.location.origin,file,parent_cat_id,sub_cat_id,img_file;
            
            if (this.files && this.files[0]) {
                $fr_token = $('input[name="_token"]').val();
                file = document.getElementById('p_img').files[0];
                parent_cat_id = $('[name="parent_category"]').val();
                sub_cat_id = $('[name="sub_category"]').val();
                name=this.files[0].name;
                type=this.files[0].type;
                size=this.files[0].size;
                img_file = this.files[0];
                if(parseInt(parent_cat_id) == 0 || parseInt(sub_cat_id) == 0){
                	$('.backend_error').html('* Please Select a parent category and a sub-category first');
		            window.scrollTo(0, 0);
		            $('.backend_error').show();
		            $('.parent_cat_error').show();
		            $('.sub_cat_error').show();
		            setTimeout(hide_error, 9000);
                }else{
                $('.loading').html('<i class="fa fa-spinner fa-pulse" style="font-size: 30px;display:inline-block;margin-top:1.5%;color:#4A6C8D"></i>Image Is uploading.....');
                data = new FormData();
                data.append('image', file);
                data.append('_token', $fr_token);
                data.append('parent_cat_id', parent_cat_id);
                data.append('sub_cat_id', sub_cat_id);
                $.ajax({
                    url: base_url+'/upload_p_image',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data, textStatus, jqXHR) {
                        if(data != 0){
                            $('#product_image_tab_content').append('<input type="hidden" name="p_image[]" value="'+data+'"/>');
                            $('.loading').html('<i class="fa fa-check-square" style="font-size: 30px;display:inline-block;margin-top:1.5%;color:#4A6C8D"></i> Image Uploaded...');
                            // $('.remove_preview_img').attr('ca_img_id',data);
                        }

                        
		                reader = new FileReader();
		                animation = "animated flip";
		                animation_end = "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
		                reader.readAsDataURL(img_file);
		                reader.onload = function(e) {
		                    
		                    src=e.target.result;
		                    template = '<div style="border-right: 1px solid #ddd" class="col-sm-3 img_container">\
		                                    <div class="col-xs-12 text-center" style="margin-bottom: 1%">\
		                                        <i class="fa fa-remove btn btn-xs btn-danger remove_preview_img" img_id="0" ca_img_id="'+data+'"></i>\
		                                    </div>\
		                                    <div class="col-xs-12">\
		                                        <img src="'+src+'" alt="" class="img-responsive" style="height:102px;width:100%">\
		                                    </div>\
		                                    <div class="col-xs-12" style="padding-top: 2%">\
		                                        <p class="img_details">Name: <span class="text-muted img_name">'+name+'</span></p>\
		                                        <p class="img_details">Size: <span class="text-muted img_size">'+size+'</span></p>\
		                                        <p class="img_details">Type: <span class="text-muted img_type">'+type+'</span></p>\
		                                    </div>\
		                                </div>';
		                    $('.img_preview').append(template);
		                }

                    },
                });
                
            }
        	}
            
        }}, '.p_create_img');
        
        /*************PRODUCT IMAGE REMOVE *************/
        $(document).on({click:function(e){
            var img_name = $(this).attr('ca_img_id');
            var img_id = $(this).attr('img_id');
            $('#deleted_p_image').append('<input type="hidden" name="deleted_p_image_id[]" value="'+img_id+'">');
            $('#deleted_p_image').append('<input type="hidden" name="deleted_p_image[]" value="'+img_name+'">');
            $('#product_image_tab_content input[value="'+img_name+'"][name="p_image[]"]').remove();
            $(this).closest('.img_container').remove();
            // alert (img_name);
            /*url = window.location.origin+'/delete_p_image/'+img_name;
            $.get(url,function(r){
                console.log(r);
            })*/
        }},'.remove_preview_img');

        /************* ERROR SHOW HIDE ****************/
        function hide_error(){
        	$('.backend_error').hide();
        }

		/*************PRODUCT FORM SUBMIT*************/
        $(document).on({click:function(e){
            e.preventDefault();
            parent_cat_id = $('[name="parent_category"]').val();
            sub_cat_id = $('[name="sub_category"]').val();
            $('.validate[validation="validated_true"]').attr('style',"border:1px solid #e5e5e5");
            if($('.validate[validation="validated_false"]').length>0){
                $('.validate[validation="validated_false"]').attr('style',"border:1px solid red");
                $('.validate[validation="validated_false"]').focus();
            }else if(parseInt(parent_cat_id) != 0 && parseInt(sub_cat_id) != 0){
                if ($('[name="terms_condition"]').prop('checked')==true){
                	var form = $('.product_info_form');
                    $.post(form.attr('action'),form.serialize(),function(r){
                    	if(r.success == true){
                    		swal({
                              title: "Product Added",
                              timer: 2000,
                              showConfirmButton: false,
                              imageUrl: "https://cdn2.iconfinder.com/data/icons/toolbar-signs-4/512/success_ok_check_yes_accept-512.png",
                              showCancelButton: true
                            });
                            window.location.href = window.location.origin+'/dashboard/product';
                    	}else{
                    		var template = '';
                        	$.each(r,function(i,v){
				              	template += '<li> * '+v+'</li>';
				            });
				            $('.backend_error').html(template);
				            window.scrollTo(0, 0);
				            $('.backend_error').show();
				            setTimeout(hide_error, 9000);
                    	}
                    });
                }else{
                    alert ("You must accept the terms and conditions.");
                }
            }else{
            	$('.backend_error').html('* Please Select a parent category and a sub-category first');
	            window.scrollTo(0, 0);
	            $('.backend_error').show();
	            setTimeout(hide_error, 9000);
            }
        }},'.product_create_submit_btn');





	
		$('.hidden_icon').hide();
		$('.add_group_name_form_area').hide();
		$('.product_desc').jqte();
		// settings of status
		var jqteStatus = true;
		$(".status").click(function(){
			jqteStatus = jqteStatus ? false : true;
			$('.jqte-test').jqte({"status" : jqteStatus})
		});

		$('[name="base"]').click(function(){
			if($(this).val() == 'based_FOB'){
				$('.quantity_base').hide(300);
				$('.FOB_base').show(500);
				// $('[name="product_MOQ[]"]').removeAttr('validation','validated_false');
				// $('[name="product_FOB[]"]').removeAttr('validation','validated_false');
				// $('[name="currency_from[]"]').attr('validation','validated_false');
				// $('[name="currency_to[]"]').attr('validation','validated_false');
				// $('[name="product_MOQ_FOB[]"]').attr('validation','validated_false');
			}else{
				$('.quantity_base').show(500);
				$('.FOB_base').hide(300);
				// $('[name="product_MOQ[]"]').attr('validation','validated_false');
				// $('[name="product_FOB[]"]').attr('validation','validated_false');
				// $('[name="currency_from[]"]').removeAttr('validation','validated_false');
				// $('[name="currency_to[]"]').removeAttr('validation','validated_false');
				// $('[name="product_MOQ_FOB[]"]').removeAttr('validation','validated_false');
			}
		});

		$('[value="others"]').click(function(){
			if ($('[value="others"]').is(':checked')){
			//if($('[value="others"]').checked){
				$('#others_area').show(500);
			}else{
				$('#others_area').hide(300);
			}
		});

		$('[name="is_limited_time_offer"]').click(function(){
			if ($('[name="is_limited_time_offer"]').is(':checked')){
			//if($('[value="others"]').checked){
				$('.limited_offer_div').show(500);
			}else{
				$('.limited_offer_div').hide(300);
			}
		});

		/************** JQueryUI Datepicker ***************/
	    $( "#dpd1" ).datepicker({
	      altField: "#actualDate",
	      altFormat: '@',
	      dateFormat: "yy-mm-dd",
	      timeFormat:  "hh:mm:ss",
	      defaultDate: "+1w",
	      changeMonth: true,
	      changeYear: true,
	      onClose: function( selectedDate ) {
	        $( "#dpd2" ).datepicker( "option", "minDate", selectedDate );
	      }
	    });
	    $( "#dpd2" ).datepicker({
	      altField: "#actualDate",
	      altFormat: '@',
	      dateFormat: "yy-mm-dd",
	      timeFormat:  "hh:mm:ss",
	      defaultDate: "+1w",
	      changeMonth: true,
	      changeYear: true,
	      onClose: function( selectedDate ) {
	        $( "#dpd1" ).datepicker( "option", "maxDate", selectedDate );
	      }
	    });
	 //    $('#dpd1').datetimepicker({
		// 	timeFormat: "hh:mm tt"
		// });
		// $('#dpd2').datetimepicker({
		// 	timeFormat: "hh:mm tt"
		// });



		
	})()
</script>

@stop

