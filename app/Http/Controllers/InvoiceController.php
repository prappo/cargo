<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        if (Auth::user()->type == "admin") {
            $data = Order::all();
        } elseif (Auth::user()->type == "reseller") {
            $data = Order::where('ref', Auth::user()->id)->get();
        } else {
            $data = Order::where('userId', Auth::user()->id)->get();
        }
        return view('invoice',compact('data'));
    }
}
