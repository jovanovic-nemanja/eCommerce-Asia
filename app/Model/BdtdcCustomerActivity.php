<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCustomerActivity extends Model
{
    protected $table = 'bdtdc_customer_activity';
	protected $fillable=['activity_id','customer_id','key','data','ip','date_added'];

	public function bdtdcCustomer()
    {
        return $this->belongsTo('App\Model\BdtdcCustomer', 'customer_id');
    }
    public function bdtdc_product()
    {
        return $this->hasMany('App\Model\BdtdcProduct','id', 'data');
    }
    public function bdtdc_product_category()
    {
        return $this->hasOne('App\Model\BdtdcProductToCategory','product_id', 'data');
    }
    public function bdtdc_company()
    {
        return $this->hasMany('App\Model\BdtdcCompany','id', 'data');
    }
}
