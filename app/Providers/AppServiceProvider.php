<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\Model\BdtdcCategory;
use App\Model\BdtdcPage;
use App\Model\BdtdcFooterModel;
use App\Model\BdtdcCompany;
use App\Model\BdtdcSupplierProduct;
use App\Model\BdtdcSupplierMainProduct;
use App\Model\BdtdcSupplierProductGroups;
use App\Model\BdtdcTemplateSetting;
use App\Model\BdtdcSupplierQuery;
use App\Model\Module;
use Route;
use Sentinel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        View::composer(array('fontend.layouts.all-category-list','fontend.category.allcategory','fontend.layouts.sidebar-home'),function($view){

            $data['categorys']=BdtdcCategory::with('sub_cat')->where('parent_id','0')->orderBy('sort_order', 'ASC')->where('status',1)->get();
            $view->with($data);
        });

        View::composer(array('fontend.layouts.header-dashboard','fontend.layouts.topbar','fontend.layouts.topbar-home','mobile-view.layout.topbar_m','mobile-view.admin-panel.user-login','fontend.supplier.dashboard','fontend.supplier.product_create','fontend.template.layout_dynamic','fontend.template.templete_layout'),function($view){

            $data['pages']=BdtdcPage::where('active',1)->get();
            $view->with($data);

        });

        View::composer(array('fontend.layouts.footer'),function($view){
            $data['footers']=BdtdcFooterModel::with('sub_pages')->where('parent_id',0)->take(5)->get();
            $view->with($data);
        });

        // View::composer(array('protected.admin.admin_dashboard','protected.admin.layouts.sidebar', 'protected.admin.layouts.access'),function($view){
        View::composer(array('protected.admin.admin_dashboard','protected.admin.layouts.sidebar'),function($view){
            //if(Sentry::check()){ // Sentry Check is not essential here, because it's already checked before getting the URL.
            $data['modules'] = Module::with(['childrens'])->where('parent_id','0')->get();

            $view->with($data);
        });

        View::composer(['fontend.template.header_information','fontend.template.templete_layout','fontend.template.product_list','fontend.template.layout_dynamic'],function($view){
            //$profile_id = Route::current()->parameters()['profile_id'];
            $id = Route::current()->parameters()['profile_id'];
            $company = BdtdcCompany::with('company_description')
                ->where('id',$id)
                ->first();

            $products = BdtdcSupplierProduct::with(['products', 'products.product_name'])
                                            ->where('supplier_id',$id)
                                            ->get();

            $main_products = BdtdcSupplierMainProduct::where('supplier_id',$id)->get(['product_name']);
            $nav_menus=BdtdcPage::where('prefix','Templete')->get();
            
            $product_groups=BdtdcSupplierProductGroups::where('company_id',$id)->get();

            $template_setting_data = BdtdcTemplateSetting::with('template_section')
                                                        ->where('company_id',$id)
                                                        ->get();

            $customer=BdtdcCompany::with('customers','supplier_info','name_string')->where('id',$id)->first();

            $company_no_name = ($customer?($customer->name_string?(trim($customer->name_string->name)!=''?$customer->name_string->name:'not available'):'not available'):'not available');

            $pages=BdtdcPage::where('active',1)->get();
            $view->with(compact(['template_setting_data','products','company','main_products','id','nav_menus','product_groups','pages','customer','company_no_name']));
        });

        View::composer(array('fontend.supplier.dashboard'),function($view){

            $data['rejected_buying_request']=BdtdcSupplierQuery::where('product_owner_id', Sentinel::getUser()->id)->where('status', 3)->count();
            $view->with($data);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
