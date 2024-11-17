<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    // Define the fillable fields
    protected $fillable = [
        'user_id',
        'campaign_id',
        'is_updates_news',
        'is_new_course',
        'is_new_parsha_lecture',
        'is_invitation_customer',
        'is_request_rate_review',
        'is_reminders_progress_courses',
        'is_like_comment',
        'is_top_trending_courses'
    ];
}
