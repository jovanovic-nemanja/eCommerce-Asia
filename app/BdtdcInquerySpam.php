<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BdtdcInquerySpam extends Model
{
    protected $table="bdtdc_inquery_spam";
    protected $fillable = ['inquery_id','user_took_action','is_join_quotation'];
}
