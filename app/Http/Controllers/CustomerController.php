<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::where('userId', Auth::user()->id)->get();
        return view('reports.customer', compact('data'));
    }

    public function getCustomerInfo(Request $request)
    {
        try {
            $customer = Customer::where('id', $request->id)->first();

            return response()->json([
                'status' => 'success',
                'name' => $customer->name,
                'phone' => $customer->phone,
                'address' => $customer->address,
                'city' => $customer->city,
                'country' => $customer->country
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage()
            ]);
        }


    }
}
