<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $table = 'campaign_payment_method';
    protected $fillable = ['campaign_id', 'environment', 'payment_method', 'status', 'api_key', 'public_key', 'pin','private_key'];

    public function campaign()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
