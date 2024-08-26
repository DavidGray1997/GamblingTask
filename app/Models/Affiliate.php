<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'affiliates';

    protected $fillable = [
        'name',
        'affiliate_id',
        'latitude',
        'longitude'
    ];
}
