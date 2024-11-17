<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EarlyBird extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'early_bird';

    protected $fillable = [
        'start_date',
        'end_date',
        'image',
        'season_id'
    ];
    
    protected $dates = ['deleted_at'];
}
