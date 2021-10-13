@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')
<div class="col-xs-12">
   @if (session()->has('flash_message'))
   <p>{{ session()->get('flash_message') }}</p>
   @endif
</div>
<!--<a href="{{URL('admin/dashboard/Content Management')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;"><i class="fa fa-backward"></i> Back</a>-->  
<div class="portlet box grey-cascade">
    <div class="portlet-title" style="background-color:#082154;color:white;">
        <div class="caption">
            <i class="fa fa-globe"></i>Add Content Categories
        </div>
    </div>
</div>
@if (session()->has('flash_message'))
   <div class="alert alert-success">
         <p style="color:white;">{{ session()->get('flash_message') }}</p>
   </div>
@endif
<div class="page-bar page-breadcrumb-bar">
   <ul class="page-breadcrumb">
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
               Create Content Categories
            </li>
   </ul>
   <div class="page-toolbar">
      <a href="{{URL('admin/content-manage')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;"><i class="fa fa-backward"></i> Back</a>
   </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
   <div class="col-md-12">
      {!! Form::open(array('route'=>array('admin.content-add'),'id'=>'form1','class'=>'form-horizontal form-row-seperated','files'=>true)) !!}
      <div class="portlet light">
         <div class="portlet-title">
            <div class="caption">
               <i class="icon-basket font-green-sharp"></i>
               <span class="caption-subject font-green-sharp bold uppercase">
                  Add Content Categories </span>
            </div>
            <div class="actions btn-set">
               <button name="save" value="1" class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
               <button name="save" value="2" class="btn green-haze btn-circle"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
               <a href="{{url('/admin/content-manage')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;"><i class="fa fa-list"></i> View Content Categories List</a>
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
         @if (count($errors) > 0)
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
         <div class="portlet-body">
            <div class="tabbable">
<!--               <ul class="nav nav-tabs">
                  <li class="active">
                     <a href="#tab_general" data-toggle="tab">
                        General </a>
                  </li>
               </ul>-->
               <div class="tab-content no-space">
                  <div class="tab-pane active" id="tab_general">
                     <div class="page-bar">
                        <ul class="page-breadcrumb">
                           <li>
                              <b>Content Information:</b>
                           </li>
                        </ul>
                     </div>
                     <div class="form-body">
                        <div class="form-group">
                        <fieldset class="form-group">
                           <label class="col-md-2 control-label">Content Name: <span class="required">
                              * </span>
                           </label>
                           <div class="col-md-8">
                              <input type="text" class="form-control" name="name" placeholder="Module Name" value="{{old('name')}}">
                           </div>
</fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset class="form-group">
                           <label class="col-md-2 control-label">Parent ID: <span class="required">
                              * </span>
                           </label>
                           <div class="col-md-8">
                              <select class="form-control parent_id" name="parent_id" id="sel1">
                                 <option value="0">Parent</option>
                                 @foreach($categories as $cat)
                                 @if($cat->id == $cat->parent_id)
                                 <option value="{{ $cat->id }}" {{(Input::old("parent_id") == $cat->id ? "selected":"") }} >{{ $cat->name  }}</option>
                                 @endif
                                 <option value="{{ $cat->id }}">{{ $cat->name  }}</option>
                                 @endforeach
                              </select>
                           </div>
                            </fieldset>
                        </div>

                        <div class="form-group">
                            <fieldset class="form-group">
                           <label class="col-md-2 control-label">Sort Name: <span class="required">
                              * </span>
                           </label>
                           <div class="col-md-8">
                              <input type="text" class="form-control" name="sort_name" placeholder="" value="{{old('sort_name')}}">
                           </div>
                            </fieldset>
                        </div>

                        <div class="form-group" id="show_page_caetgory" style="display: none;">
                            <fieldset class="form-group">
                           <label class="col-md-2 control-label">Page Category: <span class="required">
                              * </span>
                           </label>
                           <div class="col-md-8">
                              <select class="form-control" name="page_id" id="sell">
                                 <option value="0">Select Any</option>
                                 @foreach($pages as $page)
                                 <option value="{{ $page->id }}" {{(Input::old("page_id") == $page->id ? "selected":"") }}>{{ $page->name  }}</option>
                                 @endforeach
                              </select>
                           </div>
                            </fieldset>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </form>
   </div>
</div>
</div>

<!-- END PAGE CONTENT-->

@stop
@section('scripts')
<script type="text/javascript">
   jQuery(document).ready(function() {
      Metronic.init(); // init metronic core components
      Layout.init(); // init current layout
      Demo.init(); // init demo features
      //EcommerceProductsEdit.init();
   });

   var elem = document.getElementById('sel1');
   elem.onchange = function() {
      var hiddenDiv = document.getElementById("show_page_caetgory");
      hiddenDiv.style.display = (this.value == '0') ? "none" : "block";
   };

   (function() {

      $(document).on({
         click: function(e) {
            var target_area, data_template, prev_name, prev_value;
            e.preventDefault();
            prev_name = $(this).parent().find('[name="product_att_name[]"]').val();
            prev_value = $(this).parent().find('[name="product_att_value[]"]').val();

            data_template = '<div class="form-group attribute_area"><label class="col-md-2 control-label">Attributes: <span class="required">\
                  * </span>\
               </label>\
               <label class="col-md-1 control-label">Name:</label>\
               <div class="col-md-2">\
                  <input type="text" placeholder="" name="product_att_name[]" value="" class="form-control">\
               </div>\
               <label class="col-md-1 control-label">Value:</label>\
               <div class="col-md-2">\
                  <input type="text" placeholder="" name="product_att_value[]" value="" class="form-control">\
               </div>\
                  <button class="btn green-haze btn-circle  add_more_attribute_btn"><i class="fa fa-plus"></i> Add More</button><a class="remove_attributes"><i class="fa fa-minus btn btn-danger btn-sm"></i></a></div>';

            (prev_name.length > 0 && prev_value.length > 0) ? $('.copied_template').append(data_template): false;
         }
      }, '.add_more_attribute_btn');

      $(document).on({
         click: function(e) {
            e.preventDefault();
            $(this).closest('.attribute_area').remove();
         }
      }, '.remove_attributes')
   })()
</script>

    <!-- END JAVASCRIPTS -->
@stop
