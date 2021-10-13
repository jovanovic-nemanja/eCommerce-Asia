<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class bdtdcInqueryDocs extends Model
{
    protected $table = 'bdtdc_inquery_docs';
    // protected $guarded = array('created_at', 'updated_at');

    protected $fillable = ['inquery_id','docs','is_join_quote'];

    //docs folder: buying-request-docs


    
}
