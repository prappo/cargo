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
                        <div align="center">
                            <h1> GBSM CARGO</h1>
                            <p>Via Delle Ninfee 32, 00172 Roma</p>
                            <p>Tel: +39 06-64018528, Fax:+39 06-64018528,</p>
                            <p>Email:gbsmcargoit@gmail.com</p>

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p>Agent Account Report</p>
                                <p>Agent Code:121</p>
                            </div>

                            <div class="col-md-3">
                                <p>Country : Italy</p>
                                <p>Agent Name : Golam Kibria</p>
                            </div>
                            <div class="col-md-3">
                                <p>From : 1-2-2018</p>
                                <p>To : 1-2-2018</p>
                            </div>
                            <div class="col-md-3">
                                <b>Balance : 1234</b>
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

                            <tr>
                                <td class="groupOne">Data</td>
                                <td class="groupOne">Data</td>
                                <td class="groupOne">Data</td>
                                <td class="groupOne">Data</td>
                                <td class="groupOne">Data</td>
                                <td class="groupOne">Data</td>
                                <td class="groupTwo">Data</td>
                                <td class="groupTwo">Data</td>
                                <td class="groupTwo">Data</td>
                                <td class="groupThree">Data</td>
                                <td class="groupThree">Data</td>
                                <td class="groupThree">Data</td>
                            </tr>
                            <tr>
                                <td class="groupOne">Data</td>
                                <td class="groupOne">Data</td>
                                <td class="groupOne">Data</td>
                                <td class="groupOne">Data</td>
                                <td class="groupOne">Data</td>
                                <td class="groupOne">Data</td>
                                <td class="groupTwo">Data</td>
                                <td class="groupTwo">Data</td>
                                <td class="groupTwo">Data</td>
                                <td class="groupThree">Data</td>
                                <td class="groupThree">Data</td>
                                <td class="groupThree">Data</td>
                            </tr>

                            <tr>
                                <td class="groupOne">Data</td>
                                <td class="groupOne">Data</td>
                                <td class="groupOne">Data</td>
                                <td class="groupOne">Data</td>
                                <td class="groupOne">Data</td>
                                <td class="groupOne">Data</td>
                                <td class="groupTwo">Data</td>
                                <td class="groupTwo">Data</td>
                                <td class="groupTwo">Data</td>
                                <td class="groupThree">Data</td>
                                <td class="groupThree">Data</td>
                                <td class="groupThree">Data</td>
                            </tr>


                            <tr style="background:yellow">
                                <td colspan="6">Data</td>
                                <td colspan="3">Data</td>
                                <td>Data</td>
                                <td>Data</td>
                                <td>Data</td>


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
