<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use PhpParser\Node\Expr\Cast\Array_;


class Invoice extends Model
{
    protected $fillable = [
        'number',
        'status',
        'payment_form',
        'product',
        'status',
        'price',
    ];

    public function generateInvoiceNumber()
    {
        $invoice = Invoice::select('id','number')->orderBy('id', 'desc')->first();
				
        if ($invoice != null) {
			
			$lenght = 9;
			$param_lenght = 1;
			
			$invoice_lenght = strlen($invoice->number);
			$old_number = $this->getInvoiceNumber($invoice, $invoice_lenght, $lenght, $param_lenght);
									 
            $date = (++$old_number).'/'.date('m').'/'. date('Y');
            $old_month = substr($invoice->number, -7, 2);

            if ($old_month != date('m')) {
                $date = '1/'.date('m').'/'. date('Y');
            }

            return $date;
			
        } else {
            return '1/'.date('m').'/'. date('Y');
        }
    }
	
	public function getInvoiceNumber($invoice, $invoice_lenght, $lenght, $param_lenght) 
	{
		
			if($invoice_lenght == $lenght) {
				
				$lenght = $lenght * (-1);
				
				$old_number = substr($invoice->number, $lenght, $param_lenght);
				
				return $old_number;
				
			} else {
				++$lenght;
				++$param_lenght;
				
				$old_number = $this->getInvoiceNumber($invoice, $invoice_lenght, $lenght, $param_lenght);
				
				return $old_number;
			}
		
	}

    public function fillInvoice(Array $params, Invoice $invoice)
    {
        if (count($params) == 10) {
            $invoice->number = $this->generateInvoiceNumber();
			$invoice->NIP = $params['NIP'];
			$invoice->firstName = $params['firstName'];
			$invoice->lastName = $params['lastName'];
			$invoice->street = $params['street'];
			$invoice->town = $params['town'];
			$invoice->postcode = $params['postcode'];
			$invoice->postcode_town = $params['postcode_town'];
			$invoice->property_number = $params['property_number'];
			$invoice->status = $params['payment_status'];
            return $invoice;
        } else {
            return false;
        }
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function position()
    {
        return $this->hasMany('App\InvoicePosition');
    }

   public function renderInvoice(Invoice $invoice)
   {
       $address = Address::where('user_id', Auth::user()->id)->first();
       $invoice_positions = DB::table('invoice_positions')
           ->select(DB::raw('count(*) as item_count, item, amount'))
           ->where('invoice_id', $invoice->id)
           ->groupBy('amount')
           ->get();
       return view('invoices/invoicePDF', compact('invoice', 'address', 'invoice_positions'))->render();
   }
}


