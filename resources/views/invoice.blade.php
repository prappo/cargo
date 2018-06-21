@extends('layouts.app')
@section('title','Invoice')

@section('content')
    <div class="wrapper">
        @include('components.navigation')
        @include('components.sidebar')


        <div class="content-wrapper">
            <section class="content">

                {{-- block 1 start--}}
                <div class="box">

                    <div class="box-body">
                        <table id="mytable" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Agent Number</th>
                                <th>Agent Name</th>
                                <th>Customer ID</th>

                                <th>Invoice Number</th>
                                <th>Sender Name</th>
                                <th>Receiver Name</th>
                                <th>Destination Country</th>
                                <th>Number Of Items</th>
                                <th>Weight</th>
                                <th>Charge</th>
                                <th>Tax</th>
                                <th>Delivery Charge</th>
                                <th>Additional Charge</th>
                                <th>Total</th>
                                <th>Action</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($data as $d)

                                <tr>

                                    <td>{{\Carbon\Carbon::parse($d->created_at)->format('d/m/Y')}}</td>
                                    <td>GA-0{{$d->userId}}</td>
                                    <td>{{\App\User::where('id',$d->userId)->value('name')}}</td>
                                    <td>CustomerId</td>
                                    <td>{{$d->orderId}}</td>
                                    <td>{{$d->customer_name}}</td>
                                    <td>{{$d->receiver_name}}</td>
                                    <td>{{$d->receiver_country}}</td>
                                    <td>{{$d->number_of_box}}</td>
                                    <td>{{\App\OrderDetails::where('orderId',$d->orderId)->sum($d->weight)}}</td>
                                    <td>{{\App\OrderDetails::where('orderId',$d->orderId)->sum($d->charge)}}</td>
                                    <td>Tax</td>
                                    <td>{{$d->cus_charge}}</td>
                                    <td>a/c</td>
                                    <td>{{\App\OrderDetails::where('orderId',$d->orderId)->sum('total')}}</td>
                                    <td><a class="btn btn-success btn-xs" target="_blank" href="{{url('/invoice')}}/{{$d->orderId}}">View</a> </td>
                                </tr>
                            @endforeach

                            </tbody>

                            <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Agent Number</th>
                                <th>Agent Name</th>
                                <th>Customer ID</th>

                                <th>Invoice Number</th>
                                <th>Sender Name</th>
                                <th>Receiver Name</th>
                                <th>Destination Country</th>
                                <th>Number Of Items</th>
                                <th>Weight</th>
                                <th>Charge</th>
                                <th>Tax</th>
                                <th>Delivery Charge</th>
                                <th>Additional Charge</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                {{-- block 1 end--}}

            </section>{{--End content--}}
        </div>{{--End content-wrapper--}}
        @include('components.footer')
    </div>{{--End wrapper--}}
@endsection
