@extends('layouts.app')
@section('title','Add Bank Account')

@section('content')
    <div class="wrapper">
        @include('components.navigation')
        @include('components.sidebar')


        <div class="content-wrapper">
            <section class="content">

                {{-- block 1 start--}}

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-bank"></i> Add Bank Account</h3>

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
                                    <label><i class="fa fa-key"></i> Account</label>
                                    <input class="form-control" type="text" id="account"
                                           value=""
                                           placeholder="Enter Account">
                                </div>

                                <div class="form-group">
                                    <label><i class="fa fa-edit"></i> Description</label>
                                    <input class="form-control" type="text" id="description"
                                           value=""
                                           placeholder="Description">
                                </div>


                                <!-- /.form-group -->
                            </div>


                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">

                        <div class="col-md-6">
                            <button id="save" class="btn btn-block btn-success"><i class="fa fa-save"></i> Update
                                Save Account
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
        $('#save').click(function () {
            $.ajax({
                url: '{{url('/bank/account/add')}}',
                type: 'POST',
                data: {
                    'account': $('#account').val(),
                    'description': $('#description').val(),
                },
                success: function (data) {
                    if (data == "success") {
                        swal("Success", "Bank account Saved", "success");
                        location.reload();
                    } else {
                        swal("Warning !", data, "warning");
                    }
                },
                error: function (data) {
                    swal("Error", "Something went wrong", "error");
                    console.log(data.responseText);
                }
            })
        })
    </script>

@endsection

















