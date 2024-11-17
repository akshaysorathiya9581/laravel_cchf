<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    use HasFactory;
    protected $table = "transaction_detail";
    protected $fillable =
    [
        'donation_id',
        'card_number',
        'card_type',
        'card_token',
        'card_expiry',
        'pay_method',
        'error_detail',
        'customer_id',
    ];
}
