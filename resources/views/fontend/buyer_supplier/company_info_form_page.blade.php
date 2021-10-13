@php
   use App\BdtdcFormValue;
   use App\BdtdcCertificationImage;
   use App\BdtdcCompanyTrademarkImage;
   use App\BdtdcHonorImage;
   use App\BdtdcPatentImage;
   use App\BdtdcTrademarksImage;
   $total_employe = BdtdcFormValue::where('keyword_id',6)->get();
   $office_size = BdtdcFormValue::where('keyword_id',7)->get();
   $total_anual_sales_volume = BdtdcFormValue::where('keyword_id',16)->get();
   $export_percentage = BdtdcFormValue::where('keyword_id',17)->get();
   $total_employe_tradedepertment = \App\BdtdcFormValue::where('keyword_id',9)->get();
   $main_market_destribution = BdtdcFormValue::where('keyword_id',8)->get();
   $no_of_rd_staf = BdtdcFormValue::where('keyword_id',10)->get();
   $no_of_qc_staff = BdtdcFormValue::where('keyword_id',11)->get();
   $accepted_delevery_terms = BdtdcFormValue::where('keyword_id',12)->get();
   $accepted_payment_currence = BdtdcFormValue::where('keyword_id',13)->get();
   $accepted_payment_type = BdtdcFormValue::where('keyword_id',14)->get();
   $language = BdtdcFormValue::where('keyword_id',15)->get();
   $factory_size = BdtdcFormValue::where('keyword_id',18)->get();
   function generate_list($id){
      return BdtdcFormValue::where('keyword_id',$id)->get();
   }   
