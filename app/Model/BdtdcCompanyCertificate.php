<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCompanyCertificate extends Model
{
    //
    
    protected $table = 'bdtdc_company_certificates';
    protected $guarded = array('created_at', 'updated_at');
    
    public function company(){
    	return $this->belongsTo('App\Model\BdtdcCompany', 'company_id');
    }
}
