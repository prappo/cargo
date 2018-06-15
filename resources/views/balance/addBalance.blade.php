@extends('layouts.app')
@section('title','Add Balance')

@section('content')
    <div class="wrapper">
        @include('components.navigation')
        @include('components.sidebar')


        <div class="content-wrapper">
            <section class="content">

                {{-- block 1 start--}}
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-plus-circle"></i> Add Balance</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="mytable" class="table table-bordered table-striped" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <td>ID</td>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Created By</th>
                                        <th>Balance</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($data as $d)

                                        <tr>
                                            <td>{{$d->id}}</td>
                                            <td>{{$d->name}}</td>
                                            <td>{{$d->email}}</td>
                                            <td>
                                                {{$d->type}}</td>
                                            <td>{{\App\User::where('id',$d->ref)->value('name')}}</td>
                                            <td style="background:yellow">
                                                <b>@if(\App\Balance::where('userId',$d->id)->value('amount') == "")
                                                        0 @else{{\App\Balance::where('userId',$d->id)->value('amount')}}@endif</b>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a data-id="{{$d->id}}" target="_blank"
                                                       class="btn btn-primary add-money"><i
                                                                class="fa fa-plus-circle"></i> Add Balance</a>

                                                </div>
                                            </td>


                                        </tr>

                                    @endforeach

                                    </tbody>

                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Created By</th>
                                        <th>Balance</th>
                                        <th>Action</th>

                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="col-md-3"><b>Name</b> <input id="name" type="text" class="form-control">
                            <input type="hidden" id="userId">

                        </div>
                        <div class="col-md-3"><b>Current Balance</b> <input disabled id="amount" type="number"
                                                                            class="form-control">
                            <input type="hidden" id="currentBalance">
                        </div>
                        <div class="col-md-3"><b>Add Balance</b> <input id="balance" type="number" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label></label>
                            <button id="addBalance" class="btn btn-block btn-success"><i class="fa fa-plus"></i> Add
                            </button>
                        </div>
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
        $('.add-money').click(function () {
            var userId = $(this).attr('data-id');
            $('#userId').val(userId);
            $.ajax({
                url: '{{url('/balance/get/info')}}',
                type: 'POST',
                data: {
                    'userId': userId
                },
                success: function (data) {

                    if (data.status == "success") {
                        $('#name').css({
                            'background': 'yellow'
                        });

                        $('#name').val(data.name);
                        $('#amount').val(data.amount);
                        $('#currentBalance').val(data.amount);
                    } else {
                        swal("Error !", data.message, "warning");
                    }
                },
                error: function (data) {
                    swal("Error !", "Something went wrong", "error");
                    console.log(data.responseText);
                }
            })
        });

        $('#addBalance').click(function () {
            $.ajax({
                url: '{{url('/balance/update')}}',
                type: 'POST',
                data: {
                    'userId': $('#userId').val(),
                    'amount': $('#balance').val()
                },
                success: function (data) {
                    if (data == "success") {
                        swal("Success !", "Balance Updated", "success");
                    } else {
                        swal("Warning !", data, "warning");
                    }
                },
                error: function (data) {
                    swal("Error", "Something went wrong", "error");
                    console.log(data.responseText);
                }
            })
        });



        $("#balance").bind('keyup mouseup', function () {

            var result = parseInt($('#currentBalance').val()) + parseInt($('#balance').val());
            $('#amount').val(result);
        });

        setInterval(function () {
            fillWithCurrentBalance();
        }, 1000);

        function fillWithCurrentBalance() {
            if ($('#balance').val() == "") {
                $('#amount').val($('#currentBalance').val());
            }

        }

    </script>

@endsection












