<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;



class Product extends Model implements HasMedia
{

    use HasMediaTrait;

    protected $guarded = [];

    public function Category(){
        return $this->hasOne(Category::class);
    }

    protected static function boot(){
        parent::boot();

        static ::creating(function ($product) {
            $product->slug = str_slug($product->title);
        });
    }
}
