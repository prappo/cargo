@extends('layouts.app')
@section('title','Make Request')

@section('content')
    <div class="wrapper">
        @include('components.navigation')
        @include('components.sidebar')


        <div class="content-wrapper">
            <section class="content">

                {{-- block 1 start--}}

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-money"></i> Balance Request</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">


                                <div class="form-group">
                                    <label><i class="fa fa-bank"></i>Payment Mood</label>
                                    <select id="paymentMood" class="form-control">
                                        <option>Bank</option>
                                        <option>Cash</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><i class="fa fa-dollar"></i> Amount</label>
                                    <input value=""
                                           class="form-control" type="number" id="amount"
                                           placeholder="Enter your amount">
                                </div>
                                <div class="form-group">
                                    <label><i class="fa fa-edit"></i> Description</label>
                                    <input value=""
                                           class="form-control" type="text" id="description"
                                           placeholder="Type Description ....">
                                </div>


                                <!-- /.form-group -->
                            </div>


                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">

                        <div class="col-md-6">
                            <button id="send" class="btn btn-block btn-success"><i class="fa fa-send"></i>Send Request
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

        $('#send').click(function () {
            if($('#amount').val() == ""){
                return alert("You must enter the amount");
            }


            $.ajax({
                url: '{{url('/balance/request/make')}}',
                type: 'POST',
                data: {
                    'userId': '{{Auth::user()->id}}',
                    'paymentMood': $('#paymentMood').val(),
                    'description': $('#description').val(),
                    'amount': $('#amount').val()
                },
                success: function (data) {
                    if (data == "success") {
                        alert("Request submitted !!");
                        location.reload();
                    } else {
                        alert(data);
                    }
                },
                error: function (data) {
                    swal("Error", "Something went wrong", "error");
                    console.log(data.responseText);
                }
            })
        });

    </script>
@endsection


















