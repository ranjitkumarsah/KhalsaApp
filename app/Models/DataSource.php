<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataSource extends Model
{
    use HasFactory,softDeletes;

    public $table = 'data_sources';

    protected $fillable = [
        'name',
    ];
}
