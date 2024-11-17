<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teams extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'campaign_teams';

    protected $fillable = [
        'campaign_id',
        'first_name',
        'last_name',
        'display_name',
        'email',
        'slug',
        'phone_system_code',
        'goal',
        'currency'
    ];

    protected $dates = ['deleted_at'];
    
    public function campaigns()
    {
        return $this->belongsTo(Campaign::class);
    }
}
