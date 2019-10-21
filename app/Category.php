<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    /**
     * Define a many-to-many relationship with App\Product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Products() 
    {
    	return $this->belongsToMany(Product::class);
    }
}
