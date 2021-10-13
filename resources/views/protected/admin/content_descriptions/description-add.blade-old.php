@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')
<style>
/*    .fa-home,.fa-angle-right{
        color: "white"
    }*/
</style>
    <div class="col-xs-12">
        @if (session()->has('flash_message'))
            <p>{{ session()->get('flash_message') }}</p>
        @endif
    </div>

<?php // print_r($old); ?>
    <div class=" page-bar page-title"  style="background-color:#082154;color:white;">
        <h3 style="margin: 5px;"> Content Description</h3>
    </div>
    <div class="page-bar">
        
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
                Content Description
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
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <?php
//    echo 'sadasdasd';
//    echo '<br>';
//    print_r($_POST);
    if(isset($old)){
        print_r($old);
    }
    ?>
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(array('route'=>array('admin.description-add'),'id'=>'form1','method'=>'post','class'=>'form-horizontal  form-row-seperated','files'=>true)) !!}
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-basket font-green-sharp"></i>
										<span class="caption-subject font-green-sharp bold uppercase">
										Add Content Description </span>
                    </div>
                    <div class="actions btn-set">
                        
                        <button name="save" value="1" type="submit" class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
                        <button name="save" value="2" type="submit" class="btn green-haze btn-circle"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
                        <a href="{{url('/admin/description-manage')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;"><i class="fa fa-list"></i> View Content Description List</a>
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
                @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <ul>
                                            <li style="color:black;">{{ session()->get('success') }}</li>
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
                                            <b>Content Description Information:</b>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-body">
<!--                                    <div class="col-xs-12 ">
                                                                <fieldset class="form-group">
                                                                    <label for="First Name">Old Password
                                                                    </label> <span class="span">*</span>

                                                                   <input type="password" placeholder="Old Password" name="opwd"  class="form-control" id="opwd" value="" maxlength="20">
                                                        
                                                                </fieldset> 
                                                            </div>-->
                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label">Title: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input id="editor1" class="form-control" name="title_name" placeholder="Title Name" value="<?php if(isset($old['title'])){ echo 'sdfsdf'; } ?>"/> 
                                            &nbsp;&nbsp;&nbsp;
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <!--<div class="col-md-12">-->
                                        <label class="col-md-2 control-label">Description: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <textarea id="editor" class="form-control" name="desc_name" placeholder="Description Name"></textarea>  
                                            &nbsp;&nbsp;&nbsp;
                                            <!-- <input type="text" class="form-control" name="desc_name" placeholder="Description Name"> -->
                                        </div>
                                    </div>
                                    <!--</div>-->
                                
                                    <div class="col-md-12 form-group">
                                        
                                        <label class="col-md-2 control-label">Page Category: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="page_category_id" id="sel1">
                                                <option value="">Select any</option>

                                                @foreach($pages as $page)
                                                    <option  value="{{ $page->id }}">{{ $page->name  }}</option>
                                                @endforeach

                                            </select>
                                            &nbsp;&nbsp;&nbsp;
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label">Content Category: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="content_category_id" id="sel1">
                                                <option value="">Select any</option>

                                                @foreach($categories as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->name  }}</option>
                                                @endforeach

                                            </select>
                                            &nbsp;&nbsp;&nbsp;
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label">Meta Key: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="meta_key" placeholder="">
                                        </div>
                                        &nbsp;&nbsp;&nbsp;
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label">Meta Description:<span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="meta_description" placeholder="">
                                        </div>
                                        &nbsp;&nbsp;&nbsp;
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
<script src="{{asset('resources/assets/global/plugins/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
$(document).ready(function() {
    setTimeout(function(){ 
        $('alert-success').hide(); 
    }, 3000);
});
        jQuery(document).ready(function() {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            Demo.init(); // init demo features
            EcommerceProductsEdit.init();
        });

        /*editor*/
                CKEDITOR.replace('editor',
        {
            extraPlugins: 'uploadimage,image2,colordialog',
            height: 300,

            // Upload images to a CKFinder connector (note that the response type is set to JSON).
            uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

            // Configure your file manager integration. This example uses CKFinder 3 for PHP.
            filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

            // The following options are not necessary and are used here for presentation purposes only.
            // They configure the Styles drop-down list and widgets to use classes.

            stylesSet: [
                { name: 'Narrow image', type: 'widget', widget: 'image', attributes: { 'class': 'image-narrow' } },
                { name: 'Wide image', type: 'widget', widget: 'image', attributes: { 'class': 'image-wide' } }
            ],

            // Load the default contents.css file plus customizations for this sample.
            contentsCss: [ CKEDITOR.basePath + 'contents.css', 'assets/css/widgetstyles.css' ],

            // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
            // resizer (because image size is controlled by widget styles or the image takes maximum
            // 100% of the editor width).
            image2_alignClasses: [ 'image-align-left', 'image-align-center', 'image-align-right' ],
            image2_disableResizer: true



        });

        /*editor*/

    </script>

    <!-- END JAVASCRIPTS -->
@stop
