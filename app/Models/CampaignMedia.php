<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignMedia extends Model
{
    use HasFactory;
    protected $table = 'campaign_media';
    protected $fillable = ['campaign_id', 'logo_url'];


    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
