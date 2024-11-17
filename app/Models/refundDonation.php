<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refundDonation extends Model
{
    use HasFactory;
    protected $table = 'refund_donations';

    protected $fillable = [
        'id',
        'doid',
        'refund_message',
        'refund_status',
        'refund_id',
        'refund_amount',
        'schedule_message',
        'notes',
        'refund_date',

    ];
}
