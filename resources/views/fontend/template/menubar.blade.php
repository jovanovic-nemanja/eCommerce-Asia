<div class="row">
      <div style="background:#999999;height:38px" class="col-xs-12">
            <ul style="border-bottom:none;color:#ffffff;margin-top: 0%" class="nav nav-tabs">
                  <li class="active"><a href="{{ URL::to('profile/template_',Route::current()->parameters()['profile_id']) }}">Home</a></li>
                  <li class="dropdown template_menu_li">
                        <a style="color:#ffffff" class="dropdown-toggle" data-toggle="dropdown" href="#">Product Category
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu template_menubar_dropdown">
                              <li><a href="#">Submenu 1-1</a></li>
                              <li><a href="#">Submenu 1-2</a></li>
                              <li><a href="#">Submenu 1-3</a></li>
                        </ul>
                  </li>
                  <li class="template_menu_li"><a style="color:#ffffff" href="{{ URL::to('profile/company_',Route::current()->parameters()['profile_id']) }}">Company Profile</a></li>
                  <li class="template_menu_li"><a style="color:#ffffff" href="#" >Contact</a></li>
            </ul>
      </div>
</div>