<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="blogs";
    protected $fillable = [
        'blog_title',
        'blog_description',
        'blog_tags',
        'blog_content',
        'blog_image',
        'blog_author',
        'blog_slug',
        'blog_categoryId',
        'blog_status',
    ];
}
