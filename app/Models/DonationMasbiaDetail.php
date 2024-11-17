<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonationMasbiaDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'donation_id',
        'donation_location_id',
        'allocate_donation_id',
        'dedication_comments',
        'letter_price',
        'recognition_price',
        'is_recognition',
        'is_letter',
    ];

    protected $dates = ['deleted_at'];
}
