<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BdtdcPatentImage extends Model
{
    protected $table="bdtdc_patent_image";
    protected $fillable=['company_id','image'];
}
