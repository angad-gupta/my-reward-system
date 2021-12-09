<?php

namespace App\Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

use App\Modules\User\Entities\User;
use App\Modules\User\Entities\Role;


class UserRole extends Model
{
    protected $fillable = [
        
        'user_id',
        'role_id'
    ];
    
    
     public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    
     public function userRole(){
        return $this->belongsTo(Role::class,'role_id');
    }
}
