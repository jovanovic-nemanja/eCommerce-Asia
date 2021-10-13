<?php $id = Route::current()->parameters()['profile_id'];
       $customer=App\Model\BdtdcCompany::with('customers','supplier_info','name_string')->where('id',Route::current()->parameters()['profile_id'])->first();
      $company_no_name = ($customer?($customer->name_string?(trim($customer->name_string->name)!=''?$customer->name_string->name:'not available'):'not available'):'not available');
?>
<p style="margin-top:5%;padding-left: 15px;">Company Overview</p>
<div class="">
      <ul class="list-group capability overview">
            <li class="list-group-item shad_background"><span class="capability_list logo_color">Company Capability</span></li>
            <li class="list-group-item"><a href="{{ URL::to('trade-capacity/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$company_no_name),$id) }}" >Trade Capacity</a></li>
            <li class="list-group-item"><a href="{{ URL::to('production-capacity/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$company_no_name),$id) }}" >Production Capacity</a></li>
            <li class="list-group-item"><a href="{{ URL::to('rd-capacity/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$company_no_name),$id) }}" >R&D Capacity</a></li>
      </ul>
      <ul class="list-group capability performance">
            <li class="list-group-item shad_background"><span class="capability_list logo_color">Business Performence</span></li>
            <li class="list-group-item"><a href="{{ URL::to('buyer-interaction/'.preg_replace('/[^A-Za-z0-9\-]/', '-',$company_no_name),$id) }}" >Buyer interaction</a></li>
      </ul>
</div>