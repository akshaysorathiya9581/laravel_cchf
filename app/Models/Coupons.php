<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\campaign;


class Coupons extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'coupons';

    protected $fillable = [
        'id',
        'title',
        'type',
        'minimum_amount',
        'discount_amount',
        'start_date',
        'end_date',
        'multiplyer',
        'season_id'
    ];

    protected $dates = ['deleted_at'];

    public function campaigns()
    {
        return $this->hasMany(campaign::class);
    }
}
