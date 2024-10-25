<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'usertype', 
        'is_ban', 
        'ban_reason',
        'provider',        
        'provider_id',     
        'phone_number',    
        'language',        
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_ban' => 'boolean',
        'phone_number' => 'string', 
        'language' => 'string', 
    ];


    public function ban($reason = null)
    {
        $this->is_ban = true;
        $this->ban_reason = $reason;
        $this->save();
    }


    public function unban()
    {
        $this->is_ban = false;
        $this->ban_reason = null;
        $this->save();
    }
}
