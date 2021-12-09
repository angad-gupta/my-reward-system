<?php

namespace App\Modules\UserLog\Entities;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $fillable = ['user_id','ip_address','longitude','latitude','action'];
    protected $table = 'userlogs';
}
