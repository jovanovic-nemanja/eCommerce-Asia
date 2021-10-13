@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')

    @if (session()->has('flash_message'))
        <div  id ="successMessage" class="alert alert-success"  style="width:400px;">
                <p style="color:white;">{{ session('flash_message') }}</p>
         </div>
    @endif
    <div class="portlet box grey-cascade">
        <div class="portlet-title" style="background-color:#082154;color:white;">
            <div class="caption">
                <i class="fa fa-globe"></i>Edit Trade Show
            </div>
        </div>
    </div>
    <div class="page-bar">
        
        <ul class="page-breadcrumb" >
            <li>
                <i class="fa fa-home" style="color:black;"></i>
                <a href="{{URL::route('admin_dashboard')}}" >Home</a>
                <i class="fa fa-angle-right" style="color:black;"></i>
            </li>
           
            <li>
                <a href="{{URL('admin/dashboard/Classifieds (B2b)')}}">Classifieds (B2b)</a>
                 <i class="fa fa-angle-right" style="color:black;"></i>
            </li>
            <li>
                Edit Trade
            </li>
        </ul>
        <div class="page-toolbar">
           
            <a href="{{URL('admin/tradeshow-show')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;"><i class="fa fa-backward"></i> Back</a>
        </div>
    </div>
    
    
                <!-- END PAGE HEADER-->
                <!-- BEGIN PAGE CONTENT-->
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="hidden_categorie" value="{{ $pre_trade_data->category_id }}">
                       <!--  <form class="form-horizontal form-row-seperated" action="#"> -->
                       
                        {!! Form::open(array('route'=>array('admin.tradeshow-update',$pre_trade_data->description->tradeshow_id),'id'=>'form1','class'=>'form-horizontal  form-row-seperated trade_edit_form','files'=>true)) !!}

                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cubes"></i>
                                        <span class="caption-subject font-green-sharp bold uppercase">
                                            Trade-Show Edit 
                                        </span>
                                        <!--<span class="caption-helper">Edit</span>-->
                                    </div>
                                    <div class="actions btn-set">
                                        <a href="{{ URL::to('admin/tradeshow-show') }}" class="btn btn-default btn-success btn-circle" style="color: #fffcfb;">Trade List</a>
                                        <!-- <span onClick="return form_validate('form1');" class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</span> -->
                                        <button class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
                                        <button class="btn green-haze btn-circle"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
                                        {{-- <div class="btn-group">
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
                                        </div> --}}
                                    </div>
                                </div>
                                    
                                <div id="validation_error">

                                </div>

                                <div class="portlet-body">
                                    <div class="tabbable">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_general" data-toggle="tab">
                                                General </a>
                                            </li>
                                            <li>
                                                <a href="#tab_meta" data-toggle="tab">
                                                Meta </a>
                                            </li>
                                            <li>
                                                <a href="#tab_images" data-toggle="tab">
                                                Images </a>
                                            </li>
                                           
                                        </ul>
                                        <div class="tab-content no-space">
                                            <div class="tab-pane active" id="tab_general">
                                                <div class="form-body">
                                                    <div class="col-md-12 form-group" style="margin-top: 30px">
                                                        <label class="col-md-2 control-label">Country Name: <span class="required">
                                                        * </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            <select class="form-control country_id" name="country_id" id="location_of_reg" style="/*width:38%;*/padding-bottom:1%;font-size:12px;padding-top:0%">
                                                                  <option value="{{ $pre_trade_data->country_id }}">{{ $pre_trade_data->trade_country->name }}</option>
                                                                  @foreach($country as $single_country)
                                                                  <option value="{{$single_country->id}}" >{{$single_country->name}}</option>
                                                                  @endforeach
                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">Location: <span class="required">
                                                        * </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            {!! Form::text('location',$pre_trade_data->location,['class'=>'form-control','placeholder'=>'location']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">Date: <span class="required">
                                                        * </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            {!! Form::date('date',$pre_trade_data->date,['class'=>'form-control date','placeholder'=>'Date']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">Duration: <span class="required">
                                                        * </span>
                                                        </label>
                                                            <div style="margin-left:1.5%;margin-left:-1px;" class=" form-group col-md-2 ">
                                                                    {!! Form::text('start_time',explode(',',$pre_trade_data->duration)[0],['class'=>'form-control text-primary','placeholder'=>'Start Time (Ex: 10:52:AM)']) !!}
                                                            </div>
                                                            <!-- <div class="form-group col-md-2" style="box-shadow: none;background:     transparent;">
                                                                <input style="box-shadow: none;background: transparent;" readonly type="text" class="btn btn-xs" value=":">
                                                            </div> -->
                                                            <div  style="margin-left:1.5%;margin-left:-1px;" class=" form-group col-md-2 ">
                                                                {!! Form::text('end_time',explode(',',$pre_trade_data->duration)[1],['class'=>'form-control text-primary','placeholder'=>'End-time (Ex: 10:52:AM)']) !!}
                                                            </div>
                                                        
                                                    </div>


                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">Venue: <span class="required">
                                                        * </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            {!! Form::text('venue',$pre_trade_data->venue,['class'=>'form-control','placeholder'=>'vanue']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">Parent Category: <span class="required">
                                                        * </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                           <div class="form-control height-auto parent_id_div">
                                                                <div class="scroller" style="height:275px;" data-always-visible="1">


                                                                    <ul class="list-unstyled">
                                                                        <?php if ($categorys) {?>

                                                                        <label><input type="checkbox" class="parent_id" name="categories[]" value="0">Parent</label>
                                                                             <?php foreach ($categorys as $category) {?>


                                                                        <li>
                                                                        

                                                                            <label><input type="checkbox" class="parent_id" name="categories[]"  value="<?php echo $category['category_id'] ;?>"><?php echo $category['name'] ; ?></label>

                                                                             <?php if ($category['category_childrens']) { ?>
                                                                                 <?php foreach (array_chunk($category['category_childrens'], ceil(count($category['category_childrens']))) as $category_childrens) { ?>
                                                                            <ul class="list-unstyled">
                                                                            <?php foreach ($category_childrens as $category_children) { ?>
                                                                                <li>
                                                                                    <label><input type="checkbox"  class="chield_id" name="categories[]" value="<?php echo $category_children['category_id'] ;?>"> <?php echo $category_children['child_name']; ?></label>
                                                                                </li>
                                                                               <?php } ?>
                                                                            </ul>
                                                                            <?php } ?>
                                                                            <?php } ?>

                                                                        </li>
                                                                        <?php } ?>
                                                                        <?php } ?>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span class="help-block">
                                                            select only one category </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>       
                                               
                                            <!---------------------- META INFORMATION ---------------->
                                            <div class="tab-pane" id="tab_meta">
                                                <div class="form-body" >

                                                    <div class="col-md-12 form-group" style="margin-top: 30px">
                                                        <label class="col-md-2 control-label">Title:</label>
                                                        <div class="col-md-4">
                                                            {!! Form::text('title',$pre_trade_data->description->title,['class'=>'form-control','placeholder'=>'Title']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">Description:</label>
                                                        <div class="col-md-4">
                                                            <textarea class="form-control maxlength-handler" rows="8" id="meta_description" name="description" value="{{ $pre_trade_data->description->description }}" maxlength="1000">{{ $pre_trade_data->description->description }}</textarea>
                                                            <span class="help-block">
                                                            max 1000 chars </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">Meta Title:</label>
                                                        <div class="col-md-4">
                                                            {!! Form::text('meta_title',$pre_trade_data->description->meta_title,['class'=>'form-control','placeholder'=>'Meta-Title']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">Meta Description:</label>
                                                        <div class="col-md-4">
                                                            <textarea class="form-control maxlength-handler" rows="8" id="meta_description" name="meta_description" maxlength="1000">{{ $pre_trade_data->description->meta_description }}</textarea>
                                                            <span class="help-block">
                                                            max 1000 chars </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">Meta Keyword:</label>
                                                        <div class="col-md-4">
                                                            {!! Form::text('meta_keyword',$pre_trade_data->description->meta_keyword,['class'=>'form-control','placeholder'=>'Meta-keyword']) !!}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!---------------------- image INFORMATION ---------------->
                                            <div class="tab-pane" id="tab_images">
                                                <div class="panel panel-success" style="margin-top: 60px;">
                                                  <div class="panel-heading">
                                                      <h3 class="panel-title">Operations</h3>
                                                  </div>
                                                  <div class="panel-body">
                                                               <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                                    <div class="col-md-12 row fileupload-buttonbar">
                                                        
                                                        <div class="col-md-6">
                                                            <!-- The fileinput-button span is used to style the file input field as button -->

                                                            <span class="btn green fileinput-button" style="text-align: left;">
                                                            <i class="fa fa-plus"></i>
                                                            <span>
                                                            Add file... </span>
                                                            <input type="file" name="image" multiple="">
                                                            </span>
                                                           
                                                            <!-- The global file processing state -->
                                                            <span class="fileupload-process">
                                                            </span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h4>Image</h4>
                                                            <img class="img-thumbnail" style="width:58%;height: 108px;margin-bottom: 2%;" src="{{ URL::to('uploads',$pre_trade_data->images) }}" alt="">
                                                        </div>
                                                       
                                                        
                                                    </div>
                                                    <!-- The table listing the files available for upload/download -->
                                                    
                                                     </div>
                                                </div>
                                                <div class="panel panel-success" style="margin-top: 221px;">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Notes</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <ul>
                                                                <li>
                                                                     The maximum file size for uploads in this demo is <strong>5 MB</strong> (default file size is unlimited).
                                                                </li>
                                                                <li>
                                                                     Only image files (<strong>JPG, GIF, PNG</strong>) are allowed in this demo (by default there is no file type restriction).
                                                                </li>
                                                                <li>
                                                                     Uploaded files will be deleted automatically after <strong>5 minutes</strong> (demo setting).
                                                                </li>
                                                            </ul>
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
                    <!--</div>-->
                    
                <!-- END PAGE CONTENT-->
        
@stop
@section('scripts')
<script>
        $(document).ready(function() {

            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            Demo.init(); // init demo features
          /* EcommerceProductsEdit.init();*/

          /*checkbox validation*/
           
          /**checkbox validation end**/

          $('.parent_id').on('click', function() {
              alert();
                    $('.parent_id').removeAttr('checked');
                    $(this).attr('checked', true);
                    }
                });

        /*$("input.parent_id").click(function() {
    var theCheckboxes = $("input[type='checkbox']"); 
    if (theCheckboxes.filter(":checked").length > 1) {
        $(this).attr("checked", false);
        alert( "Please selected one user at a time for editing." );

        return false;
    }
});*/


/*$(':checkbox').bind('change', function() {
        var thisClass = $(this).attr('class');
        if ($(this).attr('checked')) {
            $(':checkbox.' + thisClass).not($(this)).removeAttr('checked');
        }
        else {
            $(this).attr('checked', 'checked');
        }
    });*/

    /*$("input[name='categories[]']").change(function () {

      var maxAllowed = 1;

      var cnt = $("input[name='categories[]']:checked").length;

      if (cnt > maxAllowed)

      {

         $(this).attr("checked", "");

         alert('Select maximum ' + maxAllowed + ' field!');

     }*/
     

        });

        

        function form_validate(form_id){
            var error = 0;
            var msg='';
            var name = $('#name').val();
            var desc = $('#description').val();
            var seo = $('#seo').val();
            var mtitle = $('#meta_title').val();
            var mdesc = $('#meta_description').val();
            var mkey = $('#meta_keywords').val();

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
            if(seo === ''){
                error++;
                $('#seo').css('border','1px solid red');
               msg += error+". SEO Required <br/>";

            }
            if(mtitle === ''){
                error++;
                $('#meta_title').css('border','1px solid red');
               msg += error+". Meta Title Required <br/>";

            }
            if(mdesc === ''){
                error++;
                $('#meta_description').css('border','1px solid red');
               msg += error+". Meta Description Required <br/>";

            }
            if(mkey === ''){
                error++;
                $('#meta_keywords').css('border','1px solid red');
               msg += error+". Meta Keywords Required <br/>";

            }
            var allVals = [];
             $('.parent_id_div :checked').each(function() {
               allVals.push($(this).val());
             });

             if(allVals.length != 1){
                error++;
                $('.parent_id_div').css('border','1px solid red');
               msg += error+". Parent Category Must be 1 selected ! <br/>";
             }

            if(error != 0){

                $('#validation_error').addClass('alert alert-danger');
                 $('#validation_error').html(msg);
            }else{
               
                var formdata = $( "#"+form_id ).serialize();
                var action = $("#"+form_id).attr('action');
//                 alert(action);
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
        setTimeout(function() {
            $('#successMessage').fadeOut('fast');
        }, 3000); 

    </script>

<!-- END JAVASCRIPTS -->
@stop
