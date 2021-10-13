@extends('protected.admin.master')
@section('title', 'Admin Dashboard')
@section('content')
<!-- <hr class=".text-danger"> -->
   @if (session()->has('flash_message'))
      <div  id ="successMessage" class="alert alert-success"  style="width:400px;">
            <p style="color:white;">{{ session('flash_message') }}</p>
      </div>
   @endif
    <div class="portlet box grey-cascade">
        <div class="portlet-title" style="background-color:#082154;color:white;">
            <div class="caption">
                <i class="fa fa-globe"></i>Categories Lists
            </div>
        </div>
    </div>
   <div class="page-bar page-breadcrumb-bar">
        
        <ul class="page-breadcrumb" >
            <li>
                <i class="fa fa-home" style="color:black;"></i>
                <a href="{{URL::route('admin_dashboard')}}" >Home</a>
                <i class="fa fa-angle-right" style="color:black;"></i>
            </li>
           
            <li>
                <a href="{{URL('admin/dashboard/Content Management')}}">Content Management</a>
                 <i class="fa fa-angle-right" style="color:black;"></i>
            </li>
            <li>
               Categories Lists
            </li>
        </ul>
        <div class="page-toolbar">
            <a href="{{URL('admin/dashboard/Content Management')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;"><i class="fa fa-backward"></i> Back</a>
         </div>
    </div>

<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
   <div class="col-md-12">
       
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box grey-cascade">
                            <!-- <div class="portlet-title" style="background-color:#082154;color:white;"> -->
                                <!-- <div class="caption">
                                    <i class="fa fa-globe"></i>Content Categories Lists
                                </div> -->
<!--                                <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                   
                                    <a href="javascript:;" class="remove">
                                    </a>
                                </div>-->
                                 <!-- <a href="{{URL('admin/dashboard/Content Management')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;margin-top: 5px;"><i class="fa fa-backward"></i> Back</a> -->
                            <!-- </div> -->
                            <div class="portlet-body">
                                <!-- <div class="table-toolbar">
                                    <span class="pull-right"><label class=" control-label"> Search </label><input type="text" class="light-table-filter" data-table="order-table" placeholder="" style=" padding: 5px;font-size: 13px;"></span>
                                </div> -->
                                <!--<h3>All Available Products list-->
          
      <!--</h3>-->
      <table id ="datavalue" class="order-table table table-striped table-bordered table-hover th-bg">
         <thead>
            <tr>
               <th class="text-left">Name</th>
               <th class="text-left">Sort Name</th>
               <th class="text-left">Created Date</th>
               <th class="text-left">Action</th>
            </tr>
         </thead>
         <tbody class="trade_table_body">
            @foreach($categories as $cat)
            <tr>
               <td>{{ $cat->name }}</td>
               <td>{{ $cat->sort_name }}</td>
               <td style="white-space: nowrap;">{{ date('d-M-Y',strtotime($cat->created_at)) }}</td>
               <td style="white-space: nowrap;">
                  <a href="{{ URL::to('admin/content-edit',$cat->id) }}" class="btn btn-xs btn-info">Edit</a>
                  <a onclick="return confirm('Are you sure, you want to delete the Category?')" href="{{ URL::to('admin/content-delete',$cat->id) }}" class="btn btn-xs btn-danger">Delete</a>

               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
   </div>
</div>
<!--<div class="row">
   <div class="col-md-12">
      <h3>All Module lists</h3>
      
      <table class="table">
         <thead>
            <tr class="test-center">
               <td class="text-left">Name</td>
               <td class="text-left">Sort Name</td>
               <td class="text-left">Created Date</td>
               <td class="text-left">Action</td>
            </tr>
         </thead>
         <tbody class="trade_table_body">
            @foreach($categories as $cat)
            <tr>
               <td>{{ $cat->name }}</td>
               <td>{{ $cat->sort_name }}</td>
               <td>{{ date('d-M-Y',strtotime($cat->created_at)) }}</td>
               <td>
                  <a href="{{ URL::to('admin/content-edit',$cat->id) }}" class="btn btn-xs btn-info">Edit</a>
                  <a onclick="return confirm('Are you sure, you want to delete the Category?')" href="{{ URL::to('admin/content-delete',$cat->id) }}" class="btn btn-xs btn-danger">Delete</a>

               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>-->

<!-- END PAGE CONTENT-->

@stop
@section('scripts')
<script>
   jQuery(document).ready(function() {
      Metronic.init(); // init metronic core components
      Layout.init(); // init current layout
      Demo.init(); // init demo features
      /* EcommerceProductsEdit.init();*/
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

      if (allVals.length != 1) {
         error++;
         $('.parent_id_div').css('border', '1px solid red');
         msg += error + ". Parent Category Must be 1 selected ! <br/>";
      }

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
