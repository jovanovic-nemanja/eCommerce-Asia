<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCompanyDeliveryTerm extends Model
{
    protected $table = 'bdtdc_company_delivery_terms';
    protected $guarded = array('created_at', 'updated_at');
    protected $fillable = ['delivery_terms','company_id'];
    
    public function company(){
    	return $this->belongsTo('App\Model\BdtdcCompany', 'company_id');
    }
}
