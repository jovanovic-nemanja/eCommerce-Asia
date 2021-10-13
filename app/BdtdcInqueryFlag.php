<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BdtdcInqueryFlag extends Model
{
    protected $table = "bdtdc_inquery_flag";
    protected $fillable = ['inquery_id','user_took_action','is_join_quotation'];
}
