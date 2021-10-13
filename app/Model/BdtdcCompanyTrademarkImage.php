<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCompanyTrademarkImage extends Model
{
    protected $table="bdtdc_trademarks_image";
    protected $fillable=['company_id','image'];
}
