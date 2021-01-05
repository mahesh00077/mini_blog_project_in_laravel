<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'id';
    /* protected $fillable = [
        'Category', 'TargetParkers', 'MaxParkers', 'deleted_at', 'is_active', 'location_id', 'ParkingType'
    ]; */
}