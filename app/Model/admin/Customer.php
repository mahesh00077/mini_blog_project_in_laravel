<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'email', 'mobile_no', 'country', 'state', 'city', 'created_at', 'updated_at'
    ];
}