<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCompanyPatent extends Model
{
    protected $table    ="bdtdc_patent";
    protected $fillable = ['company_id','patent_no','patent_name','patent_type','start_date','end_date','scope'];
}
