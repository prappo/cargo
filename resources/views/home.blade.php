@extends('layouts.app')
@section('title','Home')

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
                                <th>Invoice No.</th>
                                <th>C.No</th>
                                <th>Customer</th>
                                <th>Home Delivery</th>
                                <th>D.Charge</th>
                                <th>Weight</th>
                                <th>Tax</th>
                                <th>Total</th>
                                <th>G_Total</th>
                                <th>Date</th>
                                <th>Delivery Status</th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>


                            </tr>

                            </tbody>

                            <tfoot>
                            <tr>
                                <th>Invoice No.</th>
                                <th>C.No</th>
                                <th>Customer</th>
                                <th>Home Delivery</th>
                                <th>D.Charge</th>
                                <th>Weight</th>
                                <th>Tax</th>
                                <th>Total</th>
                                <th>G_Total</th>
                                <th>Date</th>
                                <th>Delivery Status</th>
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
