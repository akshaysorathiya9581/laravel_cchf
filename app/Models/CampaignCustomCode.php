<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignCustomCode extends Model
{
    use HasFactory;
    protected $table = 'campaign_custom_code';
    protected $fillable = [
        'id',
        'campaign_id',
        'content'
    ];


    public function campaign()
    {
        return $this->belongsTo(campaign::class);
    }
}
