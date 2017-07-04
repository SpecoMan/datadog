<?php

namespace App;

use App\Models\Roles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'roles_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isUser()
    {
        if (Roles::where('id', $this->roles_id)->first()->name == 'user')
            return true;
        else
            return false;
    }

    public function isAdmin()
    {
        if (Roles::where('id', $this->roles_id)->first()->name == 'admin')
            return true;
        else
            return false;
    }
}
