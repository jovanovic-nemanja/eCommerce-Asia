<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcTradeInfo extends Model
{
    //
    protected $table = 'bdtdc_company_trade_info';
    protected $guarded = array('created_at', 'updated_at');
    protected $fillable =['anual_sales_volume','export_percentage','year_of_exporting','no_of_emp_trade_dept','source_across_multiple_industries','no_rd_staff','no_qc_staff','avarage_lead_time','has_overseas_ofice','company_id','add_customer'];
    
    public function company(){
    	return $this->belongsTo('App\Model\BdtdcCompany', 'company_id');
    }
    public function BdtdcFormValue(){
    	return $this->hasOne('App\BdtdcFormValue', 'id', 'anual_sales_volume');
    }
    public function form_export_percentage(){
        return $this->hasOne('App\BdtdcFormValue', 'id', 'export_percentage');
    }
    public function emp_trade_dept(){
        return $this->hasOne('App\BdtdcFormValue', 'id', 'no_of_emp_trade_dept');
    }
}
