@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')

    @if (session()->has('flash_message'))
            <p>{{ session()->get('flash_message') }}</p>
    @endif
                
                
                <!-- END PAGE HEADER-->
                <!-- BEGIN PAGE CONTENT-->
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(array('route'=>array('admin.customer.store_package'),'id'=>'form1','class'=>'form-horizontal  form-row-seperated','files'=>true)) !!}
                       
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                       <i class="fa fa-cube"></i>
                                        <span class="caption-subject font-green-sharp bold uppercase">
                                        Add Package </span>
                                        
                                    </div>
                                    <div class="actions btn-set">
                                        <button type="button" name="back" class="btn btn-default btn-circle"><i class="fa fa-angle-left"></i> Back</button>
                                        <button class="btn btn-default btn-circle "><i class="fa fa-reply"></i> Reset</button>
                                        <span onClick="return form_validate('form1');" class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</span>
                                        <button class="btn green-haze btn-circle"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
                                        <div class="btn-group">
                                            <a class="btn yellow btn-circle" href="javascript:;" data-toggle="dropdown">
                                            <i class="fa fa-share"></i> More <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;">
                                                    Duplicate </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                    Delete </a>
                                                </li>
                                                <li class="divider">
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                    Print </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                 <div id="validation_error"></div> 
                                <div class="portlet-body">
                                    <div class="tabbable">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_general" data-toggle="tab">
                                                General </a>
                                            </li>
                                           
                                           
                                        </ul>
                                        <div class="tab-content no-space">
                                            <div class="tab-pane active" id="tab_general">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Name: <span class="required">
                                                        * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="package name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Description: <span class="required">
                                                        * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" id="description" name="description" placeholder="package description"></textarea>
                                                        </div>
                                                    </div>
                                                   <div class="form-group">
                                                        <label class="col-md-3 control-label">Product Listing Period in days<br/> (o for unlimited): <span class="required">
                                                        * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="period" name="period" placeholder="30">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Product quantity <br/>(0 for unlimited): <span class="required">
                                                        * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="qty" name="qty" placeholder="100">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>       
                                              
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {!! Form::close();!!}
                    </div>
                    </div>
                    </div>
                    
                <!-- END PAGE CONTENT-->
        
@stop
@section('scripts')
<script>
        jQuery(document).ready(function() {    
           Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
           /*EcommerceProductsEdit.init();*/
        });
         function form_validate(form_id){
            var error = 0;
            var msg='';
            var name = $('#name').val();
            var desc = $('#description').val();
            var period = $('#period').val();
            var qty = $('#qty').val();
          
            if(name === ''){
                error++;
                $('#name').css('border','1px solid red');
               msg += error+". Name Required <br/>";

            }
            if(desc === ''){
                error++;
                $('#description').css('border','1px solid red');
               msg += error+". Description Required <br/>";

            }
             if(period === ''){
                error++;
                $('#period').css('border','1px solid red');
               msg += error+". Listing Period Required <br/>";

            }
             if(qty === ''){
                error++;
                $('#qty').css('border','1px solid red');
               msg += error+". Product Quantity Required <br/>";

            }
            
           
            if(error != 0){
                
                $('#validation_error').addClass('alert alert-danger');
                 $('#validation_error').html(msg);
            }else{
               
                var formdata = $( "#"+form_id ).serialize();
                var action = $("#"+form_id).attr('action');
                $.ajax({
                      url: action,
                      type: "post",
                      data: formdata,
                      success: function(data){
                        

                        var er='';
                        var obj = $.parseJSON(data);
                        if(obj.type === 'success'){
                            $('#validation_error').removeClass('alert alert-danger');
                             $('#validation_error').addClass('alert alert-success');
                              er+= obj.text;


                        }else{
                               $('#validation_error').addClass('alert alert-danger'); 
                            $.each(obj.text, function(index, value) {
                                er+= value+'<br/>';
                            });

                        }
                             $('#validation_error').html(er);
                      }
                    }); 
            }
            
           return false;
        }



    </script>

<!-- END JAVASCRIPTS -->
@stop
