@extends('protected.admin.master')
@section('title', 'Admin Dashboard')
@section('content')
<hr class=".text-danger">
@if (session()->has('flash_message'))
   <p>{{ session()->get('flash_message') }}</p>
@endif
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<style>
   form.navbar-form .form-group {
      margin-bottom: 30px;
   }
</style>

<div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box grey-cascade">
                            <div class="portlet-title" style="background-color:#082154;color:white;">
                                <div class="caption">
                                    <i class="fa fa-globe"></i>Products list
                                </div>
<!--                                <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                   
                                    <a href="javascript:;" class="remove">
                                    </a>
                                </div>-->
                            </div>
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    <div class="col-xs-11 col-xs-offset-1" style="width: 110%;margin-left: 40px;">
                                 <input type="hidden" name="url" value="{{ URL::to('/') }}">
      <form class="navbar-form navbar-left trade_search_form form-inline" method="get" action="{{ URL::to('admin/product-search') }}" role="search" style="padding:0;">
         <div class="col-md-2 form-group">
             <label class=" control-label">Product Name: </label><br>
            <input type="text" name="product_name" style="height:34px;" placeholder="">
         </div>
         <div class="col-md-2 form-group">
             <label class=" control-label">Product Id: </label><br>
            <input type="text" name="product_id" style="height: 34px;" placeholder="">
         </div>
         <div class="col-md-2 form-group">
            @if(@$category_list)
            <label class=" control-label"></label><br>
            <select name="product_category" style="height:34px;width:110%;margin-top: 10px;" placeholder=" Product category">
               <option value="0">Select Product category</option>
               @foreach($category_list as $c)
               @if($c->sub_cat)
               @foreach($c->sub_cat as $sub)
               <option value="{{$sub->name}}">{{$sub->name ?? ''}}</option>
               @endforeach
               @endif
               @endforeach
            </select>
            @endif
            <br><br>
            <!-- <input type="text" name="product_category" style="height: 34px;" placeholder=" Product category"> -->
         </div>

         <div class="col-md-2 form-group">
            @if($country_list)
            <label class=" control-label"></label><br>
            <select name="product_country" style="height:34px;width:110%;margin-top: 10px;" placeholder=" Product country">
               <option value="0">Select Product country</option>
               @foreach($country_list as $co)
               <option value="{{$co->name}}">{{$co->name}}</option>
               @endforeach
            </select>
            @endif
            <!-- <input type="text" placeholder=" Product country"> -->
         </div>
          <div class="col-md-1 form-group" style="margin-top: 30px;">
            <input type="submit" class="btn btn-success trade_search_btn"  value="SEARCH" />
         </div>
         <div class="col-md-1 form-group" style="margin-top: 30px;">
            <button type="button" class="btn btn-success resetval">RESET</button>
         </div>
      </form>
      
   </div>
                                </div>
                                <!--<h3>All Available Products list-->
          <span class="pull-right"><label class=" control-label"> Search </label><input type="text" class="light-table-filter" data-table="order-table" placeholder="" style=" padding: 5px;font-size: 13px;"></span>
      <!--</h3>-->
      <table id ="datavalue" class="order-table table table-striped table-bordered table-hover">
         <thead>
            <tr>
               <th>Product Name</th>
               <th>Model</th>
               <th>Brand Name</th>
               <th>Category Name</th>
               <th colspan="2">Action</th>
            </tr>
         </thead>
         <tbody class="trade_table_body">
            @foreach($products as $product)
            <tr>
               <td>{{ $product->product_name['name'] }}</td>
               <td>{{ $product['model'] }}</td>
               <td>{{ $product['brandname'] }}</td>
               <td>{{ $product->category->bdtdcCategory->name ?? ''  }}</td>
               <td colspan="2">
                  <a href="{{ URL::to('admin/edit-product',$product->id) }}" class="btn btn-xs btn-info"  style="margin-bottom: 5px;">Edit</a>
                  <!-- <a href="{{ URL::to('supplier/product_edit',$product->id) }}" class="btn btn-xs btn-info">Edit</a> -->
                  <a class="btn btn-xs btn-danger delete_product" data-product_id="{{$product->id}}">Delete</a>
               </td>
            </tr>
            @endforeach
            @if(count($products) > 0) 
               {!!$products->render()!!}
            @endif
         </tbody>
      </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>


@if(count($products) > 0) 
   {!!$products->render()!!}
@endif




