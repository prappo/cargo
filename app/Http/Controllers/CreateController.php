<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CreateController extends Controller
{
    public function makeAgentIndex(){
        return view('create.makeAgent');

    }

    public function makeReseller(){
        return view('create.makeReseller');
    }

    public function makeBdUserIndex(){
        return view('create.makeBdUser');
    }


}
