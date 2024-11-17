<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrandPrizes extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'grand_prizes';

    protected $fillable = [
        'id',
        'title',
        'amount',
        'image',
        'season_id'
    ];
    protected $dates = ['deleted_at'];

}
