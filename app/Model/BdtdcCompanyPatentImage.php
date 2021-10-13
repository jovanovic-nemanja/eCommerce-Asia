<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCompanyPatentImage extends Model
{
    protected $table="bdtdc_patent_image";
    protected $fillable=['company_id','image'];
}
