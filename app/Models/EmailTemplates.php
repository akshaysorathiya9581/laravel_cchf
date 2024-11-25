<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplates extends Model
{
    use HasFactory;
    
    protected $table = 'email_template';

    protected $fillable = [
        'campaign_id',
        'page',
        'subject',
        'message',
    ];

    
    protected $dates = ['created_at','created_at'];
}
