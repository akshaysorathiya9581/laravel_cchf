<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tips extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tips";
    protected $fillable =
    [
        'campaign_id',
        'title',
        'amount',
    ];

    protected $dates = ['deleted_at'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
   
}
