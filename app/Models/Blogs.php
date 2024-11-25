<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blogs extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'slug',
        'author',
        'video_link',
        'publish_date',
        'image',
        'description',
        'user_id',
        'season_id',
    ];

    
    protected $dates = ['deleted_at'];
    
    public function users()
    {
        return $this->hasOne(User::class);
    }
}
