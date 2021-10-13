<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCompanyImage extends Model
{
    protected $table = "bdtdc_company_images";
    protected $fillable = ['image','company_id'];
}
