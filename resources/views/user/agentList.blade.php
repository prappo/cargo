@extends('layouts.app')
@section('title','Agent List')

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
                                <th>Balance</th>
                                <th>Created By</th>
                                <th>Action</th>

                            </tr>
                            </thead>

                            <tbody>

                            @foreach($data as $d)
                                <tr>

                                    <td>{{$d->name}}</td>
                                    <td>{{$d->phone}}</td>
                                    <td>{{\App\Balance::where('userId',$d->id)->value('amount')}}</td>
                                    <td>{{\App\User::where('id',$d->ref)->value('name')}}</td>
                                    <td><a target="_blank" href="{{url('/report/agent')}}/{{$d->id}}" class="btn btn-primary btn-xs">View Report</a> </td>


                                </tr>

                            @endforeach


                            </tbody>

                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Balance</th>
                                <th>Created By</th>
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

