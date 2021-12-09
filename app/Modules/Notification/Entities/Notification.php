<?php

namespace App\Modules\Notification\Entities;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        
        'creator_user_id',
        'notified_user_id',
        'message',
        'link',
        'is_read'
        
    ];
}
