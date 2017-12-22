<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function index()
    {
        return view('stripe/index');
    }


    public function checkout(Request $request)
    {
        $input = $request->input();

        Stripe::setApiKey("sk_test_lgrFAUVR4hxP4dAGYmgQjIdU");

        $charge = Charge::create([
            "amount" => 999,
            "currency" => "sek",
            "source" => $input ['stripeToken'],
            "description" => "Charge for" . $input['stripeEmail']
        ]);

        return response()->json($charge);
    }
}