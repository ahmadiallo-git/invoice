<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 
        'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function convertToInvoice()
    {
        // Crée une nouvelle facture
        $invoice = Invoice::create([
            'user_id' => auth()->user()->id, // Assure-toi d'avoir l'utilisateur authentifié
            'total_quantity' => $this->quantity,
            'total_amount' => $this->product->selling_price * $this->quantity,
        ]);

        // Ajoute l'article de facture
        InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'amount' => $this->product->selling_price * $this->quantity,
        ]);

        // Supprime l'article du panier
        $this->delete();
    }
}