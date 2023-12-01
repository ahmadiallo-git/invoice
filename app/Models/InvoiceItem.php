<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;
    protected $table = 'invoice_items';
    protected $fillable = [
        'invoice_id',
        'product_id',
        'quantity',
        'amount',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

   

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

  

    public function getSubtotal()
    {
        if (!$this->product) {
            return 0;
        }
        return $this->product->price * $this->quantity;
    }

    public function getProfit() : float
    {
        if (!$this->product) {
            return 0;
        }

        $costPrice = $this->product->purchase_price;

        return ($this->product->price - $costPrice) * $this->quantity;
    }

    

   

    
}