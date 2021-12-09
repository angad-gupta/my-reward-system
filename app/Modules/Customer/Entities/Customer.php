<?php

namespace App\Modules\Customer\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Currency\Entities\Currency;
use App\Modules\Customer\Entities\Reward;
use App\Modules\Order\Entities\Order;

class Customer extends Model
{

    protected $fillable = [

    	'name',
    	'currency_id',
        'rewars_credit',

    ];

    public function CurrencyInfo(){
        return $this->belongsTo(Currency::class,'currency_id','id');
    }
    

    public function getFullDetailAttribute()
    {
       return ucfirst($this->name) . ' :: ' . ucfirst($this->CurrencyInfo->name);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    } 

    public function rewards()
    {
        return $this->hasManyThrough(Reward::class,Order::class);
    } 

    public function getCreditWorthAttribute()
    {   
        $currency = Currency::find($this->currency_id);

        if($currency->name != 'USD'){
            return number_format( $this->reward_credit * 0.01 / $currency->value ,2 ,'.' ,'');
        }else{
            return number_format( $this->reward_credit * 0.01 / 1 ,2 ,'.' ,'');
        }
    }
 
}
