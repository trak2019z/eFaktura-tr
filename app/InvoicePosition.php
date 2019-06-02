<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoicePosition extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'price',
        'invoice_id',
        'product_count',
        'item'
    ];
    public function totalPrice($invoice_id)
    {
        $invoice_position = InvoicePosition::where('invoice_id', $invoice_id)->get();
        dd($invoice_id);
    }
}
