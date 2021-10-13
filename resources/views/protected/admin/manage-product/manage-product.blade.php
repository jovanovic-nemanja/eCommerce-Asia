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
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover th-bg" id="sample_1">
                                <thead>
                           

                                <tr>
                                    <th>
                                         ID :
                                    </th>
                                    <th>
                                         Product Name :
                                    </th>
                                    <th>
                                         Category Name :
                                    </th>
                                    
                                    <th>
                                    	Country Name:
                                    </th>
                                    
                                    <th>
                                         Company Name :
                                    </th>
                                    <th>
                                    	Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                	
                                 @foreach($list_product as $l)
                                <tr class="odd gradeX">
                                    <td>
                                        {{$l->product_id}}
                                    </td>
                                    <td>
                                        <a title="{{$l->pro_to_cat_name?$l->pro_to_cat_name->name:'not available'}}" target="_blank" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', ($l->pro_to_cat_name?$l->pro_to_cat_name->name:'not available')).'='.mt_rand(100000000, 999999999).$l->product_id) }}">
                                        @if($l->pro_to_cat_name)
                                           {{$l->pro_to_cat_name->name}}
                                         @else
                                         Product name not available
                                         @endif
                                         </a>
                                    </td>
                                    <td>
                                        @if($l->bdtdcCategory)
                                         {{$l->bdtdcCategory->name}}
                                         @else
                                         Category name not available
                                         @endif
                                    </td>
                                    <td>
                                         {{$l->cat_country?$l->cat_country->name:''}}
                                    </td>
                                    <td>
                                        <a target="_blank" title="{{$l->supp_pro_company_name?$l->supp_pro_company_name->name:'not available'}}" href="{{ URL::to('Home/'.preg_replace('/[^A-Za-z0-9\-]/', '-',($l->supp_pro_company_name?$l->supp_pro_company_name->name:'not available')).'/'.$l->company_id) }}">
                                         {{$l->supp_pro_company_name?$l->supp_pro_company_name->name:'not available'}}
                                        </a>
                                    </td> 
                                    <td>
                                    	<a style="margin-bottom:5px;" href="{{ URL::to('admin/edit-product',$l->product_id,'') }}" class="btn btn-xs btn-info">Edit</a> <a href="{{ URL::to('admin/edit-product',$l->product_id,'') }}" class="btn btn-xs btn-danger">Delete</a>
                                    </td>

                                </tr>
                                @endforeach
                                
                                </tbody>
                                </table>
                                </div>
                                {!! $list_product->render() !!}
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>





@stop
@section('scripts')
<script>

</script>
@stop
