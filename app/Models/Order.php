<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   

   
    protected $table = 'orders';
    protected $fillable = [ 
        'user_id',
        'total_price',
    ];

   

    public function products()
    {
        return $this->hasMany(Product::class)->withPivot(['quantity', 'selling_price']);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

   
}