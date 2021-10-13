<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class OrderPaymentHistory extends Model
{
	protected $table = 'order_payment_history';
	protected $fillable = ['order_id','pay_amount'];

	public function orders()
	{
		return $this->belongsTo('App\Model\BdtdcOrder','order_id','id');
	}
	public function order_invoice()
	{
		return $this->hasOne('App\Model\BdtdcSupplierInvoice','order_id','order_id');
	}
	


}