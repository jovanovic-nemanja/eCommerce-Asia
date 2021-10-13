@extends('protected.admin.master')
@section('title', 'List Users')
@section('content')
<style>
   form.navbar-form .form-group {
      margin-bottom: 30px;
   }
</style>
<!-- BEGIN PAGE CONTENT-->
<div class="row">
   <div class="col-md-12">
      <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet box grey-cascade">
         <div class="portlet-title" style="background-color:#082154;">
            <div class="caption">
               <i class="fa fa-globe"></i>Manage Users
            </div>
            <div class="tools">
               <a href="javascript:;" class="collapse">
               </a>
               <!-- <a href="javascript:;" class="remove">
               </a> -->
            </div>
         </div>
         <div class="portlet-body">
            <div class="table-toolbar">

               <div class="row">
                  <div class="col-md-6">
                     {{-- <div class="btn-group">
                        <button id="sample_editable_1_new" class="btn green">
                           Add New <i class="fa fa-plus"></i>
                        </button>
                     </div> --}}
                  </div>
                  <div class="col-md-6">
                     {{-- <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                           <li>
                              <a href="javascript:;"> Print </a>
                           </li>
                           <li>
                              <a href="javascript:;"> Save as PDF </a>
                           </li>
                           <li>
                              <a href="javascript:;"> Export to Excel </a>
                           </li>
                        </ul>
                     </div> --}}
                  </div>
               </div>

               <div>
                  {!! $users->render() !!}
               </div>

               <div>
                  <input type="hidden" name="url" value="{{ URL::to('/') }}">
                  <form class="navbar-form navbar-left trade_search_form form-inline" method="POST" action="{{ URL::to('admin/company/search',null) }}" role="search" style="padding:0;">
                     <div class="form-group">
                        <select name="country" class="form-control">
                           <option value="0">Select all</option>
                           @foreach($country as $data)
                              <option value="{{ $data->id }}">{{ $data->name}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <select name="type" class="form-control">
                           <option value="0">Select all</option>
                           <option value="3">Supplier</option>
                           <option value="4">Buyer</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <select name="business_type" class="form-control">
                           <option value="0">Select all</option>
                           @foreach($business_type as $data)
                              <option value="{{$data->id}}">{{$data->name}}</option>
                           @endforeach
                        </select>
                     </div>

                     <div class="form-group">
                        <select name="category_name" class="form-control">
                           <option value="0">Select all</option>
                           @foreach($category as $data)
                              <option value="{{$data->id}}">{{$data->name}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        {!! Form::text('company',$company_search,['class'=>'form-control text-primary','placeholder'=>'Search By company']) !!}
                     </div>
                     <div class="form-group">
                        {!! Form::text('email',$email_search,['class'=>'form-control text-primary','placeholder'=>'Search By Email']) !!}
                     </div>
                     {!! Form::token() !!}
                     <div class="form-group">
                        <input type="submit" class="btn btn-success trade_search_btn " value="SEARCH"/>
                     </div>
                     <div class="form-group">
                        <button type="button" class="btn btn-success resetval">RESET</button>
                     </div>
                    
                  </form>
                  
                  
               </div>
            </div>
            <table class="table table-striped table-bordered table-hover th-bg" id="sample_1">
               <thead>
                  <tr>
                     <th class="table-checkbox">
                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                     </th>
                     <th>User name</th>
                     <th>Seller Products</th>
                     <th>Email</th>
                     <th>User type</th>
                     <th>Company</th>
                     <th>Business type</th>
                     <!-- <th>category</th -->
                     <th>Join Date</th>
                     <th>Sort order</th>
                     <th>Status</th>
                     <th>Action</th>

                  </tr>
               </thead>
               <tbody>
                  @foreach ($users as $user)
                  <tr class="odd gradeX">
                     <td><input type="checkbox" class="checkboxes" value="1" /></td>
                     <td>
                        <a title="login as {{ $user->first_name }} {{ $user->last_name}}" href="{{URL::to('admin/make-me-login',$user->id)}}">{{ $user->first_name }} {{ $user->last_name}}</a>
                     </td><td>
                        <a href="{{ URL::to('admin/profiles/sellerproduct/'.$user->id) }}">List Seller Product</a> <br>
                     </td>
                     <td>
                        <a href="{{ URL::to('admin/profiles/'.$user->id) }}">{{ $user->email }}</a> <br>
                        @if ($user->inRole($admin))
                        <span class="label label-success">Admin</span>
                        @endif
                     </td>
                     <td class="center">
                        @if ($user->inRole($supplier))
                           Supplier
                        @else
                           Buyer
                        @endif
                     </td>
                     <td class="center">
                        @if($user->companies)
                        @if($user->companies->name_string && (trim($user->companies->name_string->name) != ''))
                        <a target="_blank" href="{{ URL::to('Home/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$user->companies->name_string->name),$user->companies->id) }}"> {{ $user->companies->name_string->name }}</a>
                        @else
                        <a target="_blank" href="{{ URL::to('Home/'.preg_replace('/[^A-Za-z0-9\-]/', '-','Not Available'),$user->companies->id) }}"> {{ 'Not Available'}}</a>
                        @endif
                        @else
                        Not Available
                        @endif
                     </td>
                     <td class="center">
                        @if ($user->suppliers)
                        @if($user->suppliers->business_types)
                           {{$user->suppliers->business_types->name}}
                        @endif
                        @endif
                     </td>
                     <td>{{ $user->created_at ?? '' }}</td>

                     <td class="sortproduct_td text-center">
                        <select name="sortproduct_option" data-id="{{ $user->id }}" class="sortproduct_option">
                           @if($total_u > 0)
                              @for($hi=0; $hi < $total_u; $hi++)
                                 <option value="'.$hi.'">{{$hi}}</option>
                              @endfor
                           @endif
                        </select>
                     </td>

                     <td>
                        @if($user->activated==1)
                        <a type="button" class="" href="{{ URL::to('admin/profiles/deactive/'. $user->id) }}">Deactive</a>
                        @else
                        <a type="button" class="" href="{{ URL::to('admin/profiles/active/'. $user->id) }}">Active</a>
                        @endif
                     </td>
                     <td>
                        <a onclick="return confirm('Are you sure want to delete the user?')" type="button" class="btn btn-danger btn-xs delete_product" href="{{ URL::to('admin/profiles/deletuser/'. $user->id) }}"><i class="fa fa-times"></i></a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>

            </table>
            {!! $users->render() !!}
         </div>
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
   </div>
</div>

@stop
@section('script')
<script>
   $('.resetval').click(function(){
      var base_url = '{{URL::to("/")}}';
      window.location.replace(base_url + '/admin/profiles');

   });
   jQuery(document).ready(function() {
      $(document).on({
         change: function() {
            var _this = $(this);
            var s_value = _this.val();
            var update_id = _this.attr('data-id');
            $('.mkn_loader').css('display', 'block');
            $.post(base_url + '/admin/edit-company-sort/sort_check/' + s_value + '/' + update_id, {
               _token: '{{ csrf_token() }}',
               section: 'sort_check',
               s_value: s_value,
               update_id: update_id,
            }, function(result) {
               if (parseInt(result) == 1) {
                  $('.mkn_loader').css('display', 'none');
               } else {
                  alert('Unkonwn Error Occured.');
                  $('.mkn_loader').css('display', 'none');
               }
            });
         }
      }, '.sortproduct_option');

      $('[name="country"]').val('{{$country_search?$country_search:0}}');
      $('[name="type"]').val('{{$type?$type:0}}');
      $('[name="business_type"]').val('{{$business_type_id?$business_type_id:0}}');
      $('[name="category_name"]').val('{{$category_name?$category_name:0}}');
      $(document).on({
         click: function(e) {
            e.preventDefault();
            var base_url = '{{URL::to("/")}}';
            var country = $('[name="country"]').val();
            var type = $('[name="type"]').val();
            var business_type = $('[name="business_type"]').val();
            var category_name = $('[name="category_name"]').val();
            var company = $('[name="company"]').val();
            var email = $('[name="email"]').val();
            window.location.href = base_url + '/admin/profiles?c=' + country + '&t=' + type + '&bt=' + business_type + '&cn=' + category_name + '&co=' + company + '&e=' + email;
         }
      }, '.trade_search_btn');
   });
</script>
@stop