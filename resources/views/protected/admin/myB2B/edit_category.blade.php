@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')

    @if (session()->has('flash_message'))
            <div id ="successMessage" class="alert alert-success" style="width:400px;">
                <p style="color:white;">{{ session()->get('flash_message') }}</p>
            </div>
    @endif
    
    
    <!--<div class=" page-bar page-title"  style="background-color:#082154;color:white;">-->
    <!--    <h3 style="margin: 5px;">Edit Category</h3>-->
    <!--</div>-->
    <div class="portlet box grey-cascade">
        <div class="portlet-title" style="background-color:#082154;color:white;">
            <div class="caption">
                <i class="fa fa-globe"></i>Edit Category
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
                Edit Category
            </li>
        </ul>
        <div class="page-toolbar">
           
            <a href="{{URL('admin/category-list')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;"><i class="fa fa-backward"></i> Back</a>
        </div>
    </div>
                
                <!-- END PAGE HEADER-->
                <!-- BEGIN PAGE CONTENT-->
                <div class="row">
                    <div class="col-md-12">
                       <!--  <form class="form-horizontal form-row-seperated" action="#"> -->
		<form action="{{ URL::to('admin/category-update',$categories->id) }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8" class="form-horizontal  form-row-seperated" files="true">
        {!! csrf_field() !!}
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cubes"></i>
                                        <span class="caption-subject font-green-sharp bold uppercase">
                                        Edit Category </span>
                                    </div>
                                    <div class="actions btn-set">
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
                                    
                                <div id="validation_error page-text"></div>    

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
                                                Images 
                                                </a>
                                            </li>
                                           
                                        </ul>
                                        <div class="tab-content no-space">
                                            <div class="tab-pane active" id="tab_general">
                                                <div class="form-body">
                                                    <div class="col-md-12 form-group" style="margin-top: 30px">
                                                        <label class="col-md-2 control-label">Category Name: <span class="required">
                                                        * </span>
                                                        </label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" id="name" name="name" value="{{$categories->category_name->name}}" placeholder="">
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">Slug: <span class="required">
                                                        * </span>
                                                        </label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" id="slug" name="slug" value="{{$categories->slug}}" placeholder="">
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">Tag: <span class="required">
                                                        * </span>
                                                        </label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" id="tag" name="tag" value="{{$categories->category_name->tag}}" placeholder="">
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">Description: <span class="required">
                                                        * </span>
                                                        </label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" id="description" value="{{$categories->category_name->description}}" name="description">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">Parent Category: <span class="required">
                                                        * </span>
                                                        </label>
                                                        <div class="col-md-8">
                                                           <div class="form-control height-auto parent_id_div">
                                                                <div class="scroller" style="height:275px;" data-always-visible="1">
                                                                    


                                                                    <ul class="list-unstyled">
                                                                        @if($categories->parent_id==0)
                                                                            <label><input checked=checked type="checkbox" class="parent_id" name="categories[]" value="0">Parent</label> 
                                                                            @else
                                                                          <label><input type="checkbox" class="parent_id" name="categories[]" value="0">Parent</label> 
                                                                            <label>
                                                                                @if($parent)
                                                                                @foreach($parendetail as $parentdetails)
                                                                                        <input type="checkbox" checked=checked class="parent_id" name="categories[]" value="{{$parentdetails->id}}"> {{$parentdetails->category_name->name}}
                                                                                @endforeach
                                                                                @else
                                                                                @endif
                                                                            </label>          
                                                                        @endif
                                                                       
                                                                        @if($cats)
                                                                            @foreach($cats as $cat)
                                                                            <label><input type="checkbox" class="parent_id" name="categories[]" value="<?php echo $cat['id']; ?>">{{ $cat->category_name->name ?? '' }}</label>                                  
                                                                            @endforeach
                                                                        @endif
                                                                        
                                                                       
                                                                       
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span class="help-block">
                                                            select only one category </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">SEO keyword: <span class="required">
                                                        * </span>
                                                        </label>
                                                        <div class="col-md-8">
                                                           <input type="text" class="form-control" name="seo" id="seo" value="{{$categories->category_name->meta_keyword}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">Top: <span class="required">
                                                        * </span>
                                                        </label>
                                                        <div class="col-md-8">
                                                           <div class="input-group">
                                                                        <div class="icheck-inline">
                                                                            <label>
                                                                            <input type="radio" name="top" value="1" class="icheck" checked> YES </label>
                                                                            <label>
                                                                            <input type="radio" name="top"  value="0" class="icheck"> No </label>
                                                                        </div>
                                                                    </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">Status: <span class="required">
                                                        * </span>
                                                        </label>
                                                        <div class="col-md-8">
                                                          
                                                            <div class="input-group">
                                                                        <div class="icheck-inline">
                                                                            <label>
                                                                            <input type="radio" name="status" value="1" class="icheck" checked> Published </label>
                                                                           <label>
                                                                            <input type="radio" name="status"  value="0" class="icheck"> UnPublished </label>
                                                                        </div>
                                                                    </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>       
                                               

                                            <div class="tab-pane" id="tab_meta">
                                                <div class="form-body">
                                                    <div class="col-md-12 form-group" style="margin-top: 30px">
                                                        <label class="col-md-2 control-label">Headline:</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control maxlength-handler" name="h1" id="h1" maxlength="150" value="{{$categories->category_name->h1}}">
                                                            <span class="help-block">
                                                            max 150 chars </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">Meta Title:</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control maxlength-handler" name="meta_title" id="meta_title" maxlength="150" value="{{$categories->category_name->meta_title}}">
                                                            <span class="help-block">
                                                            max 150 chars </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label"> Meta Keywords:</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control maxlength-handler" rows="4" id="meta_keywords" name="meta_keywords" maxlength="500" value="{{$categories->category_name->meta_keyword}}">
                                                            <span class="help-block">
                                                            max 500 chars </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label class="col-md-2 control-label">Meta Description:</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control maxlength-handler" rows="8" id="meta_description" name="meta_description" maxlength="1000" value="{{$categories->category_name->meta_description}}">
                                                            <span class="help-block">
                                                            max 1000 chars </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab_images">
                                                <div class="panel panel-success" style="margin-top: 70px ">
                                                  <div class="panel-heading">
                                                      <h3 class="panel-title">Operations</h3>
                                                  </div>
                                                  <div class="panel-body">
                                                               <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                                    <!--<div class="row fileupload-buttonbar">-->
                                                        <div class="col-lg-12">
                                                           <!-- The fileinput-button span is used to style the file input field as button -->
                                                           <!-- <span class="btn green fileinput-button">
                                                            <i class="fa fa-plus"></i>
                                                            <span>-->
