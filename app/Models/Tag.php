<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $fillable = ['title', 'order_number', 'fa_icon', 'header_manu'];

    public function blogPost() {
        return $this->belongsToMany(
                        \App\Models\BlogPost::class, 'news_tags', 'tag_id', 'news_id'
        );
    }

    public function products() {

        return $this->belongsToMany(
                        \App\Models\Product::class, 'products_tags', 'tag_id', 'product_id'
        );
    }

   
}
