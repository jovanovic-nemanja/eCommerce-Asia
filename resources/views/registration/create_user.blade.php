@extends('fontend.master2')
@section('title', 'Register')

@section('content')


        <div class="row">
           

            {!! Form::open(array('route'=>array('admin.customer.store'),'id'=>'form1','class'=>'form-horizontal  form-row-seperated','files'=>true)) !!}
                <div class="portlet light row">
                    <div class="portlet-body col-xs-7">
                        <div class="tabbable">
                            <div class="tab-content no-space">
                                <div class="tab-pane active" id="tab_general">

                                    <hr>
                                    <div class="box">
                                        <div class="form-group">
                                            <div class="col-md-2" align='right'>
                                                {!! Form::label( 'First Name', '',array('id'=>'fname_label'));!!}
                                                <span class="required"> * </span>
                                            </div>
                                            <div class="col-md-10">
                                                {!! Form::text('fname','',array('class'=>'form-control','id'=>'fname','placeholder'=>'First Name...'));!!}
                                                @if($errors->has('fname'))
                                                    <p class="text-danger error_from_backend">{{ $errors->first('fname') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-2" align='right'>
                                                {!! Form::label( 'Last Name', '',array('id'=>'lname_label')) !!}
                                                <span class="required"> * </span>
                                            </div>
                                            <div class="col-md-10">
                                                {!! Form::text('lname','',array('class'=>'form-control','id'=>'lname','placeholder'=>'Last Name...')) !!}
                                                @if($errors->has('lname'))
                                                    <p class="text-danger error_from_backend">{{ $errors->first('lname') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-2" align='right'>
                                                {!! Form::label( 'Email', '',array('id'=>'email_label')) !!}
                                                <span class="required"> * </span>
                                            </div>
                                            <div class="col-md-10">
                                                {!! Form::email('email','',array('class'=>'form-control','id'=>'email','placeholder'=>'abcd@abcd.com')) !!}
                                                @if($errors->has('email'))
                                                    <p class="text-danger error_from_backend">{{ $errors->first('email') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-2" align='right'>
                                                {!! Form::label( 'Password', '',array('id'=>'label_password')) !!}
                                                <span class="required"> * </span>
                                            </div>
                                            <div class="col-md-10">
                                                {!! Form::password('password',array('class'=>'form-control','id'=>'password','placeholder'=>'password')) !!}
                                                @if($errors->has('password'))
                                                    <p class="text-danger error_from_backend">{{ $errors->first('password') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-2" align='right'>
                                                {!! Form::label( 'Re-enter Password', '',array('id'=>'label_repassword')) !!}
                                                <span class="required"> * </span>
                                            </div>
                                            <div class="col-md-10">
                                                {!! Form::password('comfirm_password',array('class'=>'form-control','placeholder'=>'Confirm Password')) !!}
                                                @if($errors->has('comfirm_password'))
                                                    <p class="text-danger error_from_backend">{{ $errors->first('comfirm_password') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-2" align='right'>
                                                {!! Form::label( 'Country', '',array('id'=>'label_country')) !!}
                                                <span class="required"> * </span>
                                            </div>
                                            <div class="col-md-8">
                                                {!! Form::select('country',[],'',array('class'=>'form-control','id'=>'country','placeholder'=>'select...')) !!}
                                                @if($errors->has('country'))
                                                    <p class="text-danger error_from_backend">{{ $errors->first('country') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3" align='right'>
                                                {!! Form::label( 'Select Customer Type', '',array('id'=>'label_type')) !!}
                                                <span class="required"> * </span>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <div class="icheck-inline">

                                                        <label>
                                                            {!! Form::radio('customer_type', 'Suppliers', true, array('class'=>'icheck customer_type','id'=>'supplier')) !!} Supplier</label>
                                                        <label>
                                                            {!! Form::radio('customer_type', 'Buyers', '', array('class'=>'icheck customer_type','id'=>'buyer')) !!} Buyer</label>
                                                        <label>
                                                            {!! Form::radio('customer_type', 'Suppliers', '', array('class'=>'icheck customer_type','id'=>'both')) !!} Both</label>

                                                        @if($errors->has('customer_type'))
                                                            <p class="text-danger error_from_backend">{{ $errors->first('customer_type') }}</p>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-2" align='right'>
                                                {!! Form::label( 'Company Name', '',array('id'=>'label_company')) !!}
                                                <span class="required"> * </span>
                                            </div>
                                            <div class="col-md-8">
                                                {!! Form::text('company_name','',array('class'=>'form-control','id'=>'company','placeholder'=>'Company Name...')) !!}
                                                @if($errors->has('company_name'))
                                                    <p class="text-danger error_from_backend">{{ $errors->first('company_name') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-2" align='right'>
                                                {!! Form::label( 'phone', '',array('id'=>'label_phone')) !!}
                                                <span class="required"> * </span>
                                            </div>
                                            <div class="col-md-1">
                                                {!! Form::text('phone_country','',array('class'=>'form-control','id'=>'phone_country','placeholder'=>'country')) !!}

                                            </div>
                                            <div class="col-md-1">
                                                {!! Form::text('phone_area','',array('class'=>'form-control','id'=>'phone_area','placeholder'=>'area')) !!}
                                            </div>
                                            <div class="col-md-6">
                                                {!! Form::text('phone_number','',array('class'=>'form-control','id'=>'phone_number','placeholder'=>'phone...')) !!}
                                                @if($errors->has('phone_number'))
                                                    <p class="text-danger error_from_backend">{{ $errors->first('phone_number') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div id="divForSeller">
                                            <div class="form-group">
                                                <div class="col-md-2" align='right'>
                                                    {!! Form::label( 'Business Type', '',array('id'=>'label_btype')) !!}
                                                    <span class="required"> * </span>
                                                </div>
                                                <div class="col-md-8">
                                                    {!! Form::select('btype',[],'',array('class'=>'form-control','id'=>'btype')) !!}
                                                    @if($errors->has('btype'))
                                                        <p class="text-danger error_from_backend">{{ $errors->first('btype') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-2" align='right'>
                                                    {!! Form::label( 'Main Product', '',array('id'=>'label_product')) !!}
                                                    <span class="required"> * </span>
                                                </div>
                                                <div class="col-md-4">
                                                    {!! Form::text('p1','',array('class'=>'form-control','id'=>'p1','placeholder'=>'product')) !!}
                                                </div>
                                                <div class="col-md-3">
                                                    {!! Form::text('p2','',array('class'=>'form-control','id'=>'p2','placeholder'=>'product')) !!}
                                                </div>
                                                <div class="col-md-3">
                                                    {!! Form::text('p3','',array('class'=>'form-control','id'=>'p3','placeholder'=>'product')) !!}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <a type="button" class="btn btn-danger" data-dismiss="modal">Close</a>
                <input type="submit" class="btn btn-success" value="LOGIN" />
            {!! Form::close() !!}

        </div>

@endsection