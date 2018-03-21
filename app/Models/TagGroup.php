<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagGroup extends Model
{
     protected $fillable = ['title'];

    public function tags() {
        return $this->hasMany(\App\Models\BlogPost::class, 'tags_group_id');
    }
}
