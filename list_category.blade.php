@extends('protected.admin.master')
@section('title', 'List Users')
@section('content')
<!-- BEGIN PAGE CONTENT-->
<!-- <div class="mkn_loader" style="position: fixed;left:0px;top: 0px;width: 100%;height:100%;z-index: 99999999;background: url(/uploads/page-loader.gif) 50% 50% no-repeat rgb(249,249,249);background-size: 45px;"></div> -->
@php $category_sort = count($categories); @endphp
<div class="row">
   <div class="col-md-12">
      <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet box grey-cascade">
         <div class="portlet-title">
            <div class="caption">
               <i class="fa fa-globe"></i>Managed Table
            </div>
            <div class="tools">
               <a href="javascript:;" class="collapse">
               </a>

               <a href="javascript:;" class="remove">
               </a>
            </div>
         </div>
         <div class="portlet-body">
            <div class="table-toolbar">
               <div class="row">
                  <div class="col-md-8">
                     <div class="btn-group">
                        <a id="sample_editable_1_new" href="{{ URL::to('admin/Category-add',null)}}" class="btn green">
                           Add New <i class="fa fa-plus"></i>
                        </a>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <input type="text" class="light-table-filter" data-table="order-table" placeholder="search..." style=" padding: 2px 5px;font-size: 13px;">
                     {{-- <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;">
                                Print </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                Save as PDF </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                Export to Excel </a>
                            </li>
                        </ul>
                     </div> --}}
                  </div>
               </div>
            </div>
            <table class="table table-striped table-bordered table-hover order-table" id="sample_1">
               <thead>
                  <tr>
                     <th> name </th>
                     <th> slug </th>
                     <th> H1 Tag </th>
                     <th> Status </th>
                     <th> Sort </th>
                     <th> Action </th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($categories as $data)
                  <tr class="odd gradeX">
                     <td>
                        {{ $data->category_name->name ?? '' }}
                     </td>
                     <td>
                        {{ $data->slug ?? '' }}
                     </td>
                     <td>
                        {{ $data->category_name->h1 ?? '' }}
                     </td>
                     <td>
                        <span class="label label-sm label-success"> Approved </span>
                     </td>
                     <td class="sortproduct_td text-center">
                        <select name="sortcategory_option" data-id="{{ $data->id }}" class="sortcategory_option">
                           @if($category_sort > 0)
                              @for ($i=0; $i < $category_sort; $i++)
                                 @if ($i == trim($data->sort_order))
                                      echo <option value="{{$i}}" selected>{{$i}}</option>
                                 @else
                                      echo <option value="{{$i}}">{{$i}}</option>
                                 @endif
                              @endfor
                           @endif
                        </select>
                     </td>
                     <td>
                        <a href="{{ URL::to('admin/category-edit',$data->id) }}" class="btn btn-xs btn-info">Edit</a>
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
@stop
@section('script')
<script>
   jQuery(document).ready(function() {
      Metronic.init(); // init metronic core components
      Layout.init(); // init current layout
      Demo.init(); // init demo features
      TableManaged.init();
   });

   $(document).on({
      change: function() {
         var _this = $(this);
         var base_url = "{{URL::to('/')}}";
         var s_value = _this.val();
         var update_id = _this.attr('data-id');

         $.post(base_url + '/edit-category/category_sort/' + s_value + '/' + update_id, {
            _token: '{{ csrf_token() }}',
            section: 'category_sort',
            s_value: s_value,
            update_id: update_id,
         }, function(result) {
            if (parseInt(result) == 1) {
               var redirected_url = window.location.href;
               window.location.href = redirected_url;
            } else {
               alert('Unkonwn Error Occured.');
            }
         });
      }
   }, '.sortcategory_option');
   // ------------ search filtering --------------- //

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
</script>
@stop