<?php

namespace Creode\LaravelNovaBlog\Entities;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{

    protected $fillable = [];


    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_post_category', 'post_id', 'post_category_id');
    }

}
