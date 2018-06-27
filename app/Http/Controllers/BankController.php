<?php

namespace App\Http\Controllers;


use App\Banks;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    public function index()
    {
        if (Auth::user()->type != "admin") {
            return "Permission denied";
        }
        return view('bank.addAccount');
    }

    public function addAccount(Request $request)
    {
        try {
            $bank = new Banks();
            $bank->userId = Auth::user()->id;
            $bank->account = $request->account;
            $bank->description = $request->description;
            $bank->save();
            return "success";
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function accountsList()
    {
        if (Auth::user()->type != "admin") {
            return "Permission denied";
        }

        $data = Banks::all();
        return view('bank.accountsList', compact('data'));

    }


    public function deleteAccount(Request $request)
    {
        try {
            Banks::where('id', $request->id)->delete();
            return "success";
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function getAccounts()
    {
        $data = Banks::all();
        return view('bank.bankList', compact('data'));
    }
}







