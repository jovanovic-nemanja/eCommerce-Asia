<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BdtdcJoinQuotation extends Model
{
    protected $table = "bdtdc_join_quotation";
    protected $fillable = ['product_id','product_owner_id','sender','message','is_join_quotation'];
}
