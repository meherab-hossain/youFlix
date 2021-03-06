<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    public $incrementing=false;

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static ::creating(function ($model){
           $model->{$model->getKeyName()}=(string)Str::uuid();
        });
    }

    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function channel(){
        return  $this->hasOne(Channel::class);
    }


}
