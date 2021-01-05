<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Category_Posts extends Model
{
    protected $table = 'category_posts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_id', 'post_id', 'added_by', 'created_at', 'updated_at'
    ];
}