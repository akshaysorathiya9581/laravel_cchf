<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationMeta extends Model
{
    use HasFactory;
    protected $table = 'organization_meta';

    protected $fillable = [
        'campaign_id',
        'email',
        'legal_name',
        'bank_statement',
        'org_phone',
        'org_address',
        'org_address_2',
        'mailing_address',
        'tax_id',
        'statement_descriptor',
        'twilio_phone_number',
        'forward_to_number',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
