@extends('protected.admin.master')

@section('title', 'List Users')

@section('content')


<!-- BEGIN PAGE CONTENT-->
<!-- ---LOADING ANIMATION TRIGERED TO THIS LOADER CLASS;----- -->
<div class="mkn_loader" style="position: fixed;left:0px;top: 0px;width: 100%;height:100%;z-index: 99999999;background: url(/uploads/page-loader.gif) 50% 50% no-repeat rgb(249,249,249);background-size: 45px;"></div>
<div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box grey-cascade">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-globe"></i>Edit Inquiry
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
                                    @if (Session::has('success'))
                                        <div style="margin-top: 10px;" class="alert alert-success alert-dismissable fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    @if (Session::has('error'))
                                        <div style="margin-top: 10px;" class="alert alert-danger alert-dismissable fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            {{ Session::get('error') }}
                                        </div>
                                    @endif
                                    @if (count($errors) > 0)
                                        <div style="margin-top: 10px;" class="alert alert-danger alert-dismissable fade in">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Form::open(['url' => 'admin/edit-inquiry/'.$inquiry_id,'method'=>'post','class'=>'form-horizontal']) !!}
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="title">Title:</label>
                                            <div class="col-sm-10">
                                              <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{old('title',$inquiry->inquery_title)}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="quantity">Quantity:</label>
                                            <div class="col-sm-10"> 
                                              <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Quantity" value="{{old('quantity',$inquiry->quantity)}}" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="price">Price:</label>
                                            <div class="col-sm-10"> 
                                              <input type="text" name="price" class="form-control" id="price" placeholder="Price" value="{{old('price',$inquiry->pre_unit_price)}}" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="currency">Currency:</label>
                                            <div class="col-sm-10"> 
                                              <select name="currency" class="form-control" id="currency" required>
                                                <option value="0">Select currency</option>
                                                <option value="USD">America (United States) Dollars – USD</option>
                                                <option value="AFN">Afghanistan Afghanis – AFN</option>
                                                <option value="ALL">Albania Leke – ALL</option>
                                                <option value="DZD">Algeria Dinars – DZD</option>
                                                <option value="ARS">Argentina Pesos – ARS</option>
                                                <option value="AUD">Australia Dollars – AUD</option>
                                                <option value="ATS">Austria Schillings – ATS</option>
                                                <option value="BSD">Bahamas Dollars – BSD</option>
                                                <option value="BHD">Bahrain Dinars – BHD</option>
                                                <option value="BDT">Bangladesh Taka – BDT</option>
                                                <option value="BBD">Barbados Dollars – BBD</option>
                                                <option value="BEF">Belgium Francs – BEF</option>
                                                <option value="BMD">Bermuda Dollars – BMD</option>
                                                <option value="BRL">Brazil Reais – BRL</option>
                                                <option value="BGN">Bulgaria Leva – BGN</option>
                                                <option value="CAD">Canada Dollars – CAD</option>
                                                <option value="XOF">CFA BCEAO Francs – XOF</option>
                                                <option value="XAF">CFA BEAC Francs – XAF</option>
                                                <option value="CLP">Chile Pesos – CLP</option>
                                                <option value="CNY">China Yuan Renminbi – CNY</option>
                                                <option value="RMB - CNY">RMB (China Yuan Renminbi) – CNY</option>
                                                <option value="COP">Colombia Pesos – COP</option>
                                                <option value="XPF">CFP Francs – XPF</option>
                                                <option value="CRC">Costa Rica Colones – CRC</option>
                                                <option value="HRK">Croatia Kuna – HRK</option>
                                                <option value="CYP">Cyprus Pounds – CYP</option>
                                                <option value="CZK">Czech Republic Koruny – CZK</option>
                                                <option value="DKK">Denmark Kroner – DKK</option>
                                                <option value="DEM">Deutsche (Germany) Marks – DEM</option>
                                                <option value="DOP">Dominican Republic Pesos – DOP</option>
                                                <option value="NLG">Dutch (Netherlands) Guilders – NLG</option>
                                                <option value="XCD">Eastern Caribbean Dollars – XCD</option>
                                                <option value="EGP">Egypt Pounds – EGP</option>
                                                <option value="EEK">Estonia Krooni – EEK</option>
                                                <option value="EUR">Euro – EUR</option>
                                                <option value="FJD">Fiji Dollars – FJD</option>
                                                <option value="FIM">Finland Markkaa – FIM</option>
                                                <option value="FRF*">France Francs – FRF*</option>
                                                <option value="DEM">Germany Deutsche Marks – DEM</option>
                                                <option value="XAU">Gold Ounces – XAU</option>
                                                <option value="GRD">Greece Drachmae – GRD</option>
                                                <option value="GTQ">Guatemalan Quetzal – GTQ</option>
                                                <option value="NLG">Holland (Netherlands) Guilders – NLG</option>
                                                <option value="HKD">Hong Kong Dollars – HKD</option>
                                                <option value="HUF">Hungary Forint – HUF</option>
                                                <option value="ISK">Iceland Kronur – ISK</option>
                                                <option value="XDR">IMF Special Drawing Right – XDR</option>
                                                <option value="INR">India Rupees – INR</option>
                                                <option value="IDR">Indonesia Rupiahs – IDR</option>
                                                <option value="IRR">Iran Rials – IRR</option>
                                                <option value="IQD">Iraq Dinars – IQD</option>
                                                <option value="IEP*">Ireland Pounds – IEP*</option>
                                                <option value="ILS">Israel New Shekels – ILS</option>
                                                <option value="ITL*">Italy Lire – ITL*</option>
                                                <option value="JMD">Jamaica Dollars – JMD</option>
                                                <option value="JPY">Japan Yen – JPY</option>
                                                <option value="JOD">Jordan Dinars – JOD</option>
                                                <option value="KES">Kenya Shillings – KES</option>
                                                <option value="KRW">Korea (South) Won – KRW</option>
                                                <option value="KWD">Kuwait Dinars – KWD</option>
                                                <option value="LBP">Lebanon Pounds – LBP</option>
                                                <option value="LUF">Luxembourg Francs – LUF</option>
                                                <option value="MYR">Malaysia Ringgits – MYR</option>
                                                <option value="MTL">Malta Liri – MTL</option>
                                                <option value="MUR">Mauritius Rupees – MUR</option>
                                                <option value="MXN">Mexico Pesos – MXN</option>
                                                <option value="MAD">Morocco Dirhams – MAD</option>
                                                <option value="NLG">Netherlands Guilders – NLG</option>
                                                <option value="NZD">New Zealand Dollars – NZD</option>
                                                <option value="NOK">Norway Kroner – NOK</option>
                                                <option value="OMR">Oman Rials – OMR</option>
                                                <option value="PKR">Pakistan Rupees – PKR</option>
                                                <option value="XPD">Palladium Ounces – XPD</option>
                                                <option value="PEN">Peru Nuevos Soles – PEN</option>
                                                <option value="PHP">Philippines Pesos – PHP</option>
                                                <option value="XPT">Platinum Ounces – XPT</option>
                                                <option value="PLN">Poland Zlotych – PLN</option>
                                                <option value="PTE">Portugal Escudos – PTE</option>
                                                <option value="QAR">Qatar Riyals – QAR</option>
                                                <option value="RON">Romania New Lei – RON</option>
                                                <option value="ROL">Romania Lei – ROL</option>
                                                <option value="RUB">Russia Rubles – RUB</option>
                                                <option value="SAR">Saudi Arabia Riyals – SAR</option>
                                                <option value="XAG">Silver Ounces – XAG</option>
                                                <option value="SGD">Singapore Dollars – SGD</option>
                                                <option value="SKK">Slovakia Koruny – SKK</option>
                                                <option value="SIT">Slovenia Tolars – SIT</option>
                                                <option value="ZAR">South Africa Rand – ZAR</option>
                                                <option value="KRW">South Korea Won – KRW</option>
                                                <option value="ESP">Spain Pesetas – ESP</option>
                                                <option value="XDR">Special Drawing Rights (IMF) – XDR</option>
                                                <option value="LKR">Sri Lanka Rupees – LKR</option>
                                                <option value="SDD">Sudan Dinars – SDD</option>
                                                <option value="SEK">Sweden Kronor – SEK</option>
                                                <option value="CHF">Switzerland Francs – CHF</option>
                                                <option value="TWD">Taiwan New Dollars – TWD</option>
                                                <option value="THB">Thailand Baht – THB</option>
                                                <option value="TTD">Trinidad and Tobago Dollars – TTD</option>
                                                <option value="TND">Tunisia Dinars – TND</option>
                                                <option value="TRY">Turkey New Lira – TRY</option>
                                                <option value="AED">United Arab Emirates Dirhams – AED</option>
                                                <option value="GBP">United Kingdom Pounds – GBP</option>
                                                <option value="USD">United States Dollars – USD</option>
                                                <option value="VEB">Venezuela Bolivares – VEB</option>
                                                <option value="VND">Vietnam Dong – VND</option>
                                                <option value="ZMK">Zambia Kwacha – ZMK</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="unit">Unit:</label>
                                            <div class="col-sm-10"> 
                                              <select name="unit" class="form-control" id="unit" required>
                                                <option value="0" >Select Unit</option>
                                                @foreach($units as $unit)
                                                    <option value="{{$unit->id }}" >{{$unit->name}}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group"> 
                                            <div class="col-sm-offset-2 col-sm-10">
                                              <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                          </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>

<!-- Modal -->






@stop
@section('scripts')
<script>
$(document).ready(function(){
    $('.mkn_loader').css('display','none');
    $('#currency').val('{{old("currency",$inquiry->currency)}}');
    $('#unit').val('{{old("unit",$inquiry->unit_id)}}');
});
</script>
@stop
