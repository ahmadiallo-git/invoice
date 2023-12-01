<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table  = "carts";

    protected $fillable = [ 
        "product_id",
        "qty",
        "user_id",
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }


    public function convertToInvoice()
    {
        // Crée une nouvelle facture
        $invoice = Invoice::create([
            'user_id' => $this->user_id, // Assure-toi que la colonne 'user_id' existe dans la table 'invoices'
            'total_quantity' => $this->qty,
            'total_amount' => $this->product->selling_price * $this->qty,
        ]);

        // Ajoute l'article de facture
        InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'product_id' => $this->product_id,
            'quantity' => $this->qty,
            'amount' => $this->product->selling_price * $this->qty,
        ]);

        // Supprime l'article du panier
        $this->delete();
    }
}