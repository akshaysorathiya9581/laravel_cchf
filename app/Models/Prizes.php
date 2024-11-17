<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prizes extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'prizes';

    protected $fillable = [
        'id',
        'name',
        'draw_date',
        'image',
        'season_id'
    ];
    protected $dates = ['deleted_at'];
    public function ticketOptionsPrizes()
    {
        return $this->hasMany(TicketOptionsPrizes::class, 'prize_id', 'id');
    }
}
