<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCompanyService extends Model
{
    protected $table = 'bdtdc_company_services';
    protected $guarded = array('created_at', 'updated_at');
    protected $fillable = ['company_id','name'];

   
}
