<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FailedTransaction extends Model
{
    use HasFactory;

    protected $table = 'failed_transactions';

    protected $fillable = [
        'request_data',
        'payment_data',
        'error_message'
    ];
}
