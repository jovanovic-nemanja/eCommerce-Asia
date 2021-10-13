@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="col-xs-12">
        @if (session()->has('flash_message'))
            <p>{{ session()->get('flash_message') }}</p>
        @endif
    </div>
<a href="{{URL('admin/dashboard/Content Management')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;"><i class="fa fa-backward"></i> Back</a>
    <h3 class="page-title">
        Add Page <small></small>
    </h3>
    <div class="page-bar page-breadcrumb-bar" style="background-color:#082154;">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{URL::route('admin_dashboard')}}" style="color:white">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
           
           <li>
                <a href="{{URL('admin/dashboard/Content Management')}}" style="color:white">Content Management</a>
                 <i class="fa fa-angle-right"></i>
            </li>
            <li style="color:white">
               Add Page
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
            {!! Form::open(array('route'=>array('page_content.store'),'id'=>'form1','class'=>'form-horizontal  form-row-seperated','files'=>true)) !!}
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-basket font-green-sharp"></i>
										<span class="caption-subject font-green-sharp bold uppercase">
										Add Page </span>
                    </div>
                    <div class="actions btn-set">
                       
                        <button class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
                        <button class="btn green-haze btn-circle"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
                        <a href="{{URL('page_content')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;"><i class="fa fa-list"></i> View Page Content List</a>
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
<!--                        <ul class="nav nav-tabs">
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
                                            <b>Page Information:</b>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-body">
                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label">Page Name: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="name" placeholder="Page Name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label">Sort Name: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="sort_name" placeholder="Sort Name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label">Prefix: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="prefix" placeholder="Prefix" required>
                                        </div>
                                    </div>


                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label">Slug: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="slug" placeholder="Slug" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group attribute_area">
                                        <label class="col-md-2 control-label">Tabs: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="tabs[]" placeholder="Tabs" required>
                                        </div>
                                        {{-- <button class="btn green-haze btn-circle add_more_attribute_btn"><i class="fa fa-plus"></i> Add More</button> --}}
                                    </div>
                                    <div class="copied_template">

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
            // EcommerceProductsEdit.init();
        });

        (function(){
            $(document).on({click:function(e){

                var prev_val;
                e.preventDefault();
                prev_val = $(this).parent().find('[name="tabs[]"]').val();
                data_temp = '<div class="form-group attribute_area">\
                  <input type="hidden" name="tab_value" value="0">\
                  <label class="col-md-2 control-label">Tabs: <span class="required">\
									* </span>\
                  </label>\
                   <div class="col-md-6">\
                   <input type="text" class="form-control" name="tabs[]" placeholder="Tabs" required>\
                   </div>\
                   <button class="btn green-haze btn-circle add_more_attribute_btn"><i class="fa fa-plus"></i> Add More</button><a class="remove_attributes"><i class="fa fa-minus btn btn-danger btn-sm"></i></a>\
                   </div>';
                (prev_val.length>0)?$('.copied_template').append(data_temp) : false;

            }},'.add_more_attribute_btn');

            $(document).on({click:function(e){

                e.preventDefault();
                $(this).closest('.attribute_area').remove();

            }},'.remove_attributes')

        })()

    </script>

    <!-- END JAVASCRIPTS -->
@stop
