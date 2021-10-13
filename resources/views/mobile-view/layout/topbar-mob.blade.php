<div class="row padding_0">
  <nav class="navbar navbar-default" style="margin-bottom: 0 !important;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="padding: 10px;">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="background: #255E98">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style="margin-left: 0; background-image: none " rel="home" itemprop="url" title="Manufacturers-Suppliers"  href="{{ URL::to('/',null)}}">
      <img alt="logo" style="margin-top:-5px" itemprop="logo" class="loggg" src="{{ asset('assets/logo.png') }}" />
      </a>
    <div style="line-height: 14px;word-spacing: 0px;margin-top:0px;padding-top:0px"   id="bang-trade" onMouseOver="">Bangladesh Trade <span>Development Council</span></div>
    <!-- <div style="padding-right: 10px;padding-top: 0px; width: 100%; text-align: center;margin-left: 0%;"><a itemprop="url" href="{{ URL::to('/',null)}}" id="back-home" onMouseOut="hide_home()">Back to Homepage</a></div> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse m-nevbar" id="bs-example-navbar-collapse-1" style="padding-left: 0;">
      <div class="user-login-m">
          <div class="unregister" style="position: relative;">
                  <div class="avatar">
                        <div><a href="" class="avatar-span"></a></div>                        
                  </div>
                  <div style="position: absolute;bottom: 18px;left: 15px;display: block;overflow: hidden;">
                    @if (Sentinel::check())
                        <a class="sng btn btn-info btn-lg" href="{{URL::to('/logout')}}" style=" background: 0 none; color: #fff !important;">Logout</a>
                    @else
                       <span class="sng btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal2" style=" background: 0 none; color: #fff !important;"> Sign In</span> <span class="sng" style="width: 20px; float: left; color:#fff;">|</span>
                       <span class="sng btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal2" style="background: 0 none;color: #fff !important;">Join Free</span>
                        
                     @endif
                     

                </div>
          </div>
      </div>
  <ul class="nav navbar-nav">

        <li class=""><a href="{{ URL::to('online-marketplace',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-home" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span>Home<span class="sr-only">(current)</span></a></li>
       <li><a href="{{URL::to('tradeshow',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-comment" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Messanger</a></li>
       <li><a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-envelope" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span>Inquiries</a></li>
       <li><a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-leaf" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Buying Request</a></li>
       <li><a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-bolt" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Quick Quotation</a></li>
       <li><a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-star" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> My Favorites</a></li>
       <li><a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-floppy-o" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> My Coupons</a></li>
      <li><a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-comment" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Feedback</a></li>
       <li><a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-download" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Bdtdc.com</a></li>


     </ul>
  </div><!-- /.navbar-collapse -->
</nav>

