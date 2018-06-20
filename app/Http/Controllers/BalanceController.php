<?php

namespace App\Http\Controllers;

use App\Balance;
use App\balanceRequest;
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

    public function balanceRequestIndex()
    {
        $data = User::where('type', 'agent')->get();
        return view('balance.makeRequest', compact('data'));
    }

    public function balanceRequestUserIndex()
    {

        return view('balance.userMakeRequest');
    }

    public function balanceRequest(Request $request)
    {
        if ($request->userId == "none") {
            return "You must select an agent";
        }
        try {
            $bRequest = new balanceRequest();
            $bRequest->userId = $request->userId;
            $bRequest->paymentMood = $request->paymentMood;
            $bRequest->amount = $request->amount;
            $bRequest->description = $request->description;
            $bRequest->status = "pending";
            $bRequest->ref = Auth::user()->id;
            $bRequest->save();
            return "success";

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function approveBalanceRequest(Request $request)
    {
        $r = balanceRequest::where('id', $request->id)->first();
        if ($r->status == "approved") {
            return "This request already approved";
        }
        try {
            if (!Balance::where('userId', $r->userId)->exists()) {
                $b = new Balance();
                $b->userId = $r->userId;
                $b->amount = 0;
                $b->save();
            }
            $currentBalance = Balance::where('userId', $r->userId)->value('amount');


            $newBalance = balanceRequest::where('id', $r->id)->value('amount');


            $finalBalance = $currentBalance + $newBalance;

            
            Balance::where('userId', $r->userId)->update([
                'amount' => $finalBalance
            ]);

            balanceRequest::where('id', $request->id)->update([
                'status' => 'approved'
            ]);
            return "success";
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }


    }

    public function deleteBalanceRequest(Request $request)
    {
        try {
            balanceRequest::where('id', $request->id)->delete();
            return "success";
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function balanceRequestsList()
    {
        $data = balanceRequest::where('status', 'pending')->get();
        return view('balance.requests', compact('data'));
    }
}
