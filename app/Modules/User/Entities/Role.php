<?php

namespace App\Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\User\Entities\Permission;

class Role extends Model
{
    protected $fillable = [
        
        'name',
        'user_type',
        'status'
    ];
    
    public function permission()
    {
        return $this->hasMany(Permission::class);
    }
    
}
       
