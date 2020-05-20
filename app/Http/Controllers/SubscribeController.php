<?php

namespace App\Http\Controllers;

use App\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
    	$data = $request->all();

    	$request->validate([
    		'email'	=>	'required|unique:App\Subscribe,email'
    	]);

    	Subscribe::create(['email' => $data['email']]);
    	$link = url()->previous().'#subscribe';
    	return redirect($link)->withErrors('You have successfully subscribed to newsletter. Thank you');
    }


}
