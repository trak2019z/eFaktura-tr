<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    public function index(User $model)
    {
	   	$clients = Client::orderBy('id', 'DESC')->paginate(3);
		
//		dd($clients);
		
        return view('clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('clients.create');
    }

}
