<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Customer;
use App\dc;
use App\Order;
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

    public function order(Request $request)
    {
        try {
            $number_of_box = OrderDetails::where('orderId', $request->orderId)->count();
            $order = new Order();
            $order->userId = Auth::user()->id;
            $order->customer_name = $request->cName;
            $order->document_number = $request->document_number;
            $order->customer_city = $request->cCity;
            $order->customer_address = $request->cAddress;
            $order->customer_phone = $request->cPhone;
            $order->customer_email = "";
            $order->customer_country = $request->cCountry;
            $order->receiver_name = $request->rName;
            $order->receiver_address = $request->rAddress;
            $order->receiver_city = $request->rCity;
            $order->receiver_country = $request->rCountry;
            $order->phone = $request->rPhone;
            $order->expected_date_to_receive = $request->expected_date_to_receive;
            $order->delivery_condition = $request->delivery_condition;
            $order->delivery_charge = $request->delivery_charge;
            $order->delivery_way = $request->delivery_way;
            $order->departure_airport = $request->departure_airport;
            $order->arrival_airport = $request->arrival_airport;
            $order->number_of_box = $number_of_box;
            $order->orderId = $request->orderId;
            $order->ref = Auth::user()->ref;
            $order->save();

            $currentBalance = Balance::where('userId', Auth::user()->id)->value('amount');
            $debit = OrderDetails::where('orderId', $request->orderId)->sum('total');
            $newBalance = $currentBalance - $debit;

            $dc = new dc();
            $dc->userId = Auth::user()->id;
            $dc->orderId = $request->orderId;
            $dc->debit = $debit;
            $dc->credit = 0;
            $dc->balance = $newBalance;
            $dc->save();

            $customer = new Customer();
            $customer->name = $request->cName;
            $customer->userId = Auth::user()->id;
            $customer->phone = $request->cPhone;
            $customer->address = $request->cAddress;
            $customer->city = $request->cCity;
            $customer->country = $request->cCountry;
            $customer->save();

            Balance::where('userId', Auth::user()->id)->update([
                'amount' => $newBalance
            ]);
            return "success";
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
