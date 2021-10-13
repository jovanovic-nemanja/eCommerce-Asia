@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')

    <!-- <hr class=".text-danger"> -->
    
        @if (session()->has('flash_message'))
            <div  id ="successMessage" class="alert alert-success"  style="width:400px;">
                <p style="color:white;">{{ session('flash_message') }}</p>
            </div>
        @endif
        <div class="portlet box grey-cascade">
            <div class="portlet-title" style="background-color:#082154;color:white;">
                <div class="caption">
                    <i class="fa fa-globe"></i>Content Description Lists
                </div>
            </div>
        </div>
        <div class="page-bar page-breadcrumb-bar">
            <ul class="page-breadcrumb" >
                <li>
                    <i class="fa fa-home" style="color:black;"></i>
                    <a href="{{URL::route('admin_dashboard')}}" >Home</a>
                    <i class="fa fa-angle-right" style="color:black;"></i>
                </li>
            
                <li>
                    <a href="{{URL('admin/dashboard/Content Management')}}">Content Management</a>
                    <i class="fa fa-angle-right" style="color:black;"></i>
                </li>
                <li>
                Content Categories Lists
                </li>
            </ul>
            <div class="page-toolbar">
                <a href="{{URL('admin/dashboard/Content Management')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px;"><i class="fa fa-backward"></i> Back</a>
            </div>
        </div>

                <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box grey-cascade">
                            <!-- <div class="portlet-title" style="background-color:#082154;color:white;">
                                <div class="caption">
                                    <i class="fa fa-globe"></i>Content Descriptions lists
                                </div>
                                <a href="{{url('/admin/description-add')}}" class="btn green-haze btn-circle pull-right" style="margin-right:50px; margin-top: 5px;"><i class="fa fa-backward"></i> Back</a>
                            </div> -->
                            
                            <div class="portlet-body">
                                
          
      <!--</h3>-->
      <table id ="datavalue" class="order-table table table-striped table-bordered table-hover th-bg">
         <thead>
                    <tr>
                        <th>Description</th>
                        <th>Content Category Name</th>
                        <th>Page Category Name</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="trade_table_body">
                    @foreach($descriptions as $desc)
                        <tr>
                            <!-- <td>{{ substr($desc->description,0,50) }}</td> -->
                            <td>{{str_limit(strip_tags($desc->description),100,'...')}}</td>
                            <td>{{ $desc->bdtdc_category['name'] }}</td>
                            <td style="white-space: nowrap;">{{ $desc->bdtdc_page['name'] }}</td>
                            <td style="white-space: nowrap;">{{ date('d-M-Y',strtotime($desc->created_at)) }}</td>
                            <td style="white-space: nowrap;">
                                <a href="{{ URL::to('admin/description-edit',$desc->id) }}" class="btn btn-xs btn-info">Edit</a>
                                <a onclick="return confirm('Are you sure want to delete the particular content description?')" href="{{ URL::to('admin/description-delete',$desc->id) }}" class="btn btn-xs btn-danger">Delete</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
      </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
<!--        <div class="row">
            <div class="col-md-12">
                <h3>All Content-Descriptions lists</h3>
                <table class="table">
                    <thead>
                    <tr class="test-center">
                        <td>Description</td>
                        <td>Content Category Name</td>
                        <td>Page Category Name</td>
                        <td>Created Date</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody class="trade_table_body">
                    @foreach($descriptions as $desc)
                        <tr>
                             <td>{{ substr($desc->description,0,50) }}</td> 
                            <td>{{str_limit(strip_tags($desc->description),100,'...')}}</td>
                            <td>{{ $desc->bdtdc_category['name'] }}</td>
                            <td style="white-space: nowrap;">{{ $desc->bdtdc_page['name'] }}</td>
                            <td style="white-space: nowrap;">{{ date('d-M-Y',strtotime($desc->created_at)) }}</td>
                            <td style="white-space: nowrap;">
                                <a href="{{ URL::to('admin/description-edit',$desc->id) }}" class="btn btn-xs btn-info">Edit</a>
                                <a onclick="return confirm('Are you sure want to delete the particular content description?')" href="{{ URL::to('admin/description-delete',$desc->id) }}" class="btn btn-xs btn-danger">Delete</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>-->
        

        <!-- END PAGE CONTENT-->

