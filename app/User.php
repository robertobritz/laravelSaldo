<?php

namespace App;

use App\Models\Balance;
use App\Models\Historic;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function balance()  //usar no sigular pois irá retornar somente um arquivo
    {
        return $this->hasOne(Balance::class);
    }

    public function historics()
    {
       return $this->hasMany(Historic::class);
    }

    public function getSender($sender)
    {
       return $this->where('name', 'LIKE', "%$sender%")   // o this faz referencia a própria model user
                 ->orWhere('email', $sender) //comando sql
                 ->get()
                 ->first();                 // retorna o primeiro e em objeto user.
    }  
}
