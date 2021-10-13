<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BdtdcCertificationImage extends Model
{
    protected $table="bdtdc_certification_img";
    protected $fillable=['company_id','image'];
}
