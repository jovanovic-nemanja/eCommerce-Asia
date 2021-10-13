@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')

    @if (session()->has('flash_message'))
        <p>{{ session()->get('flash_message') }}</p>
        @endif

                <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-xs-12">
                @if(Session::has('global'))
                    <h2 class="alert alert-success">{{ Session::get('global') }}</h2>
                @endif
            </div>
            <div class="col-md-12">
                <!--  <form class="form-horizontal form-row-seperated" action="#"> -->
                {!! Form::open(array('route'=>array('admin.around-world-add'),'id'=>'form1','class'=>'form-horizontal  form-row-seperated','files'=>true)) !!}
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cubes"></i>
                                        <span class="caption-subject font-green-sharp bold uppercase">
                                        Around World </span>
                            <span class="caption-helper">Man Tops</span>
                        </div>
                        <div class="actions btn-set">
                            <button type="button" name="back" class="btn btn-default btn-circle"><i class="fa fa-angle-left"></i> Back</button>
                            <button class="btn btn-default btn-circle "><i class="fa fa-reply"></i> Reset</button>
                            <span onClick="return form_validate('form1');" class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</span>
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

                    <div id="validation_error">

                    </div>

                    <div class="portlet-body">
                        <div class="tabbable">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_general" data-toggle="tab">
                                        General </a>
                                </li>
                                <li>
                                    <a href="#tab_images" data-toggle="tab">
                                        Images </a>
                                </li>

                            </ul>
                            <div class="tab-content no-space">
                                <div class="tab-pane active" id="tab_general">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Title:</label>
                                            <div class="col-md-10">
                                                {!! Form::text('title',null,['class'=>'form-control', 'id'=> "title", 'placeholder'=>'Title','style'=>'width:38%']) !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Description:</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control maxlength-handler" rows="8" id="description" name="description" maxlength="1000" placeholder="Description"></textarea>
                                                            <span class="help-block">
                                                            max 1000 chars </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Url:</label>
                                            <div class="col-md-10">
                                                {!! Form::text('url',null,['class'=>'form-control', 'id'=>'url', 'placeholder'=>'Url','style'=>'width:38%']) !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!---------------------- Images INFORMATION ---------------->

                                <div class="tab-pane" id="tab_images">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Operations</h3>
                                        </div>
                                        <div class="panel-body">
                                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                            <div class="row fileupload-buttonbar">
                                                <div class="col-lg-12">
                                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                                            <span class="btn green fileinput-button">
                                                            <i class="fa fa-plus"></i>
                                                            <span>
                                                            Add file... </span>
                                                            <input type="file" name="image" multiple="">
                                                            </span>
                                                    <button type="submit" class="btn blue start">
                                                        <i class="fa fa-upload"></i>
                                                            <span>
                                                            Start upload </span>
                                                    </button>
                                                    <!-- The global file processing state -->
                                                            <span class="fileupload-process">
                                                            </span>
                                                </div>


                                            </div>
                                            <!-- The table listing the files available for upload/download -->

                                        </div>
                                    </div>
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Demo Notes</h3>
                                        </div>
                                        <div class="panel-body">
                                            <ul>
                                                <li>
                                                    The maximum file size for uploads in this demo is <strong>5 MB</strong> (default file size is unlimited).
                                                </li>
                                                <li>
                                                    Only image files (<strong>JPG, GIF, PNG</strong>) are allowed in this demo (by default there is no file type restriction).
                                                </li>
                                                <li>
                                                    Uploaded files will be deleted automatically after <strong>5 minutes</strong> (demo setting).
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close();!!}
            </div>
        </div>
        </div>

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
            var title = $('#title').val();
            var desc = $('#description').val();
            var url = $('#url').val();


            if(title === ''){
                error++;
                $('#title').css('border','1px solid red');
                msg += error+". Title Required <br/>";
            }
            if(desc === ''){
                error++;
                $('#description').css('border','1px solid red');
                msg += error+". Description Required <br/>";
            }
            if(url !== 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/') {
                error++;
                $('#url').css('border', '1px solid red');
                msg += error+". 'your url have to be a valid url (try putting https:// at the beginning)' <br/>";
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

    </script>

    <!-- END JAVASCRIPTS -->
@stop
