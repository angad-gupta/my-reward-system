<?php

namespace App\Modules\Customer\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Order\Entities\Order;

class Reward extends Model
{

    protected $fillable = [
        'order_id',
        'reward_amount',
        'expiry_date',
        'expiry_status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
}
