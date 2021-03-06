<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Config;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id', 'name', 'email', 'password', 'role_id', 'remember_token', 'email_verified_at'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(\App\Role::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order()
    {
        return $this->hasOne(\App\Order::class);
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        $adminRole = \App\Role::where(
            'name',
            '=',
            Config::get('constants.db.roles.admin')
        )->first();
        return $this->role_id === $adminRole->id;
    }

    /**
     * @return string
     */
    public function instanceCartName()
    {
        $userName = [
            $this->id,
            $this->name
        ];
        return implode('_', $userName);
    }
}
