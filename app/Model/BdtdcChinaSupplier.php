<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcChinaSupplier extends Model
{
    protected $table = 'bdtdc_china_suppliers';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcCategory(){
    	return $this->belongsTo('App\Model\BdtdcCategory', 'category_id','id');
    }

    public function selected_copmany(){
    	return $this->belongsTo('App\Model\BdtdcCompany', 'company_id','id');
    }
    
    public function selected_copmany_name(){
    	return $this->hasOne('App\Model\BdtdcCompanyDescription', 'company_id','company_id');
    }
     
     public function BdtdcSelectedSupplier_products()
     {
        return $this->hasOne('App\Model\BdtdcProduct','id','product_id');
     }
     public function pro_name_string()
     {
        return $this->hasOne('App\Model\BdtdcProductDescription','product_id','product_id');
     }

      public function select_product_image()
    {
        return $this->hasOne('App\Model\BdtdcProductImage', 'product_id','product_id');
    }
    public function select_product_images()
    {
        return $this->hasOne('App\Model\BdtdcProductImageNew', 'product_id','product_id');
    }
    public function cat_pro_price()
    {
        return $this->hasOne('App\Model\BdtdcProductPrice', 'product_id','product_id');
    }
    public function parent_cat()
    {
        return $this->hasOne('App\Model\BdtdcCategory','id','parent_id');
    }
    public function pro_to_cat(){
        return $this->hasOne('App\Model\BdtdcProductToCategory','product_id','product_id');
    }
}
