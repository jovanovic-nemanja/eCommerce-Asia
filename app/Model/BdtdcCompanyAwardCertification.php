<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCompanyAwardCertification extends Model
{
    //
    
    protected $table = 'bdtdc_company_honor_award_certifications';
    protected $guarded = array('created_at', 'updated_at');
    
    public function company(){
    	return $this->belongsTo('App\Model\BdtdcCompany', 'company_id');
    }
}
