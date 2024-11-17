<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class banners extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'banners';
    protected $fillable = [
        'campaign_id',
        'file_title',
        'text_main_content',
        'text_sub_content',
        'text_button',
        'text_button_link',
        'text_amount',
        'start_date',
        'end_date',
        'banner_type',
        'file_desktop_image',
        'file_mobile_image',
        'text_desktop_image',
        'text_mobile_image',
        'secondary_button_content',
        'secondary_button_url'
    ];
    protected $dates = ['deleted_at'];
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
