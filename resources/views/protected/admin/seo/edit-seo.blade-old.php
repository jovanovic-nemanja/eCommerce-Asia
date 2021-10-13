@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="col-xs-12">
        @if (session()->has('flash_message'))
            <p>{{ session()->get('flash_message') }}</p>
        @endif
    </div>
    
<!--    <h3 class="page-title">
        Edit SEO <small></small>
    </h3>-->
    <div class=" page-bar page-title"  style="background-color:#082154;color:white;">
        <h3 style="margin: 5px;">Edit SEO </h3>
    </div>
    <!-- END PAGE HEADER-->
    <div class="page-bar page-breadcrumb-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home" style="color:black"></i>
                <a href="{{URL::route('admin_dashboard')}}">Home</a>
                <i class="fa fa-angle-right" style="color:black"></i>
            </li>
           
           <li>
                <a href="{{URL('admin/dashboard/Content Management')}}">Content Management</a>
                 <i class="fa fa-angle-right" style="color:black"></i>
            </li>
            <li>
               Edit SEO
            </li>
        </ul>
        <div class="page-toolbar">
            <a href="{{URL('admin/manage-seo')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;"><i class="fa fa-backward"></i> Back</a>
<!--            <div class="back"><a href="{{URL('admin/dashboard/Content Management')}}" ><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div>            -->
        </div>
    </div>
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <form action="{{ URL::to('admin/seo-update',$seo->id) }}" method="post">
            {!! csrf_field() !!}
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-basket font-green-sharp"></i>
										<span class="caption-subject font-green-sharp bold uppercase">
										Edit SEO keyword </span>
                    </div>
                    <div class="actions btn-set">
                       
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
                @if(count($errors)>0)
 <div class="alerty alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
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
                                            <b>SEO Keyword Information:</b>
                                        </li>
                                    </ul>
                                </div>
                                <!-- {!! Form::open(array('route'=>array('admin.seo-update', $seo->id))) !!} -->
                                
                                <div class="form-body">
                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label" >Page ID: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" value="{{ $seo->page_id }}" name="page_id" placeholder="Description Name">
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label" >Page Route: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8" >
                                            <input type="text" class="form-control" value="{{ $seo->page_route }}" name="page_route" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label" >Title: <span class="required">
                                                        * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" value="{{ $seo->title }}" name="title" placeholder="Description Name">
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label">Meta Keyword: <span class="required">
                                                        * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" value="{{ $seo->meta_keyword }}" name="meta_keyword" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label">Meta Description: <span class="required">
                                                        * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" value="{{ $seo->meta_description }}" name="meta_description" placeholder="Description Name">
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label">Meta Title: <span class="required">
                                                        * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" value="{{ $seo->meta_title }}" name="meta_title" placeholder="">
                                        </div>
                                    </div>


                                </div>
                            </form>
                                <!-- {!!Form::close()!!} -->
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

    </script>

    <!-- END JAVASCRIPTS -->
@stop
