<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Users2 extends Model
{
    protected $table = 'users2';
    protected $primaryKey = 'id';
    protected $fillable = [
        'username', 'email', 'password', 'status', 'role', 'created_at', 'updated_at', 'post', 'category', 'tag', 'users', 'added_by'
    ];
}