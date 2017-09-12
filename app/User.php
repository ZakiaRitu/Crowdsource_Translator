<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Sofa\Eloquence\Eloquence; // base trait
//use Eloquence;
class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{

   // use SoftDeletes;
    use Notifiable;
    use Authenticatable, Authorizable, CanResetPassword,EntrustUserTrait {
        EntrustUserTrait::can as may;
        Authorizable::can insteadof EntrustUserTrait;
    }




//    public function restore()
//    {
//        $this->restoreA();
//        $this->restoreB();
//    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

   // protected $username = 'username';
  //  protected $dates = ['deleted_at'];



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   // protected $fillable = ['username', 'email'];




    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token', 'username'];






    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * User Has many Translation
     */
    public function translations(){
        return $this->hasMany('App\Translation','user_id','id');
    }



}
