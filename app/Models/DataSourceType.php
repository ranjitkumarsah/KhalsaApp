<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataSourceType extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'data_source_types';

    protected $fillable = [
        'data_source_id',
        'data_source_type',
    ];
}
