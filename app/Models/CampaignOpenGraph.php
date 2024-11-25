<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignOpenGraph extends Model
{
    use HasFactory;

    protected $table = 'campaign_og_settings';
    protected $fillable = [
        'page', 'campaign_id', 'og_title', 'og_description', 'og_image'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
