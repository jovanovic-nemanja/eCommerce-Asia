            
           <?php
           $active_url = $_SERVER['REQUEST_URI'];
           // echo $active_url;
           use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
           use App\Model\Role_user;
           $user_id = Sentinel::getUser()->id;
           $user_role = Role_user::where('user_id',$user_id)->first();
           // print_r($user_role->role_id);
           ?>
             
@if (Sentinel::check())
            <?php
              $role = App\Model\Role_user::where('user_id',Sentinel::getUser()->id)->first();
               
            ?>
  @endif
 <div class="col-sm-12 col-md-12 col-lg-12" style="padding: 0px;">
            
           
            <div id="navigation-menu-manager" style="border:1px solid rgba(0,0,0,.2);z-index: 9;margin: 0px" >
                <div style="border-bottom:1px solid rgba(0,0,0,.2);padding-top: 20px;" >
                  <p class="navigation-normal-title"  style="font-size:14px;font-weight:bold;color: #fff"><i style="" class="fa fa-home" aria-hidden="true"></i> Home </p> 
                </div> 
                <div style="padding-left:4px;width:100%;padding-top:10px;padding-bottom:30px">
                <ul class="navigation-menu-list">
                       <li class="navigation-menu-list-li"><a target="_blank" itemprop="url"  href="{{ URL::to('default','message') }}" class="navigation-menu-list-li-a">Messages & Contacts</a></li>

                       <li class="navigation-menu-list-li" title=""><a target="_blank" class="navigation-menu-list-li-a" itemprop="url" href="{{ URL::to('default','message') }}">New Inquiry 
              @if (Sentinel::check())
              <span title="" class="total_new_inquiry"></span>
              @endif
            </a></li>
            <li class="navigation-menu-list-li" title="" style=""><a target="_blank" class="navigation-menu-list-li-a" itemprop="url" href="{{ URL::to('Mybuying-Request',null) }}">New Quote 
              @if (Sentinel::check())
              <span title="" class="total_new_quote"></span>
              @endif
            </a></li>

            <li class="navigation-menu-list-li" title=""><a target="_blank" class="navigation-menu-list-li-a" itemprop="url" href="{{ URL::to('order-list',null) }}">Order 
              @if (Sentinel::check())
              <span title="" class="total_new_order"></span>
              @endif
            </a></li>
                       <!-- <li class="navigation-menu-list-li"><a itemprop="url"  href="{{ URL::to('account-settings',null) }}" class="navigation-menu-list-li-a">Account Settings</a></li> -->

                        <div style="margin-top: 10%;color: #fff" class="navigation-normal-title">For Buyer</div>
                       <li class="navigation-menu-list-li"><a target="_blank" itemprop="url"  href="{{ URL::to('get-quotations',null) }}" class="navigation-menu-list-li-a">Post buying requests</a></li>
                       <li class="navigation-menu-list-li"><a target="_blank" itemprop="url"  href="{{ URL::to('Mybuying-Request',null) }}" class="navigation-menu-list-li-a">Manage Buying Requests</a></li>
                       <!-- <li class="navigation-menu-list-li"><a target="_blank" itemprop="url"  href="{-{ URL::to('list/view/requested/sample') }-}" class="navigation-menu-list-li-a">Manage Sample Requests</a></li> -->
                       <!-- <li class="navigation-menu-list-li"><a itemprop="url"  href="{-{ URL::to('Trade/alert') }-}" class="navigation-menu-list-li-a">Trade Alert</a></li> -->
                       <li class="navigation-menu-list-li"><a target="_blank" itemprop="url"  href="{{ URL::to('my-supplier',null) }}" class="navigation-menu-list-li-a">My Supplier</a></li>
                       @if($role->role_id ==3)
                       <div style="margin-top: 10%;color: #fff" class="navigation-normal-title">For Supplier</div>
                       <li class="navigation-menu-list-li"><a target="_blank" itemprop="url"  target="_blank" href="{{ URL::to('dashboard','product') }}" class="navigation-menu-list-li-a">Manage Products</a></li>
                       <li class="navigation-menu-list-li"><a target="_blank" itemprop="url"  target="_blank" href="{{ URL::to('dashboard','company_site') }}" class="navigation-menu-list-li-a">Company & Site</a></li>
                       <li class="navigation-menu-list-li"><a target="_blank" itemprop="url"  target="_blank" href="{{ URL::to('quotation/management',null) }}" class="navigation-menu-list-li-a">Quotes Management</a></li>
                       <!-- <li class="navigation-menu-list-li"><a target="_blank" itemprop="url"  href="{-{ URL::to('list/view/requested/sample') }-}" class="navigation-menu-list-li-a">Manage Sample Requests</a></li> -->
                    
                       <li class="navigation-menu-list-li"><a target="_blank" itemprop="url"  target="_blank" href="{{ URL::to('my-buyer',null) }}" class="navigation-menu-list-li-a">My Buyer</a></li>
                        <!-- <li class="navigation-menu-list-li"><a target="_blank" itemprop="url"  target="_blank" href="{-{ URL::to('extra-inquery') }-}" class="navigation-menu-list-li-a">Extra Inquiries</a></li> -->
                        <li class="navigation-menu-list-li"><a target="_blank" itemprop="url"  target="_blank" href="{{ URL::to('product/manage_product_group',null) }}" class="navigation-menu-list-li-a">Manage product groups</a></li>
                        @endif
                
                </ul>
                       
                </div>
            </div>
        </div>

