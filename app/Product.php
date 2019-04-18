<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // $product->category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // $product->images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage = $this->images()->where('featured', true)->first();
        if(!$featuredImage)
            $featuredImage = $this->images()->first();
        
        if($featuredImage)
            return $featuredImage->url;

        //Default
        return asset('/images/default.jpg');
    }
    
    public function getCategoryNameAttribute(){
        if($this->category)
            return $this->category->name;
        return 'General';
    }

    public function getProductExistsAttribute($product_id = null){
        $productExists = false;
        
        if($product_id == null){
            $product_id = $this->id;
        }

        if( auth()->check() && 
            auth()->user()->cart->status == 'Active')
        {
            $details = CartDetail::where('cart_id',auth()->user()->cart->id)->get();
            if($details->count() > 0)
            {
                foreach($details as $detail){
                    if($detail->product_id == $product_id){
                        $productExists = true;
                        break;
                    }
                }
            }
        }
        return $productExists;
    }

}
