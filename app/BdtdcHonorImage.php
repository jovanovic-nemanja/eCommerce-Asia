<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BdtdcHonorImage extends Model
{
    protected $table="bdtdc_honor_image";
    protected $fillable=['company_id','image'];
}
