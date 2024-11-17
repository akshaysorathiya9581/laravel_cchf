<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $connection =  'central';
    protected $table = 'organization';
    protected $fillable = [
        'name',
        'slug',
        'title',
        'email',
        'database'
    ];
    protected $dates = ['deleted_at'];
}
