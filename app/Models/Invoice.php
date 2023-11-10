<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $primaryKey = 'id';
    public $timestamps = true; // Si vous ne stockez pas de colonnes de timestamps (created_at et updated_at).

    protected $fillable = [
        'customerName',
        'createdAt',
        'customerNumber',
    ];

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

    public function getTotal()
    {
        $total = 0;
        foreach ($this->invoiceItems as $invoiceItem) {
            $total += $invoiceItem->getSubtotal();
        }
        return $total;
    }
}