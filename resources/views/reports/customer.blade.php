@extends('layouts.app')
@section('title','Customer List')

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
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Country</th>

                            </tr>
                            </thead>

                            <tbody>

                            @foreach($data as $d)
                                <tr>
                                    <td>{{$d->name}}</td>
                                    <td>{{$d->phone}}</td>
                                    <td>{{$d->address}}</td>
                                    <td>{{$d->city}}</td>
                                    <td>{{$d->country}}</td>


                                </tr>

                            @endforeach


                            </tbody>

                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Country</th>

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

