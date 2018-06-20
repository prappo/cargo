@extends('layouts.app')
@section('title','Balance Requests')

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
                                <th>UserId</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Payment Mood</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                            </thead>

                            <tbody>

                            @foreach($data as $d)
                                <tr>
                                    <td>{{$d->userId}}</td>
                                    <td>{{\App\User::where('id',$d->userId)->value('name')}}</td>
                                    <td>{{$d->amount}}</td>
                                    <td>{{$d->paymentMood}}</td>
                                    <td>{{$d->description}}</td>
                                    <td>{{$d->status}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button data-id="{{$d->id}}" class="btn btn-xs btn-success"><i
                                                        class="fa fa-check"></i> Approve
                                            </button>
                                            <button data-id="{{$d->id}}" class="btn btn-xs btn-danger"><i
                                                        class="fa fa-times"></i> Delete
                                            </button>
                                        </div>
                                    </td>


                                </tr>

                            @endforeach


                            </tbody>

                            <tfoot>
                            <tr>
                                <th>UserId</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Payment Mood</th>
                                <th>Description</th>
                                <th>Status</th>
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
@section('js')
    <script>
        $('.btn-success').click(function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: '{{url('/balance/request/approve')}}',
                type: 'POST',
                data: {
                    'id': id
                }, success: function (data) {
                    if (data == "success") {
                        alert("Approved");
                        location.reload();
                    } else {
                        swal("Warning !", data, 'warning');
                    }
                }, error: function (data) {
                    swal("Error", "Something went wrong", "error");
                    console.log(data.responseText);
                }
            });
        });

        $('.btn-danger').click(function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: '{{url('/balance/request/delete')}}',
                type: 'POST',
                data: {
                    'id': id
                },
                success: function (data) {
                    if (data == "success") {
                        alert("Deleted !");
                        location.reload();
                    } else {
                        swal("Warning", data, "warning");
                    }
                },
                error: function (data) {
                    swal("Error", "Something went wrong", "error");
                    console.log(data.responseText);
                }
            });
        })
    </script>
@endsection

