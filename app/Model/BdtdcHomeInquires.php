<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcHomeInquires extends Model
{
    protected $table = "bdtdc_home_inquires";
    protected $fillable = ['id','inquiry_id','view','images','show','sort'];
    
    
}
