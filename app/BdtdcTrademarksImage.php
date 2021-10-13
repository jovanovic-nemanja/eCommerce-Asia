<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BdtdcTrademarksImage extends Model
{
    protected $table="bdtdc_trademarks_image";
    protected $fillable=['company_id','image'];
    
}
