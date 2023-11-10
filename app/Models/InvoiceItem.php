<?php

namespace App\Models;namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $table = 'invoice_items';
    protected $primaryKey = 'id';
    public $timestamps = true; // Si vous ne stockez pas de colonnes de timestamps (created_at et updated_at).

    protected $fillable = [
        'invoice_id',
        'product_id',
        'quantity',
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

    public function getProfit()
    {
        if (!$this->product) {
            return 0;
        }

        $costPrice = $this->product->purchase_price;
        $totalPrice = $this->product->price * $this->quantity;

        return $totalPrice - ($costPrice * $this->quantity);
    }
}