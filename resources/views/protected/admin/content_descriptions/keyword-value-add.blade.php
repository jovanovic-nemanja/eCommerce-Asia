@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="col-xs-12">
        @if (session()->has('flash_message'))
            <p class="success">{{ session()->get('flash_message') }}</p>
        @endif
    </div>

 
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
<form action="{{ URL::to('admin/store-keyword-value',null) }}" method="post">
{!! csrf_field() !!}
                <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-basket font-green-sharp"></i>
										<span class="caption-subject font-green-sharp bold uppercase">
										Add Keyword value </span>
                        <span class="caption-helper">Man Tops</span>
                    </div>
                    <div class="actions btn-set">
                        <button type="button" name="back" class="btn btn-default btn-circle"><i class="fa fa-angle-left"></i> Back</button>
                        <button class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
                        <button class="btn green-haze btn-circle"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
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
                                            <b>Value-Add Information:</b>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-body">
                                    

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Page Category: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <select class="form-control" name="keyword_id" id="sel1">
                                                <option value="0">Select any</option>

                                                @foreach($pages as $page)
                                                    <option value="{{ $page->id }}">{{ $page->keyword  }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                  

                                    

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Value: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="keyword_value" placeholder="">
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
