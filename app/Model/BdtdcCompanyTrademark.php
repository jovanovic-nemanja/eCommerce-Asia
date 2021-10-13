<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCompanyTrademark extends Model
{
    protected $table    ="bdtdc_trademarks";
    protected $fillable = ['company_id','registration_no','start_date','end_date','scope'];
}
