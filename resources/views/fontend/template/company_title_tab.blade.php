 <div class="col-md-8 padding_0">
      <span class="company_title header_company_name" style="color:#1A4570;font-weight:bold"></span> &nbsp;
      <i class="fa fa-check-square text-success"></i>
</div>
<div class="col-md-4 padding_0">
      <ul class="list-inline pull-right">
            <li>
            <?php
            	use App\Model\User;
                if($profile_owner_id){
                            $user_active_data = User::where('id',$profile_owner_id)->first();
                            $user_active = $user_active_data->active;
                }else{
                      $user_active = 0;
                }
        	?>
        	@if($user_active == '1')
            <a class="chat_single" data-target-id="" href=""><i class="fa fa-weixin" style="color: green;"></i> &nbsp;Online</a>
            @else
            <a class="contact_supplier" data-product_id="#" data-supplier_id="" href="#"><i class="fa fa-weixin"></i> &nbsp;Offline</a>
            @endif
            </li>
            <li><a class="btn btn-primary btn-sm contact_supplier" href="#" data-product_id="#" data-supplier_id=""><i class="fa fa-envelope" data-supplier_id=""></i>&nbsp; Contact-Supplier</a></li>
      </ul>
</div>