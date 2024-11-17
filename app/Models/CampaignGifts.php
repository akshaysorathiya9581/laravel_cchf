<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampaignGifts extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "campaign_gifts";
    protected $fillable =
    [
        'name',
        'campaign_id',
        'amount',
        'draw_date',
        'image',
        'old_image',
        'details'
    ];
    protected $dates = ['deleted_at'];
}
