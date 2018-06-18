<?php

namespace App\Http\Controllers;

use App\OrderDetails;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function addItem(Request $request)
    {
        try {
            $item = new OrderDetails();
            $item->userId = Auth::user()->id;
            $item->orderId = $request->orderId;
            $item->product_description = $request->productDescription;
            $item->weight = $request->weight;
            $item->cus_status = "";
            $item->cus_charge = $request->cusCharge;
            $item->per_kg = $request->perKg;
            $item->charge = $request->charge;
            $item->total = $request->total;
            $item->save();

            $id = $item->id;


            $result = '
        <tr>
        <td>' . $request->productDescription . '</td>
        <td>' . $request->weight . '</td>
        <td>' . $request->cusCharge . '</td>
        <td>' . $request->perKg . '</td>
        <td>' . $request->charge . '</td>
        <td>' . $request->total . '</td>
        <td><button data-id="' . $id . '" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Delete</button></td>
        </tr>
        ';

            return response()->json([
                'status' => 'success',
                'result' => $result
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ]);
        }


    }
}
