<?php

namespace Creode\LaravelNovaBlog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PostPostCategory extends Pivot
{
    protected $fillable = [];

    protected $table = 'post_post_category';
}
