<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'slug',
        'brand',   
        'description',
        'unit_price',
        'selling_price',
        'trending',
        'quantity',
        'status',
    ];
}