</div>
<div class="row padding_0">
<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="height: 35px;">&times;</button>
      </div>
      <div class="modal-body">
          <div style="width: 100%;padding-top: 15px;box-shadow: 0px 5px 5px #efefef;">
           <ul class="nav nav-tabs" style="border-bottom: 0 none;">
              <li class="active" style="width: 50%;"><a data-toggle="tab" href="#sign_bdtdc" style="text-align: center;">Sign In</a></li>
             <li style="width: 50%;"><a data-toggle="tab" href="#join_bdtdc" style="text-align: center;">Join Free</a></li>
            </ul>
        </div>
          <div class="tab-content">

      <div id="sign_bdtdc" class="tab-pane fade in active">
        <div style="padding: 60px 0;width: 100%;overflow: hidden;background: #fff; height: 450px;">
          {!! Form::open(['route' => 'sessions.store']) !!}
                        @if (session()->has('flash_message'))
                            <div class="alert alert-success">
                                {{ session()->get('flash_message') }}
                            </div>
                        @endif
        
                        @if (session()->has('error_message'))
                            <div class="alert alert-danger">
                                {{ session()->get('error_message') }}
                            </div>
                        @endif

              <div class="form-group reg-frm-bd" style="border:0 none;">

               
                <input style="border:0 none; border-bottom: 2px solid #255E98;" type="email" name="email" class="form-control" id="" placeholder="Enter login email">
              </div>
              <div class="form-group reg-frm-bd" style="border:0 none;">



                  <input style="border:0 none; border-bottom: 2px solid #255E98;" type="password" name="password" class="form-control" id="pwd" placeholder="Enter login password">
              </div>
                        <div class="form-group">
                        <!-- <a class="btn btn btn-lg btn-primary btn-block" href="">Sign in</a> -->
                        <!-- {!! Form::submit('Sign In', ['class' => 'btn btn btn-lg btn-primary btn-block','style'=>'padding-bottom: 26px;border-radius: 5px!important;']) !!} -->
                        </div>
                        <button type="submit" class="btn btn btn-lg btn-primary btn-block" style="width: 100%; background:#255E98;"><span style="color: #fff; font-size: 14px;">SIGN IN</span></button>
              <!-- <button type="submit" class="btn btn-default" style="width: 100%; background:#255E98;"><span style="color: #fff; font-size: 14px;">SIGN IN</span></button> -->
              <button type="submit" class="btn btn-default" style="width: 100%; margin-top: 30px;background: #FF6A00;"><span style="color: #fff; font-size: 14px;"><a itemprop="url" href="{{ URL::to('forgot_password',null)}}" id="forget-password" style="color:#fff !important;">FORGOT PASSWORD ?</a></span></button>
           {!! Form::close() !!}
     
        </div>
      </div>
      <div id="join_bdtdc" class="tab-pane fade"> 
        <div style="padding: 60px 0;width: 100%;overflow: hidden;background: #fff;">
            @if (count($errors) > 0)
                <div class="alert alert-danger" style="margin-top:10px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ URL::to('mobile-registration/store',null) }}" method="post" class="form-horizontal form-row-seperated user_registration_form">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group" style="position: relative;">
                 <span class="user-reg-bd"><i class="fa fa-globe" aria-hidden="true" style="font-size: 20px; color:#666;"></i>
                 </span>
                <input  style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 16px; padding-left: 50px;"   type="text" class="form-control" id="" placeholder="Country/Region">
                <img src="{!! asset('assets/images/bd.gif') !!}" id="countryFlagImg" hasloadnophoto="false" style="">
                <?php 
                 $country=DB::table('bdtdc_country')->get();
                ?>
                <select name="country">
                  @foreach($country as $data)
                  <option value="{{$data->id}}" name="country">{{$data->name}}</option>
                  @endforeach
                </select>
                <!-- <select class="select_count_m" style="position: absolute;top: 10px;right: 0;">
                  <optgroup label="Select where your company is located">
                 <option value="BD" countrynum="880">Bangladesh</option>
                                <option value="CA" countrynum="1">Canada</option>
                                <option value="HK" countrynum="852">Hong Kong</option>
                                <option value="IN" countrynum="91">India</option>
                                <option value="ID" countrynum="62">Indonesia</option>
                                <option value="KR" countrynum="82">South Korea</option>
                                <option value="MY" countrynum="60">Malaysia</option>
                                <option value="SG" countrynum="65">Singapore</option>
                                <option value="TW" countrynum="886">Taiwan</option>
                                <option value="UK" countrynum="44">United Kingdom</option>
                                <option value="US" countrynum="1">United States</option>
                            </optgroup>
                            <optgroup label="All Countries &amp; Regions (A to Z)">
                                <option value="AF" countrynum="93">Afghanistan</option>
                                <option value="ALA" countrynum="358">Aland Islands</option>
                                <option value="AL" countrynum="355">Albania</option>
                                <option value="GBA" countrynum="493">Alderney</option>
                                <option value="DZ" countrynum="213">Algeria</option>
                                <option value="AS" countrynum="684">American Samoa</option>
                                <option value="AD" countrynum="376">Andorra</option>
                                <option value="AO" countrynum="244">Angola</option>
                                <option value="AI" countrynum="1-264">Anguilla</option>
                                <option value="AQ" countrynum="672">Antarctica</option>
                                <option value="AG" countrynum="1-268">Antigua and Barbuda</option>
                                <option value="AR" countrynum="54">Argentina</option>
                                <option value="AM" countrynum="374">Armenia</option>
                                <option value="AW" countrynum="297">Aruba</option>
                                <option value="ASC" countrynum="247">Ascension Island</option>
                                <option value="AU" countrynum="61">Australia</option>
                                <option value="AT" countrynum="43">Austria</option>
                                <option value="AZ" countrynum="994">Azerbaijan</option>
                                <option value="BS" countrynum="1-242">Bahamas</option>
                                <option value="BH" countrynum="973">Bahrain</option>
                                <option value="BD" countrynum="880">Bangladesh</option>
                                <option value="BB" countrynum="1-246">Barbados</option>
                                <option value="BY" countrynum="375">Belarus</option>
                                <option value="BE" countrynum="32">Belgium</option>
                                <option value="BZ" countrynum="501">Belize</option>
                                <option value="BJ" countrynum="229">Benin</option>
                                <option value="BM" countrynum="1-441">Bermuda</option>
                                <option value="BT" countrynum="975">Bhutan</option>
                                <option value="BO" countrynum="591">Bolivia</option>
                                <option value="BA" countrynum="387">Bosnia and Herzegovina</option>
                                <option value="BW" countrynum="267">Botswana</option>
                                <option value="BV" countrynum="47">Bouvet Island</option>
                                <option value="BR" countrynum="55">Brazil</option>
                                <option value="IO" countrynum="1-284">British Indian Ocean Territory</option>
                                <option value="BN" countrynum="673">Brunei Darussalam</option>
                                <option value="BG" countrynum="359">Bulgaria</option>
                                <option value="BF" countrynum="226">Burkina Faso</option>
                                <option value="BI" countrynum="257">Burundi</option>
                                <option value="KH" countrynum="855">Cambodia</option>
                                <option value="CM" countrynum="237">Cameroon</option>
                                <option value="CA" countrynum="1">Canada</option>
                                <option value="CV" countrynum="238">Cape Verde</option>
                                <option value="KY" countrynum="1-345">Cayman Islands</option>
                                <option value="CF" countrynum="236">Central African Republic</option>
                                <option value="TD" countrynum="235">Chad</option>
                                <option value="CL" countrynum="56">Chile</option>
                                <option value="CX" countrynum="61">Christmas Island</option>
                                <option value="CC" countrynum="61">Cocos (Keeling) Islands</option>
                                <option value="CO" countrynum="57">Colombia</option>
                                <option value="KM" countrynum="269">Comoros</option>
                                <option value="ZR" countrynum="243">Congo, The Democratic Republic Of The</option>
                                <option value="CG" countrynum="242">Congo, The Republic of Congo</option>
                                <option value="CK" countrynum="682">Cook Islands</option>
                                <option value="CR" countrynum="506">Costa Rica</option>
                                <option value="CI" countrynum="225">Cote D'Ivoire</option>
                                <option value="HR" countrynum="385">Croatia (local name: Hrvatska)</option>
                                <option value="CU" countrynum="53">Cuba</option>
                                <option value="CY" countrynum="357">Cyprus</option>
                                <option value="CZ" countrynum="420">Czech Republic</option>
                                <option value="DK" countrynum="45">Denmark</option>
                                <option value="DJ" countrynum="253">Djibouti</option>
                                <option value="DM" countrynum="1-767">Dominica</option>
                                <option value="DO" countrynum="1-809">Dominican Republic</option>
                                <option value="TP" countrynum="670">East Timor</option>
                                <option value="EC" countrynum="593">Ecuador</option>
                                <option value="EG" countrynum="20">Egypt</option>
                                <option value="SV" countrynum="503">El Salvador</option>
                                <option value="GQ" countrynum="240">Equatorial Guinea</option>
                                <option value="ER" countrynum="291">Eritrea</option>
                                <option value="EE" countrynum="372">Estonia</option>
                                <option value="ET" countrynum="251">Ethiopia</option>
                                <option value="FK" countrynum="500">Falkland Islands (Malvinas)</option>
                                <option value="FO" countrynum="298">Faroe Islands</option>
                                <option value="FJ" countrynum="679">Fiji</option>
                                <option value="FI" countrynum="358">Finland</option>
                                <option value="FR" countrynum="33">France</option>
                                <option value="FX" countrynum="33">France Metropolitan</option>
                                <option value="GF" countrynum="594">French Guiana</option>
                                <option value="PF" countrynum="689">French Polynesia</option>
                                <option value="TF" countrynum="33">French Southern Territories</option>
                                <option value="GA" countrynum="241">Gabon</option>
                                <option value="GM" countrynum="220">Gambia</option>
                                <option value="GE" countrynum="995">Georgia</option>
                                <option value="DE" countrynum="49">Germany</option>
                                <option value="GH" countrynum="233">Ghana</option>
                                <option value="GI" countrynum="350">Gibraltar</option>
                                <option value="GR" countrynum="30">Greece</option>
                                <option value="GL" countrynum="299">Greenland</option>
                                <option value="GD" countrynum="1-473">Grenada</option>
                                <option value="GP" countrynum="590">Guadeloupe</option>
                                <option value="GU" countrynum="1-671">Guam</option>
                                <option value="GT" countrynum="502">Guatemala</option>
                                <option value="GGY" countrynum="44">Guernsey</option>
                                <option value="GN" countrynum="224">Guinea</option>
                                <option value="GW" countrynum="245">Guinea-Bissau</option>
                                <option value="GY" countrynum="592">Guyana</option>
                                <option value="HT" countrynum="509">Haiti</option>
                                <option value="HM" countrynum="61">Heard and Mc Donald Islands</option>
                                <option value="HN" countrynum="504">Honduras</option>
                                <option value="HK" countrynum="852">Hong Kong</option>
                                <option value="HU" countrynum="36">Hungary</option>
                                <option value="IS" countrynum="354">Iceland</option>
                                <option value="IN" countrynum="91">India</option>
                                <option value="ID" countrynum="62">Indonesia</option>
                                <option value="IR" countrynum="98">Iran (Islamic Republic of)</option>
                                <option value="IQ" countrynum="964">Iraq</option>
                                <option value="IE" countrynum="353">Ireland</option>
                                <option value="IM" countrynum="44">Isle of Man</option>
                                <option value="IL" countrynum="972">Israel</option>
                                <option value="IT" countrynum="39">Italy</option>
                                <option value="JM" countrynum="1-876">Jamaica</option>
                                <option value="JP" countrynum="81">Japan</option>
                                <option value="JEY" countrynum="44">Jersey</option>
                                <option value="JO" countrynum="962">Jordan</option>
                                <option value="KZ" countrynum="7">Kazakhstan</option>
                                <option value="KE" countrynum="254">Kenya</option>
                                <option value="KI" countrynum="686">Kiribati</option>
                                <option value="KS" countrynum="381">Kosovo</option>
                                <option value="KW" countrynum="965">Kuwait</option>
                                <option value="KG" countrynum="996">Kyrgyzstan</option>
                                <option value="LA" countrynum="856">Lao People's Democratic Republic</option>
                                <option value="LV" countrynum="371">Latvia</option>
                                <option value="LB" countrynum="961">Lebanon</option>
                                <option value="LS" countrynum="266">Lesotho</option>
                                <option value="LR" countrynum="231">Liberia</option>
                                <option value="LY" countrynum="218">Libya</option>
                                <option value="LI" countrynum="423">Liechtenstein</option>
                                <option value="LT" countrynum="370">Lithuania</option>
                                <option value="LU" countrynum="352">Luxembourg</option>
                                <option value="MO" countrynum="853">Macau</option>
                                <option value="MK" countrynum="389">Macedonia</option>
                                <option value="MG" countrynum="261">Madagascar</option>
                                <option value="MW" countrynum="265">Malawi</option>
                                <option value="MY" countrynum="60">Malaysia</option>
                                <option value="MV" countrynum="960">Maldives</option>
                                <option value="ML" countrynum="223">Mali</option>
                                <option value="MT" countrynum="356">Malta</option>
                                <option value="MH" countrynum="692">Marshall Islands</option>
                                <option value="MQ" countrynum="596">Martinique</option>
                                <option value="MR" countrynum="222">Mauritania</option>
                                <option value="MU" countrynum="230">Mauritius</option>
                                <option value="YT" countrynum="269">Mayotte</option>
                                <option value="MX" countrynum="52">Mexico</option>
                                <option value="FM" countrynum="691">Micronesia</option>
                                <option value="MD" countrynum="373">Moldova</option>
                                <option value="MC" countrynum="377">Monaco</option>
                                <option value="MN" countrynum="976">Mongolia</option>
                                <option value="MNE" countrynum="382">Montenegro</option>
                                <option value="MS" countrynum="1-664">Montserrat</option>
                                <option value="MA" countrynum="212">Morocco</option>
                                <option value="MZ" countrynum="258">Mozambique</option>
                                <option value="MM" countrynum="95">Myanmar</option>
                                <option value="NA" countrynum="264">Namibia</option>
                                <option value="NR" countrynum="674">Nauru</option>
                                <option value="NP" countrynum="977">Nepal</option>
                                <option value="NL" countrynum="31">Netherlands</option>
                                <option value="AN" countrynum="599">Netherlands Antilles</option>
                                <option value="NC" countrynum="687">New Caledonia</option>
                                <option value="NZ" countrynum="64">New Zealand</option>
                                <option value="NI" countrynum="505">Nicaragua</option>
                                <option value="NE" countrynum="227">Niger</option>
                                <option value="NG" countrynum="234">Nigeria</option>
                                <option value="NU" countrynum="683">Niue</option>
                                <option value="NF" countrynum="672">Norfolk Island</option>
                                <option value="KP" countrynum="850">North Korea</option>
                                <option value="MP" countrynum="1670">Northern Mariana Islands</option>
                                <option value="NO" countrynum="47">Norway</option>
                                <option value="OM" countrynum="968">Oman</option>
                                <option value="Other" countrynum="">Other Country</option>
                                <option value="PK" countrynum="92">Pakistan</option>
                                <option value="PW" countrynum="680">Palau</option>
                                <option value="PS" countrynum="970">Palestine</option>
                                <option value="PA" countrynum="507">Panama</option>
                                <option value="PG" countrynum="675">Papua New Guinea</option>
                                <option value="PY" countrynum="595">Paraguay</option>
                                <option value="PE" countrynum="51">Peru</option>
                                <option value="PH" countrynum="63">Philippines</option>
                                <option value="PN" countrynum="872">Pitcairn</option>
                                <option value="PL" countrynum="48">Poland</option>
                                <option value="PT" countrynum="351">Portugal</option>
                                <option value="PR" countrynum="1-787">Puerto Rico</option>
                                <option value="QA" countrynum="974">Qatar</option>
                                <option value="RE" countrynum="262">Reunion</option>
                                <option value="RO" countrynum="40">Romania</option>
                                <option value="RU" countrynum="7">Russian Federation</option>
                                <option value="RW" countrynum="250">Rwanda</option>
                                <option value="BLM" countrynum="590">Saint Barthelemy</option>
                                <option value="KN" countrynum="1">Saint Kitts and Nevis</option>
                                <option value="LC" countrynum="1">Saint Lucia</option>
                                <option value="MAF" countrynum="590">Saint Martin</option>
                                <option value="VC" countrynum="1">Saint Vincent and the Grenadines</option>
                                <option value="WS" countrynum="685">Samoa</option>
                                <option value="SM" countrynum="378">San Marino</option>
                                <option value="ST" countrynum="239">Sao Tome and Principe</option>
                                <option value="SA" countrynum="966">Saudi Arabia</option>
                                <option value="SCT" countrynum="">Scotland</option>
                                <option value="SN" countrynum="221">Senegal</option>
                                <option value="SRB" countrynum="381">Serbia</option>
                                <option value="SC" countrynum="248">Seychelles</option>
                                <option value="SL" countrynum="232">Sierra Leone</option>
                                <option value="SG" countrynum="65">Singapore</option>
                                <option value="SK" countrynum="421">Slovakia (Slovak Republic)</option>
                                <option value="SI" countrynum="386">Slovenia</option>
                                <option value="SB" countrynum="677">Solomon Islands</option>
                                <option value="SO" countrynum="252">Somalia</option>
                                <option value="ZA" countrynum="27">South Africa</option>
                                <option value="SGS" countrynum="44">South Georgia and the South Sandwich Islands
                                </option>
                                <option value="KR" countrynum="82">South Korea</option>
                                <option value="SS" countrynum="">South Sudan</option>
                                <option value="ES" countrynum="34">Spain</option>
                                <option value="LK" countrynum="94">Sri Lanka</option>
                                <option value="SH" countrynum="290">St. Helena</option>
                                <option value="PM" countrynum="508">St. Pierre and Miquelon</option>
                                <option value="SD" countrynum="249">Sudan</option>
                                <option value="SR" countrynum="597">Suriname</option>
                                <option value="SJ" countrynum="47">Svalbard and Jan Mayen Islands</option>
                                <option value="SZ" countrynum="268">Swaziland</option>
                                <option value="SE" countrynum="46">Sweden</option>
                                <option value="CH" countrynum="41">Switzerland</option>
                                <option value="SY" countrynum="963">Syrian Arab Republic</option>
                                <option value="TW" countrynum="886">Taiwan</option>
                                <option value="TJ" countrynum="992">Tajikistan</option>
                                <option value="TZ" countrynum="255">Tanzania</option>
                                <option value="TH" countrynum="66">Thailand</option>
                                <option value="TLS" countrynum="670">Timor-Leste</option>
                                <option value="TG" countrynum="228">Togo</option>
                                <option value="TK" countrynum="690">Tokelau</option>
                                <option value="TO" countrynum="676">Tonga</option>
                                <option value="TT" countrynum="1-868">Trinidad and Tobago</option>
                                <option value="TN" countrynum="216">Tunisia</option>
                                <option value="TR" countrynum="90">Turkey</option>
                                <option value="TM" countrynum="993">Turkmenistan</option>
                                <option value="TC" countrynum="1-649">Turks and Caicos Islands</option>
                                <option value="TV" countrynum="688">Tuvalu</option>
                                <option value="UG" countrynum="256">Uganda</option>
                                <option value="UA" countrynum="380">Ukraine</option>
                                <option value="AE" countrynum="971">United Arab Emirates</option>
                                <option value="UK" countrynum="44">United Kingdom</option>
                                <option value="US" countrynum="1">United States</option>
                                <option value="UM" countrynum="1">United States Minor Outlying Islands</option>
                                <option value="UY" countrynum="598">Uruguay</option>
                                <option value="UZ" countrynum="998">Uzbekistan</option>
                                <option value="VU" countrynum="678">Vanuatu</option>
                                <option value="VA" countrynum="39">Vatican City State (Holy See)</option>
                                <option value="VE" countrynum="58">Venezuela</option>
                                <option value="VN" countrynum="84">Vietnam</option>
                                <option value="VG" countrynum="1284">Virgin Islands (British)</option>
                                <option value="VI" countrynum="1340">Virgin Islands (U.S.)</option>
                                <option value="WF" countrynum="681">Wallis And Futuna Islands</option>
                                <option value="EH" countrynum="685">Western Sahara</option>
                                <option value="YE" countrynum="967">Yemen</option>
                                <option value="YU" countrynum="381">Yugoslavia</option>
                                <option value="ZM" countrynum="260">Zambia</option>
                                <option value="EAZ" countrynum="255">Zanzibar</option>
                                <option value="ZW" countrynum="263">Zimbabwe</option>
                            </optgroup>
                </select> -->
              </div>
              <div class="form-group" style="position: relative;">
                   <span class="user-reg-bd"><i class="fa fa-user" aria-hidden="true" style="font-size: 20px; color:#666;"></i>
                  </span>
                <input style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 16px;padding-left: 50px;"  type="text" name="first_name" class="form-control" id="" placeholder="First Name">
              </div>
               <div class="form-group" style="position: relative;">
                  <span class="user-reg-bd"><i class="fa fa-user" aria-hidden="true" style="font-size: 20px; color:#666;"></i>
                  </span>
                <input style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 16px;padding-left: 50px;"  type="text" name="last_name" class="form-control" id="" placeholder="Last Name">
              </div>
               <div class="form-group" style="position: relative;">
                <span class="user-reg-bd"><i class="fa fa-building" aria-hidden="true" style="font-size: 20px; color:#666;"></i></span>
                <input style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 16px;padding-left: 50px;"   type="text" name="company_name" class="form-control" id="" placeholder="Company Name">
              </div>
               <div class="form-group" style="position: relative;">
                <span class="user-reg-bd"><i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 20px; color:#666;"></i></span>
                <input style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 16px;padding-left: 50px;"   type="email" name="email" class="form-control" id="" placeholder="Email">
              </div>
               <div class="form-group" style="position: relative;">
                <span class="user-reg-bd"><i class="fa fa-key" aria-hidden="true" style="font-size: 20px; color:#666;"></i></span>
                <input style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 16px;padding-left: 50px;"   type="password" name="password" class="form-control" id="" placeholder="Password">
              </div>
               <div class="form-group" style="position: relative;">
                  <span class="user-reg-bd"><i class="fa fa-check-circle-o" aria-hidden="true" style="font-size: 20px; color:#666;"></i></span>
                <input style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 16px;padding-left: 50px;"   type="" name="" class="form-control" id="" placeholder="Enter the code shown">
              </div>
              <button type="submit" class="btn btn-default" style="width: 100%; background:#255E98;"><span style="color: #fff; font-size: 14px;">SUBMIT</span></button>
          </form>
        </div>
      </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
<script type="text/javascript">
function show_home()
{

document.getElementById('bang-trade').setAttribute(
   "style", "display: none;padding-top:0px;padding-right:0px;width:100%");
document.getElementById('back-home').setAttribute(
   "style", "display: block; padding-top:0px;padding-right:10px; transition: 2s;width:156px");
}

function  hide_home()
{
document.getElementById('back-home').setAttribute(
   "style", "display: none; padding-top:0px;padding-right:10px;transition: 2s;width:100%");
document.getElementById('bang-trade').setAttribute(
   "style", "display: block;padding-top:0px;padding-right:10px;width:156px");;

}


</script>