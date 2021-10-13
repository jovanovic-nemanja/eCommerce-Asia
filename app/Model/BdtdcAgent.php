<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcAgent extends Model
{
    protected $table = 'bdtdc_agents';
    protected $guarded = array('created_at', 'updated_at');
    protected $fillable = ['company_id','industry','experience','education','main_customer','join_date','is_active'];

   
}
