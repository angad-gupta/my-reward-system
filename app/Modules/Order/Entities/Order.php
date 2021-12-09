<?php

namespace App\Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Currency\Entities\Currency;
use App\Modules\Customer\Entities\Customer;

class Order extends Model
{

    protected $fillable = [
        'name',
        'customer_id',
        'sale_amount',
        'currency_id',
        'status'

    ];

    public function CurrencyInfo(){
        return $this->belongsTo(Currency::class,'currency_id','id');
    }

    public function CustomerInfo(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }


    

}
