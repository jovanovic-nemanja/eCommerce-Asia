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
    
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <input type="hidden" name="hidden_category" value="{{ $module->parent_id }}">
            {!! Form::open(array('route'=>array('admin.module-update', $module->id),'id'=>'form1','class'=>'form-horizontal  form-row-seperated','files'=>true)) !!}
             @csrf
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-basket font-green-sharp"></i>
										<span class="caption-subject font-green-sharp bold uppercase">
										Edit Modules </span>
                    </div>
                    <div class="actions btn-set">
                        
                        <button class="btn green-haze btn-circle"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
                        
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
                                        <label class="col-md-2 control-label">Parent ID: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <select class="form-control" name="parent_id" id="sel1">
                                                <option value="0">Parent</option>
                                                @foreach($modules as $m)
                                                    @if($module->parent_id == $m->id)
                                                        <option value="{{  $m->id }}" selected> {{ $m->name }}</option>
                                                    @endif
                                                        <option value="{{  $m->id }}"> {{ $m->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Module Name: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="module_name" value="{{ $module->name  }}" placeholder="Module Name">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Short Name: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="short_name" value="{{ $module->short_name  }}" placeholder="Short Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Icon_1: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="icon_1" value="{{ $module->icon1  }}" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Icon_2: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="icon_2" value="{{ $module->icon1 }}" placeholder="">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-2 control-label">CSS_Class: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="css_class" value="{{ $module->css_class }}" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Slug: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="slug" value="{{ $module->slug }}" placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Sort: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="sort" value="{{ $module->sort }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Status: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="status" value="{{ $module->status }}" placeholder="">
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
