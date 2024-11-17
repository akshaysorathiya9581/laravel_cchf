<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seasons extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'seasons';

    protected $fillable = [
        'id',
        'name',
        'start_date',
        'end_date'
    ];
    protected $dates = ['deleted_at'];
}
