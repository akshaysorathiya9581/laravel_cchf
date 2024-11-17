<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampaignMenu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "campaign_menu";
    protected $fillable =
    [
        'campaign_id',
        'title',
        'url',
        'type',
        'order_by'
    ];

    protected $dates = ['deleted_at'];
    
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
