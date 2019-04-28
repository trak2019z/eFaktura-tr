<?php

namespace App\Http\Controllers;

use App\Client;
use App\Invoice;
use App\InvoicePosition;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::orderBy('id', 'DESC')->paginate(30);

		return view('invoices.index', ['invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
		$clients = Client::orderBy('id', 'DESC')->paginate(30);

//		dd($clients);
		
        return view('invoices.create', ['clients' => $clients]);
    }
	
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
        $client = Client::where('id', '=', $request->id)->first();
      
        $firstName = $client->firstName;
        $lastName = $client->lastName;
        $product = $request->input('product__name');
	    $product__count = $request->input('product__count');
		$product_price = $request->input('product__price');
        $payment_status = $request->input('payment_status');
		$paymeny_date = $request->input('payment_date');
        $exp_date = Carbon::now()->addDays($paymeny_date)->format('Y-m-d\TH:i:s');

        $params = [
            'price' => $points,
            'category' => $client->category,
            'NIP' => $client->NIP,
            'company' => $client->company,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'street' => $client->user->address->street,
            'postcode' => $client->user->address->postcode,
            'town' => $client->user->address->town,
            'property_number' => $client->user->address->property_number,
            'product' => $product,
            'status' => $status,
            'payment_form' => $payment_form,
        ];
      
        $invoice = new Invoice();
        $invoice = $invoice->fillInvoiceAdmin($params, $invoice);

        if ($invoice != false) {

          $client->invoice()->save($invoice);
          $position = new InvoicePosition();
          
          $position->amount = $points;
          $position->item = $product;
          
          $invoice->position()->save($position);
      
        return redirect()
                ->back()
                ->with('info', 'Dodano fakture');
          
        } else {
            return redirect()
                ->back()
                ->with('error', 'Coś poszło nie tak, spróbuj ponownie');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($user, $invoice)
    {
        $user = Auth::user();
        $invoice = Invoice::find($invoice);
        
        if ($invoice->client_id == $user->client->id || $user->roles[0]->name == 'Admin') {
            if (!is_null($invoice)) {
                $address = Address::where('user_id', Auth::user()->id)->first();
                $invoice_positions = DB::table('invoice_positions')
                    ->select(DB::raw('count(*) as item_count, item, amount'))
                    ->where('invoice_id', $invoice->id)
                    ->groupBy('amount')
                    ->get();
                return view('invoices/invoice', compact('invoice', 'address', 'invoice_positions'));
            }
        }
        return redirect('/');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generatePDFInvoice($user, $invoice)
    {
        $user = Auth::user();
        $invoice = Invoice::find($invoice);

        if ($invoice->client_id == $user->client->id || $user->roles[0]->name == 'Admin') {
            if (!is_null($invoice)) {
                $dompdf = new Dompdf();
                $dompdf->loadHtml($invoice->renderInvoice($invoice));
                $dompdf->render();
                $dompdf->stream('faktura.pdf');
            }
        }
    }


}
