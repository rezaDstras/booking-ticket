<?php

namespace App\Models;

use App\Traits\HasManyTickets;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ,SoftDeletes , HasManyTickets;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'phone_number',
        'password',
    ];
    /**
     * The attributes that should use timestamp.
     *
     */
    protected $dates = [
      'deleted_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    //Set UpperCase Name For Inserting To Database
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
    //Show Replaced Phone number
    public function getPhoneNumberAttribute($value)
    {
        return substr_replace($value,'****',4,4);
    }

    //RelationShips
//    public function tickets()
//    {
//        return $this->hasMany(Ticket::class);
//    }

}
