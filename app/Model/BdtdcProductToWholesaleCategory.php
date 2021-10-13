<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProductToWholesaleCategory extends Model
{
    protected $table = 'bdtdc_product_to_wholesale_category';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcProduct(){

       return $this->belongsTo('App\Model\BdtdcProduct','product_id','id');
    }
    public function bdtdcCategory(){
        return $this->belongsTo('App\Model\BdtdcCategory', 'category_id','id');
    }
    public function pro_images()
    {
        return $this->hasOne('App\Model\BdtdcProductImage', 'product_id','product_id');
    }
    public function pro_images_new()
    {
        return $this->hasOne('App\Model\BdtdcProductImageNew', 'product_id','product_id');
    }
    public function inquery()
    {
        return $this->hasMany('App\BdtdcSupplierQuery','product_id','product_id');
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
        return $this->hasMany('App\Model\BdtdcProductToWholesaleCategory', 'parent_id','parent_id');
    }
    public function cat_pro_price()
    {
        return $this->hasOne('App\Model\BdtdcProductPrice', 'product_id','product_id');
    }
    public function supp_images()
    {
        return $this->hasOne('App\Model\BdtdcCompanyImage', 'company_id','company_id');
    }
    public function supp_pro_company_name()
    {
        return $this->hasOne('App\Model\BdtdcCompanyDescription','company_id','company_id');
    }
    public function selected_suppliers()
    {
        return $this->hasMany('App\Model\BdtdcSelectedSupplier','parent_id','parent_id');
    }
     public function most_view_category()
    {
        return $this->hasMany('App\Model\BdtdcMostViewCategory', 'parent_id','parent_id');
    }
    public function bdtdc_customer()
    {
        return $this->hasOne('App\Model\BdtdcCustomer', 'company_id','company_id');
    }
}
