<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;
use App\CustomerAddress;


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


    public function showCustomerAddress($customer_id)
    {
        $customerAddress = CustomerAddress::find($customer_id);

        if ($customerAddress == null) {
            $code = 404;
            $response = ['message' => 'Address not found'];
            header("content-type: application/json", true, $code);
            echo json_encode($response);
        } else {
            $result = response()->json($customerAddress);
            return $result;
        }
    }

    /* companies */


    public function showCompanyId($customer_id)
    {
        $customerCompany = Company::find($customer_id);

        if ($customerCompany == null) {
            $code = 404;
            $response = ['message' => 'Company not found'];
            header("content-type: application/json", true, $code);
            echo json_encode($response);
        } else {
            $result = response()->json($customerCompany);
            return $result;
        }
    }


}