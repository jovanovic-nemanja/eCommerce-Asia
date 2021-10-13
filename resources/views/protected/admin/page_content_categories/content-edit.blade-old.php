@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="col-xs-12">
        @if (session()->has('flash_message'))
            <p>{{ session()->get('flash_message') }}</p>
        @endif
    </div>
<a href="{{url('/admin/content-manage')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;"><i class="fa fa-backward"></i> Back</a>
    <h3 class="page-title">
        Content Category Edit <small></small>
    </h3>
    <div class="page-bar" style="background-color:#082154;">
        <ul class="page-breadcrumb"  >
            <li>
                <i class="fa fa-home"></i>
                <a href="{{URL::route('admin_dashboard')}}" style="color:white">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li style="color:white">
                <a href="{{URL('admin/dashboard/Content Management')}}" style="color:white">Content Management</a>
                 <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#" style="color:white">Content Category Edit</a>
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
    <div class="row">
        <div class="col-md-12">
            <input type="hidden" name="hidden_category" value="{{ $category[0]->parent_id }}">
            {!! Form::open(array('route'=>array('admin.content-update', $category[0]->id),'id'=>'form1','class'=>'form-horizontal  form-row-seperated','files'=>true)) !!}
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-basket font-green-sharp"></i>
										<span class="caption-subject font-green-sharp bold uppercase">
										Edit Content </span>
                    </div>
                    <div class="actions btn-set">
                        <!--<a href="{{url('/admin/content-manage')}}" name="back" class="btn btn-default btn-circle"><i class="fa fa-angle-left"></i> Back</a>-->
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
                                            <b>Content Information:</b>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-body">
                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label">Parent ID: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="parent_id" id="sel1">
                                                <option value="0">Parent</option>
                                                @foreach($categories as $cat)
                                                    @if($category[0]->parent_id == $cat->id)
                                                        <option value="{{  $cat->id }}" selected> {{ $cat->name }}</option>
                                                    @endif
                                                    <option value="{{  $cat->id }}"> {{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label">Name: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="name" value="{{ $category[0]->name  }}" placeholder="Sort Name">
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label">Sort Name: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="sort_name" value="{{ $category[0]->sort_name  }}" placeholder="Sort Name">
                                        </div>
                                    </div>



                                    <div class="col-md-12 form-group" id="show_page_caetgory">
                                        <label class="col-md-2 control-label">Page Category: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="page_id" id="sell">
                                                @foreach($pages as $page)
                                                    @if($page->id == $category[0]->page_id)
                                                        <option value="{{ $page->id }}" selected>{{ $page->name  }}</option>
                                                    @endif
                                                        <option value="{{ $page->id }}" >{{ $page->name  }}</option>
                                                @endforeach
                                            </select>
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
           // EcommerceProductsEdit.init();
        });

        var elem = document.getElementById('sel1');
        elem.onchange = function(){
            var hiddenDiv = document.getElementById("show_page_caetgory");
            hiddenDiv.style.display = (this.value == '0') ? "none":"block";
        };

        //var parent_value = documnent.getElementById("sel1");

    </script>

    <!-- END JAVASCRIPTS -->
@stop
