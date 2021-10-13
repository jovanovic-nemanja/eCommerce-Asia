@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="col-xs-12">
        
    </div>  

<!--    <h3 class="page-title">
        Add SEO <small></small>
    </h3>-->
    <div class="portlet box grey-cascade">
        <div class="portlet-title" style="background-color:#082154;color:white;">
            <div class="caption">
                <i class="fa fa-globe"></i>Add SEO
            </div>
        </div>
    </div>
    @if (session()->has('flash_message'))
        <div class="alert alert-success">
            <p style="color:white;">{{ session()->get('flash_message') }}</p>
        </div>
        @endif
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
               Add SEO
            </li>
        </ul>
        <div class="page-toolbar">
             <a href="{{URL('admin/manage-seo')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;"><i class="fa fa-backward"></i> Back</a>
            <!--<div class="back"><a href="{{URL('admin/dashboard/Content Management')}}" ><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div>-->            
        </div>
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
                       
                        <button name="save" value="1" class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
                        <button name="save" value="2"  class="btn green-haze btn-circle"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
                        <a href="{{url('/admin/manage-seo')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;"><i class="fa fa-list"></i> View SEO List</a>
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
                                 <div id ="errorMessage" class="alert alert-danger" style="width:400px;">
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
                                            <b>SEO-Keyword Information:</b>
                                        </li>
                                    </ul>
                                </div>
                                <!-- {!!Form::open(['route'=>'admin.add-seo-store'])!!} -->
                                <div class="form-body">
                                    <div class="col-md-12 form-group" style="margin-bottom:2%;">
                                        <label class="col-md-2 control-label" >Page ID List: <span class="required">
														* </span>
                                        </label>
<!--                                        <div class="col-md-10" >
                                            <input type="text" class="form-control" name="page_id" placeholder="Description Name">
                                        </div>-->
                                        
                                        <div class="col-md-8" >
                                            <select class="form-control" name="page_id_list" id="page_seo_id">
                                                <option value="">Select any</option>

                                                @foreach($page_seo as $page)
                                                    <option  value="{{ $page->id }}"><?php echo $page['page_id'].' - '. $page['page_route']; ?></option>
                                                @endforeach

                                            </select>
                                            <!-- &nbsp;&nbsp;&nbsp; -->
                                            <input type="hidden" class="form-control" name="action" id="action" placeholder="Description Name" value="{{ URL::to('admin/seo-id',null) }}">
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12 form-group" style="margin-bottom:2%;">
                                        <label class="col-md-2 control-label" >Page ID: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8" >
                                            <input type="text" class="form-control" name="page_id" placeholder="">
                                        </div>
                                        
<!--                                        <div class="col-md-10" >
                                            <select class="form-control" name="page_id" id="page_seo_id">
                                                <option value="">Select any</option>

                                                @foreach($page_seo as $page)
                                                    <option  value="{{ $page->id }}"><?php // echo $page['page_id'].' - '. $page['page_route']; ?></option>
                                                @endforeach

                                            </select>
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="hidden" class="form-control" name="action" id="action" placeholder="Description Name" value="{{ URL::to('admin/seo-id',null) }}">
                                            
                                        </div>-->
                                        
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label" >Page Route: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-8" >
                                            <input type="text" class="form-control" name="page_route" placeholder="Page Route">
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label" >Title: <span class="required">
                                                        * </span>
                                        </label>
                                        <div class="col-md-8" >
                                            <input type="text" class="form-control" name="title" placeholder="Title">
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label" >Meta Keyword: <span class="required">
                                                        * </span>
                                        </label>
                                        <div class="col-md-8" >
                                            <input type="text" class="form-control" name="meta_keyword" placeholder="Meta Keyword">
                                        </div>
                                    </div>
                                    <div class=" col-md-12 form-group">
                                        <label class="col-md-2 control-label" >Meta Description: <span class="required">
                                                        * </span>
                                        </label>
                                        <div class="col-md-8" >
                                            <input type="text" class="form-control" name="meta_description" placeholder="Meta Description">
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="col-md-2 control-label" >Meta Title: <span class="required">
                                                        * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="meta_title" placeholder="Meta Title">
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
            // EcommerceProductsEdit.init();
        });

        $('#page_seo_id').change(function() {
           
           var id= $('#page_seo_id option:selected').val();
           var action= $('#action').val();
           var _token = $("input[name='_token']").val();
//            alert(id);
$.ajax({
    url: action,
            type: "post",
            data: {id: id,_token: _token},
            success: function(response) {

//               var er = '';
               console.log(response.data);
               
               $("input[name='page_id']").val(response.data[0].page_id);
               $("input[name='page_route']").val(response.data[0].page_route);
               $("input[name='title']").val(response.data[0].title);
               $("input[name='meta_keyword']").val(response.data[0].meta_keyword);
               $("input[name='meta_description']").val(response.data[0].meta_description);
               $("input[name='meta_title']").val(response.data[0].meta_title);
               
//               if (obj.type === 'success') {
//                  $('#validation_error').removeClass('alert alert-danger');
//                  $('#validation_error').addClass('alert alert-success');
//                  er += obj.text;
//
//
//               } else {
//                  $('#validation_error').addClass('alert alert-danger');
//                  $.each(obj.text, function(index, value) {
//                     er += value + '<br/>';
//                  });

//               }
//               $('#validation_error').html(er);
            }
         });
   });
    setTimeout(function() {
        $('#errorMessage').fadeOut('fast');
    }, 3000);

    </script>

    <!-- END JAVASCRIPTS -->
@stop