@stop
@section('scripts')
    <script>
        jQuery(document).ready(function() {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            Demo.init(); // init demo features
            /* EcommerceProductsEdit.init();*/

            /*checkbox validation*/

            /**checkbox validation end**/

            /* $('.parent_id').on('click', function() {
             $('.parent_id').removeAttr('checked');
             $(this).attr('checked', true);
             }
             });*/

            /*$("input.parent_id").click(function() {
             var theCheckboxes = $("input[type='checkbox']");
             if (theCheckboxes.filter(":checked").length > 1) {
             $(this).attr("checked", false);
             alert( "Please selected one user at a time for editing." );

             return false;
             }
             });*/


            /*$(':checkbox').bind('change', function() {
             var thisClass = $(this).attr('class');
             if ($(this).attr('checked')) {
             $(':checkbox.' + thisClass).not($(this)).removeAttr('checked');
             }
             else {
             $(this).attr('checked', 'checked');
             }
             });*/

            /*$("input[name='categories[]']").change(function () {

             var maxAllowed = 1;

             var cnt = $("input[name='categories[]']:checked").length;

             if (cnt > maxAllowed)

             {

             $(this).attr("checked", "");

             alert('Select maximum ' + maxAllowed + ' field!');

             }*/


        });



        function form_validate(form_id){
            var error = 0;
            var msg='';
            var name = $('#name').val();
            var desc = $('#description').val();
            var seo = $('#seo').val();
            var mtitle = $('#meta_title').val();
            var mdesc = $('#meta_description').val();
            var mkey = $('#meta_keywords').val();

            if(name === ''){
                error++;
                $('#name').css('border','1px solid red');
                msg += error+". Name Required <br/>";

            }
            if(desc === ''){
                error++;
                $('#description').css('border','1px solid red');
                msg += error+". Description Required <br/>";

            }
            if(seo === ''){
                error++;
                $('#seo').css('border','1px solid red');
                msg += error+". SEO Required <br/>";

            }
            if(mtitle === ''){
                error++;
                $('#meta_title').css('border','1px solid red');
                msg += error+". Meta Title Required <br/>";

            }
            if(mdesc === ''){
                error++;
                $('#meta_description').css('border','1px solid red');
                msg += error+". Meta Description Required <br/>";

            }
            if(mkey === ''){
                error++;
                $('#meta_keywords').css('border','1px solid red');
                msg += error+". Meta Keywords Required <br/>";

            }
            var allVals = [];
            $('.parent_id_div :checked').each(function() {
                allVals.push($(this).val());
            });

            if(allVals.length != 1){
                error++;
                $('.parent_id_div').css('border','1px solid red');
                msg += error+". Parent Category Must be 1 selected ! <br/>";
            }

            if(error != 0){

                $('#validation_error').addClass('alert alert-danger');
                $('#validation_error').html(msg);
            }else{

                var formdata = $( "#"+form_id ).serialize();
                var action = $("#"+form_id).attr('action');
                $.ajax({
                    url: action,
                    type: "post",
                    data: formdata,
                    success: function(data){


                        var er='';
                        var obj = $.parseJSON(data);
                        if(obj.type === 'success'){
                            $('#validation_error').removeClass('alert alert-danger');
                            $('#validation_error').addClass('alert alert-success');
                            er+= obj.text;


                        }else{
                            $('#validation_error').addClass('alert alert-danger');
                            $.each(obj.text, function(index, value) {
                                er+= value+'<br/>';
                            });

                        }
                        $('#validation_error').html(er);
                    }
                });
            }

            return false;
        }
        setTimeout(function() {
            $('#successMessage').fadeOut('fast');
        }, 3000); 


    </script>

    <!-- END JAVASCRIPTS -->
@stop
