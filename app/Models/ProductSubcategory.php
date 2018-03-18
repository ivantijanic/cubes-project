<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSubcategory extends Model
{
   protected $table = 'product_subcategories';
	
	protected $fillable = ['product_category_id', 'title', 'description'];
	
	
	public function productCatregory() {
		return $this->belongsTo(\App\Models\ProductCategory::class, 'product_category_id');
	}
	
	public function products() {
		return $this->hasMany(\App\Models\Product::class, 'product_subcategory_id');
	}
}
