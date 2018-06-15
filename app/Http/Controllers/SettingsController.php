<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        if (Auth::user()->type == "admin") {
            return view('settings.index');
        } else {
            return "Forbidden";
        }
    }

    public function update(Request $request){

    }

    public static function get($key){

    }


}
