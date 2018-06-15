<?php

namespace App\Http\Controllers;

use App\Balance;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    public function addBalanceIndex()
    {
        if (Auth::user()->type == "admin") {
            $data = User::all();
            return view('balance.addBalance', compact('data'));
        } else {
            return "Permission denied";
        }
    }


    public function updateBalanceIndex()
    {

        if (Auth::user()->type == "admin") {
            return view('balance.updateBalance');
        } else {
            return "Permission denied";
        }


    }

    public function updateBalance(Request $request)
    {
        if ($request->userId == "") {
            return "You must select a user first";
        }
        if ($request->amount == "") {
            return "You must enter amount to add";
        }

        if (Auth::user()->type == "admin") {
            if (!Balance::where('userId', $request->userId)->exists()) {
                $balance = new Balance();
                $balance->userId = $request->userId;
                $balance->amount = 0;
                $balance->save();
            }
            // update balance of user account
            $currenBalance = Balance::where('userId', $request->userId)->value('amount');
            if ($currenBalance == "") {
                $currenBalance = 0;
            }
            $newBalance = $currenBalance + $request->amount;
            Balance::where('userId', $request->userId)->update([
                'amount' => $newBalance
            ]);

            return "success";

        } else {
            return "Permission denied";
        }
    }

    public function getInfo(Request $request)
    {

        try {
            $name = User::where('id', $request->userId)->value('name');
            $amount = Balance::where('userId', $request->userId)->value('amount');
            if ($amount == "") {
                $amount = 0;
            }
            $type = User::where('id', $request->userId)->value('type');
            return response()->json(
                [
                    'status' => 'success',
                    'name' => $name,
                    'amount' => $amount,
                    'type' => $type
                ]
            );
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage()
            ]);
        }
    }
}
