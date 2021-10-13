<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCurrency extends Model
{
    protected $table="bdtdc_company_payment_currency";
    protected $fillable = ['payment_currency','company_id'];
}
