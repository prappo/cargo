@extends('layouts.app')
@section('title','Outstanding Agent Report')

@section('content')
    <div class="wrapper">
        @include('components.navigation')
        @include('components.sidebar')


        <div class="content-wrapper">
            <section class="content">

                <div style="padding:10px" class="box no-border">
                    <div align="center">
                        <h3>GLOBAL CARGO</h3>
                        <p><b>Via Delle Ninfee 32, 00172 Roma</b></p>
                        <p>Tel: +39 06-64018528, Fax:+39 06-64018528,</p>
                        <p>Email:gbsmcargoit@gmail.com</p>
                        <h4>AGENT OUTSTANDING BALANCE REPORT</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <table style="width:100%">
                                <tr>
                                    <th>Agent Code</th>
                                    <th>City</th>
                                    <th>Agent</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Outstanding Balance</th>
                                </tr>
                                @foreach($data as $d)
                                    @if(\App\Balance::where('userId',$d->id)->value('amount') < 0)

                                        <tr>
                                            <td>GA-0{{$d->id}}</td>
                                            <td>{{$d->city}}</td>
                                            <td>{{$d->name}}</td>
                                            <td>{{$d->phone}}</td>
                                            <td>{{$d->email}}</td>
                                            <td><b style="color:red">{{\App\Balance::where('userId',$d->id)->value('amount')}}</b></td>
                                        </tr>

                                    @endif

                                @endforeach

                                <tr>
                                    <td colspan="5"></td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- block 1 start--}}

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
    </style>
@endsection

