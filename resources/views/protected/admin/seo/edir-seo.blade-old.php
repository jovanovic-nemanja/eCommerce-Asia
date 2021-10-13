@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="col-xs-12">
        @if (session()->has('flash_message'))
            <p>{{ session()->get('flash_message') }}</p>
        @endif
    </div>
   
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <form action="{{ URL::to('admin/manage-seo',null) }}" method="post">
            {!! csrf_field() !!}
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-basket font-green-sharp"></i>
										<span class="caption-subject font-green-sharp bold uppercase">
										Add SEO keyword </span>
                    </div>
                    <div class="actions btn-set">
                        <button type="button" name="back" class="btn btn-default btn-circle"><i class="fa fa-angle-left"></i> Back</button>
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
                                            <b>SEO-Keyword Information:</b>
                                        </li>
                                    </ul>
                                </div>
                                <!-- {!!Form::open(['route'=>'admin.add-seo-store'])!!} -->
                                <div class="form-body">
                                    <div class="form-group" style="margin-bottom:2%;">
                                        <label class="col-md-2 control-label" style="margin-top:1%;">Page ID: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10" style="margin-top:1%;">
                                            <input type="text" class="form-control" name="page_id" placeholder="Description Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" style="margin-top:1%;">Page Route: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10" style="margin-top:1%;">
                                            <input type="text" class="form-control" name="page_route" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" style="margin-top:1%;">Title: <span class="required">
                                                        * </span>
                                        </label>
                                        <div class="col-md-10" style="margin-top:1%;">
                                            <input type="text" class="form-control" name="title" placeholder="Description Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" style="margin-top:1%;">Meta Keyword: <span class="required">
                                                        * </span>
                                        </label>
                                        <div class="col-md-10" style="margin-top:1%;">
                                            <input type="text" class="form-control" name="meta_keyword" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" style="margin-top:1%;">Meta Description: <span class="required">
                                                        * </span>
                                        </label>
                                        <div class="col-md-10" style="margin-top:1%;">
                                            <input type="text" class="form-control" name="meta_description" placeholder="Description Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" style="margin-top:1%;">Meta Title: <span class="required">
                                                        * </span>
                                        </label>
                                        <div class="col-md-10" style="margin-top:1%;">
                                            <input type="text" class="form-control" name="meta_title" placeholder="">
                                        </div>
                                    </div>


                                </div>
                               <!--  {!!Form::close()!!} -->
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
