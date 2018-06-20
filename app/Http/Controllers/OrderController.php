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

            $sum = OrderDetails::where('orderId', $request->orderId)->sum('total');


            $result = '
        <tr id="' . $id . '">
        <td>' . $request->productDescription . '</td>
        <td>' . $request->weight . '</td>
        <td>' . $request->cusCharge . '</td>
        <td>' . $request->perKg . '</td>
        <td>' . $request->charge . '</td>
        <td>' . $request->total . '</td>
        <td><button order-id="' . $request->orderId . '" data-id="' . $id . '" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Delete</button></td>
        </tr>
        ';

            return response()->json([
                'status' => 'success',
                'result' => $result,
                'sum' => $sum
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ]);
        }


    }

    public function deleteItem(Request $request)
    {
        try {

            OrderDetails::where('id', $request->id)->delete();
            $sum = OrderDetails::where('orderId', $request->orderId)->sum('total');
            return response()->json([
                'status' => 'success',
                'sum' => $sum
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function getJs()
    {
        return "
        <script>
         $('.btn-danger').click(function () {
            var id = $(this).attr('data-id');
            var orderId = $(this).attr('order-id');
            $.ajax({
                url: 'order/delete/item',
                type: 'POST',
                data: {
                    'id': id,
                    'orderId':orderId
                }, success: function (data) {
                        if(data.status=='success'){
                            $('#'+id).remove();
                            $('#sum').val(data.sum);
                            console.log(data.sum);
                        }else{
                            swal('Warning !',data.message,'warning');
                        }

                }, error: function (data) {
                    swal('Error', 'Something went wrong', 'error');
                    console.log(data.responseText);
                }
            })
        });
         </script>
        ";
    }
}
