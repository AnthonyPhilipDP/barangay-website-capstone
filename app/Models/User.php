<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'middle',
        'lastname',
        'suffix',
        'block',
        'lot',
        'phase',
        'house',
        'street',
        'subdivision',
        'barangay',
        'city_muni',
        'province',
        'dob',
        'pobcity',
        'pobprovince',
        'age',
        'civilstatus',
        'citizenship',
        'email',
        'password',
        'admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //To read the $complaint in controller and views
    public function complaint(){
        return $this->hasMany('App\Models\Complaint');
    }
    public function clearance(){
        return $this->hasMany('App\Models\Clearance');
    }
    public function businessclearance(){
        return $this->hasMany('App\Models\BusinessClearance');
    }
    public function residency(){
        return $this->hasMany('App\Models\Residency');
    }
    public function indigency(){
        return $this->hasMany('App\Models\Indigency');
    }
    public function news(){
        return $this->hasMany('App\Models\News');
    }
    public function announcement(){
        return $this->hasMany('App\Models\Announcement');
    }
    public function event(){
        return $this->hasMany('App\Models\Event');
    }
    public function business(){
        return $this->hasMany('App\Models\Business');
    }
    public function establishment(){
        return $this->hasMany('App\Models\Establishment');
    }
    
}
