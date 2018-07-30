<?php

namespace App\Http\Controllers;

use App\dc;
use App\Order;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function showAgentReport($id)
    {
        $from = "";
        $to = "";
        $data = Order::where('userId', $id)->get();
        $debit = dc::where('userId', $id)->sum('debit');
        $credit = dc::where('userId', $id)->sum('credit');
        return view('reports.agentAccount', compact('data', 'id', 'debit', 'credit', 'from', 'to'));
    }


    public function showAgentReportMe()
    {
        $id = Auth::user()->id;
        $from = "";
        $to = "";
        $data = Order::where('userId', $id)->get();
        $debit = dc::where('userId', $id)->sum('debit');
        $credit = dc::where('userId', $id)->sum('credit');
        return view('reports.agentAccount', compact('data', 'id', 'debit', 'credit', 'from', 'to'));
    }

    public function showAgentReportByDate(Request $request)
    {

        $from = date($request->from);
        $to = date($request->to);
        $id = $request->userId;
        $data = Order::where('userId', $request->userId)->whereBetween('created_at', array($from, $to))->get();
        $debit = dc::where('userId', $request->userId)->whereBetween('created_at', array($from, $to))->sum('debit');
        $credit = dc::where('userId', $request->userId)->whereBetween('created_at', array($from, $to))->sum('credit');

        return view('reports.agentAccount', compact('data', 'id', 'debit', 'credit', 'from', 'to'));
    }

    public function invoice($id)
    {
        return view('reports.invoice', compact('id'));
    }

    public function invoicePrint($id)
    {
        return view('reports.invoicePrint', compact('id'));
    }

    public function agentList()
    {
        if (Auth::user()->type == "admin") {
            $data = User::where('type', 'agent')->get();
        } elseif (Auth::user()->type == "reseller") {
            $data = User::where('type', 'agent')->where('ref', Auth::user()->id)->get();
        } else {
            return "Access denied";
        }
        return view('user.agentList', compact('data'));
    }

    public function outstanding()
    {
        if (Auth::user()->type == "admin") {
            $data = User::where('type', 'agent')->get();
        } elseif (Auth::user()->type == "agent") {
            $data = User::where('ref', Auth::user()->id)->get();
        } else {
            return "Permission denied";
        }
        $total = 0;

        return view('reports.outstanding', compact('data', 'total'));
    }
}
