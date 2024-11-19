<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OpenGraph extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'og_title', 
        'og_image', 
        'og_description',
        'page'
    ];

    protected $dates = ['deleted_at'];
}
