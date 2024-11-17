<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    use HasFactory;
    protected $table = 'campaign_email_template';

    protected $fillable = [
        'campaign_id',
        'before_donation_details',
        'after_donation_details'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
