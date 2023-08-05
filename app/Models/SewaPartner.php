<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class SewaPartner extends Authenticatable
{
    use HasFactory;
    protected $table = "sewapartners";
    protected $fillable=['name', 'email', 'password','contactnumber','sewa_address','categories','timings','services'];
}
