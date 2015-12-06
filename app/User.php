<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * A User has many Tickets
     * returns the Tickets owned by the User
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * A User has many Comments
     * returns the Comments owned by the User
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     *
     * Checks if the User is admin
     *
     * @return bool
     */
    public function is_admin()
    {
        $role = $this->role;

        if($role == 'admin')
        {
            return true;
        }
        else {
            return false;
        }
    }
}
