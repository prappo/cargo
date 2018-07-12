<?php

namespace App\Http\Controllers;

use App\Customer;
use App\ReceiverInfo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::where('userId', Auth::user()->id)->get();
        return view('reports.customer', compact('data'));
    }

    public function getCustomerInfo(Request $request)
    {
        try {
            $customer = Customer::where('id', $request->id)->first();

            return response()->json([
                'status' => 'success',
                'name' => $customer->name,
                'surname' => $customer->surname,
                'phone' => $customer->phone,
                'address' => $customer->address,
                'city' => $customer->city,
                'country' => $customer->country,
                'cap' => $customer->cap
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage()
            ]);
        }


    }

    public function getCustomerInfoBySurname(Request $request)
    {
        try {
            $customer = Customer::where('id', $request->id)->first();

            return response()->json([
                'status' => 'success',
                'name' => $customer->name,
                'surname' => $customer->surname,
                'phone' => $customer->phone,
                'address' => $customer->address,
                'city' => $customer->city,
                'country' => $customer->country,
                'cap' => $customer->cap
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage()
            ]);
        }

    }

    public function getCustomerInfoByDate(Request $request)
    {
        try {
            $customer = Customer::where('id', $request->id)->first();

            return response()->json([
                'status' => 'success',
                'name' => $customer->name,
                'surname' => $customer->surname,
                'phone' => $customer->phone,
                'address' => $customer->address,
                'city' => $customer->city,
                'country' => $customer->country,
                'cap' => $customer->cap
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage()
            ]);
        }
    }


    public function getReceivers(Request $request)
    {
        echo "<select id='rInfo' class='form-control'>";
        echo "<option>Select Receiver</option>";
        foreach (ReceiverInfo::where('customerId', $request->customerId)->get() as $receiver) {
            echo "<option value='" . $receiver->id . "'>" . $receiver->name . " " . $request->surname . "</option>";
        }
        echo "</select>";
        echo "
            <script>
            $('#rInfo').on('change',function() {
                var id = $(this).val();
               $.ajax({
                  type:'POST',
                  url:'/receiver/get/info',
                  data:{
                      'id':id
                  },
                  success:function(data) {
                    if(data.status == 'success'){
                        $('#rName').val(data.name);
                        $('#rSurname').val(data.surname);
                        $('#rDateOfBirth').val(data.date_of_birth);
                        $('#rPhone').val(data.phone);
                        $('#rCity').val(data.city);
                        $('#rAddress').val(data.address);
                        $('#rCap').val(data.cap);
                        $('#rCountry').val(data.country);
                    }else{
                        console.log(data.responseText);
                    }
                  },error:function(data) {
                    swal('Error','Something went wrong','error');
                    console.log(data.responseText);
                  }
               
               });
            });
            </script>
        ";
    }

    public function getReceiverInfo(Request $request)
    {
        try {
            $receiver = ReceiverInfo::where('customerId', $request->id)->first();
            return response()->json([
                'status' => 'success',
                'name' => $receiver->name,
                'surname' => $receiver->surname,
                'date_of_birth' => $receiver->date_of_birth,
                'phone' => $receiver->phone,
                'city' => $receiver->city,
                'address' => $receiver->address,
                'cap' => $receiver->cap,
                'country' => $receiver->country
            ]);
        } catch (\Exception $exception) {

            return $exception->getMessage();
        }
    }

    public function search(Request $request)
    {
        if($request->dateOfBirth != ""){
            $data = Customer::where('name', 'LIKE', '%' . $request->name . '%')->where('date_of_birth', 'LIKE', $request->dateOfBirth)->get();
        }else{
            $data = Customer::where('name', 'LIKE', '%' . $request->name . '%')->get();
        }

        return view('template.search', compact('data'));

    }

    public function getSearchJs()
    {

    }
}