@endphp
<div class="col-md-12">
   <div class="col-md-12">
      <div class="col-md-12 padding_0" style="padding-bottom:1%;border-bottom:1px solid #ddd;margin-bottom:2%">
         <h4 class="text-primary">Manage Company Information</h4>
         <p style="font-size:11px;line-height:0px;margin-top:0%" class="text-muted"> Comprehensive and detailed company information helps buyers understand your capabilities faster. </p>
      </div>
      <div class="col-xs-12 padding_0">
         <!-- Nav tabs -->
         <ul class="nav nav-tabs company_info_form_tab" role="tablist" style="padding: 0 !important">
            <li role="presentation" class="active text-center"><a href="#basic_info" role="tab" data-toggle="tab" style="padding:3px 8px !important;border-bottom: 1px solid transparent;">Basic-Info</a></li>
            <li role="presentation" class="text-center"><a href="#aditional_info" role="tab" data-toggle="tab" style="padding:3px 8px !important;border-bottom: 1px solid transparent;">Trade Details</a></li>
            <li role="presentation" class="text-center"><a href="#partner_factory" role="tab" data-toggle="tab" style="padding:3px 8px !important;border-bottom: 1px solid transparent;">Factory Details</a></li>
            <li role="presentation" class="text-center"><a href="#company_introduction" role="tab" data-toggle="tab" style="padding:3px 8px !important;border-bottom: 1px solid transparent;">Company Introduction</a></li>
            <li role="presentation" style="border: none" class="text-center"><a href="#certification_trademarks" role="tab" data-toggle="tab" style="padding:3px 8px !important;border-bottom: 1px solid transparent;">Certifications & Trademarks</a></li>
         </ul>
      </div>
      <div class="col-xs-12 padding_0">
         <!-- Tab panes -->
         <form action="{!! URL::to('company/post_supplier_info',null) !!}" method="post" enctype="multipart/form-data" class="form company_info_form">
            <input type="hidden" class="form_data _token" name="_token" value="{{ csrf_token() }}">
            <div class="tab-content">
               <!------BASIC INFO CONTENT SECTION------- -->
               <div role="tabpanel" class="tab-pane active" id="basic_info">
                  @if(count($errors) > 0)
                  <div class="alert alert-danger">
                     <ul>
                        @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                        @endforeach
                     </ul>
                  </div>
                  @endif
                  <div>
                     <ul id="basic_info_errors" style="padding: 5px 25px; color: red; font-weight: bold;">
                        
                     </ul>
                     
                  </div>
                  <input type="hidden" name="submitted_form" class="form_data" value="basic_info" >
                  <div style="margin-bottom:1% ;margin-top:4%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">Company Name</label>
                     </div>
                     <div class="col-xs-6">
                        <input style="height:27px;padding-bottom:2%;font-size:12px" type="text" class="form-control form_data" name="company_name" value="{{ $supplier->name ?? '' }}" placeholder="company name">
                     </div>
                  </div>
                  <div class="col-xs-12" style="margin-bottom:1% ;">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted">Company Registered In</label>
                     </div>
                     <div class="col-xs-6">
                        @php 
                        $country_list = \App\Model\BdtdcCountry::where('region_id','!=',1)->get()
                        @endphp
                        <select class="form-control form_data" name="location_of_reg" id="location_of_reg" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                        <option value="0" {{$supplier?($supplier->location_of_reg == 0?'selected':''):'selected'}}>Please select a country</option>
                        @foreach($country_list as $single_country)
                        <option value="{{$single_country->id}}" {{$supplier?($supplier->location_of_reg == $single_country->id?'selected':''):''}}>{{$single_country->name}}
                        </option>
                        @endforeach
                        </select>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted">Company Website</label>
                     </div>
                     <div class="col-xs-6">
                        <input style="height:27px;padding-bottom:1%;font-size:12px" type="text" name="company_website" required class="form-control form_data" value="{{ $supplier->company_website ?? '' }}" placeholder="http://www.example.com">
                        <p style="font-size:10px;" class="text-muted">Each company website URL should begin with http:// or https://.</p>
                     </div>
                  </div>
                  <div class="col-xs-12 padding_0">
                     <h4 class="text-primary" style="font-size:16px;font-weight:bold;line-height:0px;border-bottom:1px solid #49B9DA;padding-bottom:1.5%;margin-top:3%;margin-bottom:2%">Company Address</h4>
                  </div>
                  <div class="col-xs-9">
                     <div class="row">
                        <div class="col-xs-6">
                           <label style="font-size:12px;font-weight:bold" class="text-muted">Street Name</label>
                           <input style="height:27px;padding-bottom:2%;font-size:12px" type="text" class="form-control form_data" name="street" value="{{ $supplier->street ?? '' }}" placeholder="Street Name">
                        </div>
                        <div class="col-xs-6">
                           <label style="font-size:12px;font-weight:bold" class="text-muted">City</label>
                           <input style="height:27px;padding-bottom:2%;font-size:12px" type="text" class="form-control form_data" name="city" value="{{ $supplier->city ?? '' }}" placeholder="City">
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-9">
                     <div class="row">
                        <div class="col-xs-6" style="margin-top:1%;">
                           <label style="font-size:12px;font-weight:bold" class="text-muted">Zip code</label>
                           @if($supplier)
                           {!! Form::text('zip_code',$supplier->zip_code,['class'=>'form-control form_data' ,'placeholder'=>'Zip-code','style'=>'height:28px;padding-bottom:1%;font-size:12px;padding-top:0%']) !!}
                           @else
                           {!! Form::text('zip_code','',['class'=>'form-control form_data' ,'placeholder'=>'Zip-code','style'=>'height:28px;padding-bottom:1%;font-size:12px;padding-top:0%']) !!}
                           @endif
                        </div>
                        <div class="col-xs-6" style="margin-top:1%;">
                           <label style="font-size:12px;font-weight:bold" class="text-muted">Postal code</label>
                           @if($supplier)
                           {!! Form::text('postal_code',$supplier->postal_code,['class'=>'form-control form_data' ,'placeholder'=>'Postal-code','style'=>'height:28px;padding-bottom:1%;font-size:12px;padding-top:0%']) !!}
                           @else
                           {!! Form::text('postal_code','',['class'=>'form-control form_data' ,'placeholder'=>'Postal-code','style'=>'height:28px;padding-bottom:1%;font-size:12px;padding-top:0%']) !!}
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-9">
                     <div class="row">
                        <div class="col-xs-6">
                           <label style="font-size:12px;font-weight:bold" class="text-muted">Region</label>
                           <input style="height:27px;padding-bottom:2%;font-size:12px" type="text" class="form-control form_data" name="region" value="{{ $supplier->region ?? '' }}" placeholder="Region">
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 padding_0">
                     <h4 class="text-primary" style="font-size:16px;font-weight:bold;line-height:0px;border-bottom:1px solid #49B9DA;padding-bottom:1.5%;margin-top:3%;margin-bottom:2%">Others Information</h4>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted">Main Products</label>
                     </div>
                     <div class="col-xs-6 padding_0">
                        @php
                           use App\Model\BdtdcSupplierMainProduct;
                           $user_id = \Sentinel::getUser()->id;
                           $main_product = BdtdcSupplierMainProduct::where('supplier_id',$user_id)->first();
                           $other_products_array = [];
                        @endphp
                        @if($main_product)
                           @if($main_product->other_products != '')
                              @php
                              $other_products_array = explode(',', $main_product->other_products);
                              @endphp
                           @endif
                        @endif
                        <div class="col-md-4">
                           <input style="height:27px;padding-bottom:3%;font-size:12px" type="text" class="form-control form_data" name="main_product1" value="{{ ($main_product) ? $main_product->product_name_1 : '' }}" placeholder="Product 1">
                        </div>
                        <div class="col-md-4">
                           <input style="height:27px;padding-bottom:3%;font-size:12px" type="text" class="form-control form_data" name="main_product2" value="{{ ($main_product) ? $main_product->product_name_2 : '' }}" placeholder="Product 2">
                        </div>
                        <div class="col-md-4">
                           <input style="height:27px;padding-bottom:3%;font-size:12px" type="text" class="form-control form_data" name="main_product3" value="{{ ($main_product) ? $main_product->product_name_3 : '' }}" placeholder="Product 3">
                        </div>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted">Other Products You Sell</label>
                     </div>
                     <div class="col-xs-6 padding_0">
                        @for($i=0; $i<=5; $i++)
                        <div style="margin-bottom:1%" class="col-md-4">
                           <input style="height:27px;padding-bottom:3%;font-size:12px" type="text" class="form-control form_data" name="other_products[]" value="@if(isset($other_products_array[$i])){{ $other_products_array[$i]}}@endif" placeholder="Other Product">
                        </div>
                        @endfor
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted">Year Company Registered</label>
                     </div>
                     <div class="col-xs-6">
                        <select name="year_of_reg" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                           <option>--please select--</option>
                           @php
                              $y=date("Y")+1;
                           @endphp
                           @for($i=1900;$i<$y;$i++)
                              <option value="{{ $i}}" @if($supplier) @if($supplier->year_of_reg == $i) selected @endif @endif>{{ $i}}</option>
                           @endfor
                        </select>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted">Total No. Employees</label>
                     </div>
                     <div class="col-xs-6">
                        <select name="total_employe" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                           <option value="0">--please select--</option>
                           @foreach($total_employe as $k)
                           @if($supplier)
                           @if($supplier->total_employe == $k->id)
                           <option value="{{ $k->id }}" selected>{{ $k->value }}</option>
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }}</option>
                           @endif
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }}</option>
                           @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted">Office Size</label>
                     </div>
                     <div class="col-xs-6">
                        <select name="office_size" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                           <option value="0">--please select--</option>
                           @foreach($office_size as $k)
                           @if($supplier)
                           @if($supplier->office_size == $k->id)
                           <option value="{{ $k->id }}" selected>{{ $k->value }}</option>
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }}</option>
                           @endif
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }}</option>
                           @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">Company Advantages</label>
                     </div>
                     <div class="col-xs-6">
                        <textarea style="" class="form-control form_data" name="company_advantage" coll="30" rows="3">{{ $supplier->company_advantage ?? '' }}</textarea>
                        <p style="font-size:10px;" class="text-muted">Please briefly describe your company’s advantages. E.g. “We have twenty years experience of product design.�? </p>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="legal_owner">Legal Owner</label>
                     </div>
                     <div class="col-xs-6">
                        <input style="height:27px;padding-bottom:2%;font-size:12px" type="text" id="legal_owner" class="form-control form_data" name="legal_owner" value="{{ $supplier->legal_owner ?? '' }}" placeholder="">
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="contact_no">Contact No.</label>
                     </div>
                     <div class="col-xs-6">
                        <input style="height:27px;padding-bottom:2%;font-size:12px" type="text" class="form-control form_data" id="contact_no" name="contact_no" value="{{ $supplier->owner_contact ?? '' }}" placeholder="">
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="contact_email">Email address</label>
                     </div>
                     <div class="col-xs-6">
                        <input style="height:27px;padding-bottom:2%;font-size:12px" type="text" id="contact_email" class="form-control form_data" name="contact_email" value="{{ $supplier->owner_email ?? '' }}" placeholder="">
                     </div>
                  </div>
                  <!--------- NAVIGATION  ICON------- -->
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-md-9 padding_0">
                        <a style="margin-left:35.5%; padding: 1px 14px 8px;" href="" class="btn btn-primary btn-join next_to_additional_info company_basic_info_submitter" data-current_active_tab="#basic_info" data-target_navigation="#aditional_info"><span class="confirmation_text">SAVE</span></a>
                     </div>
                  </div>
               </div>
               <!--------TRADE INFO CONTENT SECTION------- -->
               <div role="tabpanel" class="tab-pane" id="aditional_info">
                  <input type="hidden" name="submitted_form" class="form_data" value="trade_info" >
                  <div>
                     <ul id="trade_info_errors" style="padding: 5px 25px; color: red; font-weight: bold;">
                           
                     </ul>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:4%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">Total Annual Sales Volume</label>
                     </div>
                     <div class="col-xs-6">
                        <select name="anual_sales_volume" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                           <option value="0">--please select--</option>
                           @foreach($total_anual_sales_volume as $k)
                           @if($prev_trade_info)
                           @if($prev_trade_info->anual_sales_volume == (int)$k->id)
                           <option value="{{ $k->id }}" selected>{{ $k->value }} </option>
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Export Percentage">Export Percentage</label>
                     </div>
                     <div class="col-xs-6">
                        <select name="export_percentage" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                           <option value="0">--please select--</option>
                           @foreach($export_percentage as $k)
                           @if($prev_trade_info)
                           @if($prev_trade_info->export_percentage == $k->id)
                           <option value="{{ $k->id }}" selected>{{ $k->value }} </option>
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="col-md-3 text-right padding_0">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">Main Markets and Distribution:</label>
                     </div>
                     <div class="col-md-8">
                        <div class="col-md-12 padding_0 ">
                           <div style="width:100%; height: 20px; margin-top: 10px" class="progress">
                              <div class="progress-bar progress-bar-success main_market_bar" role="progressbar" aria-valuenow="70"
                                 aria-valuemin="0" aria-valuemax="100" style="/*width:20%*/">
                                 <!-- <span class="sr-only">20% Complete</span> -->
                                 <span class="current_total">( 0% )</span>
                              </div>
                           </div>
                           <div class="dist_error_show text-danger"><b>Main Markets and Distribution should not be more than 100%</b><br><br></div>
                        </div>
                        <div class="col-md-12 padding_0">
                           @php
                           $main_market_distribution_id = 0;
                           $prev_market_distribution_value = "";
                           @endphp
                           @foreach($main_market_destribution as $v)
                           @if(count($market_distribution)>0)
                           @foreach($market_distribution as $m)
                           @if($m->main_market_zone == $v->id)
                           @php
                           $main_market_distribution_id = $m->id;
                           $prev_market_distribution_value= $m->distribution_value;
                           break;
                           @endphp
                           @else
                           @php
                           $main_market_distribution_id = 0;
                           $prev_market_distribution_value = "";
                           @endphp
                           @endif
                           @endforeach
                           <div class="col-md-4 padding_0">
                              <input type="hidden" name="main_market_zone[]" class="form_data" value="{{ $v->id }}">
                              <input type="hidden" name="market_distribution_id[]" class="form_data" value="{{ $main_market_distribution_id }}">
                              <table style="margin-bottom:0%" class="table">
                                 <tbody>
                                    <tr>
                                       <td style="padding:0%;width:21%;"><input type="text" value="{{ $prev_market_distribution_value }}" class="form-control form_data check_number" style="height:25px;font-size:10px;padding-left:2%;padding-right:1%;border:1px solid #0087CF" name="distribution_value[]"/></td>
                                       <td style="font-size:10px">% {{ $v->value }}</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           @else
                           <div class="col-md-4 padding_0">
                              <input type="hidden" name="main_market_zone[]" class="form_data" value="{{ $v->id }}">
                              <input type="hidden" name="market_distribution_id[]" class="form_data" value="{{ $main_market_distribution_id }}">
                              <table style="margin-bottom:0%" class="table">
                                 <tbody>
                                    <tr>
                                       <td style="padding:0%;width:21%;"><input type="text" class="form-control form_data check_number" style="height:25px;font-size:10px;padding-left:2%;padding-right:1%;border:1px solid #0087CF" name="distribution_value[]" value="0" /></td>
                                       <td style="font-size:10px">% {{ $v->value }}</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           @endif
                           @endforeach
                        </div>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:3%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">Year when your company started exporting:</label>
                     </div>
                     <div class="col-xs-6">
                        <select name="year_of_exporting" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                           <option value="0">--please select--</option>
                           @php
                           $y=date("Y")+1;
                           @endphp
                           @for($i=1990;$i<$y;$i++)
                           @if($prev_trade_info)
                           @if($prev_trade_info->year_of_exporting == $i)
                           <option value="{{ $i}}" selected>{{ $i}}</option>
                           @else
                           <option value="{{ $i}}">{{ $i}}</option>
                           @endif
                           @else
                           <option value="{{ $i}}">{{ $i}}</option>
                           @endif
                           @endfor
                        </select>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:3%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">Add customer details:</label>
                     </div>
                     <div class="col-xs-6">
                        @php
                        $is_checked = "false";
                        @endphp
                        @if($prev_trade_info)
                        @if($prev_trade_info->add_customer == 1)
                        <input type="radio" name="add_customer" class="form_data" checked value="1"/> Yes
                        <input type="radio" name="add_customer" class="form_data"  value="0"/> No
                        @else
                        <input type="radio" name="add_customer" class="form_data" value="1"/> Yes
                        <input type="radio" name="add_customer" class="form_data" checked value="0"/> No
                        @endif
                        @else
                        <input type="radio" name="add_customer" class="form_data"  value="1"/> Yes
                        <input type="radio" name="add_customer" class="form_data" checked value="0"/> No
                        @endif
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:2%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">No. of Employees in Trade Department:</label>
                     </div>
                     <div class="col-xs-6">
                        <select name="no_of_emp_trade_dept" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                           <option value="0">--please select--</option>
                           @foreach($total_employe_tradedepertment as $k)
                           @if($prev_trade_info)
                           @if($prev_trade_info->no_of_emp_trade_dept == $k->id)
                           <option value="{{ $k->id }}" selected>{{ $k->value }} </option>
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:2%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">Are you able to source across multiple industries?:</label>
                     </div>
                     <div class="col-xs-6">
                        @php
                        $is_checked = "false";
                        @endphp
                        @if($prev_trade_info)
                        @if($prev_trade_info->source_across_multiple_industries == 1)
                        <input type="radio" name="has_multiple_industries" class="form_data" checked value="1"/> Yes
                        <input type="radio" name="has_multiple_industries" class="form_data"  value="0"/> No
                        @else
                        <input type="radio" name="has_multiple_industries" class="form_data" value="1"/> Yes
                        <input type="radio" name="has_multiple_industries" class="form_data" checked value="0"/> No
                        @endif
                        @else
                        <input type="radio" name="has_multiple_industries" class="form_data"  value="1"/> Yes
                        <input type="radio" name="has_multiple_industries" class="form_data" checked value="0"/> No
                        @endif
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:2%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">No. of R & D Staff:</label>
                     </div>
                     <div class="col-xs-6">
                        <select name="no_rd_staff" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                           <option value="0">--please select--</option>
                           @foreach($no_of_rd_staf as $k)
                           @if($prev_trade_info)
                           @if($prev_trade_info->no_rd_staff == $k->id)
                           <option value="{{ $k->id }}" selected>{{ $k->value }} </option>
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:2%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">No. of QC Staff:</label>
                     </div>
                     <div class="col-xs-6">
                        <select name="no_qc_staff" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                           <option value="0">--please select--</option>
                           @foreach($no_of_qc_staff as $k)
                           @if($prev_trade_info)
                           @if($prev_trade_info->no_qc_staff == $k->id)
                           <option value="{{ $k->id }}" selected>{{ $k->value }} </option>
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           {{-- 
                           <option value="{{ $k->id }}">{{ $k->value }}</option>
                           --}}
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:2%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">Nearest Port:</label>
                     </div>
                     <div class="col-xs-6">
                        @if($prev_trade_join_info)
                        @php
                        $nearest_port_arr = explode(',',$prev_trade_join_info->nearest_port);
                        @endphp
                        @else
                        @php
                        $nearest_port_arr = ['','',''];
                        @endphp
                        @endif
                        <div class="col-md-4 padding_left_0">
                           <input style="height:27px;padding-bottom:5%;font-size:12px" type="text"  class="form-control form_data" name="nearest_port[]" value="{{ ($nearest_port_arr[0]) ? $nearest_port_arr[0]:null }}" >
                        </div>
                        <div class="col-md-4">
                           <input style="height:27px;padding-bottom:5%;font-size:12px" type="text" class="form-control form_data" name="nearest_port[]" value="{{ ($nearest_port_arr[1]) ? $nearest_port_arr[1]:null }}" >
                        </div>
                        <div class="col-md-4 padding_right_0">
                           <input style="height:27px;padding-bottom:5%;font-size:12px" type="text" class="form-control form_data" name="nearest_port[]" value="{{ ($nearest_port_arr[2]) ? $nearest_port_arr[2]:null }}">
                        </div>
                        <p class="text-muted" style="font-size:10px;">One port name per box.</p>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:2%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">Average Lead Time:</label>
                     </div>
                     <div class="col-xs-6">
                        <div class="col-md-4 padding_0">
                           @php
                           $lead_time_value = "";
                           @endphp
                           @if($prev_trade_info)
                           @php
                           $lead_time_value = $prev_trade_info->avarage_lead_time
                           @endphp
                           @endif
                           <input style="height:27px;padding-bottom:5%;font-size:12px" type="text" class="form-control form_data check_integer" name="avarage_lead_time" value="{{ $lead_time_value }}" >
                        </div>
                        <div class="col-md-8">
                           <p class="text-muted" style="font-size:13px;">Day(s)</p>
                        </div>
                        <p class="text-muted" style="font-size:10px;">Please enter the average production time. Numbers only.</p>
                     </div>
                  </div>
                  <div class="col-xs-12" style="margin-bottom:1% ;margin-top:2%">
                     <div class="col-xs-3 padding_0 text-right">
                        <label for="Company Name" class="text-muted" style="font-size:12px;font-weight:bold">Does your company have an overseas office?:</label>
                     </div>
                     <div class="col-xs-6">
                        @php
                        $has_overseas = "";
                        @endphp
                        @if($prev_trade_info)
                        @if($prev_trade_info->has_overseas_ofice == 1)
                        <input type="radio" class="form_data" name="has_overseas_ofice" checked value="1"> Yes
                        <input type="radio" class="form_data" name="has_overseas_ofice" value="0"> No
                        @else
                        <input type="radio" class="form_data" name="has_overseas_ofice" value="1"> Yes
                        <input type="radio" class="form_data" name="has_overseas_ofice" checked value="0"> No
                        @endif
                        @else
                        <input type="radio" class="form_data" name="has_overseas_ofice" value="1"> Yes
                        <input type="radio" class="form_data" name="has_overseas_ofice" value="0"> No
                        @endif
                     </div>
                  </div>
                  <div class="col-md-12 padding_0">
                     <div class="col-xs-3 padding_0 text-right">
                        <label for="Company Name" class="text-muted" style="font-size:12px;font-weight:bold">Accepted Delivery Terms:</label>
                     </div>
                     <div class="col-md-6">
                        <table class="table">
                           <tbody>
                              @if($prev_trade_join_info)
                              @php
                              $arr_delivery_terms     = explode(',',$prev_trade_join_info->accepted_delivery_terms);
                              $arr_payment_currency   = explode(',',$prev_trade_join_info->accepted_payment_currency);
                              $arr_payment_type       = explode(',',$prev_trade_join_info->accepted_payment_type);
                              $arr_language           = explode(',',$prev_trade_join_info->language_spoken);
                              @endphp
                              @else
                              @php
                              $arr_delivery_terms = [];
                              $arr_payment_currency = [];
                              $arr_payment_type = [];
                              $arr_language = [];
                              @endphp
                              @endif
                              @foreach (array_chunk($accepted_delevery_terms->all(), 3) as $values)
                              <tr>
                                 @foreach($values as $v)
                                 @php
                                 $is_checked = "";
                                 @endphp
                                 @for($i=0,$len=count($arr_delivery_terms);$i<$len;$i++)
                                 @if($v->id == $arr_delivery_terms[$i])
                                 @php
                                 $is_checked = "checked";
                                 break;
                                 @endphp
                                 @else
                                 @php
                                 $is_checked = "";
                                 @endphp
                                 @endif
                                 @endfor
                                 <td style="padding-top:0%"><label for=""><input class="form_data" type="checkbox" {{ $is_checked }} value="{{ $v->id }}" name="delivery_terms[]"/>&nbsp;<span style="dispaly:inline-block;margin-top:5%">{{ $v->value }}</span></label></td>
                                 @endforeach
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="col-md-12 padding_0">
                     <div class="col-xs-3 padding_0 text-right">
                        <label for="Company Name" class="text-muted" style="font-size:12px;font-weight:bold">Accepted Payment Currency:</label>
                     </div>
                     <div class="col-md-6">
                        <table class="table">
                           <tbody>
                              @foreach (array_chunk($accepted_payment_currence->all(), 3) as $values)
                              <tr>
                                 @foreach($values as $v)
                                 @php
                                 $is_checked = "";
                                 @endphp
                                 @for($i=0,$len=count($arr_payment_currency);$i<$len;$i++)
                                 @if($v->id == $arr_payment_currency[$i])
                                 @php
                                 $is_checked = "checked";
                                 break;
                                 @endphp
                                 @else
                                 @php
                                 $is_checked = "";
                                 @endphp
                                 @endif
                                 @endfor
                                 <td style="padding-top:0%"><label for=""><input type="checkbox" {{ $is_checked }} value="{{ $v->id }}" name="payment_currency[]" class="form_data">&nbsp;<span style="dispaly:inline-block;margin-top:5%">{{ $v->value }}</span></label></td>
                                 @endforeach
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="col-md-12 padding_0">
                     <div class="col-xs-3 padding_0 text-right">
                        <label for="Company Name" class="text-muted" style="font-size:12px;font-weight:bold">Accepted Payment Type:</label>
                     </div>
                     <div class="col-md-6">
                        <table class="table">
                           <tbody>
                              @foreach (array_chunk($accepted_payment_type->all(), 3) as $values)
                              <tr>
                                 @foreach($values as $v)
                                 @php
                                 $is_checked = "";
                                 @endphp
                                 @for($i=0,$len=count($arr_payment_type);$i<$len;$i++)
                                 @if($v->id == $arr_payment_type[$i])
                                 @php
                                 $is_checked = "checked";
                                 break;
                                 @endphp
                                 @else
                                 @php
                                 $is_checked = "";
                                 @endphp
                                 @endif
                                 @endfor
                                 <td style="padding-top:0%"><label for=""><input type="checkbox" {{ $is_checked }} value="{{ $v->id }}" class="form_data" name="payment_type[]">&nbsp;<span style="dispaly:inline-block;margin-top:5%">{{ $v->value }}</span></label></td>
                                 @endforeach
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="col-md-12 padding_0">
                     <div class="col-xs-3 padding_0 text-right">
                        <label for="Company Name" class="text-muted" style="font-size:12px;font-weight:bold">Language Spoken:</label>
                     </div>
                     <div class="col-md-6">
                        <table class="table">
                           <tbody>
                              @foreach (array_chunk($language->all(), 3) as $values)
                              <tr>
                                 @foreach($values as $v)
                                 @php
                                 $is_checked = "";
                                 @endphp
                                 @for($i=0,$len=count($arr_language);$i<$len;$i++)
                                 @if($v->id == $arr_language[$i])
                                 @php
                                 $is_checked = "checked";
                                 break;
                                 @endphp
                                 @else
                                 @php
                                 $is_checked = "";
                                 @endphp
                                 @endif
                                 @endfor
                                 <td style="padding-top:0%"><label for=""><input class="form_data" type="checkbox" {{ $is_checked }} value="{{ $v->id }}" name="language[]">&nbsp;<span style="dispaly:inline-block;margin-top:5%">{{ $v->value }}</span></label></td>
                                 @endforeach
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <!----NAVIGATION  ICON------- -->
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-md-9 padding_0">
                        <a style="margin-left:35.5%; padding: 1px 14px 8px;" href="" class="btn btn-primary btn-join next_to_additional_info company_tab_info_submitter" data-current_active_tab="#aditional_info" data-target_navigation="#partner_factory"><span class="confirmation_text">SAVE</span></a>
                     </div>
                  </div>
               </div>
               <!--------FACTORY INFO CONTENT SECTION------- -->
               <div role="tabpanel" class="tab-pane" id="partner_factory">
                  <input type="hidden" name="submitted_form" class="form_data" value="factory_info" >
                  <div>
                     <ul id="factory_info_errors" style="padding: 5px 25px; color: red; font-weight: bold;">
                        
                     </ul>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:4%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">Factory Location:</label>
                     </div>
                     <div class="col-xs-6">
                        <input style="height:27px;padding-bottom:2%;font-size:12px" type="text" class="form-control form_data" name="factory_location" value="{{ ($pre_factory_info) ? $pre_factory_info->factory_location : '' }}" placeholder="Location Of Your Factory">
                        <p style="font-size:10px;" class="text-muted">Please enter the address of your factory.</p>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">Factory size:</label>
                     </div>
                     <div class="col-xs-6">
                        <select name="factory_size" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                           <option value="0">--please select--</option>
                           @foreach($factory_size as $k)
                           @if($pre_factory_info)
                           @if($pre_factory_info->factory_size == $k->id)
                           <option value="{{ $k->id }}" selected>{{ $k->value }} </option>
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">Contract Manufacturing:</label>
                     </div>
                     <div style="font-size:10px" class="col-xs-6">
                        @if($pre_factory_info)
                        <input type="hidden" class="pre_contract_manufacturing" value="{{ $pre_factory_info->contact_manufacturing }}" id="">
                        @endif
                        <input type="checkbox" name="contact_manufacturing[]" value="1" class="form_data"> OEM Service Offere 
                        <input type="checkbox" name="contact_manufacturing[]" class="form_data"  value="2"> Design Service Offer
                        <input type="checkbox" name="contact_manufacturing[]" class="form_data" value="3"> Buyer Service Offer
                        <div style="margin-top:2%" class="col-md-12 padding_0">
                           <div class="col-xs-4 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:12px;">OEM Experience:</label>
                           </div>
                           <div class="col-xs-6">
                              <input type="text" value="{{ ($pre_factory_info) ? $pre_factory_info->oem_experience : ''  }}" class="form-control form_data"  name="orm_experience" style="height:27px;padding-bottom:2%;font-size:12px">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">No. of QC Staff:</label>
                     </div>
                     <div class="col-xs-6">
                        <select name="no_qc_staff" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                           <option value="0">--please select--</option>
                           @foreach($no_of_qc_staff as $k)
                           @if($pre_factory_info)
                           @if($pre_factory_info->no_of_qc_staff == $k->id)
                           <option value="{{ $k->id }}" selected>{{ $k->value }} </option>
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">No. of R & D Staff:</label>
                     </div>
                     <div class="col-xs-6">
                        <select name="no_rd_staff" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                           <option value="0">--please select--</option>
                           @foreach($no_of_rd_staf as $k)
                           @if($pre_factory_info)
                           @if($pre_factory_info->no_of_rd_staf == $k->id)
                           <option value="{{ $k->id }}" selected>{{ $k->value }} </option>
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">No. of Production Lines:</label>
                     </div>
                     <div class="col-xs-6">
                        <select name="production_line" id="" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                           <option value="0">--Please Select--</option>
                           @php
                           $production_line = ($pre_factory_info) ? $pre_factory_info->no_of_production_line : null;
                           @endphp
                           @for($i=0;$i<11;$i++)
                           @if($production_line == $i){
                           <option value="{{ $i }}" selected>{{ $i }}</option>
                           @else
                           <option value="{{ $i}}">{{ $i }}</option>
                           @endif
                           @endfor
                           <option value="11">More than 10</option>
                        </select>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">Annual Output Value:</label>
                     </div>
                     <div class="col-xs-6">
                        <select name="anual_value" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                           <option value="0">--please select--</option>
                           @foreach(generate_list(20) as $k)
                           @if($pre_factory_info)
                           @if($pre_factory_info->anual_value == $k->id)
                           <option value="{{ $k->id }}" selected>{{ $k->value }} </option>
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           @else
                           <option value="{{ $k->id }}">{{ $k->value }} </option>
                           @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-xs-3 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold" class="text-muted" for="Company Name">Add information about your annual production capacity?:</label>
                     </div>
                     <div class="col-xs-6">
                        @if($pre_factory_info)
                        @if($pre_factory_info->has_more_anual_production_capacity == 1)
                        <input type="radio" name="has_more_anual_production_capacity" class="form_data" checked value="1"> Yes.
                        <input type="radio" name="has_more_anual_production_capacity" class="form_data" value="0"> NO.
                        @else
                        <input type="radio" name="has_more_anual_production_capacity" class="form_data"  value="1"> Yes.
                        <input type="radio" name="has_more_anual_production_capacity" class="form_data" checked value="0"> NO.
                        @endif
                        @else
                        <input type="radio" name="has_more_anual_production_capacity" class="form_data" value="1"> Yes.
                        <input type="radio" name="has_more_anual_production_capacity" class="form_data" value="0"> NO.
                        @endif
                     </div>
                  </div>
                  <!----NAVIGATION  ICON------- -->
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-md-9 padding_0">
                        <a style="margin-left:35.5%;    padding: 1px 14px 8px;" href="" class="btn btn-primary btn-join next_to_additional_info company_tab_info_submitter" data-current_active_tab="#partner_factory" data-target_navigation="#company_introduction"><span class="confirmation_text">SAVE</span></a>
                     </div>
                  </div>
               </div>
               <!--------COMPANY INTRODUCTION CONTENT SECTION------- -->
               <div role="tabpanel" class="tab-pane" id="company_introduction">
                  <input type="hidden" name="submitted_form" class="form_data" value="company_introduction_info">
                  <div>
                     <ul id="company_introduction_info_errors" style="padding: 5px 25px; color: red; font-weight: bold;">
                        
                     </ul>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:4%;height:102px" class="col-xs-12">
                     <div class="col-xs-2 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold;margin-top:25%" class="text-muted" for="Company Name">Company Logo:</label>
                     </div>
                     <div class="col-xs-7">
                        <div class="col-md-3 padding_left_0 c_logo_img_preview">
                           @if($supplier)
                           @if($supplier->company_logo)
                           @php
                           $logo_image_path = "uploads/".$supplier->company_logo;
                           @endphp
                           @else
                           @php
                           $logo_image_path = "assets/images/img_icon.jpg";
                           @endphp
                           @endif
                           @else
                           @php
                           $logo_image_path = "assets/images/img_icon.jpg";
                           @endphp
                           @endif
                           <img style="width:100%;border:1px solid #0087CF;padding:2%;height:118px" src="{{ URL::asset($logo_image_path) }}" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-9 padding_0">
                           <a href="" class="btn btn-danger btn-md" data-toggle="modal" data-target=".c_logo_upload_form">Image upload form</a>
                           <p style="font-size:10px;margin-top:4%;line-height:1px" class="text-muted">200KB max. JPEG, PNG format only. Suggested photo width and height: 80*55px.<i class="fa fa-question-circle btn text-danger"></i></p>
                        </div>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:3%" class="col-xs-12">
                     <div class="col-xs-2 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold;" class="text-muted" for="Company Name">Detailed Company Introduction:</label>
                     </div>
                     <div class="col-xs-7">
                        <textarea name="company_introduction" id="details_company_introduction" cols="30" rows="5" class="form-control form_data">{{ $supplier->description ?? '' }}</textarea>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:3%" class="col-xs-12">
                     <div class="col-xs-2 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold;" class="text-muted" for="Company Name">Services:</label>
                     </div>
                     <div class="col-xs-7">
                        <textarea name="company_services" id="company_services" cols="30" rows="5" class="form-control form_data">{{ $supplier->service ?? '' }}</textarea>
                     </div>
                  </div>
                  <div style="margin-bottom:1% ;margin-top:3%" class="col-xs-12">
                     <div class="col-xs-2 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold;" class="text-muted" for="Company Name">FAQ:</label>
                     </div>
                     <div class="col-xs-7">
                        <textarea name="company_faq" id="company_faq" cols="30" rows="5" class="form-control form_data">{{ $supplier->faq ?? '' }}</textarea>
                     </div>
                  </div>
                  <div style="margin-bottom:3% ;margin-top:4%" class="col-xs-12">
                     <div class="col-xs-2 padding_0 text-right">
                        <label style="font-size:12px;font-weight:bold;" class="text-muted" for="Company Name">Company Photo:</label>
                     </div>
                     <div class="col-xs-7">
                        <div style="border:1px solid #ddd;padding-top:4%;padding-bottom:4%" class="col-md-12">
                           <p class="text-muted" style="font-size:10px;margin-top:8%;line-height:1px">300KB max. JPEG or PNG format only. Suggested photo width and height for the new version Minisite: 225.52*244px.<i class="fa fa-question-circle btn text-danger"></i></p>
                           @php
                           $img_1 = (count($pre_company_photo)>0) ? "uploads/".$pre_company_photo[0]->image : "assets/images/img_icon.jpg";
                           $img_2 = (count($pre_company_photo)>1) ? "uploads/".$pre_company_photo[1]->image : "assets/images/img_icon.jpg";
                           $img_3 = (count($pre_company_photo)>2) ? "uploads/".$pre_company_photo[2]->image : "assets/images/img_icon.jpg";
                           @endphp
                           <div class="col-md-12">
                              <div class="col-md-4 text-center first_photo">
                                 <img style="width:100%;border:1px solid #0087CF;padding:2%;height:114px" src="{{ URL::asset($img_1) }}" class="img-responsive" alt="">
                                 <a href="" style="margin-top:2%;display:inline-block" class="btn btn-danger btn-xs c_photo_upload_btn" data-prev_id="{{ (count($pre_company_photo)>0) ? $pre_company_photo[0]->id : 0 }}" data-display_for="first_photo"  data-toggle="modal" data-target=".c_photo_upload_form"><i class="fa fa-pencil-square-o"></i></a>
                              </div>
                              <div class="col-md-4 text-center second_photo">
                                 <img style="width:100%;border:1px solid #0087CF;padding:2%;height:114px" src="{{ URL::asset($img_2) }}" class="img-responsive" alt="">
                                 <a href="" style="margin-top:2%;display:inline-block" class="btn btn-danger btn-xs c_photo_upload_btn" data-prev_id="{{ (count($pre_company_photo)>1) ? $pre_company_photo[1]->id : 0 }}"  data-display_for="second_photo" data-toggle="modal" data-target=".c_photo_upload_form"><i class="fa fa-pencil-square-o"></i></a>
                              </div>
                              <div class="col-md-4 text-center third_photo">
                                 <img style="width:100%;border:1px solid #0087CF;padding:2%;height:114px" src="{{ URL::asset($img_3) }}" class="img-responsive" alt="">
                                 <a href="" style="margin-top:2%;display:inline-block" class="btn btn-danger btn-xs c_photo_upload_btn" data-prev_id="{{ (count($pre_company_photo)>2) ? $pre_company_photo[2]->id : 0 }}"  data-display_for="third_photo" data-toggle="modal" data-target=".c_photo_upload_form"><i class="fa fa-pencil-square-o"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!----NAVIGATION  ICON------- -->
                  <div style="margin-bottom:1% ;margin-top:1%" class="col-xs-12">
                     <div class="col-md-9 padding_0">
                        <a style="margin-left:35.5%;    padding: 1px 14px 8px;" href="" class="btn btn-primary btn-join next_to_additional_info company_tab_info_submitter company_img_submitter" data-current_active_tab="#company_introduction" data-target_navigation="#certification_trademarks"><span class="confirmation_text">SAVE</span></a>
                     </div>
                  </div>
               </div>
               <!--------CERTIFICATION ADN TRADEMARKS CONTENT SECTION------- -->
               <div role="tabpanel" class="tab-pane" id="certification_trademarks">
                  <input type="hidden" name="submitted_form" class="form_data" value="certification_trademarks_info" >
                  <div>
                     <ul id="certification_trademarks_info_errors" style="padding: 5px 25px; color: red; font-weight: bold;">
                        
                     </ul>
                  </div>
                  <div class="col-md-12" style="margin-top:2.5%;border:1px solid #ddd;padding: 0;">
                     <ul class="nav nav-tabs list-inline" role="tablist" style="margin:0%;height:55px">
                        <li role="presentation" class="active text-center" style="border-right:1px solid #ddd;padding-bottom:0%;"><a class="certification_tab hvr-underline-from-center" role="tab" data-toggle="tab" href="#add_certificatons" style="line-height:33px;font-size:13px">Certifications/Test Report</a></li>
                        <li role="presentation" class="text-center" style="border-right:1px solid #ddd;padding-bottom:0%;"><a class="certification_tab hvr-underline-from-center" role="tab" data-toggle="tab" href="#add_awards" style="line-height:33px;font-size:13px">Honor &amp; Award Certifications</a></li>
                        <li role="presentation" class="text-center" style="border-right:1px solid #ddd;padding-bottom:0%;"><a class="certification_tab hvr-underline-from-center" role="tab" data-toggle="tab" href="#add_patents" style="line-height:33px;font-size:13px">Patents</a></li>
                        <li role="presentation" class="text-center" style="border-right:1px solid #ddd;padding-bottom:0%;"><a class="certification_tab hvr-underline-from-center" role="tab" data-toggle="tab" href="#add_trademarks" style="line-height:33px;font-size:13px">Trademarks</a></li>
                     </ul>
                  </div>
                  <div style="margin-top:2.5%;border:1px solid #ddd;padding-top:1%;padding-bottom:0%" class="col-md-12">
                     <div class="col-md-11">
                        <p class="text-muted" style="font-size:12px;line-height:16px"><i class="fa fa-exclamation-triangle"></i>&nbsp; If your company does not have any certifications, trademarks or patents, the following fields are not required.</p>
                     </div>
                     <div class="col-md-1">
                        <a href="#"><i class="fa fa-times text-danger pull-right hide_certification_warning"></i></a>
                     </div>
                  </div>
                  <!-------ADD CERTIFICATION SECTION --------- -->
                  <section id="add_certificatons" class="in_visible BdtdcCertificationImage">
                     <input type="hidden" name="submitted_form" class="form_data" value="add_certification">
                     <div style="margin-top:1%" class="col-md-12 padding_0">
                        <div class="col-md-3 padding_0">
                           <h4 style="color:#0087CF;margin-top:1%;font-size:16px">Add Certification</h4>
                        </div>
                        <div class="col-md-9 text-right">
                           <!-- <p class="text-muted" style="font-size:10px;margin-top:0%;line-height:1px">Where will the certifications be displayed? <i class="fa fa-question-circle btn text-danger"></i></p> -->
                        </div>
                     </div>
                     <div style="margin-top:0%;border:1px solid #ddd;padding-top:1%;padding-bottom:1%" class="col-md-12">
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Type of Certification:</label>
                           </div>
                           <div class="col-xs-6">
                              <select name="type" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                                 <option value="0">--please select--</option>
                                 @if($pre_certification)
                                 @if($pre_certification->type == 22)
                                 <option value="22" selected>Management System Certifications </option>
                                 <option value="23">Product Certifications/Testing Reports </option>
                                 @else
                                 <option value="22">Management System Certifications </option>
                                 <option value="23" selected >Product Certifications/Testing Reports </option>
                                 @endif
                                 @else
                                 <option value="22">Management System Certifications </option>
                                 <option value="23">Product Certifications/Testing Reports </option>
                                 @endif
                              </select>
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Reference no:</label>
                           </div>
                           <div class="col-xs-6">
                              <input type="text" placeholder="Type reference number" value="{{ ($pre_certification) ? $pre_certification->reference_no : '' }}" name="reference_no" class="form-control form_data" style="height:27px;padding-bottom:2%;font-size:12px">
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Name:</label>
                           </div>
                           <div class="col-xs-6">
                              <select name="name" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                                 @if($pre_certification)
                                 @php
                                 $name = BdtdcFormValue::where('id',$pre_certification->name)->first();
                                 @endphp
                                 <option value="{{ $name->id ?? '' }}">{{ $name->value ?? '' }}</option>
                                 @else
                                 <option value="0">---Please Select---</option>
                                 @endif
                              </select>
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Issued By:</label>
                           </div>
                           <div class="col-xs-6">
                              <select name="issued_by" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                                 <option value="0">--please select--</option>
                                 @foreach(generate_list(21) as $k)
                                 @if($pre_certification)
                                 @if($pre_certification->issued_by == $k->id)
                                 <option value="{{ $k->id }}" selected>{{ $k->value }} </option>
                                 @else
                                 <option value="{{ $k->id }}">{{ $k->value }} </option>
                                 @endif
                                 @else
                                 <option value="{{ $k->id }}">{{ $k->value }} </option>
                                 @endif
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Start Date (validity period):</label>
                           </div>
                           <div class="col-xs-6">
                              <input type="text" placeholder="mm/dd/yyyy" value="{{ ($pre_certification) ? $pre_certification->start_date : '' }}" name="start_date" class="form-control form_data" style="height:27px;padding-bottom:2%;font-size:12px">
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">End Date (validity period):</label>
                           </div>
                           <div class="col-xs-6">
                              <input type="text" placeholder="mm/dd/yyyy" value="{{ ($pre_certification) ? $pre_certification->end_date : '' }}" name="end_date" class="form-control form_data" style="height:27px;padding-bottom:2%;font-size:12px">
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Images</label>
                           </div>
                           <div class="col-xs-6">
                              <div class="col-md-12 padding_0">
                                 <a href="" data-toggle="modal" data-target=".all_certification_image_modal_box" class="btn btn-xs btn-danger all_certification_form_opener" data-img_for="App\BdtdcCertificationImage" data->Upload Form</a>
                              </div>
                              <p class="text-muted" style="font-size:10px;margin-top:6%;line-height:1px">300KB Max. JPEG or PNG format only.<i class="fa fa-question-circle btn text-danger"></i></p>
                              <div style="border:1px solid #ddd;padding-top:3%;padding-bottom:3%" class="col-md-12 all_certification_preview_img">
                                 @php
                                 $prev_img = BdtdcCertificationImage::where('company_id',$company_id)->get();
                                 @endphp
                                 @if(count($prev_img)>0)
                                 @foreach ($prev_img as $img)
                                 <div class="col-md-4 text-center">
                                    <img style="width:100%;border:1px solid #0087CF;padding:2%;height:115px" src="{{ URL::asset('/uploads/'.$img->image) }}" class="img-responsive" alt="">
                                    <a href="#" data-id_to_delete="{{ $img->id }}" data-modal="App\BdtdcCertificationImage" style="width:37%;margin-top:2%" class="btn btn-danger btn-xs delete_img"><i class="fa fa-times"></i></a>
                                 </div>
                                 @endforeach  
                                 @else
                                 <div class="col-md-4 default_icon">
                                    <img style="width:100%;border:1px solid #0087CF;padding:2%;height:115px" src="{{ URL::asset('assets/images/img_icon.jpg') }}" class="img-responsive" alt="">
                                 </div>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Scope:</label>
                           </div>
                           <div class="col-xs-6">
                              <textarea name="scope" id="" cols="30" rows="2" class="form-control form_data">{{ ($pre_certification) ? $pre_certification->scope : '' }}</textarea>
                              <p class="text-muted" style="font-size:10px;margin-top:1%;line-height:13px">Please enter the products and relevant audit information the certificate covers, e.g. the certificate verifies the production of paper packaging products (excluding the printing capabilities if there are printed graphics on the paper packaging).<i class="fa fa-question-circle btn text-danger"></i></p>
                           </div>
                        </div>
                        <div style="margin-top:1%;margin-bottom:1%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                           </div>
                           <div class="col-xs-6">
                              <input type="submit" value="Save" class="btn btn-primary btn-join certification_submit_btn" data-section_id="#add_certificatons">
                           </div>
                        </div>
                     </div>
                  </section>
                  <!-------ADD AWARD SECTION --------- -->
                  <section id="add_awards"  class="in_visible BdtdcHonorImage">
                     <input type="hidden" name="submitted_form" class="form_data" value="add_awards">
                     <div style="margin-top:1%" class="col-md-12 padding_0">
                        <div class="col-md-4 padding_0">
                           <h4 style="color:#0087CF;margin-top:1%;font-size:16px">Add an Award or Certification</h4>
                        </div>
                        <div class="col-md-8 text-right">
                           <!-- <p class="text-muted" style="font-size:10px;margin-top:0%;line-height:1px">Where will the certifications be displayed? <i class="fa fa-question-circle btn text-danger"></i></p> -->
                        </div>
                     </div>
                     <div style="margin-top:0%;border:1px solid #ddd;padding-top:1%;padding-bottom:1%" class="col-md-12">
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Name:</label>
                           </div>
                           <div class="col-xs-6">
                              <input type="text" placeholder="Award/Certificate Name" value="{{ ($pre_aword) ? $pre_aword->name: '' }}" name="name" class="form-control form_data" style="height:27px;padding-bottom:2%;font-size:12px">
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Issued By:</label>
                           </div>
                           <div class="col-xs-6">
                              <select name="issued_by" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                                 <option value="0">--please select--</option>
                                 @foreach(generate_list(21) as $k)
                                 @if($pre_aword)
                                 @if($pre_aword->issued_by == $k->id)
                                 <option value="{{ $k->id }}" selected>{{ $k->value }} </option>
                                 @else
                                 <option value="{{ $k->id }}">{{ $k->value }} </option>
                                 @endif
                                 @else
                                 <option value="{{ $k->id }}">{{ $k->value }} </option>
                                 @endif
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Start Date (validity period):</label>
                           </div>
                           <div class="col-xs-6">
                              <input type="text" placeholder="mm/dd/yyyy" value="{{ ($pre_aword) ? $pre_aword->start_date: '' }}" name="start_date" class="form-control form_data" style="height:27px;padding-bottom:2%;font-size:12px">
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">End Date (validity period):</label>
                           </div>
                           <div class="col-xs-6">
                              <input type="text" placeholder="mm/dd/yyyy" value="{{ ($pre_aword) ? $pre_aword->end_date: '' }}" name="end_date" class="form-control form_data" style="height:27px;padding-bottom:2%;font-size:12px">
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Images</label>
                           </div>
                           <div class="col-xs-6">
                              <div class="col-md-12 padding_0">
                                 <a href="" data-toggle="modal" data-target=".all_certification_image_modal_box" class="btn btn-xs btn-danger all_certification_form_opener" data-img_for="App\BdtdcHonorImage" data->Upload Form</a>
                              </div>
                              <p class="text-muted" style="font-size:10px;margin-top:6%;line-height:1px">300KB Max. JPEG or PNG format only.<i class="fa fa-question-circle btn text-danger"></i></p>
                              <div style="border:1px solid #ddd;padding-top:3%;padding-bottom:3%" class="col-md-12 all_certification_preview_img">
                                 @php
                                 $prev_img = BdtdcHonorImage::where('company_id',$company_id)->get();
                                 @endphp
                                 @if(count($prev_img)>0)
                                 @foreach ($prev_img as $img)
                                 <div class="col-md-4 text-center">
                                    <img style="width:100%;border:1px solid #0087CF;padding:2%;height:115px" src="{{ URL::asset('uploads/'.$img->image) }}" class="img-responsive" alt="">
                                    <a href="#" data-id_to_delete="{{ $img->id }}" data-modal="App\BdtdcHonorImage" style="width:37%;margin-top:2%" class="btn btn-danger btn-xs delete_img"><i class="fa fa-times"></i></a>
                                 </div>
                                 @endforeach 
                                 @else
                                 <div class="col-md-4 default_icon">
                                    <img style="width:100%;border:1px solid #0087CF;padding:2%;height:115px" src="{{ URL::asset('assets/images/img_icon.jpg') }}" class="img-responsive" alt="">
                                 </div>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Scope:</label>
                           </div>
                           <div class="col-xs-6">
                              <textarea name="scope" id="" cols="30" rows="2" class="form-control form_data">{{ ($pre_aword) ? $pre_aword->scope : '' }}</textarea>
                              <p class="text-muted" style="font-size:10px;margin-top:1%;line-height:13px">Please enter the products and relevant audit information the certificate covers, e.g. the certificate verifies the production of paper packaging products (excluding the printing capabilities if there are printed graphics on the paper packaging).<i class="fa fa-question-circle btn text-danger"></i></p>
                           </div>
                        </div>
                        <div style="margin-top:1%;margin-bottom:1%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                           </div>
                           <div class="col-xs-6">
                              <input type="submit" value="Save" data-section_id="#add_awards" class="btn btn-primary btn-join certification_submit_btn">
                           </div>
                        </div>
                     </div>
                  </section>
                  <!-------ADD PATENTS SECTION --------- -->
                  <section id="add_patents" class="in_visible BdtdcPatentImage">
                     <input type="hidden" class="form_data" name="submitted_form" value="add_patents">
                     <div style="margin-top:1%" class="col-md-12 padding_0">
                        <div class="col-md-3 padding_0">
                           <h4 style="color:#0087CF;margin-top:1%;font-size:16px">Add a Patent</h4>
                        </div>
                        <div class="col-md-9 text-right">
                        </div>
                     </div>
                     <div style="margin-top:0%;border:1px solid #ddd;padding-top:1%;padding-bottom:1%" class="col-md-12">
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">No. of Patent:</label>
                           </div>
                           <div class="col-xs-6">
                              <input type="text" placeholder="Patent No" value="{{ ($pre_patent) ? $pre_patent->patent_no : '' }}" name="patent_no" class="form-control form_data" style="height:27px;padding-bottom:2%;font-size:12px">
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Patent Name:</label>
                           </div>
                           <div class="col-xs-6">
                              <input type="text" placeholder="Patent Name" value="{{ ($pre_patent) ? $pre_patent->patent_name : '' }}" name="patent_name" class="form-control form_data" style="height:27px;padding-bottom:2%;font-size:12px">
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Type of Patent:</label>
                           </div>
                           <div class="col-xs-6">
                              <select name="type_of_patent" class="form-control form_data" style="height:28px;padding-bottom:1%;font-size:12px;padding-top:0%">
                                 <option value="0">--please select--</option>
                                 @foreach(generate_list(24) as $k)
                                 @if($pre_patent)
                                 @if($pre_patent->patent_type == $k->id)
                                 <option value="{{ $k->id }}" selected>{{ $k->value }} </option>
                                 @else
                                 <option value="{{ $k->id }}">{{ $k->value }} </option>
                                 @endif
                                 @else
                                 <option value="{{ $k->id }}">{{ $k->value }} </option>
                                 @endif
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Start Date (validity period):</label>
                           </div>
                           <div class="col-xs-6">
                              <input type="text" placeholder="mm/dd/yyyy" value="{{ ($pre_patent) ? $pre_patent->start_date : '' }}" name="start_date" class="form-control form_data" style="height:27px;padding-bottom:2%;font-size:12px">
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">End Date (validity period):</label>
                           </div>
                           <div class="col-xs-6">
                              <input type="text" placeholder="mm/dd/yyyy" value="{{ ($pre_patent) ? $pre_patent->end_date : '' }}" name="end_date" class="form-control form_data" style="height:27px;padding-bottom:2%;font-size:12px">
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Images</label>
                           </div>
                           <div class="col-xs-6">
                              <div class="col-md-12 padding_0">
                                 <a href="" data-toggle="modal" data-target=".all_certification_image_modal_box" class="btn btn-xs btn-danger all_certification_form_opener" data-img_for="App\BdtdcPatentImage" data->Upload Form</a>
                              </div>
                              <p class="text-muted" style="font-size:10px;margin-top:6%;line-height:1px">300KB Max. JPEG or PNG format only.<i class="fa fa-question-circle btn text-danger"></i></p>
                              <div style="border:1px solid #ddd;padding-top:3%;padding-bottom:3%" class="col-md-12 all_certification_preview_img">
                                 @php
                                 $prev_img = BdtdcPatentImage::where('company_id',$company_id)->get();
                                 @endphp
                                 @if(count($prev_img)>0)
                                 @foreach ($prev_img as $img)
                                 <div class="col-md-4 text-center">
                                    <img style="width:100%;border:1px solid #0087CF;padding:2%;height:115px" src="{{ URL::asset('uploads/'.$img->image) }}" class="img-responsive" alt="">
                                    <a href="#" data-id_to_delete="{{ $img->id }}" data-modal="App\BdtdcPatentImage" style="width:37%;margin-top:2%" class="btn btn-danger btn-xs delete_img"><i class="fa fa-times"></i></a>
                                 </div>
                                 @endforeach  
                                 @else
                                 <div class="col-md-4 default_icon">
                                    <img style="width:100%;border:1px solid #0087CF;padding:2%;height:115px" src="{{ URL::asset('assets/images/img_icon.jpg') }}" class="img-responsive" alt="">
                                 </div>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Scope:</label>
                           </div>
                           <div class="col-xs-6">
                              <textarea name="scope" id="" cols="30" rows="2" class="form-control form_data">{{ ($pre_patent) ? $pre_patent->scope : '' }}</textarea>
                              <p class="text-muted" style="font-size:10px;margin-top:1%;line-height:13px">Please enter the products and relevant audit information the certificate covers, e.g. the certificate verifies the production of paper packaging products (excluding the printing capabilities if there are printed graphics on the paper packaging).<i class="fa fa-question-circle btn text-danger"></i></p>
                           </div>
                        </div>
                        <div style="margin-top:1%;margin-bottom:1%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                           </div>
                           <div class="col-xs-6">
                              <input type="submit" value="Save" data-section_id="#add_patents" class="btn btn-primary btn-join form_data certification_submit_btn">
                           </div>
                        </div>
                     </div>
                  </section>
                  <!-------ADD TRADEMARKS SECTION --------- -->
                  <section id="add_trademarks" class="in_visible BdtdcTrademarksImage">
                     <input type="hidden" class="form_data" name="submitted_form" value="add_trademarks">
                     <div style="margin-top:1%" class="col-md-12 padding_0">
                        <div class="col-md-3 padding_0">
                           <h4 style="color:#0087CF;margin-top:1%;font-size:16px">Add a trademark</h4>
                        </div>
                        <div class="col-md-9 text-right">
                        </div>
                     </div>
                     <div style="margin-top:0%;border:1px solid #ddd;padding-top:1%;padding-bottom:1%" class="col-md-12">
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Registration/Filing No:</label>
                           </div>
                           <div class="col-xs-6">
                              <input type="text" placeholder="Registration No" value="{{ ($pre_trademarks) ? $pre_trademarks->registration_no : '' }}" name="registration_no" class="form-control form_data" style="height:27px;padding-bottom:2%;font-size:12px">
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Start Date (validity period):</label>
                           </div>
                           <div class="col-xs-6">
                              <input type="text" placeholder="mm/dd/yyyy" value="{{ ($pre_trademarks) ? $pre_trademarks->start_date : '' }}" name="start_date" class="form-control form_data" style="height:27px;padding-bottom:2%;font-size:12px">
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">End Date (validity period):</label>
                           </div>
                           <div class="col-xs-6">
                              <input type="text" placeholder="mm/dd/yyyy" value="{{ ($pre_trademarks) ? $pre_trademarks->end_date : '' }}" name="end_date" class="form-control form_data" style="height:27px;padding-bottom:2%;font-size:12px">
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Images</label>
                           </div>
                           <div class="col-xs-6">
                              <div class="col-md-12 padding_0">
                                 <a href="" data-toggle="modal" data-target=".all_certification_image_modal_box" class="btn btn-xs btn-danger all_certification_form_opener" data-img_for="App\BdtdcTrademarksImage" data->Upload Form</a>
                              </div>
                              <p class="text-muted" style="font-size:10px;margin-top:6%;line-height:1px">300KB Max. JPEG or PNG format only.<i class="fa fa-question-circle btn text-danger"></i></p>
                              <div style="border:1px solid #ddd;padding-top:3%;padding-bottom:3%" class="col-md-12 all_certification_preview_img">
                                 @php
                                 $prev_img = BdtdcTrademarksImage::where('company_id',$company_id)->get();
                                 @endphp
                                 @if(count($prev_img)>0)
                                 @foreach ($prev_img as $img)
                                 <div class="col-md-4 text-center">
                                    <img style="width:100%;border:1px solid #0087CF;padding:2%;height:115px" src="{{ URL::asset('uploads/'.$img->image) }}" class="img-responsive" alt="">
                                    <a href="#" data-id_to_delete="{{ $img->id }}" data-modal="App\BdtdcTrademarksImage" style="width:37%;margin-top:2%" class="btn btn-danger btn-xs delete_img"><i class="fa fa-times"></i></a>
                                 </div>
                                 @endforeach  
                                 @else
                                 <div class="col-md-4 default_icon">
                                    <img style="width:100%;border:1px solid #0087CF;padding:2%;height:115px" src="{{ URL::asset('assets/images/img_icon.jpg') }}" class="img-responsive" alt="">
                                 </div>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div style="margin-top:2%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                              <label for="Company Name" class="text-muted" style="font-size:11px;font-weight:bold">Scope:</label>
                           </div>
                           <div class="col-xs-6">
                              <textarea name="scope" id="" cols="30" rows="2" class="form-control form_data">{{ ($pre_trademarks) ? $pre_trademarks->scope : '' }}</textarea>
                              <p class="text-muted" style="font-size:10px;margin-top:1%;line-height:13px">Please enter the products and relevant audit information the certificate covers, e.g. the certificate verifies the production of paper packaging products (excluding the printing capabilities if there are printed graphics on the paper packaging).<i class="fa fa-question-circle btn text-danger"></i></p>
                           </div>
                        </div>
                        <div style="margin-top:1%;margin-bottom:1%" class="row">
                           <div class="col-xs-3 padding_0 text-right">
                           </div>
                           <div class="col-xs-6">
                              <input type="submit" value="Save" data-section_id="#add_trademarks" class="btn btn-primary btn-join form_data certification_submit_btn">
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </form>
      </div>
   </div>
   <hr>
</div>
<div class="modal fade c_photo_upload_form" role="dialog">
   <div class="modal-dialog container">
      <div class="modal-content row">
         <div class="modal-header col-md-12">
            <button type="button" class="close" data-dismiss="modal">&times;</button>           
            <h4 class="modal-title">Company Photo</h4>
         </div>
         <div class="modal-body col-md-12">
            <form id="company_photo_upload_form" action="{!! URL::to('user/company_photo',null) !!}" method="post" class="form" enctype="multipart/form-data">
               <input type="hidden" class="form_data" name="_token" value="{{ csrf_token() }}">          
               <input type="hidden" name="display_for" value="">           
               <input type="hidden" name="prev_id" value="0">        
               <div class="col-md-6">        
                  <input id="c_photo" type="file" name="company_photo" class="btn btn-xs form_data">        
               </div>
               <div class="col-md-6">        
                  <input type="submit" value="Submit" class="btn btn-primary btn-sm company_photo_upload_btn">          
               </div>
            </form>
            <h4 class="" style="margin-top:10%;margin-bottom:0%;line-height:8px;background:#ddd;padding-top:2%;padding-bottom:2%;padding-left:1%;font-weight:bold;">Image Preview</h4>
            <table class="table">
               <thead>
                  <tr>
                     <td>Image</td>
                     <td>Action</td>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td class="c_photo_img_preview_modal">          
                        <img style="width:45%;border:1px solid #0087CF;padding:2%;height:156px" src="{{ URL::asset('assets/images/img_icon.jpg') }}" class="img-responsive" alt="">        
                     </td>
                     <td><a href="" data-targetID="" class="btn btn-warning btn-xs c_photo_delete_btn">Delete</a></td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="modal-footer col-md-12">            
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>         
         </div>
      </div>
   </div>
</div>
<!---------------CERTIFICATION IMAGE UPLOAD MODAL FORM----------- -->         
<div class="modal fade c_logo_upload_form" role="dialog">
   <div class="modal-dialog container">
      <div class="modal-content row">
         <div class="modal-header col-md-12">
            <button type="button" class="close" data-dismiss="modal">&times;</button>           
            <h4 class="modal-title">Add/Change Company Logo</h4>
         </div>
         <div class="modal-body col-md-12">
            <form id="company_logo_upload_form" action="{!! URL::to('user/company_logo',null) !!}" method="post" class="form" enctype="multipart/form-data">
               <input type="hidden" class="form_data" name="_token" value="{{ csrf_token() }}">          
               <input type="hidden" name="img_for" value="certification">        
               <div class="col-md-6">        
                  <input id="c_logo" type="file" name="company_logo" class="btn btn-xs form_data">          
               </div>
               <div class="col-md-6">        
                  <input type="submit" value="Submit" class="btn btn-primary btn-sm company_logo_upload_btn">           
               </div>
            </form>
            <h4 class="" style="margin-top:10%;margin-bottom:0%;line-height:8px;background:#ddd;padding-top:2%;padding-bottom:2%;padding-left:1%;font-weight:bold;">Image Preview</h4>
            <table class="table">
               <thead>
                  <tr>
                     <td>Image</td>
                     <td class="text-right">Action</td>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td class="c_logo_img_preview_modal">           
                        <img style="border:1px solid #0087CF;padding:2%;height:156px" src="{{ URL::asset($logo_image_path) }}" class="img-responsive" alt="">          
                     </td>
                     <td>
                        <div class="text-right"><a class="btn btn-warning btn-xs delete_company_logo">Delete</a></div>
                        <!-- <div class="text-right"><button type="button" class="btn btn-success" data-dismiss="modal">Done</button></div> -->       
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="modal-footer col-md-12">            
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>         
         </div>
      </div>
   </div>
</div>
<!---------------ALL CERTIFICATION IMG UPLOAD MODAL;--------------- -->       
<div class="modal fade all_certification_image_modal_box" role="dialog">
   <div class="modal-dialog container">
      <div class="modal-content row">
         <div class="modal-header col-md-12">
            <button type="button" class="close" data-dismiss="modal">&times;</button>           
            <h4 class="modal-title">Upload Image (max: 3)</h4>
         </div>
         <div class="modal-body col-md-12">
            <form id="all_certification_image_submit_form" action="{!! URL::to('user/all_certification_image',null) !!}" method="post" class="form" enctype="multipart/form-data">
               <input type="hidden" class="form_data" name="_token" value="{{ csrf_token() }}">          
               <input type="hidden" name="img_for" value="">         
               <input type="hidden" name="prev_img_id" value="0">          
               <div class="col-md-6">        
                  <input id="all_certification_image_input" type="file" name="company_logo" class="btn btn-xs form_data">           
               </div>
               <div class="col-md-6">        
                  <input type="submit" value="Submit" class="btn btn-primary btn-sm all_certification_image_submit_btn">            
               </div>
            </form>
            <h4 class="" style="margin-top:10%;margin-bottom:0%;line-height:8px;background:#ddd;padding-top:2%;padding-bottom:2%;padding-left:1%;font-weight:bold;">Image Preview</h4>
            <table class="table all_certification_image_table">
               <thead>
                  <tr>
                     <td class="text-center">Images (Max. 3)</td>
                  </tr>
               </thead>
               <tbody class="tr_holder">
                  <tr class="default_icon">
                     <td class="text-center">            
                        <img style="width:32%;border:1px solid #0087CF;padding:2%;height:89px" src="{{ URL::asset('assets/images/img_icon.jpg') }}" class="img-responsive" alt="">         
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="modal-footer col-md-12">            
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>         
         </div>
      </div>
   </div>
</div>

<script src="{{asset('assets/global/plugins/ckeditor/ckeditor.js')}}"></script> 
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  
<script type="text/javascript">           
   CKEDITOR.replace('company_faq', {
      extraPlugins: 'uploadimage,image2',
      height: 300,
      // Upload images to a CKFinder connector (note that the response type is set to JSON).          
      uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
      // Configure your file manager integration. This example uses CKFinder 3 for PHP.         
      filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
      filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      // The following options are not necessary and are used here for presentation purposes only.          
      // They configure the Styles drop-down list and widgets to use classes.       
      stylesSet: [{
      
            name: 'Narrow image',
            type: 'widget',
            widget: 'image',
            attributes: {
               class: 'image-narrow',
            }
         },
         {
            name: 'Wide image',
            type: 'widget',
            widget: 'image',
            attributes: {
               class: 'image-wide',
            }
         }
      ],
      // Load the default contents.css file plus customizations for this sample.          
      contentsCss: [CKEDITOR.basePath + 'contents.css', 'assets/css/widgetstyles.css'],
      // Configure the Enhanced Image plugin to use classes instead of styles and to disable the            
      // resizer (because image size is controlled by widget styles or the image takes maximum        
      // 100% of the editor width).       
      image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
      image2_disableResizer: true
   });

   CKEDITOR.replace('company_services', {
      extraPlugins: 'uploadimage,image2',
      height: 300,
      // Upload images to a CKFinder connector (note that the response type is set to JSON).          
      uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
      // Configure your file manager integration. This example uses CKFinder 3 for PHP.         
      filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
      filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      // The following options are not necessary and are used here for presentation purposes only.          
      // They configure the Styles drop-down list and widgets to use classes.       
      stylesSet: [{
            name: 'Narrow image',
            type: 'widget',
            widget: 'image',
            attributes: {
               'class': 'image-narrow'
            }
         },
         {
            name: 'Wide image',
            type: 'widget',
            widget: 'image',
            attributes: {
               'class': 'image-wide'
            }
         }
      ],
      // Load the default contents.css file plus customizations for this sample.          
      contentsCss: [CKEDITOR.basePath + 'contents.css', 'assets/css/widgetstyles.css'],
      // Configure the Enhanced Image plugin to use classes instead of styles and to disable the            
      // resizer (because image size is controlled by widget styles or the image takes maximum        
      // 100% of the editor width).       
      image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
      image2_disableResizer: true
   });

   CKEDITOR.replace('details_company_introduction', {
      extraPlugins: 'uploadimage,image2',
      height: 300,
      // Upload images to a CKFinder connector (note that the response type is set to JSON).          
      uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
      // Configure your file manager integration. This example uses CKFinder 3 for PHP.         
      filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
      filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      // The following options are not necessary and are used here for presentation purposes only.          
      // They configure the Styles drop-down list and widgets to use classes.       
      stylesSet: [{
            name: 'Narrow image',
            type: 'widget',
            widget: 'image',
            attributes: {
               'class': 'image-narrow'
            }
         },
         {
            name: 'Wide image',
            type: 'widget',
            widget: 'image',
            attributes: {
               'class': 'image-wide'
            }
         }
      ],
      // Load the default contents.css file plus customizations for this sample.          
      contentsCss: [CKEDITOR.basePath + 'contents.css', 'assets/css/widgetstyles.css'],
      // Configure the Enhanced Image plugin to use classes instead of styles and to disable the            
      // resizer (because image size is controlled by widget styles or the image takes maximum        
      // 100% of the editor width).       
      image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
      image2_disableResizer: true
   });


   $(document).on({
      keyup: function(event) {
         // Allow: backspace, delete, tab, escape, and enter         
         if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
            // Allow: Ctrl+V          
            (event.ctrlKey == true && (event.which == '118' || event.which == '86')) ||
            // Allow: Ctrl+c          
            (event.ctrlKey == true && (event.which == '99' || event.which == '67')) ||
            // Allow: Ctrl+A          
            (event.keyCode == 65 && event.ctrlKey === true) ||
            // Allow: home, end, left, right         
            (event.keyCode >= 35 && event.keyCode <= 39)) {
            // let it happen, don't do anything        
            return;
         }
         var currentEl = $(this);
         var value = $(currentEl).val();
         // remove letters...        
         value = value.replace(/[^0-9.-]/g, "");
         var hasDecPlace = value.match(/\./);
         // separate integer from decimal places:            
         var pieces = value.split('.');
         var integer = pieces[0].replace('-', '');
         var decPlaces = ""
         if (pieces.length > 1) {
            pieces.shift();
            decPlaces = pieces.join('').replace('-', '');
         }
         // handle numbers greater than 12.00... :           
         if (parseInt(integer) > 100000 || parseInt(integer) === 100000 && parseInt(decPlaces) > 0) {
            integer = "100000";
            decPlaces = getZeroedDecPlaces(decPlaces);
            alert("number must be between 0.00 and 100000.00");
         } // ...and less than 0:          
         else if (parseInt(integer) < 0) {
            integer = "0";
            decPlaces = getZeroedDecPlaces(decPlaces);
            alert("number must be between 0.00 and 100000.00");
         }
         // handle more than two decimal places:       
         if (decPlaces.length > 2) {
            decPlaces = decPlaces.substr(0, 2);
            alert("number cannot have more than two decimal places");
         }
         var newVal = hasDecPlace ? integer + '.' + decPlaces : integer;
         $(currentEl).val(newVal);
      }
   }, '.check_number');
   $(document).on({
      keyup: function(event) {
         // Allow: backspace, delete, tab, escape, and enter         
         if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
            // Allow: Ctrl+V          
            (event.ctrlKey == true && (event.which == '118' || event.which == '86')) ||
            // Allow: Ctrl+c          
            (event.ctrlKey == true && (event.which == '99' || event.which == '67')) ||
            // Allow: Ctrl+A          
            (event.keyCode == 65 && event.ctrlKey === true) ||
            // Allow: home, end, left, right         
            (event.keyCode >= 35 && event.keyCode <= 39)) {
            // let it happen, don't do anything        
            return;
         }
         var o = $(this);
         o.val(o.val().replace(/[^\d]/g, ""));
         if (o.val().length > o.maxLength) {
            o.val(o.value.slice(0, o.maxLength))
         }
      }
   }, '.check_integer');
   $('.dist_error_show').hide();
   var dist_total = 0;

   function refresh_distribution() {
      $('[name="distribution_value[]"]').each(function(index) {
         dist_total += parseInt($.trim($(this).val()));
      });
      if (parseInt(dist_total) >= 0) {
         if (parseInt(dist_total) > 100) {
            $('.dist_error_show').html('<b>Main Markets and Distribution should not be more than 100%.</b><br><br>');
            $('.dist_error_show').show();
            $('.main_market_bar').css('width', dist_total + '%');
            $('.current_total').html('( ' + dist_total + '% )');
            return 0;
         } else {
            $('.dist_error_show').hide();
            $('.main_market_bar').css('width', dist_total + '%');
            $('.current_total').html('( ' + dist_total + '% )');
            return 1;
         }
      } else {
         $('.dist_error_show').html('<b>All Main Markets and Distribution values should be a Number, or put 0 value.</b><br><br>');
         $('.dist_error_show').show();
         return 0;
      }
   }
   refresh_distribution();
   $(document).on({
      keyup: function() {
         // alert ($(this).val());           
         dist_total_data = 0;
         $('[name="distribution_value[]"]').each(function(index) {
            dist_total_data += parseInt($.trim($(this).val()));
         });
         if (parseInt(dist_total_data) >= 0) {
            if (parseInt(dist_total_data) > 100) {
               $('.dist_error_show').html('<b>Main Markets and Distribution should not be more than 100%.</b><br><br>');
               $('.dist_error_show').show();
               $('.main_market_bar').css('width', dist_total_data + '%');
               $('.current_total').html('( ' + dist_total_data + '% )');
            } else {
               $('.dist_error_show').hide();
               $('.main_market_bar').css('width', dist_total_data + '%');
               $('.current_total').html('( ' + dist_total_data + '% )');
            }
         } else {
            $('.dist_error_show').html('<b>All Main Markets and Distribution values should be a Number, or put 0 value.</b><br><br>');
            $('.dist_error_show').show();
         }
      }
   }, '[name="distribution_value[]"]');
   $('.hide_certification_warning').click(function(e) {
      e.preventDefault();
      $(this).parent().parent().parent().hide(200);
   });

   (function() {


      if ($('.pre_contract_manufacturing').length > 0) {
         var val = $('.pre_contract_manufacturing').val()
         var val_arr = val.split(',');
         for (i = 0; i < val_arr.length; i++) {
            $('#partner_factory [name="contact_manufacturing[]"][value="' + val_arr[i] + '"]').attr('checked', 'true')
         }
      }
      $('[name="start_date"]').datepicker({
         dateFormat: "yy-mm-dd"
      });
      $('[name="end_date"]').datepicker({
         dateFormat: "yy-mm-dd"
      });
      $('.in_visible').hide();
      var action_performed_area = '#certification_trademarks';
      var flag_ani = "webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend'";
      var section_to_display;
      var function_to_display = function($_this) {
         section_to_display = $_this.attr('href');
         $(action_performed_area + ' .certification_tab .clicked').removeClass('clicked');
         $_this.addClass('clicked');
         $(action_performed_area + ' .in_visible').hide();
         $(action_performed_area + ' ' + section_to_display).fadeIn('100', function() {
            $(this).addClass('animated pulse').one(flag_ani, function(e) {
               $(this).removeClass('animated pulse')
            })
         });
      }
      $(document).on({
         click: function(e) {
            e.preventDefault();
            function_to_display($(this))
         }
      }, '' + action_performed_area + ' .certification_tab');
      $(document).on({
         click: function(e) {
            $('.certification_tab[href="#add_certificatons"]').click();
         }
      }, 'a[href="#certification_trademarks"]');
      $(document).on({
         click: function(e) {
            e.preventDefault();
            _this = $(this);
            var active_section_id, form_data, url, form_test_data, loading_class, arrow_icon_class, _this = $(this),
               children_icon, children_text;
            //_this.text("Please wait...");       
            children_icon = $(_this).children('.fa');
            children_text = $(_this).children('.confirmation_text');
            loading_class = "fa-spinner fa-pulse";
            arrow_icon_class = "fa-arrow-circle-right";
            active_section_id = $(this).data('current_active_tab');
            var _token_data = $('input[name="_token"]').val();
            CKEDITOR.instances.company_faq.updateElement();
            CKEDITOR.instances.company_services.updateElement();
            CKEDITOR.instances.details_company_introduction.updateElement();
            
                form_data = $(active_section_id + ' .form_data').serialize() + '&_token=' + _token_data;
            url = '<?php echo url('/'); ?>/user/post_company_info';
            children_icon.addClass(loading_class);
            children_text.text("Please Wait...");
            $.post(url, form_data, function(r) {
               obj = $.parseJSON(r);
               console.log(obj);
               if(obj.status){
//                 alert('Trade Details saved successfully');
                 if(obj.hasOwnProperty('message')){
                    alert(obj.message);
                    } 
                  children_text.text("SAVED");
                  children_icon.removeClass(loading_class);
                  setTimeout(function() {
                     children_text.text("Save Change");
                  }, 3000);
                  $(".call_to_company_info_form").trigger("click");
               }else{
                  var errorText='';
                  var i;
                  if(obj.hasOwnProperty('message')){
                    alert(obj.message);
                    } 
                    children_text.text("Save");
                  for (i = 0; i < obj.error.length; i++) { 
                     errorText += "<li style='list-style-type:circle;'>"+ obj.error[i] + "</li>";
                  }
                  console.log(errorText);
                  
                  if(obj.info_type == 1)
                     $("#trade_info_errors").html(errorText);
                  else if(obj.info_type == 2)
                     $("#factory_info_errors").html(errorText);
                  else if(obj.info_type == 3)
                     $("#company_introduction_info_errors").html(errorText);

                  children_text.text("Error");
                  children_icon.removeClass(loading_class);
                  setTimeout(function() {
                     children_text.text("Try Again");
                  }, 3000);
            }
            });

         }
      }, '.company_tab_info_submitter');


      $(document).on({
         click: function(e) {
            e.preventDefault();
            var active_section_id, form_data, url, form_test_data, loading_class, arrow_icon_class, _this = $(this),
               children_icon, children_text;
            //_this.text("Please wait...");       
            children_icon = $(_this).children('.fa');
            children_text = $(_this).children('.confirmation_text');
            loading_class = "fa-spinner fa-pulse";
            arrow_icon_class = "fa-arrow-circle-right";
            active_section_id = $(this).data('current_active_tab');
            var _token_data = $('input[name="_token"]').val();
            CKEDITOR.instances.company_faq.updateElement();
            CKEDITOR.instances.company_services.updateElement();
            CKEDITOR.instances.details_company_introduction.updateElement();
            form_data = $(active_section_id + ' .form_data').serialize() + '&_token=' + _token_data;
            console.log(form_data);
            url = '<?php echo url('/'); ?>/user/post_company_info';
            children_icon.addClass(loading_class);
            children_text.text("Please Wait...");
            $.post(url, form_data, function(r) {
               obj = $.parseJSON(r);
               console.log(obj);
               if(obj.status){
               alert('Basic information saved successfully');
                  children_text.text("SAVED");
                  children_icon.removeClass(loading_class);
                  setTimeout(function() {
                     children_text.text("Save Change");
                  }, 3000);
                  $(".call_to_company_info_form").trigger("click");
               } else{
                  var errorText='';
                  var i;
                  for (i = 0; i < obj.error.length; i++) { 
                     errorText += "<li style='list-style-type:circle;'>"+ obj.error[i] + "</li>";
                  }
                  // console.log(errorText);
                  $("#basic_info_errors").html(errorText);
                  children_text.text("Error");
                  children_icon.removeClass(loading_class);
                  setTimeout(function() {
                     children_text.text("Try Again");
                  }, 3000);
               } 
            });
         }
      }, '.company_basic_info_submitter');

      $(document).on({
         click: function(e) {
            $('#c_photo').defaultValue;
            $('#c_photo').val('');
            e.preventDefault();
            var display_for = $(this).data('display_for');
            var display_img = $('.' + display_for).children('img').attr('src');
            var prev_id = $(this).attr('data-prev_id');
            console.log(display_img);
            $('.c_photo_img_preview_modal').children('img').attr('src', display_img);
            $('.c_photo_upload_form input[name="display_for"]').val(display_for);
            $('.c_photo_upload_form input[name="prev_id"]').val(prev_id);
            $('.c_photo_delete_btn').attr('data-targetid', prev_id);
         }
      }, '.c_photo_upload_btn')
      /*****COMPANY LOGO IMAGE UPLOAD *****/
      $(document).on({
         click: function(e) {
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var url, file, data, img_path;
            $('.uploaded_img_preview').html();
            url = $('#company_logo_upload_form').attr('action');
            file = document.getElementById('c_logo').files[0];
            if (file != 'undefined') {
               data = new FormData();
               data.append('image', file);
               data.append('_token', _token);
               img_path = "";
               $.ajax({
                  url: url,
                  type: "POST",
                  data: data,
                  processData: false,
                  contentType: false,
                  success: function(data, textStatus, jqXHR) {
                     if (parseInt(data[0]) == 1) {
                         alert('Company Logo Add/Change Successfully');
                        img_path = '<?php echo url('/'); ?>/uploads/' + data[1];
                        $('.c_logo_img_preview_modal').html("<img src='" + img_path + "' class='img-responsive' style='border:1px solid #0087CF;padding:2%;height:156px'/>");
                        $('.c_logo_img_preview img').attr('src', img_path);
                        
                        // $('.c_logo_upload_form').modal('hide');            
                     } else {
                        alert(data[1]);
                     }

                  },
               });
            } else {
               alert("Please select an image first.");
            }
         }
      }, '.company_logo_upload_btn');
      /*****COMPANY LOGO IMAGE DELETE *****/
      $(document).on({
         click: function(e) {
            e.preventDefault();
            var _token = '{{csrf_token()}}';
            var url, data, img_path;
            $('.uploaded_img_preview').html();
            url = $('#company_logo_upload_form').attr('action') + '/delete';
            data = new FormData();
            data.append('_token', _token);
            img_path = "/assets/images/img_icon.jpg";
            $.ajax({
               url: url,
               type: "POST",
               data: data,
               processData: false,
               contentType: false,
               success: function(data, textStatus, jqXHR) {
                  if (parseInt(data[0]) == 1) {
                     img_path = window.location.origin + '/assets/images/img_icon.jpg';
                     $('.c_logo_img_preview_modal').html("<img src='" + img_path + "' class='img-responsive' style='border:1px solid #0087CF;padding:2%;height:156px'/>");
                     $('.c_logo_img_preview img').attr('src', img_path);
                     // $('.c_logo_upload_form').modal('hide');            
                  } else {
                     alert(data[1]);
                  }

               },
            });

         }
      }, '.delete_company_logo');
      /*****COMPANY PHOTO IMAGE UPLOAD *****/
      $(document).on({
         click: function(e) {
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var url, file, data, img_path, display_for;

            display_for = '.' + $('[name="display_for"]').val();

            url = $('#company_photo_upload_form').attr('action');
            file = document.getElementById('c_photo').files[0];
            data = new FormData();
            data.append('image', file);
            data.append('_token', _token);
            data.append('id_to_update', $('[name="prev_id"]').val());
            img_path = "";
            $.ajax({
               url: url,
               type: "POST",
               data: data,
               processData: false,
               contentType: false,
               success: function(data, textStatus, jqXHR) {
                  if (parseInt(data[0]) == 1) {
                     img_path = '<?php echo url('/'); ?>/uploads/' + data[1].image;
                     $('.c_photo_img_preview_modal img').attr('src', img_path);
                     $(display_for + ' img').attr('src', img_path);
                     $(display_for + ' a').attr('data-prev_id', data[1].id);
                  } else {
                     alert(data[1]);
                  }



               },
            });
         }
      }, '.company_photo_upload_btn');
      /*****COMPANY PHOTO IMAGE DELETE *****/
      $(document).on({
         click: function(e) {
            e.preventDefault();
            var targetID = $(this).attr('data-targetid');
            if (targetID == 0) {
               alert('Unable to delete empty value');
            } else {
               if (confirm("Are You Sure !!!")) {
                  var url, data, img_path, display_for;
                  display_for = '.' + $('[name="display_for"]').val();
                  url = $('#company_photo_upload_form').attr('action') + '/delete/' + targetID;
                  data = new FormData();
                  data.append('_token', '{{csrf_token()}}');
                  data.append('id_to_delete', targetID);
                  img_path = "/assets/images/img_icon.jpg";
                  // alert (display_for);       
                  $.ajax({
                     url: url,
                     type: "POST",
                     data: data,
                     processData: false,
                     contentType: false,
                     success: function(data, textStatus, jqXHR) {
                        if (parseInt(data[0]) == 1) {
                           img_path = window.location.origin + '/assets/images/img_icon.jpg';
                           $('.c_photo_img_preview_modal img').attr('src', img_path);
                           $(display_for + ' img').attr('src', img_path);
                           $(display_for + ' a').attr('data-prev_id', 0);
                           alert(data[1]);
                        } else {
                           alert(data[1]);
                        }
                     },
                  });
               }
            }
         }
      }, '.c_photo_delete_btn');
      $(document).on({
         change: function() {
            var _this = $(this);
            var type_id = $(this).val();
            var url = window.location.origin + '/user/get_name_by_type/' + type_id;
            $('select[name="name"]').html("");
            var template = "";
            $.get(url, function(r) {
               $.each(r, function(i, v) {
                  template += "<option value='" + v.id + "'>" + v.value + "</option>"
               });
               $('select[name="name"]').html(template);
            })
         }
      }, 'select[name="type"]');

      /*****ALL CERTIFICATION INFO INSERTION *****/
      $(document).on({
         click: function(e) {
            e.preventDefault();
            _this = $(this);
            var section = $(this).data('section_id');
            var _token_data = $('input[name="_token"]').val();
            form_data = $(section + ' .form_data').serialize() + '&_token=' + _token_data;
            url = '<?php echo url('/'); ?>/user/post_certification_info';
            $.post(url, form_data, function(r) {
               // console.log(r);
               obj = $.parseJSON(r);
               if(obj.status){
                  alert(obj.message);
               }else{
                  var errorText='';
                  var i;
                  for (i = 0; i < obj.error.length; i++) { 
                     errorText += "<li style='list-style-type:circle;'>"+ obj.error[i] + "</li>";
                  }
                  $("#certification_trademarks_info_errors").html(errorText);
               }
               // alert(r[0][0]);
               _this.val('Update');
            });
         }
      }, '.certification_submit_btn');
      /*****ALL CERTIFICATION MODAL FORM OPENER *****/
      $(document).on({
         click: function(e) {
            var img_for = $(this).data('img_for');
            $('[name="img_for"]').val(img_for);
            $('#all_certification_image_input').val('');
            $('.tr_holder').html('<tr class="default_icon"><td class="text-center"><img style="width:32%;border:1px solid #0087CF;padding:2%;height:89px" src="' + window.location.origin + '/assets/images/img_icon.jpg" class="img-responsive" alt=""></td></tr>');
         }
      }, '.all_certification_form_opener');
      /*****ALL CERTIFICATION IMAGE UPLOAD *****/
      $(document).on({
         click: function(e) {
            e.preventDefault();
            var _token = '{{csrf_token()}}';
            var _token = $("input[name='_token']").val();
            var url, file, data, tempalte, modal;
            url = $('#all_certification_image_submit_form').attr('action');
            file = document.getElementById('all_certification_image_input').files[0];
            modal = $.trim($('[name="img_for"]').val());
            section_class = '.' + modal.split('\\')[1];
            data = new FormData();
            data.append('image', file);
            data.append('model', modal);
            data.append('_token', _token);
            data.append('id_to_update', $('[name="prev_img_id"]').val());
            tempalte = "";
            tr_holder = "";
            $.ajax({
               url: url,
               type: "POST",
               data: data,
               processData: false,
               contentType: false,
               success: function(data, textStatus, jqXHR) {
                  if (parseInt(data[0]) == 1) {
                     $('.default_icon').remove();
                     tempalte = '<div class="col-md-4 text-center"><input type="hidden" name="image_name[]" value="' + data[1].image + '" /><img style="width:100%;border:1px solid #0087CF;padding:2%;height:115px" src="<?php echo url('/') ?>/uploads/' + data[1].image + '" class="img-responsive" alt=""><a href="#" data-id_to_delete="' + data[1].id + '" data-modal="' + modal + '" style="width:37%;margin-top:2%" class="btn btn-danger btn-xs delete_img"><i class="fa fa-times"></i></a></div>';
                     tr_holder = '<tr><td><img style="width:32%;border:1px solid #0087CF;padding:2%;height:89px" src="<?php echo url('/') ?>/uploads/' + data[1].image + '" class="img-responsive" alt=""></td></tr>';
                     $(section_class + ' .all_certification_preview_img').append(tempalte);
                     $('.tr_holder').append((tr_holder));
                     $('#all_certification_image_input').val('');
                  } else {
                     alert(data[1]);
                  }
               },
            });
         }
      }, '.all_certification_image_submit_btn');
      /*****ALL CERTIFICATION IMAGE DELETE *****/
      $(document).on({
         click: function(e) {
            e.preventDefault();
            if (confirm('Are you sure?')) {
               var id = $(this).data('id_to_delete');
               var model = $(this).data('modal');
               var section_class = model.split('\\')[1];
               var url = '<?php echo url('/'); ?>/user/delete_image/' + id + '/' + section_class;
               _this = $(this);
               $.get(url, function(r) {
                  if (parseInt(r) == 1) {
                     _this.parent().remove();
                  } else {
                     alert('Delete Failed');
                  }
               });
            }
         }
      }, '.delete_img');


   })()
</script>