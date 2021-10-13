@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="col-xs-12">
        @if (session()->has('flash_message'))
            <p>{{ session()->get('flash_message') }}</p>
        @endif
    </div>

    <h3 class="page-title">
        Module Create <small>create & edit module</small>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">eCommerce</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Module Add</a>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right">
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
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(array('route'=>array('admin.module-add'),'id'=>'form1','class'=>'form-horizontal  form-row-seperated','files'=>true)) !!}
                <div class="col-sm-12" style="margin-top:2%;">
                    @if(count($errors)>0)
                     <div class="alerty alert-danger">
                      <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                      </ul>
                     </div>
                     @endif
                </div>

            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-basket font-green-sharp"></i>
										<span class="caption-subject font-green-sharp bold uppercase">
										Add Modules </span>
                        <span class="caption-helper">Man Tops</span>
                    </div>
                    <div class="actions btn-set">
                        <button type="button" name="back" class="btn btn-default btn-circle"><i class="fa fa-angle-left"></i> Back</button>
                        <button class="btn btn-default btn-circle "><i class="fa fa-reply"></i> Reset</button>
                        <button class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
                        <button class="btn green-haze btn-circle"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
                        <div class="btn-group">
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
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_general" data-toggle="tab">
                                    General </a>
                            </li>
                        </ul>
                        <div class="tab-content no-space">
                            <div class="tab-pane active" id="tab_general">
                                <div class="page-bar">
                                    <ul class="page-breadcrumb">
                                        <li>
                                            <b>Module Information:</b>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Module Name: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="module_name" placeholder="Module Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Parent ID: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                                <select class="form-control" name="parent_id" id="sel1">
                                                    <option value="0">Parent</option>
                                                    @foreach($modules as $m)
                                                        <option value={!! $m->id !!}>{!! $m->name !!}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Short Name: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="short_name" placeholder="Short Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Icon_1: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="icon_1" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Icon_2: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="icon_2" placeholder="">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-2 control-label">CSS_Class: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="css_class" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Slug: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="slug" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Sort: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="sort" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Status: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="status" placeholder="">
                                        </div>
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
            EcommerceProductsEdit.init();
        });

    </script>

    <!-- END JAVASCRIPTS -->
@stop
