<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 
        'name',
        'slug',
        'description',
        'unit_price',
        'selling_price',
        'quantity',
        'status',
    ];

    public function productImages()  {
        return $this->hasMany(ProductImages::class,'product_id','id');

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products')
            ->withPivot(['quantity', 'price']);
    }

   
}