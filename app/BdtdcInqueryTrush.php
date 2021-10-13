<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BdtdcInqueryTrush extends Model
{
    protected  $table = "bdtdc_inquery_trush";
    protected $fillable = ['inquery_id','user_took_action','is_join_quotation'];
}
