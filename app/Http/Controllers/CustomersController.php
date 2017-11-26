<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;


class CustomersController extends Controller
{
    public function showCustomers()
    {
        return response()->json(Customer::all());
    }


    public function showCustomersId($id)
    {
        $customer = Customer::find($id);

        if ($customer != null) {
            return response()->json($customer);
        } else {
            return response()->json(["message" => "Customer not found"], 404);
        }

    }
}