<!--<div class="row">
   <div>
      <input type="hidden" name="url" value="{{ URL::to('/') }}">
      <form class="navbar-form navbar-left trade_search_form form-inline" method="get" action="{{ URL::to('admin/product-search') }}" role="search" style="padding:0;">
         <div class="col-md-2 form-group">
             <label class=" control-label">Product Name: </label><br>
            <input type="text" name="product_name" style="height:34px;" placeholder="">
         </div>
         <div class="col-md-2 form-group">
             <label class=" control-label">Product Id: </label><br>
            <input type="text" name="product_id" style="height: 34px;" placeholder="">
         </div>
         <div class="col-md-2 form-group">
            @if(@$category_list)
            <label class=" control-label"></label><br>
            <select name="product_category" style="height:34px;width:110%;margin-top: 10px;" placeholder=" Product category">
               <option value="0">Select Product category</option>
               @foreach($category_list as $c)
               @if($c->sub_cat)
               @foreach($c->sub_cat as $sub)
               <option value="{{$sub->name}}">{{$sub->name ?? ''}}</option>
               @endforeach
               @endif
               @endforeach
            </select>
            @endif
            <br><br>
             <input type="text" name="product_category" style="height: 34px;" placeholder=" Product category"> 
         </div>

         <div class="col-md-2 form-group">
            @if($country_list)
            <label class=" control-label"></label><br>
            <select name="product_country" style="height:34px;width:110%;margin-top: 10px;" placeholder=" Product country">
               <option value="0">Select Product country</option>
               @foreach($country_list as $co)
               <option value="{{$co->name}}">{{$co->name}}</option>
               @endforeach
            </select>
            @endif
             <input type="text" placeholder=" Product country"> 
         </div>
          <div class="col-md-1 form-group" style="margin-top: 30px;">
            <input type="submit" class="btn btn-success trade_search_btn"  value="SEARCH" />
         </div>
         <div class="col-md-1 form-group" style="margin-top: 30px;">
            <button type="button" class="btn btn-success resetval">RESET</button>
         </div>
      </form>
   </div>
   <div class="col-md-12">
      <h3>All Available Products list
          <span class="pull-right"><label class=" control-label"> Search </label><input type="text" class="light-table-filter" data-table="order-table" placeholder="" style=" padding: 5px;font-size: 13px;"></span>
      </h3>
      <table id ="datavalue" class="order-table table">
         <thead>
            <tr class="test-center">
               <td>Product Name</td>
               <td>Model</td>
               <td>Brand Name</td>
               <td>Category Name</td>
               <td colspan="2">Action</td>
            </tr>
         </thead>
         <tbody class="trade_table_body">
            @foreach($products as $product)
            <tr>
               <td>{{ $product->product_name['name'] }}</td>
               <td>{{ $product['model'] }}</td>
               <td>{{ $product['brandname'] }}</td>
               <td>{{ $product->category->bdtdcCategory->name ?? ''  }}</td>
               <td colspan="2">
                  <a href="{{ URL::to('admin/edit-product',$product->id) }}" class="btn btn-xs btn-info"  style="margin-bottom: 5px;">Edit</a>
                   <a href="{{ URL::to('supplier/product_edit',$product->id) }}" class="btn btn-xs btn-info">Edit</a> 
                  <a class="btn btn-xs btn-danger delete_product" data-product_id="{{$product->id}}">Delete</a>
               </td>
            </tr>
            @endforeach
            @if(count($products) > 0) 
               {!!$products->render()!!}
            @endif
         </tbody>
      </table>

   </div>
</div>
@if(count($products) > 0) 
   {!!$products->render()!!}
@endif
</div>-->

<!-- END PAGE CONTENT-->

@stop
@section('scripts')
<script>
   $('.resetval').click(function(){
      var base_url = '{{URL::to("/")}}';
      window.location.replace(base_url + '/admin/product');

   });
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
   // ------------- search filtering ----------- //

   (function(document) {
      'use strict';

      var LightTableFilter = (function(Arr) {

         var _input;

         function _onInputEvent(e) {
            _input = e.target;
            var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
            Arr.forEach.call(tables, function(table) {
               Arr.forEach.call(table.tBodies, function(tbody) {
                  Arr.forEach.call(tbody.rows, _filter);
               });
            });
         }

         function _filter(row) {
            var text = row.textContent.toLowerCase(),
               val = _input.value.toLowerCase();
            row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
         }

         return {
            init: function() {
               var inputs = document.getElementsByClassName('light-table-filter');
               Arr.forEach.call(inputs, function(input) {
                  input.oninput = _onInputEvent;
               });
            }
         };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
         if (document.readyState === 'complete') {
            LightTableFilter.init();
         }
      });

   })(document);


   $(document).on({
      click: function(e) {
         e.preventDefault();
         if (confirm('Are you sure, you want to delete the Product details?')) {
            var _this = $(this);
            var product_id = $(this).data('product_id');
            $.post('<?php echo url('/'); ?>/x_product/' + product_id, {
               '_token': '{{csrf_token()}}'
            }, function(r) {
               if (r == 'deleted') {
                  _this.parent().parent().remove();
                  var relode_url = window.location.href;
                  window.location.href = relode_url;
               } else if (parseInt(r) == 'login') {
                  alert('Please Login First.');
               } else {
                  alert('Query failed. Please Login first.');
               }
            });
         }
      }
   }, '.delete_product');        
</script>
   <!-- END JAVASCRIPTS -->
@stop
