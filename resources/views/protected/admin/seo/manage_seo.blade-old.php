@extends('protected.admin.master')

@section('title', 'List Users')

@section('content')

<style>
    #sample_1_info, #sample_1_paginate{
        margin-top: 20px;
    }
</style>

<!--<h3 class="page-title">
        Manage SEO <small></small>
    </h3>-->
<!--    <div class="page-bar page-breadcrumb-bar" style="background-color:#082154;">
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
               Manage SEO
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="back"><a href="{{URL('admin/dashboard/Content Management')}}" ><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div>            
        </div>
    </div>-->
<!-- BEGIN PAGE CONTENT-->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box grey-cascade" >
                            <div class="portlet-title"  style="background-color:#082154;">
                                <div class="caption">
                                    <i class="fa fa-globe"></i>Managed SEO
                                </div>
<!--                                <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                   
                                    <a href="javascript:;" class="remove">
                                    </a>
                                </div>-->
                            </div>
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    
<!--                                    <div class="page-bar page-breadcrumb-bar" style="background-color:#ddd;">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home" style="color:black"></i>
                <a href="{{URL::route('admin_dashboard')}}" >Home</a>
                <i class="fa fa-angle-right" style="color:black"></i>
            </li>
           
           <li>
                <a href="{{URL('admin/dashboard/Content Management')}}">Content Management</a>
                 <i class="fa fa-angle-right" style="color:black"></i>
            </li>
            <li>
               Manage SEO
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="back"><a href="{{URL('admin/dashboard/Content Management')}}" ><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div>            
        </div>
    </div>-->
                                    
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="btn-group">
                                               
                                                <a href="{{URL::to('admin/add-seo')}}" , class="btn btn-primary btn green", id="sample_editable_1_new"><i class="fa fa-plus"></i>Add New</a> 
                                                <a href="{{URL('admin/dashboard/Content Management')}}" class="btn green-haze btn-circle pull-right" style="margin-right:-370%;"><i class="fa fa-backward"></i> Back</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- <div class="btn-group pull-right">
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
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover order-table" id="sample_1">
                                <thead>
                           

                                <tr>
                                    <th class="table-checkbox">
                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
                                    </th>
                                    <th>
                                         Page ID 
                                    </th>
                                    <th>
                                         Page Route 
                                    </th>
                                    
                                    <th>
                                    	Title
                                    </th>
                                    
                                    <th>
                                         Meta Keyword 
                                    </th>
                                    
                                    <th>
                                         Action
                                    </th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                 @foreach ($seo as $s)
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1"/>
                                    </td>
                                    <td>
                                         {{ $s->page_id}}
                                    </td>
                                    <td>
                                         {{ $s->page_route}}
                                    </td>
                                    <td>
                                         {{ $s->title}}
                                    </td>
                                    <td>
                                         {{ substr($s->meta_keyword,0,30)}}
                                    </td>
                                    
                                   
                                    <td>
                                        <a href="{{ URL::to('admin/edit-seo',$s->id) }}" class="btn btn-xs btn-info">Edit</a>
                                        <a onclick="return confirm('Are you sure, you want to delete the SEO?')" style="margin-top: 5px" href="{{ URL::to('admin/delete-seo',$s->id) }}" class="btn btn-xs btn-danger">Delete</a>
                                    </td>
                                   <!-- <td>
                                        <span class="label label-sm label-success">
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

$('#sample_1').DataTable({


"oLanguage": {

"sSearch": "Search:"

}

});



</script>
@stop
