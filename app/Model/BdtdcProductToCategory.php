<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProductToCategory extends Model
{
    protected $table = 'bdtdc_product_to_category';
	protected $guarded = array('created_at', 'updated_at');

    public function MostViewCategory()
    {
        return $this->belongsTo('App\Model\BdtdcMostViewCategory','product_id','product_id');
    }
	public function bdtdcProduct()
    {
	   return $this->belongsTo('App\Model\BdtdcProduct','product_id','id');
	}
    public function pro_to_cat_name()
    {
        return $this->hasOne('App\Model\BdtdcProductDescription','product_id','product_id');
    }
	public function bdtdcCategory()
    {
    	return $this->belongsTo('App\Model\BdtdcCategory', 'category_id','id');
    }

    public function BdtdcCategoryDescription()
    {
        return $this->hasOne('App\Model\BdtdcCategoryDescription','category_id','category_id');
    }
    public function BdtdcParentCategoryDescription()
    {
        return $this->hasOne('App\Model\BdtdcCategoryDescription','category_id','parent_id');
    }
    public function pro_images()
    {
    	return $this->hasOne('App\Model\BdtdcProductImage', 'product_id','product_id');
    }
    public function images()
    {
        return $this->belongsTo('App\Model\BdtdcProductImage', 'product_id','product_id');
    }
    public function images_new()
    {
        return $this->belongsTo('App\Model\BdtdcProductImageNew', 'product_id','product_id');
    }
    public function pro_images_new()
    {
        return $this->hasOne('App\Model\BdtdcProductImageNew', 'product_id','product_id');
    }
    public function inquery()
    {
    	return $this->hasMany('App\BdtdcSupplierQuery','product_id','product_id');
    }
    public function supplier_inquery()
    {
        return $this->hasMany('App\Model\BdtdcSupplierInquery','product_id','product_id');
    }
    public function category_product_name()
    {
        return $this->hasOne('App\Model\BdtdcProductDescription','product_id','product_id');
    }
    public function category_product_id()
    {
        return $this->hasOne('App\Model\BdtdcProduct','id','product_id');
    }
     public function supp_pro_company()
    {
        return $this->belongsTo('App\Model\BdtdcCompany','company_id','id');
    }
    public function supp_pro_company_name()
    {
        return $this->hasOne('App\Model\BdtdcCompanyDescription','company_id','company_id');
    }
    public function pro_parent_cat()
    {
        return $this->belongsTo('App\Model\BdtdcCategory', 'parent_id','id');
    }
    public function cat_country(){

        return $this->belongsTo('App\Model\BdtdcCountry', 'country_id','id');
    }
    public function pro_cat_country_image()
    {
        return $this->hasMany('App\Model\BdtdcCountryImage','country_id','country_id');
    }
    public function pro_parent()
    {
        return $this->hasMany('App\Model\BdtdcCategory', 'parent_id','parent_id');
    }

    public function parent_product()
    {
        return $this->hasMany('App\Model\BdtdcProductToCategory', 'parent_id','parent_id');
    }
    public function cat_pro_price()
    {
        return $this->hasOne('App\Model\BdtdcProductPrice', 'product_id','product_id');
    }
    public function selected_suppliers()
    {
        return $this->hasMany('App\Model\BdtdcSelectedSupplier', 'parent_id','parent_id');
    }

    public function selected_country_suppliers()
    {
        return $this->hasMany('App\Model\BdtdcSelectedSupplier', 'country_id','country_id');
    }

    public function selected_china_suppliers()
    {
        return $this->hasMany('App\Model\BdtdcChinaSupplier', 'parent_id','parent_id');
    }
    public function most_view_category()
    {
        return $this->hasMany('App\Model\BdtdcMostViewCategory', 'parent_id','parent_id');
    }
    public function bdtdc_customer()
    {
        return $this->hasOne('App\Model\BdtdcCustomer', 'company_id','company_id');
    }
    public function bdtdc_suppliers()
    {
        return $this->hasOne('App\Model\BdtdcSupplier', 'company_id','company_id');
    }
    public function tradeinfo()
    {
         return $this->hasOne('App\Model\BdtdcTradeInfo','company_id','company_id');
    }
    public function factoryinfo()
    {
         return $this->hasOne('App\Model\BdtdcFactoryInfo','company_id','company_id');
    }
    public function companymainmarket()
    {
        return $this->hasOne('App\Model\BdtdcCompanyMainMarket','company_id','company_id');
    }

     public function bdtdc_main_market()
    {
        return $this->hasMany('App\Model\BdtdcCompanyMainMarket','company_id','company_id');
    }
    public function BdtdcSupplierProduct()
    {
        return $this->hasOne('App\Model\BdtdcSupplierProduct','product_id','product_id');
    }
    public function supplier_info(){
        return $this->hasOne('App\Model\BdtdcSupplierInfo','company_id','company_id');
    }
    public function supplier_infos(){
        return $this->hasMany('App\Model\BdtdcSupplierInfo','company_id','company_id');
    }

    public function BdtdcWholesaleCategoryDescription()
    {
        return $this->belongsTo('App\Model\BdtdcWholesaleCategoryDescription','category_id','category_id');
    }
     public function supp_company()
    {
        return $this->hasOne('App\Model\BdtdcCompany','id','company_id');
    }
    public function BdtdcAllCategoryProduct()
    {
        return $this->hasMany('App\Model\BdtdcProductToCategory','category_id','category_id');
    }
    public function suppliers_other_products()
    {
        return $this->hasMany('App\Model\BdtdcProductToCategory','category_id','category_id')->where('company_id','=',$this->company_id)->where('product_id','!=',$this->product_id)->orderByRaw("RAND()")->take(6);
    }
    public function other_wholesalers_products()
    {
        return $this->hasMany('App\Model\BdtdcProductToCategory','category_id','category_id')->where('company_id','!=',$this->company_id)->orderByRaw("RAND()")->take(8);
    }
    public function supplier_main_certificates(){
        return $this->hasMany('App\BdtdcCertificationImage','company_id','company_id');
    }
    public function supplier_honor_certificates(){
        return $this->hasMany('App\BdtdcHonorImage','company_id','company_id');
    }
    public function supplier_patents(){
        return $this->hasMany('App\BdtdcPatentImage','company_id','company_id');
    }
    public function supplier_trademarks(){
        return $this->hasMany('App\BdtdcTrademarksImage','company_id','company_id');
    }

}
