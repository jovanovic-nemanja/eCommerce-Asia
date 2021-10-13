@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="col-xs-12">
        @if (session()->has('flash_message'))
            <p>{{ session()->get('flash_message') }}</p>
        @endif
    </div>
    <div class="portlet box grey-cascade">
        <div class="portlet-title" style="background-color:#082154;color:white;">
            <div class="caption">
                <i class="fa fa-globe"></i>Edit Page 
            </div>
        </div>
    </div>
    @if (session()->has('flash_message'))
        <div class="alert alert-success">
            <p style="color:white;">{{ session()->get('flash_message') }}</p>
        </div>
    @endif
<!--    <h3 class="page-title">
        Edit Page <small></small>
    </h3>-->
    <div class="page-bar" >
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home" style="color:black"></i>
                <a href="{{URL::route('admin_dashboard')}}" >Home</a>
                <i class="fa fa-angle-right" style="color:black"></i>
            </li>
           
           <li>
                <a href="{{URL('admin/dashboard/Content Management')}}" >Content Management</a>
                 <i class="fa fa-angle-right" style="color:black"></i>
            </li>
            <li>
               Edit Page
            </li>
        </ul>
        <div class="page-toolbar">
            {{-- <div class="btn-group pull-right">
                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Actions <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">Action</a>
                    </li>
                    <li>
                        <a href="#">Another action</a>
                    </li>
                    <li>
                        <a href="#">Something else here</a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="#">Separated link</a>
                    </li>
                </ul>
            </div> --}}
            <a href="{{URL('page_content')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;"><i class="fa fa-backward"></i> Back</a>
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">

            {!! Form::open(array('route' => array('page_content.update', $page->id), 'method' => 'PUT','id'=>'form1','class'=>'form-horizontal  form-row-seperated','files'=>true)) !!}
            <div class="portlet light">
                <div class="portlet-title">
<!--                    <div class="caption">
                        <i class="icon-basket font-green-sharp"></i>
										<span class="caption-subject font-green-sharp bold uppercase">
										Edit Page </span>
                    </div>-->
                    <div class="actions btn-set">
                        <button name="save" value="1" class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
                        <button name="save" value="2" class="btn green-haze btn-circle"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
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
                        </div>
                    </div> --}}
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
                                            <input type="text" class="form-control" name="name" value="{{ $page->name }}" placeholder="Page Name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label">Sort Name: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="sort_name" value="{{ $page->sort_name }}" placeholder="Sort Name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label">Prefix: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="prefix" value="{{ $page->prefix }}" placeholder="Prefix" required>
                                        </div>
                                    </div>


                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label">Slug: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="slug" value="{{ $page->slug }}" placeholder="Slug" required>
                                        </div>
                                    </div>

                                    @foreach($page_tabs as $attr)
                                        <div class="col-md-12 form-group attribute_area">
                                            <input name="tab_value[]" type="hidden" value="{{ $attr->id }}">
                                            <label class="col-md-2 control-label">Tabs: <span class="required">
														* </span>
                                            </label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="tabs[]" value="{{ $attr->tab_name or ''  }}" placeholder="">
                                            </div>

                                            <button class="btn green-haze btn-circle add_more_attribute_btn_for_edit"><i class="fa fa-plus"></i> Add More</button>

                                        </div>
                                    @endforeach
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
//            Metronic.init(); // init metronic core components
//            Layout.init(); // init current layout
//            Demo.init(); // init demo features
//            EcommerceProductsEdit.init();
        });

        (function(){
            $(document).on({click:function(e){

                var prev_val;
                e.preventDefault();
                prev_val = $(this).parent().find('[name="tabs[]"]').val();
                data_temp = '<div class="form-group attribute_area">\
                <label class="col-md-2 control-label">Tabs: <span class="required">\
                                            * </span>\
                </label>\
                <div class="col-md-6">\
                    <input type="hidden" value="0" name="tab_value[]">\
                    <input type="text" class="form-control" name="tabs[]" placeholder="Tabs" required>\
                </div>\
                <button class="btn green-haze btn-circle  add_more_attribute_btn_for_edit"><i class="fa fa-plus"></i> Add More</button><a class="remove_attributes">\
                        <i class="fa fa-minus btn btn-danger btn-sm"></i></a></div>';
                (prev_val.length>0)?$('.copied_template').append(data_temp) : false;

                    }},'.add_more_attribute_btn_for_edit');

                    $(document).on({click:function(e){

                        e.preventDefault();
                        $(this).closest('.attribute_area').remove();

                    }},'.remove_attributes')

        })()


    </script>


    <!-- END JAVASCRIPTS -->
@stop
