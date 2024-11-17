<?php

namespace App\Models;

use App\Http\Controllers\CampaignSplitPotController;
use App\Http\Controllers\CampaignUsersController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class campaign extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'campaigns';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'org_name',
        'slug',
        'camp_title',
        'template',
        'theme_color',
        'season_id'
    ];

    public function media()
    {
        return $this->hasOne(CampaignMedia::class);
    }

    public function meta()
    {
        return $this->hasOne(CampaignMeta::class);
    }

    public function banners()
    {
        return $this->hasMany(banners::class);
    }
    public function payments()
    {
        return $this->hasMany(PaymentMethod::class);
    }
    public function organization()
    {
        return $this->hasOne(OrganizationMeta::class);
    }

    public function openGraph()
    {
        return $this->hasOne(CampaignOpenGraph::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function donations()
    {
        return $this->hasMany(Donations::class);
    }
    public function teams()
    {
        return $this->hasMany(Teams::class);
    }
    public function campaign_split_the_pot()
    {
        return $this->hasMany(CampaignSplitPot::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'campaign_users');
    }

    public function campaign_gallery()
    {
        return $this->hasMany(CampaignGallery::class);
    }
    public function sponsorship_opportunities()
    {
        return $this->hasMany(SponsorshipOpportunities::class);
    }

    public function custom_code()
    {
        return $this->hasOne(CampaignCustomCode::class);
    }
    public function organization_meta()
    {
        return $this->hasOne(OrganizationMeta::class);
    }
    public function email_template()
    {
        return $this->hasOne(EmailTemplate::class);
    }
    public function menu()
    {
        return $this->hasMany(CampaignMenu::class);
    }
    public function sponsor()
    {
        return $this->hasMany(Sponsor::class);
    }
    public function tips()
    {
        return $this->hasMany(Tips::class);
    }
}
