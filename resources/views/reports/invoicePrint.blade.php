@extends('layouts.app')
@section('title','Invoice')

@section('content')

<body onload="window.print();">


                {{-- block 1 start--}}
                <section  class="invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> GBSM Cargo
                                <small class="pull-right">Date: {{\Carbon\Carbon::today()->format('d-m-Y')}}</small>
                            </h2>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>{{\App\Order::where('orderId',$id)->value('customer_name')}}</strong><br>
                                {{\App\Order::where('orderId',$id)->value('customer_address')}}<br>
                                {{\App\Order::where('orderId',$id)->value('customer_city')}}<br>
                                {{\App\Order::where('orderId',$id)->value('customer_country')}}<br>
                                Phone: {{\App\Order::where('orderId',$id)->value('customer_phone')}}<br>

                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>{{\App\Order::where('orderId',$id)->value('receiver_name')}}</strong><br>
                                {{\App\Order::where('orderId',$id)->value('receiver_address')}}<br>
                                {{\App\Order::where('orderId',$id)->value('receiver_city')}}<br>
                                {{\App\Order::where('orderId',$id)->value('receiver_country')}}<br>
                                Phone: {{\App\Order::where('orderId',$id)->value('phone')}}<br>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Order ID:</b> {{$id}}<br>
                            <b>Document Number:</b> {{\App\Order::where('orderId',$id)->value('document_number')}}<br>
                            <b>Expected Date to
                                receive:</b> {{\App\Order::where('orderId',$id)->value('expected_date_to_receive')}}<br>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Product Description</th>
                                    <th>Weight</th>
                                    <th>Cus. Charge</th>
                                    <th>PerKg</th>
                                    <th>Charge</th>
                                    <th>Sub Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\OrderDetails::where('orderId',$id)->get() as $order)
                                    <tr>
                                        <td>{{$order->product_description}}</td>
                                        <td>{{$order->weight}}</td>
                                        <td>{{$order->cus_charge}}</td>
                                        <td>{{$order->per_kg}}</td>
                                        <td>{{$order->charge}}</td>
                                        <td>{{$order->total}}</td>

                                    </tr>

                                @endforeach
                                <tr>
                                    <td colspan="5">
                                        <b class="pull-right">Total</b>
                                    </td>
                                    <td>
                                        <b>{{\App\OrderDetails::where('orderId',$id)->sum('total')}}</b>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->


                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <a href="invoice-print.html" target="_blank" class="btn btn-default"><i
                                        class="fa fa-print"></i> Print</a>

                        </div>
                    </div>
                </section>


</body>

@endsection


