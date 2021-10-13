@extends('protected.admin.master')
<!--@section('page_css')
<link property='stylesheet' href="{!! asset('assets/fontend/css/select2.min.css') !!}" rel="stylesheet">
@endsection-->
@section('title', 'Admin Dashboard')
<style>
   form.navbar-form .form-group {
      padding-top: 30;
   }
   #supplier_list{
       max-height: 1000%;
    overflow-y: scroll;
   }
</style> 
@section('content')
<hr class=".text-danger">

   @if (session()->has('flash_message'))
         <div  id ="successMessage" class="alert alert-success"  style="width:400px;">
                <p style="color:white;">{{ session('flash_message') }}</p>
         </div>
    @endif
    
<div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box grey-cascade">
                            <div class="portlet-title" style="background-color:#082154;color:white;">
                                <div class="caption">
                                    <i class="fa fa-globe"></i>Manage TradeShow 
                                </div>
<!--                                <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                   
                                    <a href="javascript:;" class="remove">
                                    </a>
                                </div>-->
<a href="{{URL('admin/tradeshow-show')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;margin-top: 5px;"><i class="fa fa-backward"></i> Back</a>
                            </div>
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    <div class="col-xs-11 col-xs-offset-1">
                                        
      <input type="hidden" name="url" value="{{ URL::to('/') }}">
      
      
   </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover th-bg" id="sample_1">
         <thead>
            <tr>
               <th>Title</th>
               <th>Venue</th>
               <th>Country</th>
               <th>Created Date</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody class="trade_table_body">
            @foreach($result as $data)
            <tr>
               <td>{{ @$data->title }}</td>
               <td>{{ $data->venue }}</td>
               <td>{{ $data->country}}</td>
               <td>{{ date('d-M-Y',strtotime(@$data->created_at)) }}</td>
               <td  style="white-space: nowrap;">
                   <a href="{{ URL::to('admin/tradeshow-edit',$data->id) }}" class="btn btn-xs btn-info">Edit</a>
                  <a onclick="confirm('Are you sure, you want to delete the Trade details?')" href="{{ URL::to('admin/tradeshow-delete',$data->id) }}" class="btn btn-xs btn-danger trade_delete">Delete</a>
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
<!--<div class="row" style="padding:1%">
   <div class="col-xs-11 col-xs-offset-1">
      <input type="hidden" name="url" value="{{ URL::to('/') }}">
      <form class="navbar-form navbar-left trade_search_form" method="POST" action="{{ URL::to('admin/tradeshow/search',null) }}" role="search">
         {!! csrf_field() !!}
         <div class="form-group">
            {!! Form::text('title',null,['class'=>'form-control text-primary','placeholder'=>'Search By Title']) !!}
         </div>
         <div class="form-group">
            {!! Form::text('venue',null,['class'=>'form-control text-primary','placeholder'=>'Search By Venue']) !!}
         </div>
         <div class="form-group">
             <div class="dropdown">
               <button class="btn btn-default dropdown-toggle text-primary" type="button" data-toggle="dropdown" style="padding: 8px">--Search By Country--<span class="caret"></span></button>
               <ul class="dropdown-menu text-primary" id="supplier_list">
                  <input type="hidden" name="country_id" value="">

                  @foreach($country as $c)
                  <li><a data-country_id="{{ $c->id }}" class="country_str" href="#">{{ $c->name }}</a></li>
                  @endforeach
               </ul>
            </div> 
            
               <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle text-primary" type="button" id="dropdownMenu1" data-toggle="dropdown" style="padding: 8px"  aria-haspopup="true" aria-expanded="true">
                     Search By Country
                     <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu text-primary" aria-labelledby="dropdownMenu1" id="supplier_list">
                        <input type="hidden" name="country_id" value="">
                        @foreach($country as $c)
                           <li><a data-country_id="{{ $c->id }}" class="country_str" href="#">{{ $c->name }}</a></li>
                        @endforeach
                  </ul>
               </div>
            </div>
         {!! Form::token() !!}
         <div class="form-group">
            <input  type="submit" class="btn btn-success pull-right trade_search_btn" value="SEARCH" />
         </div>
         <div class="form-group">
               <button type="button" class="btn btn-success resetval">RESET</button>
         </div>
            <a style="display:none;margin-top: 32px;margin-right: 10px;" href="{{ URL::to('admin/tradeshow-show',null) }}" class="btn btn-success btn-default pull-left show_trade_list">Trade list</a>
      </form>
   </div>
</div>

<hr class=".text-danger">

@if (session()->has('flash_message'))
   <p>{{ session()->get('flash_message') }}</p>
@endif
 END PAGE HEADER
 BEGIN PAGE CONTENT
<div class="row">
   
</div>
</div>-->
<!-- END PAGE CONTENT-->
        
@stop
@section('scripts')
<!--<script type="text/javascript" src="{!! asset('assets/custom.js' )!!}"></script> 
<script type="text/javascript" src="{!! asset('assets/fontend/js/select2.min.js') !!}"></script>-->
<script>
   $('.resetval').click(function(){
      var base_url = '{{URL::to("/")}}';
      window.location.replace(base_url + '/admin/tradeshow-show');

   });
   jQuery(document).ready(function() {
      jQuery("#supplier_list").select2({
         placeholder: "Please select country ",
      });
      Metronic.init(); // init metronic core components
      Layout.init(); // init current layout
      Demo.init(); // init demo features
      /* EcommerceProductsEdit.init();*/
   });

   $(".dropdown-menu li a").click(function(){
      $(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
      $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
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
