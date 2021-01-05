<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class ExcelIE extends Model
{
    //
    protected $fillable = [
        'name', 'age', 'city', 'salary', 'created_at', 'updated_at'
    ];
    protected $table = "excel";
    protected $primaryKey = 'id';
}