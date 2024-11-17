<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampaignGallery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'campaign_gallery';

    protected $fillable = [
        'campaign_id',
        'title',
        'image',
        'embed',
    ];

    protected $dates = ['deleted_at'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public static function getCampaingGallery($campaignId)
    {
        $data =   CampaignGallery::where('campaign_id', $campaignId)->get();
        $gallery_data = $data->map(function ($gallery) {

            return  [
                'id' => $gallery->id,
                'imageURL' =>  $gallery->image,
                'linkUrl' => "",
                'title' => $gallery->title,
                'embedUrl' => $gallery->embed,
            ];
        });

        return $gallery_data;
    }
}
