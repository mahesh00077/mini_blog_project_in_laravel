<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    //
    protected $table = 'payment_info';
    protected $primaryKey = 'id';
    protected $fillable = [
        'customer_id', 'product_id', 'qty', 'main_amt', 'payment_mode', 'paypal_id', 'cardNumber', 'month', 'year', 'cvv', 'created_at', 'updated_at'
    ];
}