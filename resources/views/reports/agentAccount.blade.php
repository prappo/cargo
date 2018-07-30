@extends('layouts.app')
@section('title','Home')

@section('content')
    <div class="wrapper">
        @include('components.navigation')
        @include('components.sidebar')


        <div class="content-wrapper">
            <section class="content">
                <div class="box">
                    <form method="post" action="{{url('/report/agent')}}">
                        From <input type="date" value="{{$from}}" name="from">
                        To <input type="date" value="{{$to}}" name="to">
                        <input type="hidden" value="{{$id}}" name="userId">

                        <input type="submit" class="btn btn-primary" value="Get Data">
                    </form>
                </div>

                {{-- block 1 start--}}
                <div class="box">

                    <div class="box-body">
                        <div align="center">
                            <h1> GBSM CARGO</h1>
                            <p>Via Delle Ninfee 32, 00172 Roma</p>
                            <p>Tel: +39 06-64018528, Fax:+39 06-64018528,</p>
                            <p>Email:gbsmcargoit@gmail.com</p>

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p>Agent Account Report</p>
                                <p>Agent Code:GA-0{{$id}}</p>
                            </div>

                            <div class="col-md-3">
                                <p>Country : {{\App\User::where('id',$id)->value('country')}}</p>
                                <p>Agent Name : {{\App\User::where('id',$id)->value('name')}}</p>
                            </div>
                            <div class="col-md-3">
                                <p>From : {{$from}}</p>
                                <p>To : {{$to}}</p>
                            </div>
                            <div class="col-md-3">
                                <b>Balance : {{\App\Balance::where('userId',$id)->value('amount')}}</b>

                            </div>


                        </div>

                        <table>
                            <tr>
                                <th class="groupOne">Srl.No</th>
                                <th class="groupOne">Date</th>
                                <th class="groupOne">Item Type</th>
                                <th class="groupOne">Order Number</th>
                                <th class="groupOne">Total KG</th>
                                <th class="groupOne">Euro/KG</th>
                                <th class="groupTwo">Sender Name</th>
                                <th class="groupTwo">Receiver Name</th>
                                <th class="groupTwo">Destination Country</th>
                                <th class="groupThree">Debit Amount</th>
                                <th class="groupThree">Credit Amount</th>
                                <th class="groupThree">
                                    Balance
                                </th>
                            </tr>

                            @foreach($data as $d)


                                <tr>
                                    <td class="groupOne">Data</td>
                                    <td class="groupOne">{{\Carbon\Carbon::parse($d->created_at)->format('d-m-Y')}}</td>
                                    <td class="groupOne">Data</td>
                                    <td class="groupOne">{{$d->orderId}}</td>
                                    <td class="groupOne">{{\App\OrderDetails::where('orderId',$d->orderId)->sum('weight')}}</td>
                                    <td class="groupOne">{{\App\OrderDetails::where('orderId',$d->orderId)->sum('per_kg')}}</td>
                                    <td class="groupTwo">{{$d->customer_name}}</td>
                                    <td class="groupTwo">{{$d->receiver_name}}</td>
                                    <td class="groupTwo">{{$d->receiver_country}}</td>
                                    <td class="groupThree">{{\App\dc::where('userId',$d->userId)->where('orderId',$d->orderId)->value('debit')}}</td>
                                    <td class="groupThree">{{\App\dc::where('userId',$d->userId)->where('orderId',$d->orderId)->value('credit')}}</td>
                                    <td class="groupThree">{{\App\dc::where('userId',$d->userId)->where('orderId',$d->orderId)->value('balance')}}</td>
                                </tr>

                            @endforeach


                            <tr style="background:yellow">
                                <td colspan="6"></td>
                                <td colspan="3"></td>
                                <td>{{$debit}}</td>
                                <td>{{$credit}}</td>
                                <td></td>


                            </tr>

                        </table>


                    </div>
                </div>

                {{-- block 1 end--}}

            </section>{{--End content--}}
        </div>{{--End content-wrapper--}}
        @include('components.footer')
    </div>{{--End wrapper--}}
@endsection

@section('css')
    <style>
        table {
            width: 100%;
        }

        table, th, td {

            border: 1px solid black;
            text-align: center;
        }

        .groupOne {
            background: skyblue;
        }

        .groupTwo {
            background: lightpink;
        }

        .groupThree {
            background: lightgreen;
        }
    </style>
@endsection
