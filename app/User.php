<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const SUPERADMIN_TYPE = 'superadmin';
    const ADMIN_TYPE = 'admin';
    const COORDINATOR_TYPE = 'coordinator';
    const DEFAULT_TYPE = 'default';

    public function isSuperadmin()    {        
        return $this->type === self::ADMIN_TYPE;    
    }
    public function isAdmin()    {        
        return $this->type === self::ADMIN_TYPE;    
    }
    public function isCoordinator()    {        
        return $this->type === self::COORDINATOR_TYPE;    
    }
    public function isUser()    {        
        return $this->type === self::DEFAULT_TYPE;    
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','emp_id','joining','designation','experience',
        'dob','mobile','aadhar','pan','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeSearchId($query,$keyword){ 
        return $query->where('emp_id','like','%'.$keyword);
    }
}