<!--                                                            Add image... </span>
                                                            <input type="text" name="image"  value="{{$categories->image}}">
                                                            </span>-->
<!--                                                            <button type="submit" class="btn blue start">
                                                                
                                                            <i class="fa fa-upload"></i>
                                                            <span>
                                                            Browse</span>
                                                            </button>-->
                                                            
                                                           
                                                           
                                                            <!-- The global file processing state -->
                                                            <!--<span class="fileupload-process">
                                                            </span>-->
                                                            
                                                            
                                                            <div class="col-md-6">
                                                            <!-- The fileinput-button span is used to style the file input field as button -->

                                                            <span class="btn green fileinput-button"style="text-align: left;">
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
                                                            <!--<h4>Image</h4>-->
                                                            <!--Image... -->
                                                            <!--<span>-->
                                                            <!--<input type="text" name="image"  value="{{$categories->image}}">-->
                                                            <!--</span>-->
                                                            <img class="img-thumbnail" style="width:58%;height: 108px;margin-bottom: 2%;" src="{{ URL::to('uploads',$categories->image) }}" alt="">
                                                            
                                                        </div>
                                                            
                                                            
                                                        </div>
                                                       
                                                        
                                                   <!-- </div>-->
                                                    <!-- The table listing the files available for upload/download -->
                                                    
                                                     </div>
                                                </div>
                                                <div class="panel panel-success" style="margin-top: 100px;">
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
                    </div>
                    
                <!-- END PAGE CONTENT-->
        
@stop
@section('scripts')
<script>
        jQuery(document).ready(function() {    
           Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
          /* EcommerceProductsEdit.init();*/

          /*checkbox validation*/
           
          /**checkbox validation end**/

         /* $('.parent_id').on('click', function() {
                    $('.parent_id').removeAttr('checked');
                    $(this).attr('checked', true);
                    }
                });*/

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
