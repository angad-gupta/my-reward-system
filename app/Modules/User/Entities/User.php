<?php

namespace App\Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Employment\Entities\Employment;
use App\Modules\User\Entities\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Modules\Dropdown\Entities\Dropdown;


class User extends Authenticatable
{

    use Notifiable;

    protected $fillable = [

        'ip_address',
        'username',
        'password',
        'email',
        'user_type',
        'department',
        'activation_code',
        'last_login',
        'active',
        'first_name',
        'middle_name',
        'last_name',
        'branch_location',
        'company',
        'phone',
        'emp_id',
        'remember_token',
        'parent_id'

    ];

    protected $hidden =[
        'ip_address',
        'password',
        'activation_code',
        'last_login',
        'remember_token',
        'created_at',
        'updated_at'

    ];

    protected $appends = ['full_name'];

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }
    
    public function dropdownField(){
        return $this->belongsTo(Dropdown::class,'branch_location');
    }
    
    
    public function userEmployer(){
        return $this->belongsTo(Employment::class,'emp_id');
    }
    
    
    public function generateActivationCode(){
        $alphabet = "abcdefghijklmnopqrstuwxyz$%*+-\|&!`~@_:ABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";    
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 10; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    
    public function getFullNameAttribute()
    {
        return $this->first_name." ".$this->last_name;
    }

    public function getDepartment() {
        return $this->belongsTo(Department::class, 'department', 'id');
    }
    public function getChild(){
        return $this->hasMany(User::class,'parent_id','id');
    }

    public function getParent() {
        
        return $this->belongsTo(User::class,'parent_id','id');
    }
}
