<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
		'product_category_id', 'product_subcategory_id', 'product_brand_id', 
		'title', 'photo_filename', 'description', 'specification',
		'price', 'quantity', 'on_sale', 'discount', 'first_page', 'product_code',
	];
	
	public function productBrand() {
		
		return $this->belongsTo(
			\App\Models\ProductBrand::class,
			'product_brand_id'
		);
	}
	
	public function productCategory() {
		return $this->belongsTo(
			\App\Models\ProductCategory::class,
			'product_category_id'
		);
	}
        
        public function productSubcategory() {
		return $this->belongsTo(
			\App\Models\ProductSubcategory::class,
			'product_subcategory_id'
		);
	}
	
	public function tags() {
		
		return $this->belongsToMany(
			\App\Models\Tag::class,
			'products_tags',
			'product_id',
			'tag_id'
		);
	}
}
