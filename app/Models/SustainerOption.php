<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SustainerOption extends Model
{
    use HasFactory;
    use SoftDeletes;

     protected $fillable = [
        'campaign_id',
        'name',
        'notification',
        'entries'
    ];

    protected $dates = ['deleted_at'];
}
