@extends('protected.admin.master')
@section('title', 'Admin Dashboard')
@section('content')
@if (session()->has('flash_message'))
        <div  id ="successMessage" class="alert alert-success"  style="width:400px;">
                <p style="color:white;">{{ session('flash_message') }}</p>
         </div>
    @endif


<style>
.form-group{ display: flex; }
</style>



<!--<div class=" page-bar page-title"  style="background-color:#082154;color:white;">-->
<!--        <h3 style="margin: 5px;">Add Category</h3>-->
<!--    </div>-->
    <div class="portlet box grey-cascade">
        <div class="portlet-title" style="background-color:#082154;color:white;">
            <div class="caption">
                <i class="fa fa-globe"></i>Add Category
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
                Add Category
            </li>
        </ul>
        <div class="page-toolbar">
           
            <a href="{{URL('admin/dashboard/Classifieds (B2b)')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;"><i class="fa fa-backward"></i> Back</a>
        </div>
    </div>


<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
   <div class="col-md-12">
      <!--  <form class="form-horizontal form-row-seperated" action="#"> -->
       @if ($message = Session::get('success'))
            <div  id ="successMessage" class="alert alert-success"  style="width:400px;">
               <p style="color:white;">{{ $message }}</p>
            </div>
      @endif
      @if ($message = Session::get('danger'))
            <div class="alert alert-danger">
               <p style="color:white;">{{ $message }}</p>
            </div>
      @endif
      @if (session()->has('flash_message'))
        <div class="alert alert-success">
                <p style="color:white;">{{ session('flash_message') }}</p>
         </div>
    @endif
      {!! Form::open(array('route'=>array('admin.category.store'),'id'=>'form1','class'=>'form-horizontal form-row-seperated','files'=>true)) !!}
      <div class="portlet light">
         <div class="portlet-title">
            <div class="caption">
               <i class="fa fa-cubes"></i>
               <span class="caption-subject font-green-sharp bold uppercase"> Add Category </span>
            </div>
            <div class="actions btn-set">
               {{-- <button class="btn btn-default btn-circle "><i class="fa fa-reply"></i> Reset</button> --}}
               <a href="{{ URL::to('admin/category-list') }}" class="btn btn-default btn-success btn-circle" style="color: #fffcfb;">Category List</a>
                       <button class="btn green-haze btn-circle" type="button" id="next_button" data-tab=""><i class="fa fa-check"></i> Next</button>
                 <button class="btn green-haze btn-circle" id="save_button" style="display:none;"><i class="fa fa-check"></i> Save</button>
                 <button class="btn green-haze btn-circle" id="save_button1" style="display:none;"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
               <!--<span onClick="return form_validate('form1');" class="btn green-haze btn-circle" id="save_button" style="display:none;"><i class="fa fa-check"></i> Save </span>-->
               <!--<button class="btn green-haze btn-circle" onClick="return form_validate('form1');" id="save_button1" style="display:none;"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>-->
               <!--<i data-target_navigation="#change_avatar" class="fa fa-arrow-circle-right fa-2x btn btn-primary btn-lg pull-right next_to_additional_info navigation_link" style="margin-top:1%"></i>-->
               <!-- <button class="btn green-haze btn-circle"><i class="fa fa-check-circle"></i> Save & Continue Edit</button> -->
               {{-- <div class="btn-group">
                  <a class="btn yellow btn-circle" href="javascript:;" data-toggle="dropdown">
                     <i class="fa fa-share"></i> More <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="dropdown-menu pull-right">
                     <li>
                        <a href="javascript:;">Duplicate </a>
                     </li>
                     <li>
                        <a href="javascript:;">Delete </a>
                     </li>
                     <li class="divider">
                     </li>
                     <li>
                        <a href="javascript:;">Print </a>
                     </li>
                  </ul>
               </div> --}}
            </div>
         </div>

         <div id="validation_error">
            @if (session()->has('flash_message'))
            <p class="alert alert-danger">{{ session()->get('flash_message') }}</p>
            @endif
         </div>

         <div class="portlet-body">
            <div class="tabbable">
               <ul class="nav nav-tabs" style="display: flex;">
                  <li class="active" id="check_tab1">
                     <a href="tab_general" data-toggle="tab">
                        General </a>
                  </li>
                  <li id="check_tab2">
                     <a href="#tab_meta" data-toggle="tab">
                        Meta </a>
                  </li>
                  <li id="check_tab3">
                     <a href="#tab_images" data-toggle="tab">
                        Images </a>
                  </li>

               </ul>
               <div class="tab-content no-space">
			   
			   
                  <div class="tab-pane active" id="tab_general">
                     <div class="form-body col-lg-12"  style="margin-top: 30px">
                        <div class="form-group">
                           <label class="col-md-2 control-label">Category Name: <span class="required">
                                 * </span>
                           </label>
                           <div class="col-md-8">
                              <input type="text" class="form-control" id="name" name="name" placeholder="">
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="col-md-2 control-label">Slug: <span class="required">
                                 * </span>
                           </label>
                           <div class="col-md-8">
                              <input type="text" class="form-control" id="slug" name="slug" placeholder="">
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="col-md-2 control-label">Tag: <span class="required">
                                 * </span>
                           </label>
                           <div class="col-md-8">
                              <input type="text" class="form-control" id="tag" name="tag" placeholder="">
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="col-md-2 control-label">Description: <span class="required">
                                 * </span>
                           </label>
                           <div class="col-md-8">
                              <textarea class="form-control" id="description" name="description"></textarea>
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="col-md-2 control-label">Parent Category: <span class="required">
                                 * </span>
                           </label>
                           <div class="col-md-8">
                              <div class="form-control height-auto parent_id_div">
                                 <div class="pre-scrollable" style="height:275px;" data-always-visible="1">
                                    <ul class="list-unstyled">
                                       <label><input type="checkbox" class="parent_id" name="categories[]" value="0">Parent</label>
                                       @foreach ($categories as $category)
                                       <li>
                                          <label><input type="checkbox" class="parent_id" name="categories[]" value="{{ $category->id }}">{{ $category->name }}</label>

                                          <ul class="list-unstyled">
                                             @foreach ($category->parent_cat as $category_children)
                                             <li>
                                                <label><input type="checkbox" class="parent_id" name="categories[]" value="{{ $category_children->id }}"> {{ $category_children->name }}</label>
                                             </li>
                                             @endforeach
                                          </ul>
                                       </li>
                                       @endforeach
                                    </ul>
                                 </div>
                              </div>
                              <span class="help-block">
                                 select only one category </span>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-2 control-label">SEO keyword: <span class="required">
                                 * </span>
                           </label>
                           <div class="col-md-8">
                              <textarea class="form-control" name="seo" id="seo"></textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-2 control-label">Top: <span class="required">
                                 * </span>
                           </label>
                           <div class="col-md-8">
                              <div class="input-group">
                                 <div class="icheck-inline">
                                    <label>
                                       <input type="radio" name="top" value="1" class="icheck" checked> YES </label>
                                    <label>
                                       <input type="radio" name="top" value="0" class="icheck"> No </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-2 control-label">Status: <span class="required">
                                 * </span>
                           </label>
                           <div class="col-md-8">

                              <div class="input-group">
                                 <div class="icheck-inline">
                                    <label>
                                       <input type="radio" name="status" value="1" class="icheck" checked> Published </label>
                                    <label>
                                       <input type="radio" name="status" value="0" class="icheck"> UnPublished </label>
                                 </div>
                              </div>

                           </div>
                        </div>

                     </div>
                  </div>


                  <div class="tab-pane" id="tab_meta">
                     <div class="form-body ">
                        <div class="col-lg-12 form-group" style="margin-top: 30px">
                           <label class="col-md-2 control-label">Meta Title:</label>
                           <div class="col-md-8">
                              <input type="text" class="form-control maxlength-handler" name="meta_title" id="meta_title" maxlength="100" placeholder="">
                              <span class="help-block">
                                 max 100 chars </span>
                           </div>
                        </div>
                        <div class="col-lg-12 form-group">
                           <label class="col-md-2 control-label">Meta Keywords:</label>
                           <div class="col-md-8">
                              <textarea class="form-control maxlength-handler" rows="4" id="meta_keywords" name="meta_keywords" maxlength="200"></textarea>
                              <span class="help-block">
                                 max 200 chars </span>
                           </div>
                        </div>
                        <div class="col-lg-12 form-group">
                           <label class="col-md-2 control-label">Meta Description:</label>
                           <div class="col-md-8">
                              <textarea class="form-control maxlength-handler" rows="8" id="meta_description" name="meta_description" maxlength="1000"></textarea>
                              <span class="help-block">
                                 max 1000 chars </span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane" id="tab_images">
                     <div class="panel panel-success"  >
                        <div class="panel-heading">
                           <h3 class="panel-title">Operations</h3>
                        </div>
                        <div class="panel-body col-lg-12">
                           <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                           <div class="row fileupload-buttonbar">
                              <div class="col-lg-12">
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
                           </div>
                           <!-- The table listing the files available for upload/download -->
                        </div>
                     </div>
                     <div class="panel panel-success"  style="margin-top: 100px;">
                        <div class="panel-heading">
                           <h3 class="panel-title">Notes</h3>
                        </div>
                        <div class="panel-body">
                           <ul>
                              <li>
                                 The maximum file size for uploads in this demo is <strong>5 MB</strong> (default file size is unlimited).
                              </li>
                              <li>
                                 Only image files (<strong>JPG, GIF, PNG, BMP</strong>) are allowed (by default there is no file type restriction).
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

      $('#check_tab2').hide();
      $('#check_tab3').hide();
   });

    $('#next_button').click(function() {
    var id = $("li.active").attr("id");       
//    alert(id);
        if(id == 'check_tab1'){
         $('#check_tab2').show();
         $('#check_tab1').hide();
         $('#check_tab3').hide();
//            var text = window.location.replace('<?php echo url('/'); ?>/admin/tradeshow-verify');
//            if(text){
           var error = 0;
      var msg = '';
      var name = $('#name').val();
      var desc = $('#description').val();
      var slug = $('#slug').val();
      var tag = $('#tag').val();
      var seo = $('#seo').val();
      
      var allVals = [];
             $('.parent_id_div :checked').each(function() {
                //alert(123);
               allVals.push($(this).val());
             });

//            alert(allVals);
      if (name === '') {
         error++;
         $('#name').css('border', '1px solid red');
         msg += error + ". Name Required <br/>";

      }
      if (desc === '') {
         error++;
         $('#description').css('border', '1px solid red');
         msg += error + ". Description Required <br/>";

      }
      if (slug === '') {
         error++;
         $('#slug').css('border', '1px solid red');
         msg += error + ". Slug Required <br/>";

      }
      if (tag === '') {
         error++;
         $('#tag').css('border', '1px solid red');
         msg += error + ". Tag Required <br/>";

      }
      if (seo === '') {
         error++;
         $('#seo').css('border', '1px solid red');
         msg += error + ". SEO Required <br/>";

      }
      
      if(allVals.length < 1){
                error++;
                $('.parent_id_div').css('border','1px solid red');
               msg += error+". Parent Category Must be 1 selected ! <br/>";
             }
      //location.reload();

      // if (allVals.length != 1) {
      //    error++;
      //    $('.parent_id_div').css('border', '1px solid red');
      //    msg += error + ". At least 1 Parent Category must be selected ! <br/>";
      //    // msg += error + ". Parent Category Must be 1 selected ! <br/>";
      // }

      if (error != 0) {

         $('#validation_error').addClass('alert alert-danger');
         $('#validation_error').html(msg);
            } else {
                $('#validation_error').removeClass('alert alert-danger');
                $('#validation_error').html('');
            $('#check_tab1').removeClass('active');
            $('#check_tab2').addClass('active');
            $("#tab_general").hide();
            $("#tab_meta").show();
        }
            
        }
        if(id == 'check_tab2'){
//             $('#validation_error').html('');
         $('#check_tab2').hide();
         $('#check_tab1').hide();
         $('#check_tab3').show();
            var error = 0;
      var msg = '';
            var mtitle = $('#meta_title').val();
            var mdesc = $('#meta_description').val();
            var mkey = $('#meta_keywords').val();
            
            if (mtitle === '') {
                error++;
                $('#meta_title').css('border', '1px solid red');
                msg += error + ". Meta Title Required <br/>";

             }
             if (mdesc === '') {
                error++;
                $('#meta_description').css('border', '1px solid red');
                msg += error + ". Meta Description Required <br/>";

             }
             if (mkey === '') {
                error++;
                $('#meta_keywords').css('border', '1px solid red');
                msg += error + ". Meta Keywords Required <br/>";

             }
             if (error != 0) {

         $('#validation_error').addClass('alert alert-danger');
         $('#validation_error').html(msg);
            } else {
                $('#validation_error').removeClass('alert alert-danger');
                $('#validation_error').html('');
            $('#check_tab2').removeClass('active');
            $('#check_tab3').addClass('active');
            $("#tab_meta").hide();
            $("#tab_images").show();
            $('#save_button').show();
            $('#save_button1').show();
            $('#next_button').hide();
        }
            
        }
        
        });


   function form_validate(form_id) {
      var error = 0;
      var msg = '';
      var name = $('#name').val();
      var desc = $('#description').val();
      var seo = $('#seo').val();
      var mtitle = $('#meta_title').val();
      var mdesc = $('#meta_description').val();
      var mkey = $('#meta_keywords').val();
      // alert(123);

      if (name === '') {
         error++;
         $('#name').css('border', '1px solid red');
         msg += error + ". Name Required <br/>";

      }
      if (desc === '') {
         error++;
         $('#description').css('border', '1px solid red');
         msg += error + ". Description Required <br/>";

      }
      if (seo === '') {
         error++;
         $('#seo').css('border', '1px solid red');
         msg += error + ". SEO Required <br/>";

      }
      if (mtitle === '') {
         error++;
         $('#meta_title').css('border', '1px solid red');
         msg += error + ". Meta Title Required <br/>";

      }
      if (mdesc === '') {
         error++;
         $('#meta_description').css('border', '1px solid red');
         msg += error + ". Meta Description Required <br/>";

      }
      if (mkey === '') {
         error++;
         $('#meta_keywords').css('border', '1px solid red');
         msg += error + ". Meta Keywords Required <br/>";

      }
      var allVals = [];
      $('.parent_id_div :checked').each(function() {
         allVals.push($(this).val());
      });
      //location.reload();

      // if (allVals.length != 1) {
      //    error++;
      //    $('.parent_id_div').css('border', '1px solid red');
      //    msg += error + ". At least 1 Parent Category must be selected ! <br/>";
      //    // msg += error + ". Parent Category Must be 1 selected ! <br/>";
      // }

      if (error != 0) {

         $('#validation_error').addClass('alert alert-danger');
         $('#validation_error').html(msg);
      } else {

         var formdata = $("#" + form_id).serialize();
         var action = $("#" + form_id).attr('action');
         $.ajax({
            url: action,
            type: "post",
            data: formdata,
            success: function(data) {
               var er = '';
               var obj = $.parseJSON(data);
               if (obj.type === 'success') {
                  $('#validation_error').removeClass('alert alert-danger');
                  $('#validation_error').addClass('alert alert-success');
                  er += obj.text;
                  location.reload();
               } else {
                  $('#validation_error').addClass('alert alert-danger');
                  $.each(obj.text, function(index, value) {
                     er += value + '<br/>';
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
