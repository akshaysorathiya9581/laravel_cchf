<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonationTips extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'donation_tips';

    protected $fillable = [
        'id',
        'donation_id',
        'recipient_id',
        'amount',
        'status',
        'created_at',
        'updated_at',
        // 'deleted_at'
    ];
    public function donation()
    {
        return $this->belongsTo(Donations::class);
    }
  
    public function tips()
    {
        return $this->belongsTo(Tips::class,'recipient_id');
    }
}
