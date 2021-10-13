@extends('protected.admin.master')
@section('title', 'Admin Dashboard')
@section('content')
<hr class=".text-danger">
@if (session()->has('flash_message'))
        <p>{{ session()->get('flash_message') }}</p>
     @endif
<a href="{{URL('admin/dashboard/Content Management')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;"><i class="fa fa-backward"></i> Back</a>
<h3 class="page-title">
      Content Categories Lists <small></small>
    </h3>
    <div class="page-bar page-breadcrumb-bar" style="background-color:#082154;">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{URL::route('admin_dashboard')}}" style="color:white">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            
            <li style="color:white">
                <a href="{{URL('admin/dashboard/Content Management')}}" style="color:white">Content Management</a>
                 <i class="fa fa-angle-right"></i>
            </li>
            <li style="color:white">
               Content Categories
            </li>
        </ul>
<!--        <div class="page-toolbar">
            <div class="back"><a href="{{URL('admin/dashboard/Content Management')}}" ><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div>            
        </div>-->
    </div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
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
</script>

    <!-- END JAVASCRIPTS -->
@stop
