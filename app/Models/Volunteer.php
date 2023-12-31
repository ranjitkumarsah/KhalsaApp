<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
class Volunteer extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $guard = 'api';
    protected $fillable = [
        'name', 'email', 'password','contact_number','aadhaar_card','vote_card','profile_pic','village','landmark','address','token','fcm_token','device_type'
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }  
}
