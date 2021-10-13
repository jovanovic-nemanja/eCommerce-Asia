@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')

@if (session()->has('flash_message'))
<p>{{ session()->get('flash_message') }}</p>
@endif

<div class="row">
    <div class="col-md-12">
        @if($errors->any())
            <ul class="alert alert-danger list-group">
                @foreach($errors->all() as $e)
                    <li class="list-group-item"> {{ $e }}</li>
                @endforeach
            </ul>
        @endif
        {!! Form::open(array('route'=>array('admin.customer.store'),'id'=>'form1','class'=>'form-horizontal  form-row-seperated','files'=>true)) !!}

        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user-plus"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">
                        Add Corporate Exucutive </span>

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
            <div id="validation_error"></div> 
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
                            <div class="form-body">
                                <div class="form-group">                                                       
                                    <div class="col-md-2" align='right'>
                                        {!! Form::label( 'First Name', '',array('id'=>'fname_label'));!!}
                                        <span class="required"> * </span> 
                                    </div>
                                    <div class="col-md-10">
                                        {!! Form::text('fname','',array('class'=>'form-control','id'=>'fname','placeholder'=>'First Name...'));!!}
                                    </div>
                                </div>
                                <div class="form-group">                                                       
                                    <div class="col-md-2" align='right'>
                                        {!! Form::label( 'Last Name', '',array('id'=>'lname_label'));!!}
                                        <span class="required"> * </span> 
                                    </div>
                                    <div class="col-md-10">
                                        {!! Form::text('lname','',array('class'=>'form-control','id'=>'lname','placeholder'=>'Last Name...'));!!}
                                    </div>
                                </div>
                                <div class="form-group">                                                       
                                    <div class="col-md-2" align='right'>
                                        {!! Form::label( 'Email', '',array('id'=>'email_label'));!!}
                                        <span class="required"> * </span> 
                                    </div>
                                    <div class="col-md-10">
                                        {!! Form::email('email','',array('class'=>'form-control','id'=>'email','placeholder'=>'abcd@abcd.com'));!!}
                                    </div>
                                </div>
                                <div class="form-group">                                                       
                                    <div class="col-md-2" align='right'>
                                        {!! Form::label( 'Password', '',array('id'=>'label_password'));!!}
                                        <span class="required"> * </span> 
                                    </div>
                                    <div class="col-md-10">
                                        {!! Form::password('password',array('class'=>'form-control','id'=>'password','placeholder'=>'password'));!!}
                                    </div>
                                </div>
                                <div class="form-group">                                                       
                                    <div class="col-md-2" align='right'>
                                        {!! Form::label( 'Re-enter Password', '',array('id'=>'label_repassword'));!!}
                                        <span class="required"> * </span> 
                                    </div>
                                    <div class="col-md-10">
                                        {!! Form::password('repassword',array('class'=>'form-control','id'=>'repassword','placeholder'=>'password'));!!}
                                    </div>
                                </div>
                                <div class="form-group">                                                       
                                    <div class="col-md-2" align='right'>
                                        {!! Form::label( 'Country', '',array('id'=>'label_country'));!!}
                                        <span class="required"> * </span> 
                                    </div>
                                    <div class="col-md-8">


                                        {!! Form::select('country',$countries,'',array('class'=>'form-control','id'=>'country','placeholder'=>'select...')); !!}

                                    </div>
                                </div>
                                <div class="form-group">                                                       
                                    <div class="col-md-3" align='right'>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="icheck-inline">

                                                <label>
                                                    {!! Form::hidden('customer_type', 'Suppliers') !!} </label>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">                                                       
                                    <div class="col-md-2" align='right'>
                                        {!! Form::label( 'Company Name', '',array('id'=>'label_company'));!!}
                                        <span class="required"> * </span> 
                                    </div>
                                    <div class="col-md-8">
                                        {!! Form::text('company_name','',array('class'=>'form-control','id'=>'company','placeholder'=>'Company Name...'));!!}
                                    </div>
                                </div>
                                <div class="form-group">                                                       
                                    <div class="col-md-2" align='right'>
                                        {!! Form::label( 'phone', '',array('id'=>'label_phone'));!!}
                                        <span class="required"> * </span> 
                                    </div>
                                    <div class="col-md-1">
                                        {!! Form::text('phone_country','',array('class'=>'form-control','id'=>'phone_country','placeholder'=>'country'));!!}
                                    </div>
                                    <div class="col-md-1">
                                        {!! Form::text('phone_area','',array('class'=>'form-control','id'=>'phone_area','placeholder'=>'area'));!!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::text('phone_number','',array('class'=>'form-control','id'=>'phone_number','placeholder'=>'phone...'));!!}
                                    </div>
                                </div>
                                <div id="divForSeller">   
                                    <div class="form-group">                                                       
                                        <div class="col-md-2" align='right'>
                                            {!! Form::label( 'Business Type', '',array('id'=>'label_btype'));!!}
                                            <span class="required"> * </span> 
                                        </div>
                                        <div class="col-md-8">

                                            {!! Form::select('btype',$business,'',array('class'=>'form-control','id'=>'btype')); !!}

                                        </div>
                                    </div>
                                    <div class="form-group">                                                       
                                        <div class="col-md-2" align='right'>
                                            {!! Form::label( 'Main Product', '',array('id'=>'label_product'));!!}
                                            <span class="required"> * </span> 
                                        </div>
                                        <div class="col-md-4">
                                            {!! Form::text('p1','',array('class'=>'form-control','id'=>'p1','placeholder'=>'product'));!!}
                                        </div>
                                        <div class="col-md-3">
                                            {!! Form::text('p2','',array('class'=>'form-control','id'=>'p2','placeholder'=>'product'));!!}
                                        </div>
                                        <div class="col-md-3">
                                            {!! Form::text('p3','',array('class'=>'form-control','id'=>'p3','placeholder'=>'product'));!!}
                                        </div>
                                    </div>
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





