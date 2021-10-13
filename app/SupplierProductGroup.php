<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierProductGroup extends Model
{
    protected $table="bdtdc_supplier_product_groups";
    protected $fillable=['name','company_id'];
}
