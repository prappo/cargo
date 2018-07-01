<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->type == "admin") {
            return view('home.admin');
        } elseif (Auth::user()->type == "reseller") {
            return view('home.reseller');
        } else {
            return view('home.agent');
        }

    }
}
