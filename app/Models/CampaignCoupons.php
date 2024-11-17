<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignCoupons extends Model
{
    use HasFactory;
    protected $table = 'campaign_coupon';
    protected $fillable = [
        'id',
        'campaign_id',
        'coupon_id'
    ];


    public function coupons()
    {
        return $this->belongsTo(Coupons::class);
    }

}
