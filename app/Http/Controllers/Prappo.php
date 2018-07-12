<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

use App\Http\Requests;

class Prappo extends Controller
{
    public function index()
    {
        $serach = "prappo";
        $data = Customer::where('name', 'LIKE', '%'.$serach.'%')->get();
        foreach ($data as $d) {
            return $d->name;
        }

    }
}
