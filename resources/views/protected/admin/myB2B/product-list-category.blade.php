@extends('protected.admin.master')

@section('title', 'List Users')

@section('content')


<!-- BEGIN PAGE CONTENT-->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box grey-cascade">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-globe"></i>Managed Table
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config">
                                    </a>
                                    <a href="javascript:;" class="reload">
                                    </a>
                                    <a href="javascript:;" class="remove">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="btn-group">
                                                <button id="sample_editable_1_new" class="btn green">
                                                Add New <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="btn-group pull-right">
                                                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="javascript:;">
                                                        Print </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                        Save as PDF </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                        Export to Excel </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                           

                                <tr>
                                    <th class="table-checkbox">
                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
                                    </th>
                                    <th>
                                         name
                                    </th>
                                    <th>
                                         Parent
                                    </th>
                                    
                                    <th>
                                    </th>
                                    
                                    <th>
                                         Status
                                    </th>
                                    <th>
                                         Action
                                    </th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                 @foreach ($categories as $data)
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1"/>
                                    </td>
                                    <td>
                                         {{ $data->category_name->name or '' }}
                                    </td>
                                    <td>
                                     {{ $data->parent_id or ''}}
                                    </td>
                                    
                                    <td class="center">
                                         {{ $data->created_at or ''}}
                                    </td>
                                   
                                    <td>
                                        <span class="label label-sm label-success">
                                        Approved </span>
                                    </td>
                                    
                                    <td>
                                        <a href="{{ URL::to('admin/category-edit',$data->id) }}" class="btn btn-xs btn-info">Edit</a>
                                        <a href="{{ URL::to('admin/category-delete',$data->id) }}" class="btn btn-xs btn-danger">Delete</a>
                                    </td>
                                   <!-- <td>
                                        <span class="label label-sm label-success">
                                        Approved </span>
                                    </td>-->
                                </tr>
                                @endforeach
                                
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>








@stop
@section('script')
<script>
jQuery(document).ready(function() {       
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
   TableManaged.init();
});
</script>
@stop