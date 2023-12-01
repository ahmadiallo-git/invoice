<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_quantity',
        'total_amount',
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function getSubtotal()
    {
        $subtotal = 0;
        foreach ($this->invoiceItems as $invoiceItem) {
            $subtotal += $invoiceItem->getSubtotal();
        }
        return $subtotal;
    }

    public function getTotal(): float
    {
        $total = 0;
    
        
        $total = $this->invoiceItems->sum->getSubtotal();

    
        // Soustraire la réduction totale
        if ($this->discount !== null) {
            $total -= $this->discount;
        }
    
        return $total;
    }

    public function getDiscount(): ?string
    {
        return $this->discount;
    }

    public function setDiscount(string $discount): static
    {
        $this->discount = $discount;

        return $this;
    }
   
}