@stop
@section('scripts')


<script>
    $(document).ready(function () {
        $('.customer_type').click(function () {
            if ($('#buyer').is(':checked')) {
                $('#divForSeller').slideUp();
            } else {
                $('#divForSeller').slideDown();
            }
        });


    });

    function form_validate(form_id) {
        var error = 0;
        var msg = '';
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var repassword = $('#repassword').val();
        var country = $('#country').val();
        var company = $('#company').val();
        var phone_country = $('#phone_country').val();
        var phone_area = $('#phone_area').val();
        var phone_number = $('#phone_number').val();
       
        var btype = $('#btype').val();
        var p1 = $('#p1').val();
        var p2 = $('#p2').val();
         var p3 = $('#p3').val();


        if (fname === '') {
            error++;
            $('#fname').css('border', '1px solid red');
            msg += error + ". First Name Required <br/>";

        }
         if (lname === '') {
            error++;
            $('#lname').css('border', '1px solid red');
            msg += error + ". Last Name Required <br/>";

        }
        if (email === '') {
            error++;
            $('#email').css('border', '1px solid red');
            msg += error + ". Email Required <br/>";

        }
        if (password === '') {
            error++;
            $('#password').css('border', '1px solid red');
            msg += error + ". password Required <br/>";

        }
        if (repassword === '') {
            error++;
            $('#repassword').css('border', '1px solid red');
            msg += error + ". password Required <br/>";

        }
         if (repassword !== password) {
            error++;
            $('#password').css('border', '1px solid red');
             $('#repassword').css('border', '1px solid red');
            msg += error + ". Password Don't Macth <br/>";

        }
         if (country === '') {
            error++;
            $('#country').css('border', '1px solid red');
            msg += error + ". Country Required <br/>";

        }
         if (company === '') {
            error++;
            $('#company').css('border', '1px solid red');
            msg += error + ". Compnay Required <br/>";

        }
         if (phone_country === '') {
            error++;
            $('#phone_country').css('border', '1px solid red');
            msg += error + ". Country Prefix Required <br/>";

        }
        if (phone_area === '') {
            error++;
            $('#phone_area').css('border', '1px solid red');
            msg += error + ". Area Prefix Required <br/>";

        }
        if (phone_number === '') {
            error++;
            $('#phone_number').css('border', '1px solid red');
            msg += error + ". Phone Number Required <br/>";

        }
        if ($('#supplier').is(':checked') || $('#both').is(':checked')){
             if (btype === '') {
                    error++;
                    $('#btype').css('border', '1px solid red');
                    msg += error + ". Business Type Required <br/>";

                }
                if ((p1 === '') || (p2 === '') || (p3 === '')) {
                    error++;
                    $('#p1').css('border', '1px solid red');
                    msg += error + ". Minimum One Product Required <br/>";

                }
        } 
        


        if (error != 0) {

            $('#validation_error').addClass('alert alert-danger');
            $('#validation_error').html(msg);
        } else {

            var formdata = $("#" + form_id).serialize();
            var action = $("#" + form_id).attr('action');
            $.ajax({
                url: action,
                type: "post",
                data: formdata,
                success: function (data) {


                    var er = '';
                    var obj = $.parseJSON(data);
                    if (obj.type === 'success') {
                        $('#validation_error').removeClass('alert alert-danger');
                        $('#validation_error').addClass('alert alert-success');
                        er += obj.text;


                    } else {
                        $('#validation_error').addClass('alert alert-danger');
                        $.each(obj.text, function (index, value) {
                            er += value + '<br/>';
                        });

                    }
                    $('#validation_error').html(er);
                }
            });
        }

        return false;
    }



</script>
@stop
