<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;


class CustomersController extends Controller
{
    public function showCustomers(){
        return response()->json(Customer::all());

    }
}