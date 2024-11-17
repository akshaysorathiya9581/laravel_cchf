<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailApiSettings extends Model
{
    use HasFactory;
    protected $table = 'email_api_settings';

    protected $fillable = [
        'id',
        'user_id',
        'campaign_id',
        'api_key',
        'from_email',
        'from_name',
        'reply_to'
    ];
}
