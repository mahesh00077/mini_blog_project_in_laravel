<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title', 'subtitle', 'slug', 'status', 'body', 'posted_by', 'created_at', 'updated_at'
    ];
}